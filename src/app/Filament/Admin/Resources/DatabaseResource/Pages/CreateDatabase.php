<?php

namespace App\Filament\Admin\Resources\DatabaseResource\Pages;

use App\Filament\Admin\Resources\DatabaseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDatabase extends CreateRecord
{
    protected static string $resource = DatabaseResource::class;
}
