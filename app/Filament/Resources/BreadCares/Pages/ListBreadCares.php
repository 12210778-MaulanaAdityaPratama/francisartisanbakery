<?php

namespace App\Filament\Resources\BreadCares\Pages;

use App\Filament\Resources\BreadCares\BreadCareResource;
use Filament\Resources\Pages\ListRecords;

class ListBreadCares extends ListRecords
{
    protected static string $resource = BreadCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}