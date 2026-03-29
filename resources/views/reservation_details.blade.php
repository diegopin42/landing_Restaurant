@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Cinematic Image/Video -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/80 z-10"></div>
        <img src="https://images.unsplash.com/photo-1550966841-396ad886756b?auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover grayscale opacity-30" 
             alt="Restaurant background details">
    </div>

    <!-- Content -->
    <div class="relative z-20 container mx-auto px-6 py-32 flex justify-center">
        <div class="w-full max-w-2xl bg-[#0a0a1a] shadow-2xl rounded-[3rem] p-12 border border-white/5"
             x-data="{ 
                personas: 2, 
                servicio: 'Cena',
                show: false 
             }" 
             x-init="setTimeout(() => show = true, 100)"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0">

            <!-- Progress Line -->
            <div class="flex items-center justify-between mb-12">
                <div class="flex-1 h-1 bg-orange-600 rounded-full mr-2"></div>
                <div class="flex-1 h-1 bg-orange-600 rounded-full mr-4"></div>
                <span class="text-[10px] font-bold text-orange-500 uppercase tracking-widest">Paso 2 de 2</span>
            </div>

            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold tracking-tighter mb-4 italic">Casi listos, {{ session('reservation_data.nombre') }}</h2>
                <p class="text-slate-400">Cuéntanos más sobre tu visita a Gourmet Paradise.</p>
            </div>

            <form action="{{ route('reservation.finalizar') }}" method="POST" class="space-y-10">
                @csrf
                
                <!-- Date Picker -->
                <div>
                    <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-4 ml-4">¿Para qué fecha?</label>
                    <input type="date" 
                           name="fecha" 
                           required
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           class="w-full bg-slate-900/50 border border-white/10 rounded-full py-4 px-8 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all text-white appearance-none">
                </div>

                <!-- Number of People (Interactive Icons) -->
                <div>
                    <input type="hidden" name="personas" x-model="personas">
                    <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-6 ml-4">¿Cuántas personas vendrán?</label>
                    <div class="flex flex-wrap justify-between gap-4">
                        <template x-for="n in [1, 2, 4, 6, 8, 10]">
                            <button type="button" 
                                    @click="personas = n"
                                    :class="personas == n ? 'bg-orange-600 border-orange-600 scale-110' : 'bg-slate-900/50 border-white/10 hover:border-orange-500 ring-offset-slate-900'"
                                    class="w-16 h-16 rounded-2xl flex flex-col items-center justify-center border transition-all duration-300 group">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="h-6 w-6 mb-1"
                                     :class="personas == n ? 'text-white' : 'text-slate-500 group-hover:text-orange-400'"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="text-xs font-bold" :class="personas == n ? 'text-white' : 'text-slate-500'" x-text="n"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Service Type -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <input type="hidden" name="servicio" x-model="servicio">
                    <template x-for="s in ['Almuerzo', 'Cena', 'Evento']">
                        <button type="button"
                                @click="servicio = s"
                                :class="servicio == s ? 'bg-white text-black ring-4 ring-white/10' : 'bg-slate-900/50 text-slate-400 border border-white/5'"
                                class="py-4 rounded-3xl font-bold tracking-widest uppercase text-xs transition-all duration-500"
                                x-text="s">
                        </button>
                    </template>
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-4 ml-4">Peticiones Especiales (Opcional)</label>
                    <textarea name="mensaje" 
                              rows="3"
                              placeholder="Cuéntanos si celebras algo especial o si tienes alergias..."
                              class="w-full bg-slate-900/50 border border-white/10 rounded-3xl py-4 px-8 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all text-white placeholder:text-slate-600"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" 
                        class="w-full bg-orange-600 text-white font-black py-5 rounded-full hover:bg-orange-700 transition-all transform active:scale-95 shadow-2xl shadow-orange-900/50 flex items-center justify-center space-x-3 tracking-[0.2em] uppercase text-sm">
                    <span>CONFIRMAR RESERVA</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
