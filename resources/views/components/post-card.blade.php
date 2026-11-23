@props([
    'post',
    'variant' => 'vertical', // 'vertical', 'horizontal', 'featured', 'compact'
    'aspect' => null,
    'index' => null,
])

@php
    $aspectRatio = $aspect ?? ($variant === 'horizontal' ? 'aspect-[4/3] md:aspect-auto' : 'aspect-[16/11]');
@endphp

@if ($variant === 'horizontal')
    {{-- Asymmetrical Horizontal Card --}}
    <article class="card-editorial group bg-white rounded-2xl overflow-hidden border border-pima-200/60 shadow-xs hover:shadow-xl hover:border-pima-300 transition-all duration-500 flex flex-col md:flex-row">
        {{-- Image Container --}}
        <div class="relative md:w-5/12 overflow-hidden bg-pima-100 min-h-[260px] md:min-h-[320px]">
            <a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
                <img 
                    src="{{ asset($post->image) }}" 
                    alt="{{ $post->title }}" 
                    class="img-editorial-zoom w-full h-full object-cover"
                    loading="lazy"
                />
            </a>
            
            {{-- Category Pill (Glassmorphism) --}}
            <div class="absolute top-4 left-4 z-10">
                <a 
                    href="{{ route('blog.index', ['category' => $post->category->slug]) }}" 
                    class="glass-pill px-3 py-1 rounded-full text-[11px] font-semibold tracking-wider uppercase text-pima-800 shadow-xs transition-transform duration-300 hover:scale-105 inline-block"
                >
                    {{ $post->category->name }}
                </a>
            </div>

            @if ($index)
                <div class="absolute bottom-4 right-4 z-10 font-serif text-3xl font-light text-white/90 drop-shadow-md select-none">
                    {{ sprintf('%02d', $index) }}
                </div>
            @endif
        </div>

        {{-- Content Container --}}
        <div class="p-6 md:p-8 md:w-7/12 flex flex-col justify-between">
            <div>
                {{-- Meta Info --}}
                <div class="flex items-center gap-3 text-xs text-pima-500 font-sans tracking-wide mb-3">
                    <span class="inline-flex items-center gap-1">
                        <x-icon name="calendar" class="w-3.5 h-3.5 text-pima-400" />
                        {{ $post->formatted_date }}
                    </span>
                    <span>·</span>
                    <span class="inline-flex items-center gap-1">
                        <x-icon name="clock" class="w-3.5 h-3.5 text-pima-400" />
                        {{ $post->reading_time_label }}
                    </span>
                </div>

                {{-- Title --}}
                <h3 class="font-serif text-2xl lg:text-3xl font-medium text-pima-900 group-hover:text-pima-700 transition-colors duration-300 leading-snug mb-3">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h3>

                {{-- Excerpt --}}
                <p class="text-sm font-light text-pima-600 line-clamp-3 leading-relaxed font-sans mb-6">
                    {{ $post->excerpt }}
                </p>
            </div>

            {{-- Footer info & CTA --}}
            <div class="pt-4 border-t border-pima-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    @if ($post->author_avatar)
                        <div class="w-7 h-7 rounded-full bg-pima-200 text-pima-800 text-xs font-semibold flex items-center justify-center font-serif">
                            {{ $post->author_avatar }}
                        </div>
                    @endif
                    <div>
                        <span class="text-xs font-medium text-pima-800 block">{{ $post->author_name }}</span>
                        @if ($post->author_role)
                            <span class="text-[10px] text-pima-400 block font-light">{{ $post->author_role }}</span>
                        @endif
                    </div>
                </div>

                <a 
                    href="{{ route('blog.show', $post->slug) }}" 
                    class="inline-flex items-center gap-1 text-xs font-semibold tracking-wider uppercase text-pima-900 group-hover:translate-x-1 transition-all duration-300"
                >
                    <span>Leer</span>
                    <x-icon name="arrow-right" class="w-3.5 h-3.5 text-pima-600 group-hover:text-pima-900" />
                </a>
            </div>
        </div>
    </article>

@elseif ($variant === 'compact')
    {{-- Compact Card (for Related Articles & Sidebars) --}}
    <article class="card-editorial group bg-white rounded-xl overflow-hidden border border-pima-200/50 shadow-xs hover:shadow-md transition-all duration-300 flex gap-4 p-3">
        <div class="relative w-28 h-24 flex-shrink-0 overflow-hidden rounded-lg bg-pima-100">
            <a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
                <img 
                    src="{{ asset($post->image) }}" 
                    alt="{{ $post->title }}" 
                    class="img-editorial-zoom w-full h-full object-cover"
                    loading="lazy"
                />
            </a>
        </div>
        <div class="flex flex-col justify-between flex-1 py-0.5">
            <div>
                <span class="text-[10px] font-semibold uppercase tracking-wider text-pima-500 block mb-1">
                    {{ $post->category->name }}
                </span>
                <h4 class="font-serif text-base font-medium text-pima-900 group-hover:text-pima-700 transition-colors line-clamp-2 leading-snug">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h4>
            </div>
            <div class="flex items-center gap-2 text-[11px] text-pima-400 font-sans">
                <span>{{ $post->reading_time_label }}</span>
            </div>
        </div>
    </article>

@else
    {{-- Default Vertical Editorial Card --}}
    <article class="card-editorial group bg-white rounded-2xl overflow-hidden border border-pima-200/60 shadow-xs hover:shadow-xl hover:border-pima-300 transition-all duration-500 flex flex-col h-full">
        {{-- Image Container --}}
        <div class="relative {{ $aspectRatio }} overflow-hidden bg-pima-100">
            <a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
                <img 
                    src="{{ asset($post->image) }}" 
                    alt="{{ $post->title }}" 
                    class="img-editorial-zoom w-full h-full object-cover"
                    loading="lazy"
                />
            </a>

            {{-- Floating Category Pill (Glassmorphism) --}}
            <div class="absolute top-4 left-4 z-10">
                <a 
                    href="{{ route('blog.index', ['category' => $post->category->slug]) }}" 
                    class="glass-pill px-3 py-1 rounded-full text-[11px] font-semibold tracking-wider uppercase text-pima-800 shadow-xs transition-transform duration-300 hover:scale-105 inline-block"
                >
                    {{ $post->category->name }}
                </a>
            </div>

            @if ($index)
                <div class="absolute bottom-3 right-4 z-10 font-serif text-2xl font-light text-white/90 drop-shadow-md select-none">
                    {{ sprintf('%02d', $index) }}
                </div>
            @endif
        </div>

        {{-- Content Container --}}
        <div class="p-6 flex flex-col justify-between flex-1">
            <div>
                {{-- Date & Reading Time --}}
                <div class="flex items-center gap-3 text-xs text-pima-500 font-sans tracking-wide mb-3">
                    <span class="inline-flex items-center gap-1">
                        <x-icon name="calendar" class="w-3.5 h-3.5 text-pima-400" />
                        {{ $post->formatted_date }}
                    </span>
                    <span>·</span>
                    <span class="inline-flex items-center gap-1">
                        <x-icon name="clock" class="w-3.5 h-3.5 text-pima-400" />
                        {{ $post->reading_time_label }}
                    </span>
                </div>

                {{-- Title --}}
                <h3 class="font-serif text-xl lg:text-2xl font-medium text-pima-900 group-hover:text-pima-700 transition-colors duration-300 leading-snug mb-3">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h3>

                {{-- Excerpt --}}
                <p class="text-sm font-light text-pima-600 line-clamp-3 leading-relaxed font-sans mb-6">
                    {{ $post->excerpt }}
                </p>
            </div>

            {{-- Card Footer --}}
            <div class="pt-4 border-t border-pima-100 flex items-center justify-between mt-auto">
                <div class="flex items-center gap-2">
                    @if ($post->author_avatar)
                        <div class="w-6 h-6 rounded-full bg-pima-200 text-pima-800 text-[10px] font-semibold flex items-center justify-center font-serif">
                            {{ $post->author_avatar }}
                        </div>
                    @endif
                    <span class="text-xs font-medium text-pima-700">{{ $post->author_name }}</span>
                </div>

                <a 
                    href="{{ route('blog.show', $post->slug) }}" 
                    class="inline-flex items-center gap-1 text-xs font-semibold tracking-wider uppercase text-pima-900 group-hover:translate-x-1 transition-all duration-300"
                >
                    <span>Leer</span>
                    <x-icon name="arrow-right" class="w-3.5 h-3.5 text-pima-600 group-hover:text-pima-900" />
                </a>
            </div>
        </div>
    </article>
@endif
