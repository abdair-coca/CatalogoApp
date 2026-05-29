@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-semibold mb-6">
    Editar Producto
</h2>

@if($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">

        <ul class="list-disc ml-5">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('productos.update', $producto) }}"
      method="POST"
      class="space-y-5">

    @csrf
    @method('PUT')

    <div>

        <label class="block mb-1 font-medium">
            Nombre
        </label>

        <input type="text"
               name="nombre"
               value="{{ old('nombre', $producto->nombre) }}"
               class="w-full border rounded px-3 py-2">

    </div>

    <div>

        <label class="block mb-1 font-medium">
            SKU
        </label>

        <input type="text"
               name="sku"
               value="{{ old('sku', $producto->sku) }}"
               class="w-full border rounded px-3 py-2">

    </div>

    <div>

        <label class="block mb-1 font-medium">
            Precio
        </label>

        <input type="number"
               step="0.01"
               name="precio"
               value="{{ old('precio', $producto->precio) }}"
               class="w-full border rounded px-3 py-2">

    </div>

    <div>

        <label class="block mb-1 font-medium">
            Stock
        </label>

        <input type="number"
               name="stock"
               value="{{ old('stock', $producto->stock) }}"
               class="w-full border rounded px-3 py-2">

    </div>

    <div>

        <label class="block mb-1 font-medium">
            Categoría
        </label>

        <select name="categoria_id"
                class="w-full border rounded px-3 py-2">

            @foreach($categorias as $categoria)

                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>

                    {{ $categoria->nombre }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="flex items-center gap-2">

        <input type="checkbox"
               name="disponible"
               value="1"
               {{ $producto->disponible ? 'checked' : '' }}>

        <label>
            Disponible
        </label>

    </div>

    <button type="submit"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">

        Actualizar
    </button>

</form>

@endsection