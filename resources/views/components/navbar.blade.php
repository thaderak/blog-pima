@props([
    'categories' => collect(),
    'searchQuery' => null,
])

<header 
    id="editorial-navbar" 
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-pima-50/85 backdrop-blur-md border-b border-pima-200/50"
>
    {{-- Top Announcement Bar --}}
    <div class="bg-pima-900 text-pima-100 text-[11px] tracking-[0.18em] uppercase py-2 px-4 text-center font-sans font-medium flex items-center justify-center gap-2">
        <span class="inline-block w-1.5 h-1.5 rounded-full bg-pima-gold animate-pulse"></span>
        <span>Edición Editorial · 100% Algodón Pima Peruano de Fibra Extra Larga</span>
        <span class="hidden md:inline text-pima-400">|</span>
        <a href="https://pe.perupima.com/collections/all-products" target="_blank" rel="noopener noreferrer" class="hidden md:inline underline hover:text-white transition-colors">
            Explorar Tienda Oficial
        </a>
    </div>

    {{-- Main Navbar Container --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- Brand Logo with Dedicated Generous Spacing --}}
            <div class="flex-shrink-0 mr-8 lg:mr-14 xl:mr-20">
                <a href="{{ route('home') }}" class="group flex items-center focus:outline-none focus:ring-2 focus:ring-pima-500 rounded p-1" title="Peru Pima Editorial">
                    <x-brand-logo class="h-8 md:h-9 w-auto" />
                </a>
            </div>

            {{-- Desktop Navigation: Exactly 3 Clean, Generously Spaced Links --}}
            <nav class="hidden lg:flex items-center space-x-10 xl:space-x-14 text-[13px] tracking-[0.18em] uppercase font-medium text-pima-800">
                
                {{-- 1. INICIO --}}
                <a 
                    href="{{ route('home') }}" 
                    class="editorial-nav-link {{ request()->routeIs('home') && !request()->has('category') && !request()->has('search') ? 'text-pima-900 font-semibold is-active' : 'text-pima-700 hover:text-pima-900' }}"
                >
                    Inicio
                </a>

                {{-- 2. ARTÍCULOS (con Dropdown Integrado de Categorías) --}}
                <div class="relative group/articles">
                    <a 
                        href="{{ route('blog.index') }}" 
                        class="editorial-nav-link flex items-center gap-1.5 cursor-pointer {{ (request()->routeIs('blog.index')) || (request()->routeIs('blog.show') && !request()->is('blog/nobleza-del-algodon-pima-peruano-fibra-extra-larga')) ? 'text-pima-900 font-semibold is-active' : 'text-pima-700 hover:text-pima-900' }}"
                    >
                        <span>Artículos</span>
                        <x-icon name="chevron-down" class="w-3 h-3 text-pima-500 group-hover/articles:rotate-180 transition-transform duration-300" />
                    </a>

                    {{-- Dropdown Card: Categorías dentro de Artículos --}}
                    <div class="invisible group-hover/articles:visible opacity-0 group-hover/articles:opacity-100 transition-all duration-300 transform translate-y-2 group-hover/articles:translate-y-0 absolute top-full left-1/2 -translate-x-1/2 pt-2 w-72 z-50 pointer-events-none group-hover/articles:pointer-events-auto">
                        <div class="p-2.5 rounded-2xl glass-subtle shadow-2xl border border-white/80 bg-white/95 backdrop-blur-xl">
                            
                            {{-- Header --}}
                            <div class="px-3 py-2 border-b border-pima-200/50 mb-1 flex items-center justify-between">
                                <span class="text-[10px] tracking-[0.2em] uppercase font-bold text-pima-500 block">Categorías</span>
                                <a href="{{ route('blog.index') }}" class="text-[10px] uppercase font-semibold text-pima-800 hover:text-pima-600 underline">
                                    Ver Todos
                                </a>
                            </div>

                            {{-- Category List --}}
                            <div class="space-y-1 text-xs normal-case font-sans">
                                <a href="{{ route('blog.index', ['category' => 'descanso-y-bienestar']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-pima-100/70 transition-colors {{ request('category') === 'descanso-y-bienestar' ? 'bg-pima-100 font-semibold text-pima-900' : 'text-pima-700' }}">
                                    <span class="w-7 h-7 rounded-lg bg-pima-100 flex items-center justify-center text-pima-700">
                                        <x-icon name="moon" class="w-3.5 h-3.5" />
                                    </span>
                                    <div>
                                        <span class="font-medium text-pima-900 block">Descanso y Bienestar</span>
                                        <span class="text-[10px] text-pima-500 font-light block">Higiene del sueño & confort</span>
                                    </div>
                                </a>

                                <a href="{{ route('blog.index', ['category' => 'textiles-y-fibras']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-pima-100/70 transition-colors {{ request('category') === 'textiles-y-fibras' ? 'bg-pima-100 font-semibold text-pima-900' : 'text-pima-700' }}">
                                    <span class="w-7 h-7 rounded-lg bg-pima-100 flex items-center justify-center text-pima-gold">
                                        <x-icon name="sparkles" class="w-3.5 h-3.5" />
                                    </span>
                                    <div>
                                        <span class="font-medium text-pima-900 block">Textiles y Fibras</span>
                                        <span class="text-[10px] text-pima-500 font-light block">Algodón Pima, satén & percal</span>
                                    </div>
                                </a>

                                <a href="{{ route('blog.index', ['category' => 'decoracion-y-hogar']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-pima-100/70 transition-colors {{ request('category') === 'decoracion-y-hogar' ? 'bg-pima-100 font-semibold text-pima-900' : 'text-pima-700' }}">
                                    <span class="w-7 h-7 rounded-lg bg-pima-100 flex items-center justify-center text-pima-700">
                                        <x-icon name="home" class="w-3.5 h-3.5" />
                                    </span>
                                    <div>
                                        <span class="font-medium text-pima-900 block">Decoración y Hogar</span>
                                        <span class="text-[10px] text-pima-500 font-light block">Paletas neutras & calma</span>
                                    </div>
                                </a>

                                <a href="{{ route('blog.index', ['category' => 'guias-y-cuidados']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-pima-100/70 transition-colors {{ request('category') === 'guias-y-cuidados' ? 'bg-pima-100 font-semibold text-pima-900' : 'text-pima-700' }}">
                                    <span class="w-7 h-7 rounded-lg bg-pima-100 flex items-center justify-center text-pima-terracotta">
                                        <x-icon name="feather" class="w-3.5 h-3.5" />
                                    </span>
                                    <div>
                                        <span class="font-medium text-pima-900 block">Guías y Cuidados</span>
                                        <span class="text-[10px] text-pima-500 font-light block">Manual de lavado & durabilidad</span>
                                    </div>
                                </a>

                                <a href="{{ route('blog.index', ['category' => 'estilo-de-vida']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-pima-100/70 transition-colors {{ request('category') === 'estilo-de-vida' ? 'bg-pima-100 font-semibold text-pima-900' : 'text-pima-700' }}">
                                    <span class="w-7 h-7 rounded-lg bg-pima-100 flex items-center justify-center text-pima-sage">
                                        <x-icon name="sun" class="w-3.5 h-3.5" />
                                    </span>
                                    <div>
                                        <span class="font-medium text-pima-900 block">Estilo de Vida</span>
                                        <span class="text-[10px] text-pima-500 font-light block">Spa en casa & mañanas conscientes</span>
                                    </div>
                                </a>
                            </div>

                            {{-- Footer Link --}}
                            <div class="mt-2 pt-2 border-t border-pima-200/60 text-center">
                                <a href="{{ route('blog.index') }}" class="text-[11px] font-semibold tracking-wider uppercase text-pima-800 hover:text-pima-900 hover:underline inline-flex items-center gap-1.5 py-1">
                                    <span>Ir al archivo completo</span>
                                    <x-icon name="arrow-right" class="w-3 h-3" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3. UNIVERSO PIMA (Artículo Insignia & Filosofía de la Fibra) --}}
                <a 
                    href="{{ route('blog.show', 'nobleza-del-algodon-pima-peruano-fibra-extra-larga') }}" 
                    class="editorial-nav-link {{ request()->is('blog/nobleza-del-algodon-pima-peruano-fibra-extra-larga') ? 'text-pima-900 font-semibold is-active' : 'text-pima-700 hover:text-pima-900' }}"
                >
                    Universo Pima
                </a>
            </nav>

            {{-- Right Actions: Search & External Shop Link --}}
            <div class="flex items-center space-x-3 sm:space-x-4">
                {{-- Search Form --}}
                <div class="relative">
                    <form action="{{ route('blog.index') }}" method="GET" class="relative flex items-center">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $searchQuery ?? request('search') }}"
                            placeholder="Buscar en el blog..." 
                            class="w-36 sm:w-44 md:w-52 lg:w-56 pl-9 pr-8 py-2 text-xs rounded-full bg-white/70 backdrop-blur-sm border border-pima-300/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-pima-400 focus:w-64 transition-all duration-300 placeholder-pima-400 text-pima-800"
                        />
                        <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-pima-500 hover:text-pima-800 transition-colors" aria-label="Buscar">
                            <x-icon name="search" class="w-3.5 h-3.5" />
                        </button>
                        @if (request('search'))
                            <a href="{{ route('blog.index') }}" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-pima-400 hover:text-pima-700" title="Limpiar búsqueda">
                                <x-icon name="x" class="w-3 h-3" />
                            </a>
                        @endif
                    </form>
                </div>

                {{-- User Account / Auth --}}
                @guest
                    <a 
                        href="{{ route('login') }}" 
                        class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 rounded-full text-xs font-medium tracking-wider uppercase text-pima-800 hover:text-pima-950 hover:bg-pima-200/50 transition-colors"
                        title="Iniciar Sesión / Registro"
                    >
                        <x-icon name="user" class="w-3.5 h-3.5 text-pima-600" />
                        <span class="hidden md:inline">Acceder</span>
                    </a>
                @else
                    <div class="relative group/user hidden sm:block">
                        <button 
                            type="button" 
                            class="inline-flex items-center gap-2 pl-1.5 pr-2.5 py-1 rounded-full text-xs font-medium bg-pima-100/90 hover:bg-pima-200/80 border border-pima-200/80 text-pima-900 transition-colors focus:outline-none cursor-pointer"
                            aria-expanded="false"
                            aria-haspopup="true"
                        >
                            <span class="w-6 h-6 rounded-full bg-pima-900 text-pima-50 flex items-center justify-center text-[10px] font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <span class="max-w-[80px] lg:max-w-[110px] truncate text-[12px] font-medium">{{ Auth::user()->name }}</span>
                            <x-icon name="chevron-down" class="w-3 h-3 text-pima-500 group-hover/user:rotate-180 transition-transform duration-300" />
                        </button>

                        {{-- Dropdown Menu --}}
                        <div class="invisible group-hover/user:visible opacity-0 group-hover/user:opacity-100 transition-all duration-300 transform translate-y-2 group-hover/user:translate-y-0 absolute top-full right-0 pt-2 w-56 z-50 pointer-events-none group-hover/user:pointer-events-auto">
                            <div class="p-2.5 rounded-2xl glass-subtle shadow-2xl border border-white/80 bg-white/95 backdrop-blur-xl">
                                <div class="px-3 py-2 border-b border-pima-200/50 mb-1">
                                    <span class="text-[9px] tracking-[0.2em] uppercase font-bold text-pima-500 block">Mi Cuenta Pima</span>
                                    <span class="text-xs font-semibold text-pima-900 block truncate">{{ Auth::user()->name }}</span>
                                    <span class="text-[11px] text-pima-500 font-light block truncate">{{ Auth::user()->email }}</span>
                                </div>

                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button 
                                        type="submit" 
                                        class="w-full flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-medium text-red-700 hover:bg-red-50 hover:text-red-800 transition-colors cursor-pointer text-left"
                                    >
                                        <x-icon name="log-out" class="w-3.5 h-3.5" />
                                        <span>Cerrar Sesión</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest

                {{-- Direct Store Pill Button --}}
                <a 
                    href="https://pe.perupima.com/collections/all-products" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold tracking-wider uppercase bg-pima-900 text-pima-50 hover:bg-pima-800 transition-colors shadow-xs"
                >
                    <span>Tienda</span>
                    <x-icon name="external-link" class="w-3 h-3 text-pima-300" />
                </a>

                {{-- Mobile Menu Trigger --}}
                <button 
                    id="mobile-menu-btn" 
                    type="button" 
                    class="lg:hidden p-2 rounded-lg text-pima-800 hover:text-pima-900 hover:bg-pima-200/50 focus:outline-none"
                    aria-label="Abrir menú"
                >
                    <x-icon name="menu" class="w-6 h-6" />
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown Drawer --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-pima-200 bg-pima-50/95 backdrop-blur-xl px-4 pt-4 pb-6 space-y-3 transition-all duration-300 shadow-xl">
        <div class="space-y-1 text-sm tracking-wider uppercase font-medium">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('home') && !request()->has('category') && !request()->has('search') ? 'bg-pima-200/60 font-semibold text-pima-900' : 'text-pima-800 hover:bg-pima-100' }}">
                Inicio
            </a>
            <a href="{{ route('blog.index') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('blog.index') && !request()->has('category') ? 'bg-pima-200/60 font-semibold text-pima-900' : 'text-pima-800 hover:bg-pima-100' }}">
                Todos los Artículos
            </a>
            <a href="{{ route('blog.show', 'nobleza-del-algodon-pima-peruano-fibra-extra-larga') }}" class="block px-3 py-2.5 rounded-lg {{ request()->is('blog/nobleza-del-algodon-pima-peruano-fibra-extra-larga') ? 'bg-pima-200/60 font-semibold text-pima-900' : 'text-pima-800 hover:bg-pima-100' }}">
                Universo Pima
            </a>

            <div class="pt-2 pb-1 border-t border-pima-200/60">
                <span class="px-3 text-[10px] tracking-widest text-pima-400 uppercase font-semibold">Categorías</span>
            </div>
            <a href="{{ route('blog.index', ['category' => 'descanso-y-bienestar']) }}" class="block px-3 py-2 rounded-lg text-xs {{ request('category') === 'descanso-y-bienestar' ? 'bg-pima-200 font-semibold text-pima-900' : 'text-pima-700 hover:bg-pima-100' }}">
                Descanso y Bienestar
            </a>
            <a href="{{ route('blog.index', ['category' => 'textiles-y-fibras']) }}" class="block px-3 py-2 rounded-lg text-xs {{ request('category') === 'textiles-y-fibras' ? 'bg-pima-200 font-semibold text-pima-900' : 'text-pima-700 hover:bg-pima-100' }}">
                Textiles y Fibras
            </a>
            <a href="{{ route('blog.index', ['category' => 'decoracion-y-hogar']) }}" class="block px-3 py-2 rounded-lg text-xs {{ request('category') === 'decoracion-y-hogar' ? 'bg-pima-200 font-semibold text-pima-900' : 'text-pima-700 hover:bg-pima-100' }}">
                Decoración y Hogar
            </a>
            <a href="{{ route('blog.index', ['category' => 'guias-y-cuidados']) }}" class="block px-3 py-2 rounded-lg text-xs {{ request('category') === 'guias-y-cuidados' ? 'bg-pima-200 font-semibold text-pima-900' : 'text-pima-700 hover:bg-pima-100' }}">
                Guías y Cuidados
            </a>
            <a href="{{ route('blog.index', ['category' => 'estilo-de-vida']) }}" class="block px-3 py-2 rounded-lg text-xs {{ request('category') === 'estilo-de-vida' ? 'bg-pima-200 font-semibold text-pima-900' : 'text-pima-700 hover:bg-pima-100' }}">
                Estilo de Vida
            </a>

            <div class="pt-3 pb-1 border-t border-pima-200/60">
                <span class="px-3 text-[10px] tracking-widest text-pima-400 uppercase font-semibold">Mi Cuenta</span>
            </div>
            @guest
                <div class="grid grid-cols-2 gap-2 px-3 pt-1">
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider bg-white/80 border border-pima-200 text-pima-900 hover:bg-white transition-colors">
                        <x-icon name="user" class="w-3.5 h-3.5 text-pima-600" />
                        <span>Acceder</span>
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider bg-pima-900 text-white hover:bg-pima-800 transition-colors">
                        <span>Registro</span>
                    </a>
                </div>
            @else
                <div class="mx-3 p-3 bg-white/80 rounded-xl border border-pima-200/70 flex items-center justify-between">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <span class="w-8 h-8 rounded-full bg-pima-900 text-pima-50 flex items-center justify-center text-xs font-bold shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <div class="truncate">
                            <span class="block text-xs font-semibold text-pima-900 truncate">{{ Auth::user()->name }}</span>
                            <span class="block text-[11px] text-pima-500 truncate">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50 transition-colors cursor-pointer" title="Cerrar Sesión">
                            <x-icon name="log-out" class="w-4 h-4" />
                        </button>
                    </form>
                </div>
            @endguest
        </div>

        <div class="pt-4 border-t border-pima-200">
            <a 
                href="https://pe.perupima.com/collections/all-products" 
                target="_blank" 
                rel="noopener noreferrer" 
                class="flex items-center justify-center gap-2 w-full py-3 rounded-full text-xs font-semibold tracking-wider uppercase bg-pima-900 text-white"
            >
                <span>Visitar Tienda Peru Pima</span>
                <x-icon name="external-link" class="w-3.5 h-3.5" />
            </a>
        </div>
    </div>
</header>

{{-- Spacer to offset the fixed header --}}
<div class="h-28 md:h-30"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('editorial-navbar');
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        // Scroll glass adaptation
        window.addEventListener('scroll', function () {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-xs', 'bg-pima-50/95');
                navbar.classList.remove('bg-pima-50/85');
            } else {
                navbar.classList.remove('shadow-xs', 'bg-pima-50/95');
                navbar.classList.add('bg-pima-50/85');
            }
        });

        // Toggle mobile drawer
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
