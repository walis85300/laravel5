<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth, Hash;

use Debugbar;

use App\Empleado, App\Cargo, App\Rol, App\Roles_Empleado;
class EmpleadosCrudController extends Controller
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
        $empleados = Empleado::all();

        Debugbar::addMessage($empleados);

        return view('admin.empleado.index', 
            compact('usuario', 'roles_empleado', 'empleados')
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
        $empleados = Empleado::where('Cargo_Cod_Cargo', '1')->get();
        $cargos = Cargo::all();
        $roles = Rol::all();

        Debugbar::addMessage($empleados);


        return view('admin.empleado.create', 
            compact('usuario', 'roles_empleado', 'empleados', 'cargos', 'roles')
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

        $roles = Rol::all()->toArray();

        $empleado = new Empleado($request->input());
        $empleado->password = Hash::make($request->input('password'));
        $empleado->save();

        foreach ($roles as $key => $value) {
            if ($request->input($value['Codigo']) == 'on') {
                $rol_empleado = new Roles_Empleado([
                    'Roles_codigo' => $value['Codigo'],
                    'Empleado_Cedula' => $request->input('Cedula'),
                ]);
                $rol_empleado->save();
            }
        }

        // Debugbar::addMessage($empleado);
        // return view('welcome');
        return redirect()->intended('admin/empleado')->with('success','Se agregó correctamente');
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
        //
        $usuario = Auth::user();
        $roles_empleado = $usuario->roles_empleado;
        $empleados = Empleado::where('Cargo_Cod_Cargo', '1')->get();
        $cargos = Cargo::all();
        $roles = Rol::all();
        $empleadoModificar = Empleado::find($id);

        Debugbar::addMessage($empleadoModificar);


        return view('admin.empleado.edit', 
            compact('usuario', 'roles_empleado', 'empleados', 'cargos', 'roles', 'empleadoModificar')
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
        $roles = Rol::all()->toArray();

        $empleado = Empleado::find($id);
        $empleado->update($request->input());
        $empleado->password = Hash::make($request->input('password'));

        // Debugbar::addMessage($empleado);

        $roles_empleado = Roles_Empleado::where('Empleado_Cedula', $id)->get()->toArray();

        foreach ($roles_empleado as $key => $value) {
            Roles_Empleado::where('Roles_codigo', $value['Roles_codigo'])
            ->where('Empleado_Cedula', $value['Empleado_Cedula'])
            ->delete();
        }

        foreach ($roles as $key => $value) {
            if ($request->input($value['Codigo']) == 'on') {
                $rol_empleado = new Roles_Empleado([
                    'Roles_codigo' => $value['Codigo'],
                    'Empleado_Cedula' => $request->input('Cedula'),
                ]);
                $rol_empleado->save();
            }
        }

        return redirect()->intended('admin/empleado')->with('success', 'Se ha modificado con exito');
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
    }
}
