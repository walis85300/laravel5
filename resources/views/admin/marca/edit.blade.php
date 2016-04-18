@extends('admin.layout')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">Modificar registro de Marcas</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Inserte los datos de la Marca
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="/admin/marca/{{$id}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">                                
                                <div class="form-group">
                                    <label>Descripción de la Marca</label>
                                    <input class="form-control" name="descripcion" autofocus placeholder="{{$marcas->find($id)->Descripcion}}" required>
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