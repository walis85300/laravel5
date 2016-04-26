@extends('admin.layout')

@section('body')

<div class="row">
    <div class="col-lg-10">
        <h1 class="page-header">Empleados</h1>
    </div>

    <!-- /.col-lg-12 -->
</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                Tabla de empleados
        	    	@foreach($roles_empleado as $rol)	     
    	    			{{--*/ $rol_modulo = $rol->rol->roles_modulo->toArray() /*--}}
    	    			@if($rol_modulo[1]['Crear'] == 1)
			                <a href="{{route('admin.empleado.create')}}" class="btn btn-xs btn-success pull-right">
			                	<i class="fa fa-plus fa-fw"></i>
			                	<span>Agregar nuevo empleado</span>
			                </a>
		                @endif
	                @endforeach
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th>Cédula</th>
	                                <th>Nombre</th>
	                                <th>Apellido</th>
	                                <th>Roles</th>
	                                <th>Cargo</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tbody>
								@foreach($empleados as $empleado)
								<tr>
									<td>{{$empleado->Cedula}}</td>
									<td>{{$empleado->Nombre}}</td>
									<td>{{$empleado->Apellido}}</td>	
									<td>
										@foreach($empleado->roles_empleado as $rol)

											<p>{{$rol->rol->Descripcion}}</p>
	
										@endforeach
									</td>
									<td>{{$empleado->cargo->Descripcion}}</td>
									<td>
	                        	    	@foreach($usuario->roles_empleado as $rol)	     
	                    	    			{{--*/ $rol_modulo = $rol->rol->roles_modulo->toArray() /*--}}
	                            	    	<div class="pull-right">
	                            	    		@if($rol_modulo[1]['Modificar'] == 1)
	                            	    		<a href="/admin/empleado/{{$empleado->Cedula}}/edit" class="btn btn-xs btn-info tooltip-demo">
	                            	    			<i class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="left" title="Modificar el registro"></i>
	                            	    		</a>
	                            	    		@endif		
	                            	    		@if($rol_modulo[1]['Eliminar'] == 1)
	                            	    		<form role="form" action="/admin/empleado/{{$empleado->Cedula}}" method="POST" class="tooltip-demo">
	                            	    		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                            	    		    <input type="hidden" name="_method" value="DELETE">
	                            	    		    <button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Eliminar el registro">
	                            	    		    	<i class="glyphicon glyphicon-trash "></i>
	                            	    		    </button>
	                            	    		</form>
	                            	    		@endif                            	    				                            	    		
	                            	    	</div>
	                            	    @endforeach
									</td>
								</tr>								
								@endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

@endsection

@section('scripts')
	<script src="{{asset('bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
	<script>
	$(document).ready(function() {
	    $('#dataTables-example').DataTable({
	            responsive: true
	    });
	});
	</script>
	<script>
	// tooltip demo
	$('.tooltip-demo').tooltip({
	    selector: "[data-toggle=tooltip]",
	    container: "body"
	})

	// popover demo
	$("[data-toggle=popover]")
	    .popover()
	</script>
@endsection