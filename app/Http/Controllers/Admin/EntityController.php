<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Entity as EntityRequest;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $entityCreate = Entity::create($request->all());

        return redirect()->route('admin.entities.edit', [
            'entities' => $entityCreate->id
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
        $entity = Entity::where('id', $id)->first();
        $entity->fill($request->all());
        $entity->save();

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
