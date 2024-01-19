<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginAttempt;
use Illuminate\Http\Request;

class LoginAttemptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.loginAttempt.index');
    }


    public function api(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'ip_address',
            2 => 'username',
            3 => 'status',
            4 => 'created_at',
        );

        $totalData = LoginAttempt::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (!$request->input('search.value')) {
            $rs = LoginAttempt::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = LoginAttempt::count();
        } else {
            $search = $request->input('search.value');
            $rs = LoginAttempt::orWhere('id', 'ilike', "%{$search}%")
                ->orWhereHas('ipAddress', function ($query) use ($search) {
                    $query->where('ip_address', 'ilike', "%{$search}%");
                })
                ->orWhere('username', 'ilike', "%{$search}%")
                ->orWhere('created_at', 'ilike', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = LoginAttempt::orWhere('id', 'ilike', "%{$search}%")
                ->orWhereHas('ipAddress', function ($query) use ($search) {
                    $query->where('ip_address', 'ilike', "%{$search}%");
                })
                ->orWhere('username', 'ilike', "%{$search}%")
                ->orWhere('created_at', 'ilike', "%{$search}%")
                ->count();
        }
        $data = array();
        if ($rs) {
            foreach ($rs as $r) {
                $nestedData['id'] = $r->id;
                $nestedData['ip_address'] = ($r->ipAddress->country_code != Null ? '<img src="' .
                        asset('admin/flags/' . $r->ipAddress->country_code . '.png') . '" class="border mr-1 mb-1"/> ' : '<img src="' .
                        asset('admin/flags/flag.png') . '" class="border mr-1 mb-1"/> ') . $r->ipAddress->ip_address .
                    ($r->ipAddress->disabled ? ' <i class="fas fa-times-circle text-danger"></i>' : ' <i class="fas fa-check-circle text-info"></i>');
                $nestedData['username'] = $r->username;
                $nestedData['status'] = $r->status ? (trans('transAdmin.login-event') . ' <i class="fas fa-check text-info"></i>') : (trans('transAdmin.failed-event') . ' <i class="fas fa-times text-danger ml-1"></i>');
                $nestedData['created_at'] = $r->created_at->format('Y-m-d H:i:s');
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
