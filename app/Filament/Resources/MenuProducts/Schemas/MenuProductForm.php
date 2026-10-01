<?php

namespace App\Filament\Resources\MenuProducts\Schemas;

use App\Models\MenuProduct;
use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MenuProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi produk')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')->label('Nama produk')->required()->maxLength(255),
                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->helperText('Gunakan huruf kecil dan tanda hubung, misalnya sourdough-classic.')
                            ->required()
                            ->alphaDash()
                            ->maxLength(255)
                            ->unique(MenuProduct::class, 'slug', ignoreRecord: true),
                        Select::make('category')
                            ->label('Kategori filter')
                            ->options([
                                'Sourdough' => 'Artisan Sourdough',
                                'Pastry' => 'Viennoiserie & Pastry',
                                'Savory' => 'Savory & Flatbread',
                                'Sweet' => 'Pastry Manis',
                                'Coffee' => 'Kopi & Minuman',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('category_label')->label('Label kategori')->required()->maxLength(150),
                        Textarea::make('description')->label('Deskripsi')->required()->rows(4)->columnSpanFull(),
                        TextInput::make('price')->label('Harga (angka)')->numeric()->required()->minValue(0)->prefix('Rp'),
                        TextInput::make('badge_label')->label('Label produk')->maxLength(80),
                        TextInput::make('whatsapp_number')->label('Nomor WhatsApp')->tel()->maxLength(30),
                        TagsInput::make('specifications')->label('Spesifikasi pada kartu')->placeholder('Tambah spesifikasi'),
                        Textarea::make('keywords')->label('Kata kunci pencarian')->rows(2)->columnSpanFull(),
                    ]),
                Section::make('Foto dan publikasi')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto produk')
                            ->helperText('JPEG, PNG, atau WebP hingga 10 MB. Otomatis di-resize dan disimpan sebagai WebP.')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('menu/products')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->imageEditor()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer())->store($file->getRealPath(), 'menu/products');
                            })
                            ->columnSpanFull(),
                        Toggle::make('is_available')->label('Tersedia untuk dipesan')->default(true),
                        Toggle::make('is_active')->label('Tampilkan di halaman menu')->default(true),
                        TextInput::make('sort_order')->label('Urutan tampil')->numeric()->default(0)->minValue(0),
                    ]),
                Section::make('Detail produk')
                    ->schema([
                        Repeater::make('details')
                            ->label('Informasi pada dialog detail')
                            ->schema([
                                TextInput::make('label')->label('Label')->required()->maxLength(100),
                                TextInput::make('value')->label('Isi')->required()->maxLength(255),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->addActionLabel('Tambah detail'),
                    ]),
            ]);
    }
}
