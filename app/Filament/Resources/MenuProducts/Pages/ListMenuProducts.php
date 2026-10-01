<?php

namespace App\Filament\Resources\MenuProducts\Pages;

use App\Filament\Resources\MenuProducts\MenuProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMenuProducts extends ListRecords
{
    protected static string $resource = MenuProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
