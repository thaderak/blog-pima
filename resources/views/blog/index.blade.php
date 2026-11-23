@extends('layouts.app')

@section('title', $activeCategory ? $activeCategory->name . ' · Diario Editorial Peru Pima' : ($isHome ? 'Diario Editorial · Peru Pima | Confort, Textiles & Estilo de Vida' : 'Todos los Artículos · Diario Editorial Peru Pima'))
@section('meta_description', $activeCategory ? $activeCategory->description : 'Explora el universo editorial de Peru Pima: confort de alta gama, sábanas de algodón Pima, guías de decoración y secretos para un descanso reparador.')

@section('content')

    {{-- A. HERO SECTION (ONLY ON ROOT "/" HOMEPAGE) --}}
    @if ($isHome)
        <section class="relative overflow-hidden pt-8 pb-16 lg:pt-14 lg:pb-24 border-b border-pima-200/60 bg-gradient-to-b from-pima-100/50 via-pima-50 to-pima-50">
            {{-- Background subtle ambient glow --}}
            <div class="absolute top-1/4 -left-20 w-96 h-96 rounded-full bg-pima-200/40 blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 -right-20 w-96 h-96 rounded-full bg-pima-300/25 blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    
                    {{-- Hero Left: Typography & Story --}}
                    <div class="lg:col-span-7 space-y-6">
                        
                        {{-- Top Badge --}}
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-pill text-xs font-semibold tracking-[0.2em] uppercase text-pima-800 shadow-2xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-pima-gold animate-pulse"></span>
                            <span>Diario Editorial Peru Pima</span>
                        </div>

                        {{-- Main Title --}}
                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-normal text-pima-900 tracking-tight leading-[1.08]">
                            El Arte del Descanso & <span class="italic font-light text-pima-700">la Poesía Textil</span>
                        </h1>

                        {{-- Subtitle --}}
                        <p class="text-base sm:text-lg text-pima-600 font-light leading-relaxed max-w-2xl font-sans">
                            Una mirada pausada al universo del hogar contemporáneo. Ensayos sobre bienestar sensorial, la ciencia botánica del 100% algodón Pima peruano y la arquitectura íntima de tu dormitorio.
                        </p>

                        {{-- Quick Feature Highlights --}}
                        <div class="pt-2 flex flex-wrap gap-3 text-xs text-pima-700 font-medium">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white/70 border border-pima-200 shadow-2xs">
                                <x-icon name="sparkles" class="w-3.5 h-3.5 text-pima-gold" />
                                100% Algodón Pima Peruano
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white/70 border border-pima-200 shadow-2xs">
                                <x-icon name="moon" class="w-3.5 h-3.5 text-pima-700" />
                                250 a 600 Hilos Satén & Percal
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white/70 border border-pima-200 shadow-2xs">
                                <x-icon name="feather" class="w-3.5 h-3.5 text-pima-terracotta" />
                                Confort Hipoalergénico
                            </span>
                        </div>

                        {{-- CTAs --}}
                        <div class="pt-4 flex flex-wrap items-center gap-4">
                            <a 
                                href="{{ route('blog.index') }}" 
                                class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-pima-900 text-pima-50 hover:bg-pima-800 text-xs font-semibold tracking-wider uppercase transition-all duration-300 shadow-md hover:shadow-lg group"
                            >
                                <span>Ver Todos los Artículos</span>
                                <x-icon name="arrow-right" class="w-4 h-4 text-pima-300 group-hover:translate-x-1 transition-transform" />
                            </a>

                            <a 
                                href="https://pe.perupima.com/collections/all-products" 
                                target="_blank" 
                                rel="noopener"
                                class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full glass-pill hover:bg-white text-xs font-semibold tracking-wider uppercase text-pima-800 transition-all duration-300"
                            >
                                <span>Ver Colección Textil</span>
                                <x-icon name="external-link" class="w-3.5 h-3.5 text-pima-500" />
                            </a>
                        </div>
                    </div>

                    {{-- Hero Right: Asymmetric Editorial Composition --}}
                    <div class="lg:col-span-5 relative">
                        <div class="relative mx-auto max-w-md lg:max-w-none">
                            
                            {{-- Main Imagery Frame --}}
                            <div class="relative rounded-3xl overflow-hidden aspect-[4/5] shadow-2xl border-4 border-white/80 bg-pima-100">
                                <img 
                                    src="{{ asset('images/blog/bedroom-sanctuary.jpg') }}" 
                                    alt="Santuario de descanso Peru Pima" 
                                    class="w-full h-full object-cover"
                                    loading="eager"
                                />
                                {{-- Overlay vignette gradient --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-pima-900/50 via-transparent to-transparent"></div>

                                {{-- Overlaid caption --}}
                                <div class="absolute bottom-6 left-6 right-6 text-white">
                                    <span class="text-[10px] tracking-[0.2em] uppercase font-semibold text-pima-200 block mb-1">
                                        Colección Satén 600 Hilos
                                    </span>
                                    <p class="font-serif text-lg font-light leading-snug">
                                        “La suavidad no es un accesorio; es la atmósfera del verdadero descanso.”
                                    </p>
                                </div>
                            </div>

                            {{-- Floating Glass Element: Cotton Certification Badge --}}
                            <div class="absolute -bottom-6 -left-6 sm:-left-8 glass-subtle p-4 rounded-2xl shadow-xl border border-white/80 max-w-[210px] hidden sm:block">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-pima-900 text-pima-gold flex items-center justify-center flex-shrink-0">
                                        <x-icon name="sparkles" class="w-5 h-5" />
                                    </div>
                                    <div>
                                        <span class="text-[11px] font-bold text-pima-900 uppercase tracking-wider block">Extra-Long Staple</span>
                                        <span class="text-[10px] text-pima-600 block">Fibra botánica pura cultivada en Piura</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Floating Decorative Stamp --}}
                            <div class="absolute -top-4 -right-4 w-20 h-20 rounded-full border border-pima-400/50 flex items-center justify-center text-center p-2 select-none pointer-events-none hidden sm:flex bg-pima-50/60 backdrop-blur-xs">
                                <span class="text-[8px] tracking-[0.16em] uppercase text-pima-700 font-serif leading-tight">
                                    Edición Limitada 1986
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- B. ARTÍCULO DESTACADO (ONLY ON ROOT "/" HOMEPAGE) --}}
    @if ($isHome && $featuredPost)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-20">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-semibold tracking-[0.2em] uppercase text-pima-gold block mb-1">
                        Lectura Recomendada
                    </span>
                    <h2 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-normal text-pima-900">
                        Artículo de Portada
                    </h2>
                </div>
                <div class="hidden sm:block h-[1px] flex-1 max-w-xs bg-pima-200 ml-6"></div>
            </div>

            <div class="card-editorial group relative bg-white rounded-3xl overflow-hidden border border-pima-200/70 shadow-lg hover:shadow-2xl transition-all duration-500">
                <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[460px]">
                    
                    {{-- Big Cover Image --}}
                    <div class="lg:col-span-7 relative overflow-hidden bg-pima-100 min-h-[300px] lg:min-h-full">
                        <a href="{{ route('blog.show', $featuredPost->slug) }}" class="block w-full h-full">
                            <img 
                                src="{{ asset($featuredPost->image) }}" 
                                alt="{{ $featuredPost->title }}" 
                                class="img-editorial-zoom w-full h-full object-cover"
                            />
                        </a>
                        
                        {{-- Glassmorphism Category Badge --}}
                        <div class="absolute top-6 left-6 z-10">
                            <a 
                                href="{{ route('blog.index', ['category' => $featuredPost->category->slug]) }}" 
                                class="glass-subtle px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase text-pima-900 shadow-md inline-block hover:scale-105 transition-transform"
                            >
                                {{ $featuredPost->category->name }}
                            </a>
                        </div>
                    </div>

                    {{-- Content Panel --}}
                    <div class="lg:col-span-5 p-8 sm:p-10 lg:p-12 flex flex-col justify-between bg-gradient-to-br from-white via-white to-pima-50">
                        <div>
                            {{-- Meta details --}}
                            <div class="flex items-center gap-3 text-xs text-pima-500 tracking-wide mb-4">
                                <span class="inline-flex items-center gap-1.5 font-medium">
                                    <x-icon name="calendar" class="w-4 h-4 text-pima-400" />
                                    {{ $featuredPost->formatted_date }}
                                </span>
                                <span>·</span>
                                <span class="inline-flex items-center gap-1.5 font-medium">
                                    <x-icon name="clock" class="w-4 h-4 text-pima-400" />
                                    {{ $featuredPost->reading_time_label }}
                                </span>
                            </div>

                            {{-- Title --}}
                            <h3 class="font-serif text-2xl sm:text-3xl xl:text-4xl font-normal text-pima-900 group-hover:text-pima-700 transition-colors leading-[1.18] mb-4">
                                <a href="{{ route('blog.show', $featuredPost->slug) }}">
                                    {{ $featuredPost->title }}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-sm sm:text-base font-light text-pima-600 leading-relaxed font-sans mb-8">
                                {{ $featuredPost->excerpt }}
                            </p>
                        </div>

                        {{-- Footer of Featured card --}}
                        <div class="pt-6 border-t border-pima-200/80 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                @if ($featuredPost->author_avatar)
                                    <div class="w-10 h-10 rounded-full bg-pima-900 text-pima-100 font-serif text-sm font-semibold flex items-center justify-center shadow-xs">
                                        {{ $featuredPost->author_avatar }}
                                    </div>
                                @endif
                                <div>
                                    <span class="text-xs font-semibold text-pima-900 block">{{ $featuredPost->author_name }}</span>
                                    <span class="text-[11px] text-pima-500 block font-light">{{ $featuredPost->author_role }}</span>
                                </div>
                            </div>

                            <a 
                                href="{{ route('blog.show', $featuredPost->slug) }}" 
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-pima-900 text-white text-xs font-semibold tracking-wider uppercase group-hover:bg-pima-800 transition-colors shadow-xs"
                            >
                                <span>Leer</span>
                                <x-icon name="arrow-right" class="w-3.5 h-3.5 text-pima-300" />
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- C. ARCHIVE PAGE HEADER (DISPLAYED ON "/blog" AND FILTERED VIEWS) --}}
    @if (!$isHome)
        <header class="pt-8 pb-8 lg:pt-12 lg:pb-10 border-b border-pima-200/60 bg-gradient-to-b from-pima-100/40 via-pima-50 to-pima-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- Breadcrumbs Navigation --}}
                <nav class="mb-5 text-xs font-sans tracking-wide text-pima-500">
                    <ol class="flex items-center space-x-2 flex-wrap">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-pima-900 transition-colors">Inicio</a>
                        </li>
                        <li class="text-pima-300">/</li>
                        <li class="{{ empty($activeCategory) && empty(request('search')) ? 'text-pima-900 font-semibold' : 'text-pima-600' }}">
                            @if (empty($activeCategory) && empty(request('search')))
                                Artículos
                            @else
                                <a href="{{ route('blog.index') }}" class="hover:text-pima-900 transition-colors">Artículos</a>
                            @endif
                        </li>
                        @if ($activeCategory)
                            <li class="text-pima-300">/</li>
                            <li class="text-pima-900 font-semibold truncate">{{ $activeCategory->name }}</li>
                        @elseif (request('search'))
                            <li class="text-pima-300">/</li>
                            <li class="text-pima-900 font-semibold truncate">Búsqueda: “{{ request('search') }}”</li>
                        @endif
                    </ol>
                </nav>

                {{-- Editorial Title and Description --}}
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-pill text-[11px] font-semibold tracking-[0.2em] uppercase text-pima-800 shadow-2xs mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-pima-gold"></span>
                        <span>Archivo Editorial · Peru Pima</span>
                    </div>

                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-pima-900 tracking-tight leading-tight mb-3">
                        @if ($activeCategory)
                            {{ $activeCategory->name }}
                        @elseif (request('search'))
                            Resultados para: <span class="italic text-pima-700">“{{ request('search') }}”</span>
                        @else
                            Todos los Artículos
                        @endif
                    </h1>

                    <p class="text-sm sm:text-base text-pima-600 font-light leading-relaxed font-sans">
                        @if ($activeCategory)
                            {{ $activeCategory->description }}
                        @elseif (request('search'))
                            Artículos editoriales que coinciden con tu criterio de búsqueda en el blog de Peru Pima.
                        @else
                            Explora todas nuestras publicaciones sobre descanso, la ciencia del 100% algodón Pima peruano, diseño de interiores y la armonía íntima del hogar.
                        @endif
                    </p>
                </div>

            </div>
        </header>
    @endif

    {{-- D. EXPLORACIÓN, CATEGORÍAS & FILTROS --}}
    <section id="articulos" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $isHome ? 'py-10 lg:py-16' : 'py-8 lg:py-12' }}">
        
        {{-- Section Subheader / Sorting Bar --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 pb-4 border-b border-pima-200">
            <div>
                @if ($isHome)
                    <span class="text-xs font-semibold tracking-[0.2em] uppercase text-pima-gold block mb-1">
                        Archivo Editorial
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-pima-900">
                        Últimas Publicaciones
                    </h2>
                @else
                    <span class="text-xs uppercase tracking-wider text-pima-500 font-medium">
                        Mostrando {{ $posts->total() }} {{ $posts->total() === 1 ? 'artículo' : 'artículos' }}
                    </span>
                @endif
            </div>

            {{-- Sorting Selector --}}
            <div class="flex items-center gap-3">
                <label for="sort-select" class="text-xs uppercase tracking-wider text-pima-500 font-medium whitespace-nowrap">
                    Ordenar por:
                </label>
                <form method="GET" action="{{ route('blog.index') }}" class="relative inline-block">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select 
                        id="sort-select"
                        name="sort" 
                        onchange="this.form.submit()" 
                        class="appearance-none pl-3 pr-8 py-2 text-xs font-medium rounded-full bg-white border border-pima-300/80 text-pima-800 focus:outline-none focus:ring-2 focus:ring-pima-400 cursor-pointer shadow-2xs"
                    >
                        <option value="recent" {{ request('sort', 'recent') === 'recent' ? 'selected' : '' }}>Más recientes</option>
                        <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Más leídos</option>
                        <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Más antiguos</option>
                    </select>
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-pima-500">
                        <x-icon name="chevron-down" class="w-3.5 h-3.5" />
                    </div>
                </form>
            </div>
        </div>

        {{-- Interactive Category Filter Pills --}}
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-10 no-scrollbar">
            <a 
                href="{{ route('blog.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}" 
                class="px-5 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase transition-all duration-300 whitespace-nowrap flex items-center gap-2 {{ empty(request('category')) ? 'bg-pima-900 text-white shadow-sm' : 'glass-pill text-pima-700 hover:text-pima-900' }}"
            >
                <span>Todas</span>
                <span class="text-[10px] opacity-75 font-normal">({{ \App\Models\Post::published()->count() }})</span>
            </a>

            @foreach ($categories as $category)
                <a 
                    href="{{ route('blog.index', array_filter(['category' => $category->slug, 'search' => request('search'), 'sort' => request('sort')])) }}" 
                    class="px-5 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase transition-all duration-300 whitespace-nowrap flex items-center gap-2 {{ request('category') === $category->slug ? 'bg-pima-900 text-white shadow-sm' : 'glass-pill text-pima-700 hover:text-pima-900' }}"
                >
                    <span>{{ $category->name }}</span>
                    <span class="text-[10px] opacity-75 font-normal">({{ $category->posts_count }})</span>
                </a>
            @endforeach

            @if (request('category') || request('search'))
                <a 
                    href="{{ route('blog.index') }}" 
                    class="ml-auto inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs text-pima-500 hover:text-pima-800 hover:bg-pima-200/50 transition-colors whitespace-nowrap"
                    title="Restablecer todos los filtros"
                >
                    <x-icon name="x" class="w-3.5 h-3.5" />
                    <span>Limpiar filtros</span>
                </a>
            @endif
        </div>

        {{-- Active Filters Notification Bar (if filtered) --}}
        @if ($isFiltering && (request('category') || request('search')))
            <div class="mb-8 p-4 rounded-xl bg-pima-100/70 border border-pima-200/80 flex items-center justify-between text-xs text-pima-700">
                <div class="flex items-center gap-2">
                    <span class="font-medium text-pima-900">Filtros aplicados:</span>
                    @if (request('search'))
                        <span class="px-2.5 py-1 rounded-md bg-white border border-pima-200">
                            Búsqueda: "{{ request('search') }}"
                        </span>
                    @endif
                    @if ($activeCategory)
                        <span class="px-2.5 py-1 rounded-md bg-white border border-pima-200">
                            Categoría: {{ $activeCategory->name }}
                        </span>
                    @endif
                </div>
                <span>{{ $posts->total() }} {{ $posts->total() === 1 ? 'artículo encontrado' : 'artículos encontrados' }}</span>
            </div>
        @endif

        {{-- E. DYNAMIC EDITORIAL GRID --}}
        @if ($posts->count() > 0)
            
            <div class="space-y-12">
                {{-- Block 1: Asymmetrical Hero-Card for first item --}}
                @php
                    $firstPost = $posts->first();
                    $remainingPosts = $posts->slice(1);
                @endphp

                @if ($firstPost)
                    <div>
                        <x-post-card :post="$firstPost" variant="horizontal" index="1" />
                    </div>
                @endif

                {{-- Block 2: 2-column or 3-column asymmetric layout --}}
                @if ($remainingPosts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
                        @foreach ($remainingPosts as $idx => $post)
                            @php
                                $cardNumber = $idx + 2;
                                $aspect = ($idx % 3 === 0) ? 'aspect-[4/3]' : (($idx % 3 === 1) ? 'aspect-[16/11]' : 'aspect-[3/2]');
                            @endphp
                            <div>
                                <x-post-card :post="$post" :aspect="$aspect" :index="$cardNumber" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Editorial Vignette Interstitial Banner --}}
            <div class="my-16 rounded-3xl p-8 sm:p-12 bg-gradient-to-r from-pima-900 via-pima-800 to-pima-900 text-pima-100 relative overflow-hidden shadow-xl border border-pima-700/60">
                <div class="absolute right-0 top-0 bottom-0 w-1/3 opacity-15 pointer-events-none hidden md:block">
                    <img src="{{ asset('images/blog/cotton-boll.jpg') }}" alt="" class="w-full h-full object-cover mix-blend-luminosity">
                </div>
                <div class="relative z-10 max-w-2xl">
                    <span class="text-xs uppercase tracking-[0.25em] text-pima-gold font-semibold block mb-2">
                        La Filosofía Peru Pima
                    </span>
                    <blockquote class="font-serif text-2xl sm:text-3xl font-light leading-relaxed mb-6 italic text-white">
                        “Dormir bien no es una desconexión pasiva del mundo, sino el más puro de los regresos a uno mismo.”
                    </blockquote>
                    <div class="flex items-center gap-4 text-xs font-sans tracking-wider uppercase text-pima-300">
                        <span>Algodón 100% Pima</span>
                        <span>·</span>
                        <span>Hilo de Torsión Suave</span>
                        <span>·</span>
                        <span>Artesanía Peruana</span>
                    </div>
                </div>
            </div>

            {{-- Pagination Links --}}
            <div class="mt-16 pt-8 border-t border-pima-200 flex justify-center">
                {{ $posts->links() }}
            </div>

        @else
            {{-- Empty State --}}
            <div class="text-center py-20 px-4 rounded-3xl bg-white border border-pima-200 shadow-xs max-w-xl mx-auto">
                <div class="w-16 h-16 rounded-full bg-pima-100 text-pima-500 mx-auto flex items-center justify-center mb-5">
                    <x-icon name="search" class="w-8 h-8" />
                </div>
                <h3 class="font-serif text-2xl font-normal text-pima-900 mb-2">
                    No encontramos artículos para esta búsqueda
                </h3>
                <p class="text-sm text-pima-600 font-light mb-6">
                    Intenta con otros términos como "algodón", "sábanas", "percal" o explora todas nuestras categorías.
                </p>
                <a 
                    href="{{ route('blog.index') }}" 
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-pima-900 text-white text-xs font-semibold tracking-wider uppercase hover:bg-pima-800 transition-colors shadow-xs"
                >
                    <span>Ver todos los artículos</span>
                    <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                </a>
            </div>
        @endif

    </section>

@endsection
