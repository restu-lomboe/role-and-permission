<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'home']);
        // auth()->user()->givePermissionTo('product');
        // auth()->user()->assignRole('admin');
        // $role = Role::findById(1);
        // $role->givePermissionTo('product');
        // $permission = \Auth::user()->permissions;
        // dd($permission);
        // $roles = \Auth::user()->getRoleNames();
        // dd($roles);
        // auth()->user()->revokePermissionTo('setting');
        // auth()->user()->removeRole('admin');
        $user = \Auth::user();
        $role = $user->getRoleNames();
        // dd($role);
        if ($role[0] == null) {
            $user->assignRole('user');
        }


        return view('home');
    }

    public function product()
    {
        return view ('product');
    }

    public function setting()
    {
        $users = User::all();
        $roles = \Auth::user()->getRoleNames();

        return view ('setting', compact('users', 'roles'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $roles_name = $user->getRoleNames();
        $permission_name = $user->permissions;

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $role = Role::findById($data['role']);

            if ($roles_name == true) {
                $user->removeRole($roles_name[0]);
                $user->revokePermissionTo($permission_name);
            }

            if (count($data['permission'] > 0)) {
                foreach ($data['permission'] as $key => $value) {
                    $user->givePermissionTo($data['permission'][$key]);
                    $user->assignRole($role);
                    $role->givePermissionTo($data['permission'][$key]);
                }
            }
            return redirect()->route('setting')->with('status', 'User Berhasil Di Update');
        }

        return view ('edit_setting', compact('user', 'roles', 'permissions'));
    }
}
