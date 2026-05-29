@extends('layouts.app')

@section('title', 'Crear Producto')

@section('breadcrumbs')
    <li>
        <a href="{{ route('productos.index') }}" class="hover:text-blue-600 transition">Productos</a>
    </li>
    <li class="text-slate-300">/</li>
    <li class="text-slate-700 font-medium">Crear</li>
@endsection

@section('content')

<div class="mb-8">

    <h2 class="text-2xl font-semibold text-slate-900 tracking-tight">
        Crear Producto
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Completá los datos para registrar un nuevo producto en el catálogo.
    </p>

</div>

@if($errors->any())

    <div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>

        <div>

            <p class="text-sm font-semibold mb-1">Revisá los siguientes errores:</p>

            <ul class="list-disc ml-5 text-sm space-y-0.5">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    </div>

@endif

<form action="{{ route('productos.store') }}"
      method="POST"
      class="space-y-6 max-w-2xl">

    @csrf

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

        <div class="sm:col-span-2">

            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Nombre
            </label>

            <input type="text"
                   name="nombre"
                   value="{{ old('nombre') }}"
                   placeholder="Ej. Mouse inalámbrico"
                   class="w-full text-sm border border-slate-200 rounded-lg px-3 py-2.5 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

        </div>

        <div>

            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                SKU
            </label>

            <input type="text"
                   name="sku"
                   value="{{ old('sku') }}"
                   placeholder="SKU-0001"
                   class="w-full text-sm border border-slate-200 rounded-lg px-3 py-2.5 font-mono placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

        </div>

        <div>

            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Categoría
            </label>

            <select name="categoria_id"
                    class="w-full text-sm border border-slate-200 rounded-lg px-3 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

                <option value="">Seleccione</option>

                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach

            </select>

        </div>

        <div>

            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Precio
            </label>

            <div class="relative">

                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">Bs</span>

                <input type="number"
                       step="0.01"
                       name="precio"
                       value="{{ old('precio') }}"
                       placeholder="0.00"
                       class="w-full text-sm border border-slate-200 rounded-lg pl-9 pr-3 py-2.5 tabular-nums placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

            </div>

        </div>

        <div>

            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Stock
            </label>

            <input type="number"
                   name="stock"
                   value="{{ old('stock') }}"
                   placeholder="0"
                   class="w-full text-sm border border-slate-200 rounded-lg px-3 py-2.5 tabular-nums placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

        </div>

    </div>

    <div class="flex items-center gap-2.5 pt-1">

        <input type="checkbox"
               id="disponible"
               name="disponible"
               value="1"
               {{ old('disponible') ? 'checked' : '' }}
               class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500/30">

        <label for="disponible" class="text-sm text-slate-700 select-none">
            Marcar como disponible
        </label>

    </div>

    <div class="flex items-center gap-2 pt-4 border-t border-slate-100">

        <button type="submit"
                class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
            Guardar producto
        </button>

        <a href="{{ route('productos.index') }}"
           class="inline-flex items-center justify-center text-sm font-medium text-slate-600 hover:text-slate-900 px-4 py-2.5 transition">
            Cancelar
        </a>

    </div>

</form>

@endsection
