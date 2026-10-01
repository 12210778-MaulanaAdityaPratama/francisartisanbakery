<?php

namespace App\Filament\Resources\MenuProducts;

use App\Filament\Resources\MenuProducts\Pages\CreateMenuProduct;
use App\Filament\Resources\MenuProducts\Pages\EditMenuProduct;
use App\Filament\Resources\MenuProducts\Pages\ListMenuProducts;
use App\Filament\Resources\MenuProducts\Schemas\MenuProductForm;
use App\Filament\Resources\MenuProducts\Tables\MenuProductsTable;
use App\Models\MenuProduct;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MenuProductResource extends Resource
{
    protected static ?string $model = MenuProduct::class;

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Katalog Menu';

    protected static string | \UnitEnum | null $navigationGroup = 'Katalog';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return 'produk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'produk menu';
    }

    public static function form(Schema $schema): Schema
    {
        return MenuProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenuProductsTable::configure($table);
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
            'index' => ListMenuProducts::route('/'),
            'create' => CreateMenuProduct::route('/create'),
            'edit' => EditMenuProduct::route('/{record}/edit'),
        ];
    }
}
