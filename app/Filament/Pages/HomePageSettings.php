<?php

namespace App\Filament\Pages;

use App\Models\HomePageSetting;
use App\Support\WebpImageOptimizer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HomePageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationLabel = 'Halaman Home';

    protected static string | \UnitEnum | null $navigationGroup = 'Konten';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.home-page-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = HomePageSetting::singleton()->toArray();

        foreach (HomePageSetting::defaults() as $section => $defaults) {
            $sectionData = $settings[$section] ?? [];

            foreach ($defaults as $key => $default) {
                if (blank($sectionData[$key] ?? null)) {
                    $sectionData[$key] = $default;
                }
            }

            $settings[$section] = $sectionData;
        }

        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero')
                    ->columns(2)
                    ->schema([
                        TextInput::make('hero.eyebrow')->label('Label atas')->maxLength(120),
                        TextInput::make('hero.price_label')->label('Label harga')->maxLength(80),
                        Textarea::make('hero.title')->label('Judul')->rows(2)->maxLength(200),
                        TextInput::make('hero.price_value')->label('Harga mulai dari')->maxLength(80),
                        Textarea::make('hero.description')->label('Deskripsi')->rows(3)->columnSpanFull(),
                        TextInput::make('hero.cta_label')->label('Teks tombol')->maxLength(100),
                        TextInput::make('hero.cta_url')->label('Tujuan tombol')->maxLength(255),
                    ]),
                Section::make('Produk Hari Ini')
                    ->schema([
                        TextInput::make('daily.eyebrow')->label('Label bagian')->maxLength(120),
                        Textarea::make('daily.title')->label('Judul')->rows(2)->maxLength(200),
                        Textarea::make('daily.description')->label('Deskripsi')->rows(3),
                        TextInput::make('daily.open_time')->label('Jam buka')->maxLength(80),
                        TextInput::make('daily.close_time')->label('Jam tutup')->maxLength(80),
                        TextInput::make('daily.closed_day')->label('Hari libur')->maxLength(80),
                        Repeater::make('daily.products')
                            ->label('Daftar produk harian')
                            ->schema([
                                TextInput::make('name')->label('Nama')->maxLength(150),
                                TextInput::make('description')->label('Keterangan')->maxLength(255),
                                TextInput::make('status')->label('Status')->maxLength(80),
                                TextInput::make('slug')->label('ID detail produk')->maxLength(100),
                            ])
                            ->columns(2)
                            ->reorderable(),
                    ]),
                Section::make('Proses')
                    ->schema([
                        TextInput::make('process.eyebrow')->label('Label bagian')->maxLength(120),
                        TextInput::make('process.title')->label('Judul')->maxLength(200),
                        Repeater::make('process.steps')
                            ->label('Tahapan proses')
                            ->schema([
                                TextInput::make('time')->label('Waktu')->maxLength(120),
                                TextInput::make('title')->label('Nama tahap')->maxLength(150),
                                Textarea::make('description')->label('Deskripsi')->rows(3)->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->reorderable(),
                    ]),
                Section::make('Identitas Toko')
                    ->schema([
                        TextInput::make('identity.eyebrow')->label('Label bagian')->maxLength(120),
                        TextInput::make('identity.title')->label('Judul')->maxLength(200),
                        TextInput::make('identity.since_year')->label('Tahun berdiri')->maxLength(10),
                        TextInput::make('identity.location')->label('Lokasi singkat')->maxLength(150),
                        Repeater::make('identity.points')
                            ->label('Nilai dan komitmen')
                            ->schema([
                                TextInput::make('title')->label('Judul')->maxLength(150),
                                Textarea::make('description')->label('Deskripsi')->rows(3),
                            ])
                            ->reorderable(),
                    ]),
                Section::make('Menu Unggulan')
                    ->schema([
                        TextInput::make('featured_menu.eyebrow')->label('Label bagian')->maxLength(120),
                        TextInput::make('featured_menu.title')->label('Judul')->maxLength(200),
                        TextInput::make('featured_menu.cta_label')->label('Teks tombol')->maxLength(100),
                        TextInput::make('featured_menu.cta_url')->label('Tujuan tombol')->maxLength(255),
                        Repeater::make('featured_menu.products')
                            ->label('Produk unggulan')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Foto produk')
                                    ->helperText('JPEG, PNG, atau WebP hingga 10 MB. Otomatis di-resize dan disimpan sebagai WebP.')
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->disk('public')
                                    ->directory('home/featured-menu')
                                    ->visibility('public')
                                    ->maxSize(10240)
                                    ->imageEditor()
                                    ->saveUploadedFileUsing(function (FileUpload $component, TemporaryUploadedFile $file): string {
                                        return (new WebpImageOptimizer())->store($file->getRealPath(), 'home/featured-menu');
                                    })
                                    ->columnSpanFull(),
                                TextInput::make('category')->label('Kategori')->maxLength(100),
                                TextInput::make('name')->label('Nama')->maxLength(150),
                                Textarea::make('description')->label('Deskripsi')->rows(3)->columnSpanFull(),
                                TextInput::make('price')->label('Harga (angka)')->numeric()->minValue(0),
                                TextInput::make('slug')->label('ID detail produk')->maxLength(100),
                            ])
                            ->columns(2)
                            ->reorderable(),
                    ]),
                Section::make('Pemesanan dan Kontak')
                    ->columns(2)
                    ->schema([
                        TextInput::make('order_section.eyebrow')->label('Label bagian')->maxLength(120),
                        Textarea::make('order_section.title')->label('Judul')->rows(2)->maxLength(200),
                        Textarea::make('order_section.description')->label('Deskripsi')->rows(3)->columnSpanFull(),
                        TextInput::make('order_section.whatsapp')->label('Nomor WhatsApp')->tel()->maxLength(30),
                        TextInput::make('order_section.address')->label('Alamat')->maxLength(255),
                        TextInput::make('order_section.business_hours')->label('Jam operasional')->maxLength(150)->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        HomePageSetting::singleton()->update($this->form->getState());

        Notification::make()
            ->title('Pengaturan halaman Home berhasil disimpan')
            ->success()
            ->send();
    }
}
