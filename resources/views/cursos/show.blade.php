@extends('layouts.plantilla')

@section('title','Curso '. $curso->name)

@section('content')
<h1>Bienvenido al curso: {{$curso->id}}</h1>
<a href="{{route('cursos.index')}}">Volver a cursos</a>
<br>
<a href="{{route('cursos.edit',$curso)}}">Editar curso</a>
<hr>
<p><strong>Nombre: </strong>{{$curso->name}}</p>
<p><strong>Categoria: </strong>{{$curso->categoria}}</p>
<p><strong>Descripción: </strong>{{$curso->descripcion}}</p>
@endsection
