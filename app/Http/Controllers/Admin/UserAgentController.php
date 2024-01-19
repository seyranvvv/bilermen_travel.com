<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAgent;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.userAgent.index');
    }


    public function status($id)
    {
        $obj = UserAgent::findOrFail($id);
        if ($obj->disabled) {
            $obj->disabled = 0;
            $obj->update();
            $success = $obj->ua() . ' ' . trans('transAdmin.enabled') . '!';
        } else {
            $obj->disabled = 1;
            $obj->update();
            $success = $obj->ua() . ' ' . trans('transAdmin.disabled') . '!';
        }
        return redirect()->back()
            ->with([
                'success' => $success,
            ]);
    }


    public function api(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'device',
            2 => 'platform',
            3 => 'browser',
            4 => 'robot',
            5 => 'disabled',
        );

        $totalData = UserAgent::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (!$request->input('search.value')) {
            $rs = UserAgent::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = UserAgent::count();
        } else {
            $search = $request->input('search.value');
            $rs = UserAgent::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('device', 'ilike', "%{$search}%")
                ->orWhere('platform', 'ilike', "%{$search}%")
                ->orWhere('browser', 'ilike', "%{$search}%")
                ->orWhere('robot', 'ilike', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = UserAgent::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('device', 'ilike', "%{$search}%")
                ->orWhere('platform', 'ilike', "%{$search}%")
                ->orWhere('browser', 'ilike', "%{$search}%")
                ->orWhere('robot', 'ilike', "%{$search}%")
                ->count();
        }
        $data = array();
        if ($rs) {
            foreach ($rs as $r) {
                $nestedData['id'] = $r->id;
                $nestedData['device'] = $r->device;
                $nestedData['platform'] = $r->platform;
                $nestedData['browser'] = $r->browser;
                $nestedData['robot'] = $r->robot;
                $nestedData['disabled'] = ($r->disabled ? '<span class="badge badge-danger text-md">' . trans('transAdmin.disable') . '</span> <a href="' .
                    route('admin.user-agents.status', $r->id)
                    . '" class="btn btn-sm btn-light">' . trans('transAdmin.do-enable') . '</a>' : '<span class="badge badge-info text-md">' . trans('transAdmin.enable') . '</span> <a href="' .
                    route('admin.user-agents.status', $r->id)
                    . '" class="btn btn-sm btn-light">' . trans('transAdmin.do-disable') . '</a>');
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
