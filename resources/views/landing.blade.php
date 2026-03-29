@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Cinematic Image/Video -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/60 z-10"></div>
        <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover" 
             alt="Restaurant background">
    </div>

    <!-- Content -->
    <div class="relative z-20 container mx-auto px-6 text-center lg:text-left flex flex-col lg:flex-row items-center gap-16 pt-24 pb-12">
        <div class="lg:w-1/2" 
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 100)"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0">
            <h4 class="text-orange-500 font-bold uppercase tracking-[0.3em] mb-4 text-sm">Bienvenidos a Gourmet Paradise</h4>
            <h1 class="text-5xl lg:text-7xl font-bold tracking-tighter leading-tight mb-8">
                Donde cada plato cuenta una <span class="italic text-slate-400">historia.</span>
            </h1>
            <p class="text-xl text-slate-300 max-w-xl mx-auto lg:mx-0 mb-10 leading-relaxed font-light">
                Reserva ahora y déjate llevar por una experiencia culinaria premium diseñada para los paladares más exigentes.
            </p>
            <div class="flex items-center space-x-6 justify-center lg:justify-start">
                <a href="#booking" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-10 rounded-full transition-all transform hover:scale-105 shadow-2xl shadow-orange-900/40">
                    Reserva tu Mesa
                </a>
                <a href="#" class="group text-white font-bold flex items-center space-x-2">
                    <span class="border-b border-white group-hover:border-orange-500 transition-colors tracking-widest uppercase text-xs">Ver Menú</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Form Panel (Glassmorphism) -->
        <div id="booking" class="lg:w-1/2 w-full max-w-md mx-auto"
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 300)"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000 delay-300"
             x-transition:enter-start="opacity-0 translate-x-8"
             x-transition:enter-end="opacity-100 translate-x-0">
            
            <div class="glass p-10 rounded-[2.5rem] shadow-2xl relative">
                <!-- Progress Line -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex-1 h-1 bg-orange-600 rounded-full mr-4"></div>
                    <div class="flex-1 h-1 bg-slate-800 rounded-full"></div>
                    <span class="ml-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Paso 1 de 2</span>
                </div>

                <div class="text-left mb-8">
                    <h2 class="text-3xl font-bold tracking-tighter mb-2 italic">Comencemos</h2>
                    <p class="text-slate-400 text-sm">Reserva tu mesa en menos de 60 segundos.</p>
                </div>

                <form action="{{ route('reservation.step.one') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-2 ml-4">Nombre Completo</label>
                        <input type="text" 
                               name="nombre" 
                               required
                               placeholder="Tu nombre aqui..."
                               class="w-full bg-black/40 border border-white/10 rounded-full py-4 px-6 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all placeholder:text-slate-600">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-2 ml-4">Correo Electrónico</label>
                        <input type="email" 
                               name="email" 
                               required
                               placeholder="tu@email.com"
                               class="w-full bg-black/40 border border-white/10 rounded-full py-4 px-6 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all placeholder:text-slate-600">
                    </div>

                    <button type="submit" 
                            class="w-full bg-white text-black font-black py-4 rounded-full hover:bg-orange-500 hover:text-white transition-all transform active:scale-95 shadow-lg group flex items-center justify-center space-x-2">
                        <span>SIGUIENTE</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                    
                    <p class="text-center text-[10px] text-slate-600 mt-6 tracking-wide">
                        * Obtén un cóctel de cortesía con tu reservación online.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
