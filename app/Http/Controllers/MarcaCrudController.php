<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Marca;
use Auth;
use Debugbar;

class MarcaCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $marcas = Marca::all();

        return view('admin.marca.index',
            compact('usuario', 'roles_empleado', 'marcas')
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $marcas = Marca::all();

        return view('admin.marca.create',
            compact('usuario', 'roles_empleado', 'marcas')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;

        $marca = new Marca();

        $marca->Cod_Marca = substr(uniqid('', true),0,11);
        $marca->Descripcion = $request->input('descripcion');

        $marca->save();

        return redirect()->intended('admin/marca')->with('success', 'Se ha guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        Debugbar::addMessage($id);

        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // Debugbar::addMessage();
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $marcas = Marca::all();

        return view('admin.marca.edit', 
            compact('usuario', 'roles_empleado', 'marcas', 'id')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Marca::find($id)->update([
            'Descripcion' => $request->input('descripcion')
        ]);

        return redirect()->intended('admin/marca');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Marca::destroy($id);

        return redirect()->intended('admin/marca');
        
    }
}
