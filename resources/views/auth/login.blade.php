@extends('layouts.app')

@section('title', 'Iniciar Sesión · Diario Editorial Peru Pima')
@section('meta_description', 'Accede a tu cuenta en el Diario Editorial de Peru Pima para disfrutar de contenido exclusivo sobre descanso y textiles de lujo.')

@section('content')
    <section class="min-h-[calc(100vh-12rem)] py-12 lg:py-16 flex items-center justify-center relative overflow-hidden bg-gradient-to-b from-pima-100/40 via-pima-50 to-pima-50">
        {{-- Subtle ambient blur glow --}}
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-pima-200/40 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-pima-300/25 blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Return to Home Link --}}
            <div class="mb-8 text-center sm:text-left">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold tracking-wider uppercase text-pima-600 hover:text-pima-900 transition-colors group">
                    <x-icon name="arrow-left" class="w-3.5 h-3.5 group-hover:-translate-x-1 transition-transform" />
                    <span>Volver a la portada</span>
                </a>
            </div>

            {{-- Main Dual-Panel Editorial Card --}}
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border border-pima-200/80 grid grid-cols-1 lg:grid-cols-12 min-h-[620px]">
                
                {{-- Left Side: Brand Imagery & Philosophy (5 Cols) --}}
                <div class="lg:col-span-5 relative bg-pima-900 text-white p-8 sm:p-12 flex flex-col justify-between overflow-hidden">
                    {{-- Background Photo with Vignette --}}
                    <div class="absolute inset-0 z-0">
                        <img 
                            src="{{ asset('images/blog/bedroom-sanctuary.jpg') }}" 
                            alt="Peru Pima Santuario" 
                            class="w-full h-full object-cover opacity-40 mix-blend-luminosity scale-105 transition-transform duration-1000"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-pima-900 via-pima-900/60 to-pima-900/40"></div>
                    </div>

                    {{-- Top Brand Header --}}
                    <div class="relative z-10">
                        <x-brand-logo variant="light" class="h-8 md:h-9 w-auto mb-6" />
                        
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-dark text-[10px] font-semibold tracking-[0.2em] uppercase text-pima-200 mb-4">
                            <span class="w-1.5 h-1.5 rounded-full bg-pima-gold animate-pulse"></span>
                            <span>Comunidad Privada</span>
                        </div>
                    </div>

                    {{-- Middle Quote --}}
                    <div class="relative z-10 my-8">
                        <blockquote class="font-serif text-xl sm:text-2xl font-light italic leading-relaxed text-pima-100 mb-6">
                            “El descanso pleno es el mayor lujo cotidiano. Accede a tu espacio personal para inspirarte con nuevas publicaciones.”
                        </blockquote>

                        <div class="space-y-3 pt-4 border-t border-white/15 text-xs text-pima-300 font-sans">
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white/10 flex items-center justify-center text-pima-gold">
                                    <x-icon name="check" class="w-3 h-3" />
                                </span>
                                <span>Lecturas y guías sobre 100% algodón Pima</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white/10 flex items-center justify-center text-pima-gold">
                                    <x-icon name="check" class="w-3 h-3" />
                                </span>
                                <span>Reflexiones sobre diseño, descanso y hogar</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white/10 flex items-center justify-center text-pima-gold">
                                    <x-icon name="check" class="w-3 h-3" />
                                </span>
                                <span>Acceso anticipado a colecciones textiles</span>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Footer Tagline --}}
                    <div class="relative z-10 pt-4 border-t border-white/10 text-[10px] tracking-[0.2em] uppercase text-pima-400 font-sans">
                        Peru Pima · Desde 1986
                    </div>
                </div>

                {{-- Right Side: The Login Form (7 Cols) --}}
                <div class="lg:col-span-7 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-gradient-to-br from-white via-white to-pima-50">
                    
                    {{-- Form Header --}}
                    <div class="mb-8">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-pill text-[10px] font-semibold tracking-[0.2em] uppercase text-pima-800 shadow-2xs mb-3">
                            <x-icon name="user" class="w-3 h-3 text-pima-gold" />
                            <span>Acceso a tu Cuenta</span>
                        </div>
                        
                        <h1 class="font-serif text-3xl sm:text-4xl text-pima-900 font-normal tracking-tight mb-2">
                            Bienvenido al Diario
                        </h1>
                        
                        <p class="text-sm text-pima-600 font-light font-sans">
                            Ingresa tus credenciales para acceder a tu cuenta editorial.
                        </p>
                    </div>

                    {{-- General Validation Alert --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-2xl bg-red-50/80 border border-red-200 text-red-800 text-xs flex items-start gap-3 shadow-xs">
                            <div class="w-5 h-5 rounded-full bg-red-100 flex items-center justify-center text-red-600 flex-shrink-0 mt-0.5">
                                <x-icon name="x" class="w-3 h-3" />
                            </div>
                            <div>
                                <span class="font-semibold block mb-0.5">Por favor corrige los siguientes errores:</span>
                                <ul class="list-disc pl-4 space-y-0.5 text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email Address --}}
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-pima-700 mb-2">
                                Correo Electrónico
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-pima-400">
                                    <x-icon name="mail" class="w-4 h-4" />
                                </div>
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    placeholder="tu.correo@ejemplo.com"
                                    class="w-full pl-11 pr-4 py-3.5 text-sm rounded-2xl bg-pima-50/60 border @error('email') border-red-400 focus:ring-red-400 @else border-pima-200 focus:border-pima-900 focus:ring-pima-900 @enderror focus:bg-white focus:outline-none focus:ring-1 transition-all duration-300 text-pima-900 placeholder-pima-400 shadow-2xs"
                                />
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-pima-700">
                                    Contraseña
                                </label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-pima-400">
                                    <x-icon name="lock" class="w-4 h-4" />
                                </div>
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    placeholder="••••••••"
                                    class="w-full pl-11 pr-11 py-3.5 text-sm rounded-2xl bg-pima-50/60 border @error('password') border-red-400 focus:ring-red-400 @else border-pima-200 focus:border-pima-900 focus:ring-pima-900 @enderror focus:bg-white focus:outline-none focus:ring-1 transition-all duration-300 text-pima-900 placeholder-pima-400 shadow-2xs"
                                />
                                <button 
                                    type="button" 
                                    onclick="const p = document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-pima-400 hover:text-pima-700 transition-colors focus:outline-none"
                                    title="Mostrar u ocultar contraseña"
                                >
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember Me Checkbox --}}
                        <div class="flex items-center justify-between pt-1">
                            <label class="inline-flex items-center gap-2 cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember"
                                    class="w-4 h-4 rounded border-pima-300 text-pima-900 focus:ring-pima-900 cursor-pointer accent-pima-900"
                                    {{ old('remember') ? 'checked' : '' }}
                                />
                                <span class="text-xs text-pima-600 font-sans">Recordar mi sesión</span>
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                class="w-full py-4 rounded-full bg-pima-900 text-white hover:bg-pima-800 text-xs font-semibold tracking-[0.2em] uppercase transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2 group cursor-pointer"
                            >
                                <span>Iniciar Sesión</span>
                                <x-icon name="arrow-right" class="w-3.5 h-3.5 text-pima-300 group-hover:translate-x-1 transition-transform" />
                            </button>
                        </div>
                    </form>

                    {{-- Switcher to Register --}}
                    <div class="mt-8 pt-6 border-t border-pima-200/80 text-center">
                        <p class="text-xs text-pima-600 font-light font-sans">
                            ¿Aún no eres miembro del Diario?
                            <a href="{{ route('register') }}" class="font-semibold text-pima-900 hover:underline ml-1">
                                Crear una cuenta →
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
