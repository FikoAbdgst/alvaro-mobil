{{-- Features Section - Colorful Icons & High Contrast Cards --}}
<section class="relative bg-zinc-50 py-24 overflow-hidden">

    {{-- Background Decoration --}}
    <div
        class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/3 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-3xl pointer-events-none">
    </div>
    <div
        class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/3 w-[600px] h-[600px] bg-amber-100/40 rounded-full blur-3xl pointer-events-none">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="text-center mb-16 space-y-4">

            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 tracking-tight">
                Mengapa Harus
                <span class="relative inline-block">
                    <span class="relative z-10 bg-indigo-600 bg-clip-text text-transparent">PT
                        ALVARO MOBIL?</span>
                    {{-- Underline decoration --}}
                    <span class="absolute bottom-1 left-0 w-full h-3 bg-indigo-100/50 -z-0 -rotate-1"></span>
                </span>
            </h2>
            <p class="text-zinc-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Kombinasi kepercayaan, harga terbaik, dan kecepatan layanan untuk kepuasan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Feature 1: Terpercaya (BIRU) --}}
            <div class="group relative">
                <div
                    class="relative h-full bg-white rounded-[2rem] p-8 border border-zinc-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(37,99,235,0.15)] hover:border-blue-500 transition-all duration-300 transform group-hover:-translate-y-2">

                    {{-- Icon Box: Blue Gradient --}}
                    <div
                        class="w-16 h-16 mb-8 rounded-2xl bg-blue-500 flex items-center justify-center shadow-lg shadow-blue-500/30 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-zinc-900 mb-4 group-hover:text-blue-600 transition-colors">100%
                        Terpercaya</h3>
                    <p class="text-zinc-600 leading-relaxed font-medium">
                        Unit pilihan berkualitas dengan jaminan garansi mesin, legalitas surat resmi, dan rekam jejak
                        yang transparan.
                    </p>
                </div>
            </div>

            {{-- Feature 2: Harga Terbaik (HIJAU) --}}
            <div class="group relative">
                <div
                    class="relative h-full bg-white rounded-[2rem] p-8 border border-zinc-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(16,185,129,0.15)] hover:border-emerald-500 transition-all duration-300 transform group-hover:-translate-y-2">

                    {{-- Icon Box: Green Gradient --}}
                    <div
                        class="w-16 h-16 mb-8 rounded-2xl bg-emerald-500 flex items-center justify-center shadow-lg shadow-emerald-500/30 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-zinc-900 mb-4 group-hover:text-emerald-600 transition-colors">
                        Harga Terbaik</h3>
                    <p class="text-zinc-600 leading-relaxed font-medium">
                        Penawaran harga paling kompetitif di pasaran dengan skema pembayaran cash atau kredit yang
                        fleksibel.
                    </p>
                </div>
            </div>

            {{-- Feature 3: Proses Cepat (KUNING / AMBER) --}}
            <div class="group relative">
                <div
                    class="relative h-full bg-white rounded-[2rem] p-8 border border-zinc-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(245,158,11,0.15)] hover:border-amber-500 transition-all duration-300 transform group-hover:-translate-y-2">

                    {{-- Icon Box: Yellow/Amber Gradient --}}
                    <div
                        class="w-16 h-16 mb-8 rounded-2xl bg-amber-400  flex items-center justify-center shadow-lg shadow-amber-500/30 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-black text-zinc-900 mb-4 group-hover:text-amber-600 transition-colors">
                        Proses Cepat</h3>
                    <p class="text-zinc-600 leading-relaxed font-medium">
                        Administrasi yang efisien dan transparan. Mobil impian Anda bisa langsung dibawa pulang hari ini
                        juga.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
