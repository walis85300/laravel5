@extends('admin.layout')

@section('body')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Modificar datos del empleado</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                Modifique los datos del empleado
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <form role="form" action="/admin/empleado/{{$empleadoModificar->Cedula}}" method="POST">
	                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">	                        	
	                            <div class="form-group">
	                                <label>Cédula de Identidad</label>
	                                <input class="form-control" autofocus name="Cedula" required type="number" value="{{$empleadoModificar->Cedula}}">
	                                <p class="help-block">e.g: 20879083</p>
	                            </div>
	                            <div class="form-group">
	                                <label>Nombre</label>
	                                <input class="form-control" autofocus name="Nombre" required type="text" value="{{$empleadoModificar->Nombre}}">
	                            </div>
	                            <div class="form-group">
	                                <label>Apellido</label>
	                                <input class="form-control" autofocus name="Apellido" required type="text" value="{{$empleadoModificar->Apellido}}">
	                            </div>	
	                            <div class="form-group">
	                                <label>Dirección</label>
	                        		<textarea name="Direccion" id="" cols="5" rows="2" class="form-control" required>{{$empleadoModificar->Direccion}}"</textarea>
	                            </div>	 
	                            <div class="form-group">
	                                <label>Teléfono</label>
	                                <input class="form-control" autofocus name="Telefono" required type="tel" value="{{$empleadoModificar->Telefono}}">
	                            </div>
	                            <div class="form-group">
	                                <label>Jefe</label>
                            	    <select name="Jefe" class="form-control selectpicker" required title="Choose one of the following...">
                            	    	@foreach($empleados as $empleado)
    	                        	        <option value="{{$empleado->Cedula}}">{{$empleado->Nombre}} {{$empleado->Apellido}}</option>
                            	    	@endforeach                        	        
                            	    </select>
	                            </div>	
	                            <div class="form-group">
	                                <label>Cargo</label>
                            	    <select name="Cargo_Cod_Cargo" class="form-control selectpicker" required title="Choose one of the following...">
                            	    	@foreach($cargos as $cargo)
    	                        	        <option value="{{$cargo->Cod_Cargo}}">{{$cargo->Descripcion}}</option>
                            	    	@endforeach                        	        
                            	    </select>
	                            </div>
	                            <div class="form-group">
	                                <label>Roles</label>
	                                @foreach($roles as $rol)
	                            	    <label class="checkbox-inline">
	                            	        <input type="checkbox" name="{{$rol->Codigo}}">{{$rol->Descripcion}}
	                            	    </label>
                            	    @endforeach
	                            </div>		
	                            <div class="form-group">
	                                <label>Usuario</label>
	                                <input class="form-control" autofocus name="email" required type="text" value="{{$empleadoModificar->email}}">
	                            </div>  
	                            <div class="form-group">
	                                <label>Contraseña</label>
	                                <input class="form-control" autofocus name="password" required type="password">
	                            </div>                        
	                            <button type="submit" class="btn btn-success">Aceptar</button>
	                        </form>
	                    </div>
	                </div>
	                <!-- /.row (nested) -->
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

@endsection