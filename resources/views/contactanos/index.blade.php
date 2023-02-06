@extends('layouts.plantilla')

@section('title','Nosotros')

@section('content')
<h1>Dejanos un mensaje</h1>
<br>
<form action="{{route('contactanos.store')}}" method="post">
    @csrf
    <label for="">
        Nombre: <br>
        <input type="text" name="name">
    </label>
    @error('name')
        <p><strong>{{$message}}</strong></p>
    @enderror
    <br>
    <label for="">
        correo: <br>
        <input type="text" name="email">
    </label>
    @error('email')
        <p><strong>{{$message}}</strong></p>
    @enderror
    <br>
    <label for="">
        Mensaje: <br>
        <textarea name="mensaje" rows="4"></textarea>
    </label>
    @error('mensaje')
        <p><strong>{{$message}}</strong></p>
    @enderror
    <br>
    <br>
    <button type="submit">Enviar mensaje</button>
</form>
@if (session('info'))
    <script>
        alert("{{session('info')}}");
    </script>
@endif


@endsection