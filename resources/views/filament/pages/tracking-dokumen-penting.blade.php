<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section compact>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <div class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400">
                        Report Overview
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                            Tracking Dokumen Penting
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Menampilkan data dokumen penting berdasarkan periode tanggal penerimaan.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 pt-1">
                        <span class="inline-flex items-center rounded-lg border border-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700 dark:border-white/10 dark:text-gray-300">
                            Periode:
                            <span class="ml-2 font-semibold text-gray-950 dark:text-white">
                                {{ $this->tanggal_awal ? \Illuminate\Support\Carbon::parse($this->tanggal_awal)->translatedFormat('d M Y') : '-' }}
                                <span class="mx-1 text-gray-400">s/d</span>
                                {{ $this->tanggal_akhir ? \Illuminate\Support\Carbon::parse($this->tanggal_akhir)->translatedFormat('d M Y') : '-' }}
                            </span>
                        </span>
                    </div>
                </div>

                <div class="shrink-0">
                    <div class="inline-flex items-center rounded-xl bg-primary-50 px-4 py-3 text-sm font-medium text-primary-700 ring-1 ring-inset ring-primary-200 dark:bg-primary-500/10 dark:text-primary-400 dark:ring-primary-500/20">
                        Laporan Aktif
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{ $this->table }}
    </div>
</x-filament-panels::page>