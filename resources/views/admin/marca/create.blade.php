@extends('admin.layout')

@section('body')
	<div class="row">
	    <div class="col-lg-12">
	        <h5 class="page-header">Crear nuevo registro de Marcas</h5>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                Inserte los datos de la nueva Marca
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <form role="form" action="{{route('admin.marca..store')}}" method="POST">
	                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                            <div class="form-group">
	                                <label>Descripción de la Marca</label>
	                                <input class="form-control" autofocus name="descripcion" required>
	                                <p class="help-block">Marca</p>
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