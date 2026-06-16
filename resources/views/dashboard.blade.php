<x-app-layout>
    <!-- Wrapper Utama dengan Animasi Masuk -->
    <div class="animate-fade-in-up space-y-6">

        <!-- 1. KARTU STATISTIK (Grid 4 Kolom) -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
            
            <!-- Kartu Surat Masuk -->
            <div class="group relative flex flex-col bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-green-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Total Surat Masuk</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 counter-value" data-target="{{ $totalSuratMasuk }}">0</h3>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#115e3b] to-[#15803d] text-white shadow-lg transform group-hover:rotate-6 transition-transform">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    </div>
                </div>
            </div>

            <!-- Kartu Surat Keluar -->
            <div class="group relative flex flex-col bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-blue-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Total Surat Keluar</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 counter-value" data-target="{{ $totalSuratKeluar }}">0</h3>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-blue-500 text-white shadow-lg transform group-hover:-rotate-6 transition-transform">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                    </div>
                </div>
            </div>

            <!-- Kartu Disposisi -->
            <div class="group relative flex flex-col bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-amber-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Total Disposisi</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 counter-value" data-target="{{ $totalDisposisi }}">0</h3>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-400 text-white shadow-lg transform group-hover:rotate-6 transition-transform">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                    </div>
                </div>
            </div>

            <!-- Kartu Pengguna -->
            <div class="group relative flex flex-col bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-purple-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Total Pengguna</p>
                        <h3 class="text-3xl font-extrabold text-gray-800 counter-value" data-target="{{ $totalUser }}">0</h3>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-600 to-indigo-500 text-white shadow-lg transform group-hover:-rotate-6 transition-transform">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. GRAFIK DAN DATA TERBARU -->
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-6 mt-6">
            
            <!-- Area Grafik ApexCharts (Lebar 2 Kolom) -->
            <div class="col-span-1 lg:col-span-2 relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
              <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="w-max rounded-lg bg-gray-900 p-5 text-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      aria-hidden="true"
                      class="h-6 w-6"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"
                      ></path>
                    </svg>
                  </div>
                  <div>
                    <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                      Statistik Volume Arsip Bulanan
                    </h6>
                    <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                      Visualisasi data jumlah surat masuk dan keluar per bulan secara langsung.
                    </p>
                  </div>
                </div>

                <!-- Dropdown Pilih Tahun (Tanpa Reload) -->
                <div class="flex items-center gap-2 mr-2">
                  <label for="yearFilter" class="text-xs font-bold text-gray-500 uppercase">Tahun:</label>
                  <select id="yearFilter"
                          class="rounded-xl border border-gray-200 text-sm font-bold text-gray-700 py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                      @foreach ($availableYears as $year)
                          <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="pt-6 px-0 pb-0 w-full">
                <div id="bar-chart"></div>
              </div>
            </div>

            <!-- Area Surat Masuk Terbaru (Lebar 1 Kolom) -->
            <div class="col-span-1 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                <div class="flex items-center justify-between mb-5">
                    <h4 class="text-lg font-bold text-gray-800">Surat Masuk Terbaru</h4>
                    <a href="{{ route('surat-masuk.index') }}" class="text-sm font-semibold text-[#15803d] hover:text-[#115e3b] hover:underline">Lihat Semua</a>
                </div>
                
                <div class="flex-1 overflow-y-auto pr-2 no-scrollbar">
                    <!-- STRUKTUR FORELSE YANG BENAR -->
                    @forelse($suratMasukTerbaru as $surat)
                        <div class="mb-4 flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-100 text-[#15803d]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-bold text-gray-800 truncate">{{ $surat->asal_surat }}</h5>
                                <p class="text-xs text-gray-500 truncate mt-0.5">{{ $surat->isi_ringkas }}</p>
                                <p class="text-[10px] font-semibold text-[#15803d] mt-1">{{ \Carbon\Carbon::parse($surat->tgl_surat)->translatedFormat('d M Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-full text-center text-gray-400 py-10">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            <p class="text-sm">Belum ada data surat masuk.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Script ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- SCRIPT JS UNTUK ANIMASI & APEXCHARTS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // 1. Animasi Penghitung Angka
            const counters = document.querySelectorAll('.counter-value');
            const speed = 200; 
            
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const inc = target / speed;
                    
                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 10);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });

            // 2. Inisialisasi ApexCharts
            const allYearsData = @json($monthlyDataByYear);
            const selectedYear = "{{ $selectedYear }}";
            const initialData = allYearsData[selectedYear] || [0, 0, 0, 0, 0, 0, 0, 0, 0];

            const chartConfig = {
              series: [
                {
                  name: "Total Arsip",
                  data: initialData,
                },
              ],
              chart: {
                type: "bar",
                height: 240,
                toolbar: {
                  show: false,
                },
                animations: {
                  enabled: true,
                  easing: 'easeinout',
                  speed: 800,
                  animateGradually: {
                    enabled: true,
                    delay: 100
                  },
                  dynamicAnimation: {
                    enabled: true,
                    speed: 600
                  }
                }
              },
              title: {
                show: "",
              },
              dataLabels: {
                enabled: false,
              },
              colors: ["#0ea5e9"],
              plotOptions: {
                bar: {
                  columnWidth: "45%",
                  borderRadius: 6,
                },
              },
              xaxis: {
                axisTicks: {
                  show: false,
                },
                axisBorder: {
                  show: false,
                },
                labels: {
                  style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                  },
                },
                categories: [
                  "Apr",
                  "May",
                  "Jun",
                  "Jul",
                  "Aug",
                  "Sep",
                  "Oct",
                  "Nov",
                  "Dec",
                ],
              },
              yaxis: {
                max: 50,
                labels: {
                  style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                  },
                },
              },
              grid: {
                show: true,
                borderColor: "#dddddd",
                strokeDashArray: 5,
                xaxis: {
                  lines: {
                    show: true,
                  },
                },
                padding: {
                  top: 5,
                  right: 0,
                  left: 10,
                  bottom: 0
                },
              },
              fill: {
                type: "gradient",
                gradient: {
                  shade: "light",
                  type: "vertical",
                  shadeIntensity: 0.3,
                  gradientToColors: ["#2563eb"],
                  inverseColors: false,
                  opacityFrom: 0.85,
                  opacityTo: 0.55,
                  stops: [0, 100]
                }
              },
              tooltip: {
                theme: "dark",
              },
            };
             
            const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);
            chart.render();

            // 3. Listener Perubahan Tahun Tanpa Reload
            document.getElementById('yearFilter').addEventListener('change', function () {
                const year = this.value;
                const newData = allYearsData[year] || [0, 0, 0, 0, 0, 0, 0, 0, 0];
                
                // Reset data ke 0 secara instan tanpa animasi agar bisa naik lagi seperti air pasang
                chart.updateSeries([
                    {
                        name: "Total Arsip",
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0]
                    }
                ], false);
                
                // Jalankan animasi naik secara bertahap setelah delay singkat
                setTimeout(() => {
                    chart.updateSeries([
                        {
                            name: "Total Arsip",
                            data: newData
                        }
                    ], true);
                }, 150);
            });
        });
    </script>
</x-app-layout>
