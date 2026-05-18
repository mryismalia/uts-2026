<?php

namespace App\Filament\Admin\Resources\DatabaseResource\Pages;

use App\Filament\Admin\Resources\DatabaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatabase extends EditRecord
{
    protected static string $resource = DatabaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
