<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Debugbar;

use App\Color;

class ColorCrudController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
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
        $colores = Color::all();


        return view('admin.color.index', 
            compact('usuario', 'roles_empleado', 'colores')
        );
    }

    public function createGet() {
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;

        return view('admin.color.create', 
            compact('usuario', 'roles_empleado')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;

        $color = new Color();

        $color->Cod_Color = substr(uniqid('', true),0,11);
        $color->Descripcion = $request->input('descripcion');

        $color->save();

        // return view('welcome');

        return redirect()->intended('admin/color/all')->with('success', 'Se ha guardado con éxito');

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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $colores = Color::all();

        Debugbar::addMessage($id);

        return view('admin.color.edit',
            compact('usuario', 'roles_empleado', 'colores', 'id')
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

        Debugbar::addMessage($request->input('descripcion'));
        Debugbar::addMessage($id);

        Color::find($id)->update([
            "Descripcion"=>$request->input('descripcion')
        ]);

        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $colores = Color::all();

          return view('admin.color.index', 
            compact('usuario', 'roles_empleado', 'colores')
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Debugbar::addMessage($request->input('Cod_Color'));

        Color::destroy($request->input('Cod_Color'));

        return redirect()->intended('admin/color/all');

    }
}
