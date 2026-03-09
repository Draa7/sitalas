<?php

namespace App\Filament\Resources\SopdApproves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\TambahSuratKeluar;
use App\Models\ListBiro;
use Illuminate\Support\Facades\DB;

class SopdApprovesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),

                TextColumn::make('UnitPengolah.direktorat')
                    ->label('Unit Pengolah')
                    ->sortable(),

                TextColumn::make('Kode.kode')
                    ->label('Kode Surat')
                    ->sortable(),

                TextColumn::make('perihal')
                    ->label('Perihal')
                    ->searchable(),

                TextColumn::make('kepada')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('kontak_person')
                    ->label('No Hp')
                    ->searchable(),

                TextColumn::make('upload_file')
                    ->searchable(),

                TextColumn::make('Klasifikasi.klasifikasi')
                    ->label('Klasifikasi')
                    ->sortable(),

                TextColumn::make('tambahSuratKeluar.status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'diterima',
                        'danger' => 'ditolak',
                        'secondary' => 'belum request',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),

                Action::make('terima')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->tambahSuratKeluar?->status === 'pending')
                    ->action(function ($record) {
                        DB::transaction(function () use ($record) {
                            $surat = TambahSuratKeluar::find($record->tambah_surat_keluar_id);

                            if (! $surat) {
                                Notification::make()
                                    ->title('Data surat keluar tidak ditemukan')
                                    ->danger()
                                    ->send();

                                return;
                            }

                            ListBiro::create([
                                'tambah_surat_keluar_id' => $record->tambah_surat_keluar_id,
                                'tanggal_surat' => $record->tanggal_surat,
                                'klasifikasi_id' => $record->klasifikasi_id,
                                'no_urut' => $record->no_urut,
                                'kode_id' => $record->kode_id,
                                'no_surat' => $record->no_surat,
                                'sifat_surat_id' => $record->sifat_surat_id,
                                'perihal' => $record->perihal,
                                'direktorat_id' => $record->direktorat_id,
                                'kontak_person' => $record->kontak_person,
                                'kepada' => $record->kepada,
                                'keterangan' => $record->keterangan,
                                'upload_file' => $record->upload_file,
                                'lampiran' => $record->lampiran,
                            ]);

                            $surat->update([
                                'status' => 'diterima',
                                'alasan_penolakan' => null,
                            ]);

                            $record->delete();
                        });

                        Notification::make()
                            ->title('Pengajuan berhasil diterima dan dipindahkan ke List Biro')
                            ->success()
                            ->send();
                    }),

                        Action::make('tolak')
                            ->label('Tolak')
                            ->icon('heroicon-o-x-circle')
                            ->color('danger')
                            ->visible(fn ($record) => $record->tambahSuratKeluar?->status === 'pending')
                            ->form([
                                Textarea::make('alasan_penolakan')
                                    ->label('Alasan Penolakan')
                                    ->default('surat ini harus di perbaiki')
                                    ->required(),
                            ])
                            ->action(function ($record, array $data) {
                                DB::transaction(function () use ($record, $data) {
                                    $surat = TambahSuratKeluar::find($record->tambah_surat_keluar_id);

                                    if (! $surat) {
                                        Notification::make()
                                            ->title('Data surat keluar tidak ditemukan')
                                            ->danger()
                                            ->send();

                                        return;
                                    }

                                    $surat->update([
                                        'status' => 'ditolak',
                                        'alasan_penolakan' => $data['alasan_penolakan'],
                                    ]);

                                    $record->delete();
                                });

                                Notification::make()
                                    ->title('Pengajuan berhasil ditolak')
                                    ->success()
                                    ->send();
                            }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}