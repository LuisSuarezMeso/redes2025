@extends('layouts.app')

@section('title', 'Listado de items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Nuevo Item</a>
</div>

@if($items->count())
<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th width="160">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ \Illuminate\Support\Str::limit($item->description, 80) }}</td>
            <td>
                <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar item?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $items->links() }}
@else
<div class="card p-4">
    No hay items aún. <a href="{{ route('items.create') }}">Crear uno</a>.
</div>
@endif
@endsection
