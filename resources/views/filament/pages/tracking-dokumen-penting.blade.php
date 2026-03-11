<x-filament-panels::page>
    <div class="grid gap-4">
        <x-filament::section>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <div class="text-gray-500">Dari Tanggal</div>
                    <div class="font-medium">
                        {{ $this->tanggal_awal ? \Illuminate\Support\Carbon::parse($this->tanggal_awal)->format('d M Y') : '-' }}
                    </div>
                </div>

                <div>
                    <div class="text-gray-500">Sampai Tanggal</div>
                    <div class="font-medium">
                        {{ $this->tanggal_akhir ? \Illuminate\Support\Carbon::parse($this->tanggal_akhir)->format('d M Y') : '-' }}
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{ $this->table }}
    </div>
</x-filament-panels::page>