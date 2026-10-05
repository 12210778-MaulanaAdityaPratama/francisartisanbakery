<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Lowongan')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('employment_type')
                            ->label('Tipe Pekerjaan')
                            ->helperText('Contoh: Full Time atau Full Time / Part Time')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('location')
                            ->label('Lokasi')
                            ->required()
                            ->maxLength(150),
                        Textarea::make('description')
                            ->label('Deskripsi Pekerjaan')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        TextInput::make('application_email')
                            ->label('Email Lamaran')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->default('hrd@francisartisanbakery.com')
                            ->columnSpanFull(),
                    ]),
                Section::make('Publikasi')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Tampilkan di halaman Career')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->minValue(0)
                            ->default(0),
                    ]),
            ]);
    }
}
