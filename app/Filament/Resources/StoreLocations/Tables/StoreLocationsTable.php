<?php

namespace App\Filament\Resources\StoreLocations\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class StoreLocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('public')->square(),
                TextColumn::make('name')->label('Nama gerai')->searchable()->sortable(),
                TextColumn::make('area')->label('Area')->searchable()->sortable(),
                TextColumn::make('type_label')->label('Tipe')->searchable(),
                TextColumn::make('phone')->label('Telepon'),
                ToggleColumn::make('is_active')->label('Tampil')->sortable(),
                TextColumn::make('sort_order')->label('Urutan')->sortable(),
            ])
            ->filters([
                SelectFilter::make('area')->label('Area')->options(fn (): array => \App\Models\StoreLocation::query()->distinct()->orderBy('area')->pluck('area', 'area')->all()),
                TernaryFilter::make('is_flagship')->label('Flagship'),
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
