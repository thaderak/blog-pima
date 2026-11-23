@props([
    'categories' => collect(),
])

<footer class="bg-pima-900 text-pima-200 pt-20 pb-12 mt-28 border-t border-pima-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Top Section: Brand & Newsletter --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 pb-16 border-b border-pima-800/80">
            
            {{-- Brand Ethos Column --}}
            <div class="lg:col-span-5 space-y-6">
                <a href="{{ route('home') }}" class="inline-block">
                    <x-brand-logo variant="light" class="h-9 w-auto" />
                </a>

                <p class="text-sm font-light leading-relaxed text-pima-300 max-w-md font-sans">
                    Nuestra vocación es enaltecer el arte del descanso. Cada artículo editorial y cada tejido de algodón Pima de fibra extra larga están concebidos para ofrecer una caricia inalterable, pureza botánica y bienestar duradero en tu hogar.
                </p>

                <div class="flex items-center gap-4 text-xs tracking-wider uppercase text-pima-400 font-medium">
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-pima-gold"></span>
                        Lima, Perú
                    </span>
                    <span>·</span>
                    <span>100% Peruvian Pima</span>
                    <span>·</span>
                    <span>Desde 1986</span>
                </div>
            </div>

            {{-- Newsletter Invitation Card --}}
            <div class="lg:col-span-7 bg-pima-800/50 backdrop-blur-sm rounded-2xl p-8 border border-pima-700/60 flex flex-col justify-between">
                <div>
                    <span class="text-xs uppercase tracking-[0.2em] text-pima-gold font-semibold block mb-2">
                        El Diario Pima · Newsletter
                    </span>
                    <h3 class="font-serif text-2xl lg:text-3xl text-white font-normal mb-3">
                        Reflexiones sobre descanso, diseño y bienestar
                    </h3>
                    <p class="text-xs text-pima-300 leading-relaxed max-w-xl">
                        Recibe mensualmente nuestros ensayos editoriales, guías de estilo para tu cama y accesos anticipados a ediciones limitadas de textiles finos.
                    </p>
                </div>

                <form onsubmit="event.preventDefault(); alert('¡Gracias por unirte al Diario Peru Pima!');" class="mt-6">
                    <div class="flex flex-col sm:flex-row gap-2 max-w-md">
                        <input 
                            type="email" 
                            required 
                            placeholder="Tu correo electrónico..." 
                            class="flex-1 px-4 py-3 rounded-full bg-pima-900/90 text-sm text-white placeholder-pima-500 border border-pima-700 focus:outline-none focus:border-pima-gold focus:ring-1 focus:ring-pima-gold transition-colors"
                        />
                        <button 
                            type="submit" 
                            class="px-6 py-3 rounded-full bg-pima-100 text-pima-900 hover:bg-white text-xs uppercase tracking-wider font-semibold transition-all duration-300 whitespace-nowrap shadow-sm"
                        >
                            Suscribirme
                        </button>
                    </div>
                    <span class="text-[10px] text-pima-400 block mt-2 font-light">
                        Respetamos tu privacidad. Puedes cancelar tu suscripción en cualquier momento.
                    </span>
                </form>
            </div>
        </div>

        {{-- Middle Section: Navigation Columns --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 py-14 border-b border-pima-800/80 text-xs font-sans">
            
            {{-- Column 1: Blog Editorial --}}
            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-4">
                    Contenido Editorial
                </h4>
                <ul class="space-y-2.5 text-pima-300">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Portada Editorial</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Todos los Artículos</a></li>
                    <li><a href="{{ route('blog.index', ['category' => 'descanso-y-bienestar']) }}" class="hover:text-white transition-colors">Descanso y Bienestar</a></li>
                    <li><a href="{{ route('blog.index', ['category' => 'textiles-y-fibras']) }}" class="hover:text-white transition-colors">Textiles y Fibras</a></li>
                    <li><a href="{{ route('blog.index', ['category' => 'decoracion-y-hogar']) }}" class="hover:text-white transition-colors">Decoración y Hogar</a></li>
                </ul>
            </div>

            {{-- Column 2: Guías y Consejos --}}
            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-4">
                    Guías & Cuidado
                </h4>
                <ul class="space-y-2.5 text-pima-300">
                    <li><a href="{{ route('blog.index', ['category' => 'guias-y-cuidados']) }}" class="hover:text-white transition-colors">Manual de Lavado</a></li>
                    <li><a href="{{ route('blog.show', 'percal-vs-saten-guia-definitiva-sabanas') }}" class="hover:text-white transition-colors">Percal vs. Satén</a></li>
                    <li><a href="{{ route('blog.show', 'nobleza-del-algodon-pima-peruano-fibra-extra-larga') }}" class="hover:text-white transition-colors">La Fibra Pima ELS</a></li>
                    <li><a href="{{ route('blog.show', 'capas-de-confort-vestir-cama-duvets-estaciones') }}" class="hover:text-white transition-colors">Estilismo de Cama</a></li>
                </ul>
            </div>

            {{-- Column 3: Tienda Peru Pima --}}
            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-4">
                    Colección Oficial
                </h4>
                <ul class="space-y-2.5 text-pima-300">
                    <li><a href="https://pe.perupima.com/collections/sabanas" target="_blank" rel="noopener" class="hover:text-white transition-colors">Juegos de Sábanas</a></li>
                    <li><a href="https://pe.perupima.com/collections/fundas-duvet" target="_blank" rel="noopener" class="hover:text-white transition-colors">Fundas Duvet</a></li>
                    <li><a href="https://pe.perupima.com/collections/almohadas" target="_blank" rel="noopener" class="hover:text-white transition-colors">Fundas de Almohada</a></li>
                    <li><a href="https://pe.perupima.com/collections/toallas" target="_blank" rel="noopener" class="hover:text-white transition-colors">Toallas de Baño</a></li>
                    <li><a href="https://pe.perupima.com/collections/batas" target="_blank" rel="noopener" class="hover:text-white transition-colors">Batas de Baño</a></li>
                </ul>
            </div>

            {{-- Column 4: Conectar & Marcas --}}
            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-4">
                    Redes & Contacto
                </h4>
                <p class="text-pima-400 mb-3 leading-relaxed">
                    Acompáñanos en nuestro universo visual y comparte tu santuario de descanso:
                </p>
                <div class="flex items-center space-x-3 text-pima-200">
                    <a href="https://www.instagram.com/perupima" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-pima-800 flex items-center justify-center hover:bg-pima-700 hover:text-white transition-colors" title="Instagram">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/perupima" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-pima-800 flex items-center justify-center hover:bg-pima-700 hover:text-white transition-colors" title="Facebook">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom Copyright --}}
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-pima-400 font-sans tracking-wide">
            <div>
                © {{ date('Y') }} PERU PIMA®. Todos los derechos reservados.
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-6">
                <a href="https://pe.perupima.com/pages/terminos-y-condiciones" target="_blank" class="hover:text-pima-200 transition-colors">Términos & Condiciones</a>
                <a href="https://pe.perupima.com/pages/politica-de-privacidad" target="_blank" class="hover:text-pima-200 transition-colors">Privacidad</a>
                <a href="https://pe.perupima.com" target="_blank" class="hover:text-pima-200 transition-colors">pe.perupima.com</a>
            </div>
        </div>
    </div>
</footer>
