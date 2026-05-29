@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-semibold">
        Lista de Productos
    </h2>

    <a href="{{ route('productos.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

        Crear Producto
    </a>

</div>

<div class="overflow-x-auto">

    <table class="w-full border border-gray-200">

        <thead class="bg-gray-200">

            <tr>
                <th class="p-3 text-left">Nombre</th>
                <th class="p-3 text-left">SKU</th>
                <th class="p-3 text-left">Categoría</th>
                <th class="p-3 text-left">Precio</th>
                <th class="p-3 text-left">Stock</th>
                <th class="p-3 text-left">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @foreach($productos as $producto)

            <tr class="border-t">

                <td class="p-3">
                    {{ $producto->nombre }}
                </td>

                <td class="p-3">
                    {{ $producto->sku }}
                </td>

                <td class="p-3">
                    {{ $producto->categoria->nombre }}
                </td>

                <td class="p-3">
                    Bs {{ $producto->precio }}
                </td>

                <td class="p-3">
                    {{ $producto->stock }}
                </td>

                <td class="p-3 flex gap-2">

                    <a href="{{ route('productos.show', $producto) }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">

                        Ver
                    </a>

                    <a href="{{ route('productos.edit', $producto) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">

                        Editar
                    </a>

                    <form action="{{ route('productos.destroy', $producto) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('¿Eliminar producto?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">

                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection