<div class="space-y-3 text-sm">
    <div>
        <div class="font-semibold">Tanggal Terima</div>
        <div>{{ optional($record->tgl_terima)->format('d M Y') }}</div>
    </div>

    <div>
        <div class="font-semibold">Tanggal Surat</div>
        <div>{{ optional($record->tgl_surat)->format('d M Y') }}</div>
    </div>

    <div>
        <div class="font-semibold">Nomor Surat</div>
        <div>{{ $record->no_surat }}</div>
    </div>

    <div>
        <div class="font-semibold">Pengirim</div>
        <div>{{ $record->pengirim ?: '-' }}</div>
    </div>

    <div>
        <div class="font-semibold">Unit Pengolah</div>
        <div>{{ $record->unitPengolah->nama ?? '-' }}</div>
    </div>

    <div>
        <div class="font-semibold">Perihal</div>
        <div>{{ $record->perihal }}</div>
    </div>

    <div>
        <div class="font-semibold">Kontak Person</div>
        <div>{{ $record->kontak_person ?: '-' }}</div>
    </div>

    <div>
        <div class="font-semibold">Catatan</div>
        <div>{{ $record->catatan }}</div>
    </div>
</div>