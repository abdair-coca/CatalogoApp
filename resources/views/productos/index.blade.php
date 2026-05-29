@extends('layouts.app')

@section('title', 'Productos')

@section('breadcrumbs')
    <li class="text-slate-700 font-medium">Productos</li>
@endsection

@section('content')

<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">

    <div>

        <h2 class="text-2xl font-semibold text-slate-900 tracking-tight">
            Lista de Productos
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Gestioná el catálogo de productos del sistema.
        </p>

    </div>

    <a href="{{ route('productos.create') }}"
       class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg shadow-sm transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>

        Crear Producto
    </a>

</div>

<div class="overflow-x-auto -mx-2">

    <div class="inline-block min-w-full align-middle px-2">

        <div class="overflow-hidden border border-slate-200 rounded-xl">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-50">

                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">SKU</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Categoría</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Precio</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Stock</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Estado</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Acciones</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 bg-white">

                    @forelse($productos as $producto)

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-4 py-3 text-sm font-medium text-slate-900">
                            {{ $producto->nombre }}
                        </td>

                        <td class="px-4 py-3 text-sm text-slate-600 font-mono">
                            {{ $producto->sku }}
                        </td>

                        <td class="px-4 py-3 text-sm text-slate-600">
                            {{ $producto->categoria->nombre }}
                        </td>

                        <td class="px-4 py-3 text-sm text-slate-900 text-right tabular-nums">
                            Bs {{ number_format($producto->precio, 2) }}
                        </td>

                        <td class="px-4 py-3 text-sm">

                            @if($producto->stock <= 0)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-inset ring-red-200">
                                    Sin stock
                                </span>
                            @elseif($producto->stock <= 5)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-200">
                                    Bajo · {{ $producto->stock }}
                                </span>
                            @else
                                <span class="text-slate-700 tabular-nums">{{ $producto->stock }}</span>
                            @endif

                        </td>

                        <td class="px-4 py-3 text-sm">

                            @if($producto->disponible)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Disponible
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 ring-1 ring-inset ring-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    No disponible
                                </span>
                            @endif

                        </td>

                        <td class="px-4 py-3 text-sm">

                            <div class="flex items-center justify-end gap-1">

                                <a href="{{ route('productos.show', $producto) }}"
                                   class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 rounded-md transition">
                                    Ver
                                </a>

                                <a href="{{ route('productos.edit', $producto) }}"
                                   class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 border border-blue-100 rounded-md transition">
                                    Editar
                                </a>

                                <button type="button"
                                        data-delete-url="{{ route('productos.destroy', $producto) }}"
                                        data-delete-name="{{ $producto->nombre }}"
                                        class="js-delete-btn inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 border border-red-100 rounded-md transition">
                                    Eliminar
                                </button>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center">

                            <div class="flex flex-col items-center gap-2 text-slate-500">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>

                                <p class="text-sm font-medium">No hay productos registrados.</p>

                                <a href="{{ route('productos.create') }}"
                                   class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                                    Crear el primero →
                                </a>

                            </div>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div id="deleteModal"
     class="fixed inset-0 z-50 hidden items-center justify-center"
     aria-hidden="true"
     role="dialog">

    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm js-delete-cancel"></div>

    <div class="relative bg-white rounded-2xl shadow-xl max-w-md w-full mx-4 p-6">

        <div class="flex items-start gap-4">

            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex-1">

                <h3 class="text-base font-semibold text-slate-900">
                    Eliminar producto
                </h3>

                <p class="mt-1 text-sm text-slate-600">
                    ¿Seguro que querés eliminar <span id="deleteName" class="font-medium text-slate-900"></span>? Esta acción no se puede deshacer.
                </p>

            </div>

        </div>

        <form id="deleteForm" method="POST" class="mt-6 flex justify-end gap-2">

            @csrf
            @method('DELETE')

            <button type="button"
                    class="js-delete-cancel px-4 py-2 text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg transition">
                Cancelar
            </button>

            <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg shadow-sm transition">
                Eliminar
            </button>

        </form>

    </div>

</div>

<script>
    (function () {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const nameEl = document.getElementById('deleteName');

        function openModal(url, name) {
            form.setAttribute('action', url);
            nameEl.textContent = name;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.querySelectorAll('.js-delete-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                openModal(this.dataset.deleteUrl, this.dataset.deleteName);
            });
        });

        document.querySelectorAll('.js-delete-cancel').forEach(function (el) {
            el.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    })();
</script>

@endsection
