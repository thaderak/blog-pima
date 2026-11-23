@props([
    'variant' => 'dark', // 'dark' or 'light'
    'class' => 'h-7 md:h-8 w-auto',
    'showTagline' => false,
])

@php
    $logoExists = file_exists(public_path('images/logo-perupima.png'));
    $filterClass = $variant === 'light' ? 'brightness-0 invert' : '';
@endphp

<div class="inline-flex flex-col items-start select-none">
    @if ($logoExists)
        <img 
            src="{{ asset('images/logo-perupima.png') }}" 
            alt="PERU PIMA" 
            class="{{ $class }} {{ $filterClass }} object-contain transition-opacity duration-300"
            loading="eager"
        />
    @else
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-pima-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                <path d="M12 6c-2.21 0-4 1.79-4 4 0 2.5 4 8 4 8s4-5.5 4-8c0-2.21-1.79-4-4-4z"/>
            </svg>
            <span class="font-serif tracking-[0.22em] text-lg font-semibold uppercase {{ $variant === 'light' ? 'text-white' : 'text-pima-900' }}">
                Peru Pima
            </span>
        </div>
    @endif

    @if ($showTagline)
        <span class="text-[9px] tracking-[0.28em] uppercase font-sans mt-1 {{ $variant === 'light' ? 'text-pima-300' : 'text-pima-600' }}">
            Finest Bed & Bath Linens
        </span>
    @endif
</div>
