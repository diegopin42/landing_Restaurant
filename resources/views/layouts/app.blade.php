<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gourmet Paradise | Reserva tu Mesa</title>

    <!-- Google Fonts: Instrument Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Tailwind 4.0 via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Instrument Sans', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="h-full bg-slate-950 text-slate-100 antialiased overflow-x-hidden">
    <div class="relative min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-50 py-6 px-8 flex justify-between items-center bg-gradient-to-b from-black/50 to-transparent">
            <a href="{{ route('landing') }}" class="text-2xl font-bold tracking-tighter text-white hover:text-orange-400 transition-colors">
                GOURMET<span class="text-orange-500">PARADISE</span>
            </a>
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium uppercase tracking-widest">
                <a href="#" class="hover:text-orange-400 transition-colors">Menú</a>
                <a href="#" class="hover:text-orange-400 transition-colors">Nuestro Chef</a>
                <a href="#" class="hover:text-orange-400 transition-colors">Galería</a>
                <a href="{{ route('landing') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full transition-all transform hover:scale-105">Reservas</a>
            </div>
        </nav>

        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer Footer -->
        <footer class="bg-slate-950 border-t border-slate-900 py-12 px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="text-xl font-bold mb-6 tracking-tighter">GOURMET<span class="text-orange-500">PARADISE</span></h3>
                    <p class="text-slate-400 leading-relaxed">Una experiencia culinaria inigualable donde la tradición se encuentra con la innovación en cada plato.</p>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest mb-6 text-slate-300">Ubicación</h4>
                    <p class="text-slate-400 leading-relaxed">
                        Avenida de las Estrellas 123<br>
                        Calle Gourmet, 28001<br>
                        Madrid, España
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest mb-6 text-slate-300">Horario</h4>
                    <ul class="text-slate-400 space-y-2">
                        <li>Lun - Jue: 13:00 - 23:00</li>
                        <li>Vie - Sáb: 13:00 - 01:00</li>
                        <li>Dom: 13:00 - 22:00</li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-slate-900 text-center text-slate-500 text-sm">
                &copy; {{ date('Y') }} Gourmet Paradise Restaurant. Todos los derechos reservados.
            </div>
        </footer>
    </div>
</body>
</html>
