<?php

namespace App\Filament\Resources\MenuProducts\Pages;

use App\Filament\Resources\MenuProducts\MenuProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMenuProduct extends EditRecord
{
    protected static string $resource = MenuProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
