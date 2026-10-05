<?php

namespace App\Filament\Resources\BreadCares\Schemas;

use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BreadCareForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Tips')
                            ->helperText('Contoh: Cara Menyimpan Sourdough dengan Benar')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Storage' => 'Penyimpanan',
                                'Reheating' => 'Memanaskan Kembali',
                                'Freezing' => 'Pembekuan',
                                'Serving' => 'Penyajian',
                                'Freshness' => 'Menjaga Kesegaran',
                                'General' => 'Umum',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('icon')
                            ->label('Icon (emoji atau heroicon)')
                            ->helperText('Contoh: 🍞 atau heroicon-o-cake')
                            ->maxLength(80),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->helperText('Ringkasan singkat yang akan ditampilkan di kartu')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Konten Lengkap')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Konten Detail')
                            ->helperText('Penjelasan lengkap dan detail tentang cara perawatan roti')
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

                Section::make('Tips Poin-poin')
                    ->description('Tips dalam bentuk poin-poin yang mudah dibaca')
                    ->schema([
                        Repeater::make('tips')
                            ->label('Daftar Tips')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Tip (opsional)')
                                    ->maxLength(150),
                                Textarea::make('content')
                                    ->label('Isi Tip')
                                    ->required()
                                    ->rows(2),
                            ])
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? substr($state['content'] ?? '', 0, 50).'...')
                            ->addActionLabel('Tambah Tip')
                            ->defaultItems(0),
                    ]),

                Section::make('Gambar Ilustrasi')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto Ilustrasi (opsional)')
                            ->helperText('JPEG, PNG, atau WebP hingga 10 MB')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->disk('public')
                            ->directory('bread-care')
                            ->visibility('public')
                            ->maxSize(10240)
                            ->imageEditor()
                            ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                return (new WebpImageOptimizer)->store($file->getRealPath(), 'bread-care');
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Status & Urutan')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif / Tampilkan')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->helperText('Angka lebih kecil tampil lebih dulu')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ]),
            ]);
    }
}
