<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;

class UsersController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->userRepo->getAll();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.create', ['roles' => $roles,'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|between:4,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user =  $this->userRepo->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permission != null){            
            foreach ($request->permission as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('users.index')
        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  $this->userRepo->find($id);
        $roles = Role::get();
        $userRole = $user->roles->first();
        $permissions = Permission::all();

        // dd($rolePermission);

        return view('users.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'permissions' => $permissions
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =  $this->userRepo->find($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->roles()->detach();
        $user->permissions()->detach();
        if($request->role != null){
            
            $user->roles()->attach($request->role);
            $user->save();
        }
        if($request->permission != null){          
            foreach ($request->permission as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }
        
        $user->save();
    
        return redirect()->route('users.index')
        ->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  $this->userRepo->find($id);
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
    }
}