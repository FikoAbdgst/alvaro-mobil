@php
    use Carbon\Carbon;

    $now = Carbon::now('Asia/Jakarta');
    $openTime = Carbon::createFromTime(8, 0, 0, 'Asia/Jakarta');
    $closeTime = Carbon::createFromTime(20, 0, 0, 'Asia/Jakarta');

    $isOpen = $now->between($openTime, $closeTime);
@endphp


<footer class="bg-zinc-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            <!-- Company -->
            <div>
                <h3 class="text-2xl font-extrabold text-white mb-4">
                    PT ALVARO MOBIL
                </h3>
                <p class="text-gray-400 leading-relaxed">
                    Dealer mobil terpercaya yang menyediakan berbagai pilihan mobil berkualitas dengan proses
                    cepat, aman, dan transparan.
                </p>
            </div>

            <!-- Address -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4">Alamat</h4>
                <p class="text-gray-400">
                    Jalan Terusan Cibaduyut,<br>
                    Rancamanyar, Baleendah,<br>
                    Bandung Regency,<br>
                    West Java 40375
                </p>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="tel:087875712617" class="hover:text-white flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            0878-7571-2617
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/6287875712617" target="_blank"
                            class="hover:text-white flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347Z" />
                            </svg>
                            WhatsApp
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Operational -->
            <div>
                <h4 class="text-lg font-bold text-white mb-4">Jam Operasional</h4>
                <p class="text-gray-400 mb-4">
                    Setiap Hari<br>
                    08.00 – 20.00 WIB
                </p>

                @if ($isOpen)
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full bg-green-500/20 text-green-400 font-bold">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        Buka Sekarang
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-500/20 text-red-400 font-bold">
                        <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                        Tutup
                    </span>
                @endif
            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-gray-600 mt-12 pt-6 text-center text-gray-500 text-sm">
            © {{ date('Y') }} PT ALVARO MOBIL. All rights reserved.
        </div>

    </div>
</footer>
