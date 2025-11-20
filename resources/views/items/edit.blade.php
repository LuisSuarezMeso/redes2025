@extends('layouts.app')

@section('title', 'Editar item')

@section('content')
<h1>Editar item</h1>

<form action="{{ route('items.update', $item) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}">
        @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $item->description) }}</textarea>
        @error('description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
    </div>
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
