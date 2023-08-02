<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    
    
    
     
    public function __construct()
{
     $this->middleware(['role:Super Admin' ]);
}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        $roles = Role::orderBy('id','DESC')->get();
        $user = new User();
        return view('user.create', compact('user','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('status', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('user.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      //  request()->validate(User::$rules);

        
        $user->name=$request->get('name');
        
        
           $user->syncRoles($request->get('role'));
           
              $user->save();

        return redirect()->route('users.index')
            ->with('status', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('status', 'User deleted successfully');
    }
    
    
    
   /* 
     public function create_roles_permission()
    {
        
         $role = Role::create(['name' => 'Super Admin']);
         
         
        $role = Role::create(['name' => 'Support User']);
 
        $permission = Permission::create(['name' => 'Support']);
         
$role->givePermissionTo($permission);




    }*/



}
