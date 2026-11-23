<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Diario Editorial · Peru Pima | Confort, Textiles & Estilo de Vida')</title>
    <meta name="description" content="@yield('meta_description', 'Explora el universo editorial de Peru Pima. Ensayos, guías de descanso, ciencia del algodón Pima y secretos de decoración para transformar tu hogar.')">
    
    {{-- Open Graph / Social --}}
    <meta property="og:site_name" content="Peru Pima Editorial">
    <meta property="og:title" content="@yield('title', 'Diario Editorial · Peru Pima')">
    <meta property="og:description" content="@yield('meta_description', 'Descubre el universo del descanso y los textiles de 100% algodón Pima peruano.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('images/blog/hero-editorial.jpg'))">
    
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-perupima.png') }}">

    {{-- Google Fonts: Cormorant Garamond (Editorial Serif) & Plus Jakarta Sans (Clean Modern Sans) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pima-50 text-pima-900 min-h-screen flex flex-col font-sans selection:bg-pima-300 selection:text-pima-900">
    
    {{-- Reading progress bar (active on article views) --}}
    <div id="reading-progress" class="fixed top-0 left-0 h-[3px] bg-pima-gold z-[60] w-0 transition-all duration-150"></div>

    {{-- Global Editorial Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Global Editorial Footer --}}
    <x-footer />

    {{-- Toast notification element for copy links and actions --}}
    <div 
        id="toast-notification" 
        class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none glass-dark text-white px-5 py-3 rounded-full shadow-2xl flex items-center gap-3 text-xs tracking-wider"
    >
        <x-icon name="check" class="w-4 h-4 text-pima-gold" />
        <span id="toast-message">Enlace copiado al portapapeles</span>
    </div>

    <script>
        // Reading progress indicator
        window.addEventListener('scroll', function () {
            const progress = document.getElementById('reading-progress');
            if (progress) {
                const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
                if (totalHeight > 0) {
                    const scrolled = (window.scrollY / totalHeight) * 100;
                    progress.style.width = Math.min(scrolled, 100) + '%';
                }
            }
        });

        // Global Toast helper
        function showToast(message = 'Acción completada con éxito') {
            const toast = document.getElementById('toast-notification');
            const msgSpan = document.getElementById('toast-message');
            if (toast && msgSpan) {
                msgSpan.textContent = message;
                toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
                toast.classList.add('translate-y-0', 'opacity-100');
                
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
                    toast.classList.remove('translate-y-0', 'opacity-100');
                }, 3000);
            }
        }
    </script>
</body>
</html>
