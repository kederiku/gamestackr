<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGame extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
