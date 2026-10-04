<?php

namespace App\Filament\Resources\Hampers\Schemas;

use App\Models\Hamper;
use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HamperForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Hamper')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Hamper')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->helperText('Gunakan huruf kecil dan tanda hubung, misalnya hamper-lebaran-2024.')
                            ->required()
                            ->alphaDash()
                            ->maxLength(255)
                            ->unique(Hamper::class, 'slug', ignoreRecord: true),
                        TextInput::make('price')
                            ->label('Harga (angka)')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->prefix('Rp'),
                        TextInput::make('badge_label')
                            ->label('Label Badge (opsional)')
                            ->helperText('Contoh: Best Seller, Limited Edition, Pre-Order')
                            ->maxLength(80),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->helperText('Deskripsi yang akan ditampilkan di kartu produk')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->maxLength(30)
                            ->default('6281234567890'),
                        Textarea::make('keywords')
                            ->label('Kata Kunci Pencarian')
                            ->helperText('Kata kunci untuk SEO dan pencarian')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Isi Hamper')
                    ->description('Daftar produk yang ada dalam hamper ini')
                    ->schema([
                        Repeater::make('contents')
                            ->label('Item dalam Hamper')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Item')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('quantity')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1),
                                TextInput::make('unit')
                                    ->label('Satuan')
                                    ->helperText('Contoh: pcs, box, buah')
                                    ->maxLength(50),
                                Textarea::make('description')
                                    ->label('Deskripsi (opsional)')
                                    ->rows(2),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->addActionLabel('Tambah Item')
                            ->defaultItems(1),
                    ]),

                Section::make('Spesifikasi & Detail')
                    ->schema([
                        TagsInput::make('specifications')
                            ->label('Spesifikasi')
                            ->helperText('Informasi singkat seperti ukuran, berat, dll')
                            ->placeholder('Tambah spesifikasi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Gambar Hamper')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->helperText('JPEG, PNG, atau WebP hingga 10 MB. Otomatis di-resize dan disimpan sebagai WebP.')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('hampers')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->imageEditor()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer())->store($file->getRealPath(), 'hampers');
                            })
                            ->columnSpanFull(),
                        FileUpload::make('images')
                            ->label('Gambar Tambahan (Galeri)')
                            ->helperText('Upload beberapa gambar untuk ditampilkan sebagai galeri')
                            ->image()
                            ->multiple()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('hampers/gallery')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->maxFiles(6)
                            ->imageEditor()
                            ->reorderable()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer())->store($file->getRealPath(), 'hampers/gallery');
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Status & Publikasi')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_available')
                            ->label('Tersedia untuk Dipesan')
                            ->default(true),
                        Toggle::make('is_active')
                            ->label('Tampilkan di Website')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->helperText('Angka lebih kecil akan ditampilkan lebih dulu')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ]),
            ]);
    }
}