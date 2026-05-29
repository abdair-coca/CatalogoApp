@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-semibold mb-6">
    Detalle del Producto
</h2>

<div class="space-y-4">

    <div>
        <span class="font-bold">Nombre:</span>
        {{ $producto->nombre }}
    </div>

    <div>
        <span class="font-bold">SKU:</span>
        {{ $producto->sku }}
    </div>

    <div>
        <span class="font-bold">Categoría:</span>
        {{ $producto->categoria->nombre }}
    </div>

    <div>
        <span class="font-bold">Precio:</span>
        Bs {{ $producto->precio }}
    </div>

    <div>
        <span class="font-bold">Stock:</span>
        {{ $producto->stock }}
    </div>

    <div>
        <span class="font-bold">Disponible:</span>

        @if($producto->disponible)
            <span class="text-green-600 font-semibold">
                Sí
            </span>
        @else
            <span class="text-red-600 font-semibold">
                No
            </span>
        @endif
    </div>

</div>

<div class="mt-6 flex gap-3">

    <a href="{{ route('productos.edit', $producto) }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">

        Editar
    </a>

    <a href="{{ route('productos.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

        Volver
    </a>

</div>

@endsection