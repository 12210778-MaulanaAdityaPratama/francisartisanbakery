<?php

namespace App\Filament\Resources\Hampers;

use App\Filament\Resources\Hampers\Pages\CreateHamper;
use App\Filament\Resources\Hampers\Pages\EditHamper;
use App\Filament\Resources\Hampers\Pages\ListHampers;
use App\Filament\Resources\Hampers\Schemas\HamperForm;
use App\Filament\Resources\Hampers\Tables\HampersTable;
use App\Models\Hamper;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HamperResource extends Resource
{
    protected static ?string $model = Hamper::class;

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedGift;

    protected static ?string $navigationLabel = 'Hampers';

    protected static string | \UnitEnum | null $navigationGroup = 'Katalog';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return 'hamper';
    }

    public static function getPluralModelLabel(): string
    {
        return 'hampers';
    }

    public static function form(Schema $schema): Schema
    {
        return HamperForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HampersTable::configure($table);
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
            'index' => ListHampers::route('/'),
            'create' => CreateHamper::route('/create'),
            'edit' => EditHamper::route('/{record}/edit'),
        ];
    }
}