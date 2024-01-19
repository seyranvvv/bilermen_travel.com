<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $objs = User::orderBy('username')
            ->paginate(10);
        return view('admin.users.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required|string|max:150|unique:users,username',

        ]);

        $password = 'ulyKent' . rand(10000, 99999);
        $obj = new User();
        $obj->username = $request->username;
        $obj->password = bcrypt($password);
        $obj->active = ($request->has('active')) ? true : false;
        $obj->save();

        $success = trans('transAdmin.username') . ': <b>' . $obj->username . '</b>, '
            . trans('transAdmin.password') . ': <b>' . $password . '</b> ' . trans('transAdmin.created');
        return redirect()->route('admin.users.index')
            ->with([
                'success' => $success
            ]);
    }


    public function edit($id)
    {
        $obj = User::findOrFail($id);
        return view('admin.users.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = User::findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:150|unique:users,username,' . $request->id,
        ]);

        $obj->username = $request->username;
        $obj->active = ($request->has('active')) ? true : false;
        $obj->update();

        $success = trans('transAdmin.username') . ': <b>' . $obj->username . '</b> ' . trans('transAdmin.updated');
        return redirect()->route('admin.users.index')
            ->with([
                'success' => $success
            ]);
    }


    public function newPassword($id)
    {
        $obj = User::findOrFail($id);
        $newPassword = 'ukyKent' . rand(10000, 99999);
        $obj->password = bcrypt($newPassword);
        $obj->update();

        $success = trans('transAdmin.username') . ': <b>' . $obj->username . '</b>, '
            . trans('transAdmin.password') . ': <b>' . $newPassword . '</b> ' . trans('transAdmin.updated');
        return redirect()->route('admin.users.index')
            ->with([
                'success' => $success
            ]);
    }


    public function delete($id)
    {
        $obj = User::findOrFail($id);
        if (auth('web')->id() == $obj->id) {
            return redirect()->back();
        }
        $objName = trans('transAdmin.username') . ': <b>' . $obj->username . '</b>';
        $obj->delete();
        $success = $objName . ' ' . trans('transAdmin.deleted');
        return redirect()->route('admin.users.index')
            ->with([
                'success' => $success
            ]);
    }
}
