<?php

namespace App\Filament\Resources\BreadCares\Pages;

use App\Filament\Resources\BreadCares\BreadCareResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBreadCare extends EditRecord
{
    protected static string $resource = BreadCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}