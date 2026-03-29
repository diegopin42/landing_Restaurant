@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Cinematic Image/Video -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/90 z-10"></div>
        <img src="https://images.unsplash.com/photo-1544148103-0773bf10d330?auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover grayscale blur-sm opacity-20" 
             alt="Restaurant bar background">
    </div>

    <!-- Content -->
    <div class="relative z-20 container mx-auto px-6 py-32 flex justify-center text-center">
        <div class="max-w-2xl px-12 py-20 glass rounded-[4rem] border border-white/5"
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 100)"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000 scale-95 opacity-0"
             x-transition:enter-start="scale-95 opacity-0"
             x-transition:enter-end="scale-100 opacity-100">
            
            <!-- Dynamic Icon Success -->
            <div class="mb-12 relative inline-block">
                <div class="absolute inset-0 bg-orange-500 blur-3xl opacity-20 animate-pulse rounded-full"></div>
                <div class="w-24 h-24 bg-orange-600 rounded-full flex items-center justify-center mx-auto relative z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <h1 class="text-5xl lg:text-6xl font-black tracking-tighter mb-8 italic">¡Todo listo!</h1>
            <p class="text-xl text-slate-300 leading-relaxed mb-12 font-light">
                Tu mesa en <span class="text-orange-500 font-bold uppercase tracking-widest">Gourmet Paradise</span> ha sido reservada con éxito. 
                Hemos enviado un correo de confirmación con los detalles y tu invitación al cóctel de bienvenida.
            </p>

            <div class="bg-white/5 border border-white/10 rounded-3xl p-8 mb-12 text-left">
                <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-orange-500 mb-4">Tu Reservación</h4>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase font-bold tracking-widest mb-1">Día</p>
                        <p class="text-white font-bold">Próximamente</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase font-bold tracking-widest mb-1">Mesa para</p>
                        <p class="text-white font-bold">Excelente compañía</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('landing') }}" class="group inline-flex items-center space-x-4">
                <span class="text-white font-bold border-b-2 border-orange-600 pb-1 uppercase tracking-widest text-xs group-hover:border-white transition-colors">Volver al inicio</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:-translate-x-1 transition-transform text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
