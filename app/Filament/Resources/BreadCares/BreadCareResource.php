<?php

namespace App\Filament\Resources\BreadCares;

use App\Filament\Resources\BreadCares\Pages\CreateBreadCare;
use App\Filament\Resources\BreadCares\Pages\EditBreadCare;
use App\Filament\Resources\BreadCares\Pages\ListBreadCares;
use App\Filament\Resources\BreadCares\Schemas\BreadCareForm;
use App\Filament\Resources\BreadCares\Tables\BreadCaresTable;
use App\Models\BreadCare;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BreadCareResource extends Resource
{
    protected static ?string $model = BreadCare::class;

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedLightBulb;

    protected static ?string $navigationLabel = 'Bread Care';

    protected static string | \UnitEnum | null $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return 'bread care';
    }

    public static function getPluralModelLabel(): string
    {
        return 'bread care';
    }

    public static function form(Schema $schema): Schema
    {
        return BreadCareForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BreadCaresTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBreadCares::route('/'),
            'create' => CreateBreadCare::route('/create'),
            'edit' => EditBreadCare::route('/{record}/edit'),
        ];
    }
}