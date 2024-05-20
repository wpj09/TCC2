<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User as UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermissionTo('Listar Usuários')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function team()
    {
        if(!Auth::user()->hasPermissionTo('Listar Usuários - Equipe')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $users = User::where(function ($query) {
            $query->where('purpose', 'admin')
                ->where('purpose', 'collaborate')
                ->orWhere('status', 1);
        })->get();

        return view('admin.users.team', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Usuário')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $roles = Role::all();

        foreach($roles as $role) {
            $role->can = false;
        }

        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Usuário')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $userCreate = User::create($request->all());
        $userCreate->save();

        return redirect()->route('admin.users.edit', [
            'user' => $userCreate->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->hasPermissionTo('Editar Usuário')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $user = User::where('id', $id)->first();
        $roles = Role::all();

        foreach($roles as $role) {
            if ($user->hasRole($role->name)){
                $role->can = true;
            } else {
                $role->can = false;
            }
        }

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if(!Auth::user()->hasPermissionTo('Editar Usuário')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $user = User::where('id', $id)->first();
        $user->fill($request->all());

        if (!$user->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        $rolesRequest = $request->all();
        $roles = null;
        foreach($rolesRequest as $key => $value) {
            if(Str::is('acl_*', $key) == true){
                $roles[] = Role::where('id', ltrim($key, 'acl_'))->first();
            }
        }

        if(!empty($roles)){
            $user->syncRoles($roles);
        } else {
            $user->syncRoles(null);
        }

        return redirect()->route('admin.users.edit', [
            'user' => $user->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
