<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $request->validate([
            'api' => 'nullable|integer|between:0,1',
            'robot' => 'nullable|integer|between:0,1',
        ]);

        $api = $request->api ?: 0;
        $robot = $request->robot ?: 0;

        $visitors = Visitor::where('api', $api)
            ->where('robot', $robot)
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->with(['ipAddress', 'userAgent'])
            ->get();

        $suspectVisitors = Visitor::where('api', $api)
            ->where('robot', $robot)
            ->where('suspect_hits', '>', 20)
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->with(['ipAddress', 'userAgent'])
            ->get();

        $countries = DB::table("ip_addresses")
            ->leftJoin('visitors', 'ip_addresses.id', '=', 'visitors.ip_address_id')
            ->where('visitors.api', $api)
            ->where('visitors.robot', $robot)
            ->selectRaw("COUNT(visitors.id) as count, ip_addresses.country_name, ip_addresses.country_code")
            ->groupBy('ip_addresses.country_name', 'ip_addresses.country_code')
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();

        $suspectCountries = DB::table("ip_addresses")
            ->leftJoin('visitors', 'ip_addresses.id', '=', 'visitors.ip_address_id')
            ->where('visitors.api', $api)
            ->where('visitors.robot', $robot)
            ->where('visitors.suspect_hits', '>', 20)
            ->selectRaw("COUNT(visitors.id) as count, ip_addresses.country_name, ip_addresses.country_code")
            ->groupBy('ip_addresses.country_name', 'ip_addresses.country_code')
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();


        return view('admin.adminPanel.index')
            ->with([
                'api' => $api,
                'robot' => $robot,
                'visitors' => $visitors,
                'suspectVisitors' => $suspectVisitors,
                'countries' => $countries,
                'suspectCountries' => $suspectCountries,
            ]);
    }
}
