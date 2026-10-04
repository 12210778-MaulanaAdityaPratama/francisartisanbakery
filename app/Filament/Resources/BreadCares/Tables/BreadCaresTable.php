<?php

namespace App\Filament\Resources\BreadCares\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BreadCaresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->size(60)
                    ->disk('public')
                    ->defaultImageUrl(url('/images/placeholder.png')),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->limit(40),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Storage' => 'info',
                        'Reheating' => 'warning',
                        'Freezing' => 'primary',
                        'Serving' => 'success',
                        'Freshness' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'Storage' => 'Penyimpanan',
                        'Reheating' => 'Memanaskan',
                        'Freezing' => 'Pembekuan',
                        'Serving' => 'Penyajian',
                        'Freshness' => 'Kesegaran',
                        'General' => 'Umum',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('icon')
                    ->label('Icon')
                    ->alignCenter()
                    ->default('-'),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Storage' => 'Penyimpanan',
                        'Reheating' => 'Memanaskan Kembali',
                        'Freezing' => 'Pembekuan',
                        'Serving' => 'Penyajian',
                        'Freshness' => 'Menjaga Kesegaran',
                        'General' => 'Umum',
                    ]),
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }
}