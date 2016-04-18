@extends('admin.layout')

@section('body')
	<div class="row">
	    <div class="col-lg-10">
	        <h1 class="page-header">Modelo</h1>
	    </div>
	    
	    <!-- /.col-lg-12 -->

	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    Datos del registro
            	    	@foreach($roles_empleado as $rol)	     
        	    			{{--*/ $rol_modulo = $rol->rol->roles_modulo->toArray() /*--}}
        	    			@if($rol_modulo[6]['Crear'] == 1)
    			                <a href="/admin/modelo/{{$id}}/edit" class="btn btn-xs btn-success pull-right">
    			                	<i class="fa fa-plus fa-fw"></i>
    			                	<span>Editar registro del modelo</span>
    			                </a>
    		                @endif
    	                @endforeach
	                </div>
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-lg-12">
	                        	<div class="panel-body">
	                        		<h4>Descripción</h4>
                        			<p>{{$modelo->Descripcion}}</p>
	                        	</div>
	                        	<div class="panel-body">
	                        		<h4>Marca</h4>
                        			<p>{{$modelo->marca->Descripcion}}</p>
	                        	</div>
	                        	<div class="panel-body">
	                        		<h4>Año</h4>
                        			<p>{{$modelo->Ano}}</p>
	                        	</div>
	                        	<div class="panel-body">
	                        		<h4>Características</h4>
                        			<p>{{$modelo->Caracteristicas}}</p>
	                        	</div>
        	                </div>
        	            </div>
        	            <!-- /.row (nested) -->
        	        </div>
        	        <!-- /.panel-body -->
        	    </div>
        	    <!-- /.panel -->
        	</div>
	</div>
@endsection