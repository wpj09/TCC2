<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermissionTo('Listar Problemas')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $problems = Http::get(env('url_api'))->json();

        return view('admin.problems.index', [
            'problems' => $problems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(!Auth::user()->hasPermissionTo('Editar Problema')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $problem = Http::withToken(env('token_api'))->get(env('URL_API_ID') . $id)->json();
        $entities = Entity::orderBy('social_name')->get();

        return view('admin.problems.edit', [
            'problem' => $problem,
            'entities' => $entities
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
        if(!Auth::user()->hasPermissionTo('Editar Problema')){
            throw new UnauthorizedException('403', 'You do not have the required authorization.');
        }

        $status = $request->status;
        $solution = $request->solution;
        $entity = $request->entity;

        Http::withToken(env('token_api'))->put(env('url_api_id') . $id, [
            'status' => $status,
            'solution' => $solution,
            'entity' => $entity
        ]);

        return redirect()->back();
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
