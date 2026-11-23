@extends('layouts.app')

@section('title', $post->title . ' · Diario Editorial Peru Pima')
@section('meta_description', $post->excerpt)
@section('og_image', asset($post->image))

@section('content')

    {{-- Breadcrumbs Navigation --}}
    <nav class="max-w-4xl mx-auto px-4 sm:px-6 pt-6 pb-2 text-xs font-sans tracking-wide text-pima-500">
        <ol class="flex items-center space-x-2 flex-wrap">
            <li>
                <a href="{{ route('home') }}" class="hover:text-pima-900 transition-colors">Inicio</a>
            </li>
            <li class="text-pima-300">/</li>
            <li>
                <a href="{{ route('blog.index') }}" class="hover:text-pima-900 transition-colors">Blog</a>
            </li>
            <li class="text-pima-300">/</li>
            <li>
                <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="hover:text-pima-900 transition-colors">
                    {{ $post->category->name }}
                </a>
            </li>
            <li class="text-pima-300">/</li>
            <li class="text-pima-800 font-medium truncate max-w-[200px] sm:max-w-xs" title="{{ $post->title }}">
                {{ $post->title }}
            </li>
        </ol>
    </nav>

    {{-- Article Header Section --}}
    <header class="max-w-4xl mx-auto px-4 sm:px-6 pt-8 pb-10 text-center">
        
        {{-- Category Pill --}}
        <div class="mb-5 inline-block">
            <a 
                href="{{ route('blog.index', ['category' => $post->category->slug]) }}" 
                class="glass-pill px-4 py-1.5 rounded-full text-xs font-semibold tracking-[0.16em] uppercase text-pima-800 shadow-2xs hover:scale-105 transition-transform"
            >
                {{ $post->category->name }}
            </a>
        </div>

        {{-- Editorial Title (H1) --}}
        <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-normal text-pima-900 tracking-tight leading-[1.12] mb-6">
            {{ $post->title }}
        </h1>

        {{-- Subtitle / Excerpt --}}
        <p class="text-base sm:text-lg md:text-xl text-pima-600 font-light leading-relaxed max-w-3xl mx-auto mb-8 font-sans">
            {{ $post->excerpt }}
        </p>

        {{-- Author & Meta Info Row --}}
        <div class="flex flex-wrap items-center justify-center gap-6 py-4 border-y border-pima-200/80 text-xs text-pima-600 font-sans">
            <div class="flex items-center gap-2.5">
                @if ($post->author_avatar)
                    <div class="w-8 h-8 rounded-full bg-pima-900 text-pima-100 font-serif text-xs font-semibold flex items-center justify-center shadow-xs">
                        {{ $post->author_avatar }}
                    </div>
                @endif
                <div class="text-left">
                    <span class="font-semibold text-pima-900 block">{{ $post->author_name }}</span>
                    @if ($post->author_role)
                        <span class="text-[10px] text-pima-500 block font-light">{{ $post->author_role }}</span>
                    @endif
                </div>
            </div>

            <span class="hidden sm:inline text-pima-300">·</span>

            <div class="flex items-center gap-1.5">
                <x-icon name="calendar" class="w-3.5 h-3.5 text-pima-400" />
                <span>{{ $post->formatted_date }}</span>
            </div>

            <span class="hidden sm:inline text-pima-300">·</span>

            <div class="flex items-center gap-1.5">
                <x-icon name="clock" class="w-3.5 h-3.5 text-pima-400" />
                <span>{{ $post->reading_time_label }}</span>
            </div>

            <span class="hidden sm:inline text-pima-300">·</span>

            <div class="flex items-center gap-1.5 text-pima-400">
                <x-icon name="tag" class="w-3.5 h-3.5" />
                <span>{{ number_format($post->views_count) }} lecturas</span>
            </div>
        </div>
    </header>

    {{-- Main Cover Image --}}
    <figure class="max-w-5xl mx-auto px-4 sm:px-6 mb-14">
        <div class="rounded-3xl overflow-hidden aspect-[16/9] md:aspect-[21/10] bg-pima-100 shadow-xl border border-pima-200">
            <img 
                src="{{ asset($post->image) }}" 
                alt="{{ $post->title }}" 
                class="w-full h-full object-cover"
                loading="eager"
            />
        </div>
        @if ($post->image_caption)
            <figcaption class="mt-3 text-center text-xs font-light text-pima-500 italic font-sans">
                {{ $post->image_caption }}
            </figcaption>
        @endif
    </figure>

    {{-- Article Body Container --}}
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        
        {{-- Social Sharing Bar (Floating Desktop / Sticky) --}}
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-pima-200 text-xs text-pima-600">
            <div class="flex items-center gap-2">
                <span class="font-semibold uppercase tracking-wider text-[11px] text-pima-800">Compartir:</span>
                
                {{-- Copy Link --}}
                <button 
                    type="button" 
                    onclick="navigator.clipboard.writeText(window.location.href); showToast('Enlace copiado al portapapeles');" 
                    class="p-2 rounded-full bg-white hover:bg-pima-100 border border-pima-200 text-pima-700 transition-colors shadow-2xs"
                    title="Copiar enlace"
                >
                    <x-icon name="copy" class="w-3.5 h-3.5" />
                </button>

                {{-- WhatsApp --}}
                <a 
                    href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" 
                    target="_blank" 
                    rel="noopener"
                    class="p-2 rounded-full bg-white hover:bg-pima-100 border border-pima-200 text-[#25D366] transition-colors shadow-2xs"
                    title="Compartir en WhatsApp"
                >
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                </a>

                {{-- Twitter / X --}}
                <a 
                    href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" 
                    target="_blank" 
                    rel="noopener"
                    class="p-2 rounded-full bg-white hover:bg-pima-100 border border-pima-200 text-pima-800 transition-colors shadow-2xs"
                    title="Compartir en X"
                >
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>

                {{-- Facebook --}}
                <a 
                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                    target="_blank" 
                    rel="noopener"
                    class="p-2 rounded-full bg-white hover:bg-pima-100 border border-pima-200 text-[#1877F2] transition-colors shadow-2xs"
                    title="Compartir en Facebook"
                >
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
            </div>

            <a href="#comentarios-o-tienda" class="text-pima-500 hover:text-pima-900 transition-colors flex items-center gap-1">
                <span>Tiempo lectura: {{ $post->reading_time }} min</span>
            </a>
        </div>

        {{-- Rich Editorial Content Body --}}
        <article class="editorial-prose">
            {!! $post->content !!}
        </article>

        {{-- Post-content Banner: Product Recommendation --}}
        <div id="comentarios-o-tienda" class="my-14 p-8 rounded-3xl bg-white border border-pima-200 shadow-sm flex flex-col sm:flex-row items-center gap-6">
            <div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 bg-pima-100">
                <img src="{{ asset('images/blog/bed-sheets-white.jpg') }}" alt="Peru Pima Sábanas" class="w-full h-full object-cover">
            </div>
            <div class="flex-1 text-center sm:text-left">
                <span class="text-[10px] uppercase tracking-[0.2em] font-semibold text-pima-gold block mb-1">
                    Colección Peru Pima
                </span>
                <h4 class="font-serif text-xl font-medium text-pima-900 mb-1">
                    Sábanas 600 Hilos Satén 100% Algodón Pima
                </h4>
                <p class="text-xs text-pima-500 leading-relaxed font-light mb-3">
                    Disponibles en blanco óptico, plateado, marfil y perla. Confección artesanal con fibra extra larga peruana.
                </p>
                <a 
                    href="https://pe.perupima.com/collections/sabanas" 
                    target="_blank" 
                    rel="noopener"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold tracking-wider uppercase text-pima-900 hover:text-pima-700 underline"
                >
                    <span>Explorar en la tienda oficial</span>
                    <x-icon name="external-link" class="w-3.5 h-3.5" />
                </a>
            </div>
        </div>

        {{-- Author Spotlight Card --}}
        <div class="p-8 rounded-2xl bg-pima-100/70 border border-pima-200 flex flex-col sm:flex-row items-start sm:items-center gap-5 my-12">
            @if ($post->author_avatar)
                <div class="w-16 h-16 rounded-full bg-pima-900 text-pima-100 font-serif text-xl font-semibold flex items-center justify-center flex-shrink-0 shadow-md">
                    {{ $post->author_avatar }}
                </div>
            @endif
            <div class="space-y-1.5">
                <span class="text-[10px] uppercase tracking-[0.2em] font-semibold text-pima-500 block">Autor editorial</span>
                <h4 class="font-serif text-xl font-medium text-pima-900">{{ $post->author_name }}</h4>
                <p class="text-xs text-pima-600 font-light leading-relaxed">
                    {{ $post->author_role ?? 'Colaborador editorial de Peru Pima' }}. Dedicado a investigar las relaciones entre el diseño textil, el confort sensorial y la salud del descanso en el hogar contemporáneo.
                </p>
            </div>
        </div>

        {{-- Next & Previous Post Navigation --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-8 border-y border-pima-200 my-10">
            <div>
                @if ($previousPost)
                    <a href="{{ route('blog.show', $previousPost->slug) }}" class="group block p-4 rounded-xl hover:bg-white transition-colors border border-transparent hover:border-pima-200">
                        <span class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wider text-pima-400 font-medium group-hover:text-pima-800 transition-colors mb-1">
                            <x-icon name="arrow-left" class="w-3 h-3 group-hover:-translate-x-1 transition-transform" />
                            Artículo anterior
                        </span>
                        <h5 class="font-serif text-base font-medium text-pima-900 line-clamp-2 leading-snug">
                            {{ $previousPost->title }}
                        </h5>
                    </a>
                @endif
            </div>

            <div class="text-right">
                @if ($nextPost)
                    <a href="{{ route('blog.show', $nextPost->slug) }}" class="group block p-4 rounded-xl hover:bg-white transition-colors border border-transparent hover:border-pima-200">
                        <span class="inline-flex items-center gap-1 text-[11px] uppercase tracking-wider text-pima-400 font-medium group-hover:text-pima-800 transition-colors mb-1 justify-end">
                            Siguiente artículo
                            <x-icon name="arrow-right" class="w-3 h-3 group-hover:translate-x-1 transition-transform" />
                        </span>
                        <h5 class="font-serif text-base font-medium text-pima-900 line-clamp-2 leading-snug">
                            {{ $nextPost->title }}
                        </h5>
                    </a>
                @endif
            </div>
        </div>

        {{-- Return to Blog Button --}}
        <div class="text-center my-10">
            <a 
                href="{{ route('blog.index') }}" 
                class="inline-flex items-center gap-2 px-6 py-3 rounded-full glass-pill hover:bg-white text-xs font-semibold tracking-wider uppercase text-pima-800 transition-all shadow-2xs hover:shadow-sm"
            >
                <x-icon name="arrow-left" class="w-3.5 h-3.5 text-pima-600" />
                <span>Volver a todas las publicaciones</span>
            </a>
        </div>

    </div>

    {{-- Related Articles Section --}}
    @if ($relatedPosts->count() > 0)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8 border-t border-pima-200">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-semibold tracking-[0.2em] uppercase text-pima-gold block mb-1">
                        Continuar explorando
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-pima-900">
                        Publicaciones Relacionadas
                    </h3>
                </div>
                <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="text-xs uppercase tracking-wider font-semibold text-pima-800 hover:underline flex items-center gap-1">
                    <span>Ver más de {{ $post->category->name }}</span>
                    <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($relatedPosts as $idx => $relPost)
                    <x-post-card :post="$relPost" variant="vertical" :index="$idx + 1" />
                @endforeach
            </div>
        </section>
    @endif

@endsection
