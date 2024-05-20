<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermissionTo('Listar Permissões')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        $permissions = Permission::all();

        return view('admin.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Permissão')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Permissão')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        $messages = null;
        $permission = Permission::where('name', $request->name)->get();

        if ($permission->count() > 0) {
            return redirect()->back()->withInput();
        }

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.permission.index');
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
        if(!Auth::user()->hasPermissionTo('Editar Permissão')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        $permission = Permission::where('id', $id)->first();

        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user()->hasPermissionTo('Editar Permissão')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }
        $permission = Permission::where('name', $request->name)->where('id', '!=', $id)->get();

        if ($permission->count() > 0) {
            return redirect()->back()->withInput();
        }

        $permission = Permission::where('id', $id)->first();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.permission.index');
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
