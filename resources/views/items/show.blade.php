@extends('layouts.app')

@section('title', 'Ver item')

@section('content')
<h1>{{ $item->name }}</h1>
<p>{{ $item->description }}</p>

<a href="{{ route('items.edit', $item) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('items.index') }}" class="btn btn-secondary">Volver</a>
@endsection
