<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto p-8">

        <div class="bg-white shadow-lg rounded-xl p-6">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Sistema de Productos
            </h1>

            @if(session('success'))

                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">

                    {{ session('success') }}

                </div>

            @endif

            @yield('content')

        </div>

    </div>

</body>
</html>