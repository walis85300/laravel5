@extends('admin.layout')

@section('body')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Crear nuevo registro de Modelos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Inserte los datos del nuevo Modelo
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="{{route('admin.modelo.store')}}" method="POST">
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Nombre del modelo</label>
                                <input class="form-control" autofocus name="descripcion" required>
                                <p class="help-block">Modelo</p>
                            </div>	          
                        	<div class="form-group">
                        	    <label>Seleccione la marca del vehículo</label>
                        	    <select name="marca" class="form-control selectpicker" required title="Choose one of the following...">
                        	    	@foreach($marcas as $marca)
	                        	        <option value="{{$marca->Cod_Marca}}">{{$marca->Descripcion}}</option>
                        	    	@endforeach                        	        
                        	    </select>
                        	</div>
                        	<div class="form-group">
                        		<label for="">Seleccione el año del modelo</label>
                        		<select name="ano" id="ano" class="form-control selectpicker" required title="Choose one of the following...">
                        			
                        		</select>
                        	</div>
                        	<div class="form-group">
                        		<label for="">Características del modelo</label>
                        		<textarea name="caracteristica" id="" cols="5" rows="10" class="form-control" required></textarea>
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

@section('scripts')
	<script>
		$(function(){
			var myDate = new Date();
			var year = myDate.getFullYear();
			for(var i = 1960; i < year+1; i++){
				$('#ano').append('<option value="'+i+'">'+i+'</option>');
			}
		})
	</script>
@endsection