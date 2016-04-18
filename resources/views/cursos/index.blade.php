@extends('layouts.main')

@section('principal')

	<h1>Hola</h1>
	
	<ul>
		@foreach( $cursos as $curso )
			<li>
				<h5>{{$curso->nombre}}</h5>
				<span>{{$curso->descripcion}}</span>
				<ul>
					<li>
						<a href="/cursos/{{$curso->id}}">Ver más</a>	
					</li>
					<li>
						<form action="cursos/{{$curso->id}}" method="DELETE">
							<button type="submit">Eliminar</button>
						</form>	
					</li>
				</ul>
			</li>
		@endforeach
	</ul>

	<a href="{{route('contacto')}}">Ir a la página de contacto</a>

@endsection

@section('footer')

	<a href="https://google.com">Ir a Google</a>

@endsection
