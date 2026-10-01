<?php

namespace App\Filament\Resources\MenuProducts\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MenuProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('public')->square(),
                TextColumn::make('name')->label('Nama produk')->searchable()->sortable(),
                TextColumn::make('category_label')->label('Kategori')->searchable()->sortable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn (int $state): string => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                TextColumn::make('badge_label')->label('Label')->placeholder('-')->searchable(),
                ToggleColumn::make('is_active')->label('Tampil')->sortable(),
                TextColumn::make('updated_at')->label('Diubah')->dateTime('d M Y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Sourdough' => 'Artisan Sourdough',
                        'Pastry' => 'Viennoiserie & Pastry',
                        'Savory' => 'Savory & Flatbread',
                        'Sweet' => 'Pastry Manis',
                        'Coffee' => 'Kopi & Minuman',
                    ]),
                TernaryFilter::make('is_active')->label('Status tampil')->trueLabel('Aktif')->falseLabel('Disembunyikan'),
            ])
            ->defaultSort('sort_order')
            ->defaultPaginationPageOption(25)
            ->paginationPageOptions([10, 25, 50])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
