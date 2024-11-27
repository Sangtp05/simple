<?php

namespace App\Filament\Resources\ProductLibraryImageResource\Pages;

use App\Filament\Resources\ProductLibraryImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductLibraryImages extends ListRecords
{
    protected static string $resource = ProductLibraryImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
