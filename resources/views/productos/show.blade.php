@extends('layouts.app')

@section('title', $producto->nombre)

@section('breadcrumbs')
    <li>
        <a href="{{ route('productos.index') }}" class="hover:text-blue-600 transition">Productos</a>
    </li>
    <li class="text-slate-300">/</li>
    <li class="text-slate-700 font-medium truncate max-w-[200px]">{{ $producto->nombre }}</li>
@endsection

@section('content')

<div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-8">

    <div>

        <h2 class="text-2xl font-semibold text-slate-900 tracking-tight">
            {{ $producto->nombre }}
        </h2>

        <p class="text-sm text-slate-500 mt-1 font-mono">
            {{ $producto->sku }}
        </p>

    </div>

    @if($producto->disponible)
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200 self-start">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            Disponible
        </span>
    @else
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 ring-1 ring-inset ring-slate-200 self-start">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
            No disponible
        </span>
    @endif

</div>

<dl class="grid grid-cols-1 sm:grid-cols-2 gap-px bg-slate-200 border border-slate-200 rounded-xl overflow-hidden">

    <div class="bg-white px-5 py-4">
        <dt class="text-xs font-medium text-slate-500 uppercase tracking-wider">Categoría</dt>
        <dd class="mt-1 text-sm text-slate-900 font-medium">{{ $producto->categoria->nombre }}</dd>
    </div>

    <div class="bg-white px-5 py-4">
        <dt class="text-xs font-medium text-slate-500 uppercase tracking-wider">SKU</dt>
        <dd class="mt-1 text-sm text-slate-900 font-mono">{{ $producto->sku }}</dd>
    </div>

    <div class="bg-white px-5 py-4">
        <dt class="text-xs font-medium text-slate-500 uppercase tracking-wider">Precio</dt>
        <dd class="mt-1 text-lg text-slate-900 font-semibold tabular-nums">Bs {{ number_format($producto->precio, 2) }}</dd>
    </div>

    <div class="bg-white px-5 py-4">

        <dt class="text-xs font-medium text-slate-500 uppercase tracking-wider">Stock</dt>

        <dd class="mt-1 text-sm">

            @if($producto->stock <= 0)
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-inset ring-red-200">
                    Sin stock
                </span>
            @elseif($producto->stock <= 5)
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-200">
                    Bajo · {{ $producto->stock }} unidades
                </span>
            @else
                <span class="text-slate-900 font-medium tabular-nums">{{ $producto->stock }} unidades</span>
            @endif

        </dd>

    </div>

</dl>

<div class="mt-8 flex flex-wrap items-center gap-2">

    <a href="{{ route('productos.edit', $producto) }}"
       class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg shadow-sm transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
        </svg>

        Editar
    </a>

    <a href="{{ route('productos.index') }}"
       class="inline-flex items-center justify-center text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-lg transition">
        Volver
    </a>

</div>

@endsection
