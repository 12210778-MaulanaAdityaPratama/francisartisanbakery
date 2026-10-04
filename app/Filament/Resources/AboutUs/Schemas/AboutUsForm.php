<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->helperText('Contoh: Tentang Francis Artisan Bakery')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('subtitle')
                            ->label('Sub-judul / Tagline')
                            ->helperText('Contoh: Memanggang dengan Hati, Sejak 2018')
                            ->rows(2)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->label('Konten Utama')
                            ->helperText('Cerita dan deskripsi lengkap tentang bakery Anda')
                            ->required()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike',
                                'h2', 'h3',
                                'bulletList', 'orderedList',
                                'blockquote', 'link',
                                'undo', 'redo',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Foto Utama')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto / Banner Tentang Kami')
                            ->helperText('JPEG, PNG, atau WebP hingga 10 MB. Rasio yang direkomendasikan 16:9.')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('about')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->imageEditor()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer())->store($file->getRealPath(), 'about');
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Nilai-nilai Perusahaan')
                    ->description('Filosofi dan nilai inti yang dipegang bakery Anda')
                    ->schema([
                        Repeater::make('values')
                            ->label('Nilai Perusahaan')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Nama Nilai')
                                    ->required()
                                    ->maxLength(100),
                                TextInput::make('icon')
                                    ->label('Icon (emoji atau heroicon)')
                                    ->helperText('Contoh: ❤️ atau heroicon-o-heart')
                                    ->maxLength(80),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->required()
                                    ->rows(3),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->addActionLabel('Tambah Nilai')
                            ->defaultItems(0),
                    ]),

                Section::make('Tim / Founder')
                    ->description('Perkenalkan orang-orang di balik bakery Anda')
                    ->schema([
                        Repeater::make('team_members')
                            ->label('Anggota Tim')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->maxLength(150),
                                TextInput::make('role')
                                    ->label('Jabatan / Peran')
                                    ->required()
                                    ->maxLength(150),
                                Textarea::make('bio')
                                    ->label('Bio singkat')
                                    ->rows(3),
                                FileUpload::make('photo')
                                    ->label('Foto')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->disk('public')
                                    ->directory('about/team')
                                    ->visibility('public')
                                    ->maxSize(5120),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => isset($state['name']) ? $state['name'].' — '.($state['role'] ?? '') : null)
                            ->addActionLabel('Tambah Anggota Tim')
                            ->defaultItems(0),
                    ]),

                Section::make('Sejarah & Pencapaian')
                    ->description('Timeline perkembangan bakery Anda')
                    ->schema([
                        Repeater::make('milestones')
                            ->label('Pencapaian')
                            ->schema([
                                TextInput::make('year')
                                    ->label('Tahun')
                                    ->required()
                                    ->maxLength(10),
                                TextInput::make('title')
                                    ->label('Judul Pencapaian')
                                    ->required()
                                    ->maxLength(200),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(2),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => isset($state['year']) ? $state['year'].' — '.($state['title'] ?? '') : null)
                            ->addActionLabel('Tambah Pencapaian')
                            ->defaultItems(0),
                    ]),

                Section::make('Kontak & Alamat')
                    ->columns(2)
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Email Kontak')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('contact_phone')
                            ->label('Telepon / WhatsApp')
                            ->tel()
                            ->maxLength(30),
                        Textarea::make('address')
                            ->label('Alamat Lengkap')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Status')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif / Tampilkan')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}