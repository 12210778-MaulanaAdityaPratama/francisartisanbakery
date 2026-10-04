<?php

namespace App\Filament\Resources\Hampers\Pages;

use App\Filament\Resources\Hampers\HamperResource;
use Filament\Resources\Pages\ListRecords;

class ListHampers extends ListRecords
{
    protected static string $resource = HamperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}