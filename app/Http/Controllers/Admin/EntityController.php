<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Entity as EntityRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermissionTo('Listar Entidades')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $entities = Entity::all();

        return view('admin.entities.index', [
            'entities' => $entities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Entidade')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        return view('admin.entities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntityRequest $request)
    {
        if(!Auth::user()->hasPermissionTo('Cadastrar Entidade')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $entityCreate = Entity::create($request->all());

        return redirect()->route('admin.entities.edit', [
            'entity' => $entityCreate->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Entity $entity
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
        if(!Auth::user()->hasPermissionTo('Editar Entidade')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $entity = Entity::where('id', $id)->first();

        return view('admin.entities.edit', [
            'entity' => $entity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntityRequest $request, $id)
    {
        if(!Auth::user()->hasPermissionTo('Editar Entidade')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $entity = Entity::where('id', $id)->first();
        $entity->fill($request->all());

        if (!$entity->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.entities.edit', [
            'entity' => $entity->id
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
