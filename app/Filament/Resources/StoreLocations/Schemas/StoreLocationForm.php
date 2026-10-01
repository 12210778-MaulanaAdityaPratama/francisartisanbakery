<?php

namespace App\Filament\Resources\StoreLocations\Schemas;

use App\Models\StoreLocation;
use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class StoreLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi gerai')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')->label('Nama gerai')->required()->maxLength(255),
                        TextInput::make('slug')
                            ->label('ID gerai')
                            ->helperText('Gunakan ID singkat untuk menghubungkan kartu dengan marker peta, misalnya sunter.')
                            ->required()
                            ->alphaDash()
                            ->maxLength(100)
                            ->unique(StoreLocation::class, 'slug', ignoreRecord: true),
                        TextInput::make('area')->label('Area / kota')->required()->maxLength(100),
                        TextInput::make('type_label')->label('Tipe gerai')->required()->maxLength(100),
                        Textarea::make('address')->label('Alamat lengkap')->required()->rows(3)->columnSpanFull(),
                        TextInput::make('operating_hours')->label('Jam operasional')->required()->maxLength(150),
                        TextInput::make('phone')->label('Telepon yang ditampilkan')->tel()->required()->maxLength(40),
                        TextInput::make('whatsapp_number')->label('Nomor WhatsApp')->tel()->required()->maxLength(30),
                        TextInput::make('maps_url')->label('Tautan Google Maps')->url()->required()->columnSpanFull(),
                        Textarea::make('keywords')->label('Kata kunci pencarian')->rows(2)->columnSpanFull(),
                    ]),
                Section::make('Foto dan fasilitas')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto gerai')
                            ->helperText('JPEG, PNG, atau WebP hingga 10 MB. Otomatis di-resize dan disimpan sebagai WebP.')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('stores')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->imageEditor()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer())->store($file->getRealPath(), 'stores');
                            })
                            ->columnSpanFull(),
                        Repeater::make('facilities')
                            ->label('Fasilitas gerai')
                            ->simple(TextInput::make('facility')->required()->maxLength(120))
                            ->addActionLabel('Tambah fasilitas'),
                    ]),
                Section::make('Peta dan status')
                    ->columns(2)
                    ->schema([
                        TextInput::make('latitude')->label('Latitude')->numeric()->required()->minValue(-90)->maxValue(90)->step('0.0000001'),
                        TextInput::make('longitude')->label('Longitude')->numeric()->required()->minValue(-180)->maxValue(180)->step('0.0000001'),
                        Toggle::make('is_flagship')->label('Gerai flagship')->default(false),
                        Toggle::make('is_active')->label('Tampilkan di halaman Store')->default(true),
                        TextInput::make('sort_order')->label('Urutan tampil')->numeric()->default(0)->minValue(0),
                    ]),
            ]);
    }
}
