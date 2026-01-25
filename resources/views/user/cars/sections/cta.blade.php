@php
    use Carbon\Carbon;

    $now = Carbon::now('Asia/Jakarta');
    $openTime = Carbon::createFromTime(8, 0, 0, 'Asia/Jakarta');
    $closeTime = Carbon::createFromTime(20, 0, 0, 'Asia/Jakarta');

    // Cek apakah hari ini Minggu (0)
    $isSunday = $now->dayOfWeek === 0;

    // Logika Buka/Tutup (Libur hari minggu opsional, jika buka tiap hari hapus $isSunday)
    $isOpen = $now->between($openTime, $closeTime);
@endphp

<footer class="relative bg-zinc-950 text-white overflow-hidden border-t border-white/5">
    {{-- Background Glow Decoration --}}
    <div
        class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[500px] h-[500px] bg-indigo-900/20 rounded-full blur-[100px] pointer-events-none">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-16">

            {{-- COLUMN 1: Brand Info (Lebar 5 kolom) --}}
            <div class="lg:col-span-5 space-y-8">
                {{-- Logo --}}
                <div class="flex items-center gap-3">
                    <div
                        class="relative w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center border border-white/10 ring-1 ring-white/5 shadow-2xl">
                        <img src="{{ asset('images/logo.png') }}" alt="Hero Image" />
                    </div>
                    <span class="text-2xl font-black tracking-tight text-white">PT ALVARO MOBIL</span>
                </div>

                <p class="text-zinc-400 leading-relaxed max-w-md">
                    Dealer mobil terpercaya yang menyediakan berbagai pilihan mobil berkualitas dengan proses yang
                    cepat, aman, dan transparan. Kepuasan Anda adalah prioritas kami.
                </p>


            </div>

            {{-- COLUMN 2: Lokasi & Kontak (Lebar 3 kolom) --}}
            <div class="lg:col-span-3 space-y-6">
                <h4 class="text-lg font-bold text-white">Hubungi Kami</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-zinc-400">
                        <svg class="w-6 h-6 text-indigo-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm leading-relaxed">
                            Jalan Terusan Cibaduyut, Rancamanyar, Baleendah, Kab. Bandung, Jawa Barat 40375
                        </span>
                    </li>
                    <li class="flex items-center gap-3 text-zinc-400">
                        <svg class="w-6 h-6 text-indigo-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm">+62 878-7571-2617</span>
                    </li>
                    <li class="pt-2">
                        <a href="https://maps.google.com/maps/place/ALVARO+SHOWROOM+MOBIL/@-6.9875386,107.5802835,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e90005bf26ed:0x50350b0bcb85a223!8m2!3d-6.9875386!4d107.5851544!16s%2Fg%2F11x2j83l5l?entry=ttu&g_ep=EgoyMDI2MDEwNy4wIKXMDSoASAFQAw%3D%3D"
                            target="_blank"
                            class="inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                            Lihat di Google Maps &rarr;
                        </a>
                    </li>
                </ul>
            </div>

            {{-- COLUMN 3: Jam Operasional (Lebar 4 kolom) --}}
            <div class="lg:col-span-4">
                <div class="bg-zinc-900 border border-white/10 rounded-2xl p-6 relative overflow-hidden group">
                    {{-- Status Indicator Bar --}}
                    <div
                        class="absolute top-0 left-0 w-full h-1 {{ $isOpen ? 'bg-gradient-to-r from-green-500 to-emerald-400' : 'bg-zinc-700' }}">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <h4 class="text-lg font-bold text-white flex items-center gap-2">
                            <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Jam Operasional
                        </h4>

                        {{-- Live Status Badge --}}
                        @if ($isOpen)
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-500/10 text-green-400 text-xs font-bold rounded-full border border-green-500/20">
                                <span class="relative flex h-2 w-2">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                BUKA SEKARANG
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-zinc-800 text-zinc-400 text-xs font-bold rounded-full border border-zinc-700">
                                <span class="w-2 h-2 rounded-full bg-zinc-500"></span>
                                TUTUP
                            </span>
                        @endif
                    </div>

                    {{-- Schedule List --}}
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-white/5">
                            <span class="text-zinc-400">Senin - Minggu</span>
                            <span class="text-white font-medium">08.00 - 20.00</span>
                        </div>

                        <div class="mt-4 p-4 rounded-xl bg-white/5 border border-white/5">
                            <p class="text-xs text-zinc-400 text-center leading-relaxed">
                                Kunjungi showroom kami untuk melihat unit secara langsung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Bottom Footer --}}
        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-zinc-500 text-sm">
                © {{ date('Y') }} <span class="text-zinc-300 font-semibold">PT ALVARO MOBIL</span>. All rights
                reserved.
            </p>
            <div class="flex gap-6 text-sm">
                <a href="#" class="text-zinc-500 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-zinc-500 hover:text-white transition-colors">Terms</a>
            </div>
        </div>
    </div>
</footer>
