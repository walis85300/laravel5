<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Multiservicios Orlando - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('dist/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('bower_components/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    @yield('extras')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.index')}}">Multiservicios Orlando</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>Bienvenido {{$usuario->Nombre.' '.$usuario->Apellido}}</li>                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                        
                        <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">               
                        <li>
                            <a href="{{route('admin.index')}}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <h5 class="text-center">Módulos</h5>
                        </li>
                            @foreach($roles_empleado as $rol)

                                @foreach($rol->rol->roles_modulo as $roles_modulo)
                                    {{--*/ $codigo_modulo = $roles_modulo->Modulos_codigo /*--}}

                                    @if($codigo_modulo == 1)
                                        <li>
                                             <a href="index.html"><i class="fa fa-car fa-fw"></i> Vehículos</a>
                                         </li>
                                     @elseif($codigo_modulo == 2)
                                        <li>
                                             <a href="index.html"><i class="fa fa-group fa-fw"></i> Empleados</a>
                                         </li>          
                                    @elseif($codigo_modulo == 3)
                                        <li>
                                             <a href="index.html"><i class="fa fa-suitcase fa-fw"></i> Cargo</a>
                                         </li>
                                     @elseif($codigo_modulo == 4)
                                        <li>
                                             <a href="index.html"><i class="fa fa-wrench fa-fw"></i> Estado</a>
                                         </li>
                                     @elseif($codigo_modulo == 5)
                                        <li>
                                             <a href="index.html"><i class="fa fa-cogs fa-fw"></i> Avería</a>
                                         </li>
                                     @elseif($codigo_modulo == 6)
                                        <li>
                                             <a href="index.html"><i class="fa fa-road fa-fw"></i> Modelo</a>
                                         </li>
                                     @elseif($codigo_modulo == 7)
                                        <li>
                                             <a href="{{route('admin.marca..index')}}"><i class="fa fa-globe fa-fw"></i> Marca</a>
                                         </li>
                                     @elseif($codigo_modulo == 8)
                                        <li>
                                             <a href="{{route('color.index')}}"><i class="fa fa-tint fa-fw"></i> Color</a>
                                         </li>
                                    @endif          

                                @endforeach
                            @endforeach

                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       

        <div id="page-wrapper">
            @yield('body')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('bower_components/raphael/raphael-min.js')}}"></script>


    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dist/js/sb-admin-2.js')}}"></script>

    @yield('scripts')

</body>

</html>
