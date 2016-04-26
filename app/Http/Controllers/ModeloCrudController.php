<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Debugbar;

use App\Marca, App\Modelo;

class ModeloCrudController extends Controller
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
        $modelos = Modelo::all();

        return view('admin.modelo.index', 
            compact('usuario', 'roles_empleado', 'modelos')
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
        $modelos = Modelo::all();
        $marcas = Marca::all();

        return view('admin.modelo.create', 
            compact('usuario', 'roles_empleado', 'modelos', 'marcas')
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

        Debugbar::addMessage($request->input());

        $modelo = new Modelo;

        $modelo->Cod_Modelo = substr(uniqid('', true),0,11);
        $modelo->Marca_Cod_Marca = $request->input('marca');
        $modelo->Descripcion = $request->input('descripcion');
        $modelo->Ano = $request->input('ano');
        $modelo->Caracteristicas = $request->input('caracteristica');

        $modelo->save();

        return redirect()->intended('admin/modelo')->with('success', 'Se ha guardado con éxito');
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

        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $modelo = Modelo::find($id);

        return view('admin.modelo.show', 
            compact('usuario', 'roles_empleado', 'modelo', 'id')
        );
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

        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $modelos = Modelo::all();
        $marcas = Marca::all();

        return view('admin.modelo.edit', 
            compact('usuario', 'roles_empleado', 'modelos', 'marcas', 'id')
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
        //

        Modelo::find($id)->update([
            'Descripcion' => $request->input('descripcion'),
            'Ano' => $request->input('ano'),
            'Marca_Cod_Marca' => $request->input('marca'),
            'Caracteristicas' => $request->input('caracteristicas')
        ]);

        return redirect()->intended('admin/modelo');

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
        Modelo::destroy($id);
        return redirect()->intended('admin/modelo');      

    }
}
