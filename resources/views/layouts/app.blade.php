<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Productos')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>

    <style>
        body { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800 antialiased">

    <nav class="bg-white border-b border-slate-200">

        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="{{ route('productos.index') }}"
               class="flex items-center gap-2 text-slate-900 font-semibold tracking-tight">

                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-bold">
                    P
                </span>

                Sistema de Productos
            </a>

            <a href="{{ route('productos.index') }}"
               class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">
                Productos
            </a>

        </div>

    </nav>

    <div class="max-w-6xl mx-auto px-6 pt-6">

        <nav class="text-sm text-slate-500 mb-4" aria-label="Breadcrumb">

            <ol class="flex items-center gap-2">

                <li>
                    <a href="{{ route('productos.index') }}"
                       class="hover:text-blue-600 transition">
                        Inicio
                    </a>
                </li>

                @hasSection('breadcrumbs')
                    <li class="text-slate-300">/</li>
                    @yield('breadcrumbs')
                @endif

            </ol>

        </nav>

    </div>

    <main class="max-w-6xl mx-auto px-6 pb-12">

        @if(session('success'))

            <div class="mb-5 flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>

                <span class="text-sm font-medium">{{ session('success') }}</span>

            </div>

        @endif

        <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-8">

            @yield('content')

        </div>

    </main>

</body>
</html>
