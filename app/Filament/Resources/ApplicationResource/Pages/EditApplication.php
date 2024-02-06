<?php

namespace App\Filament\Resources\ApplicationResource\Pages;

use App\Filament\Resources\ApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplication extends EditRecord
{
  protected static string $resource = ApplicationResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make(),
      Actions\ForceDeleteAction::make(),
      Actions\RestoreAction::make(),
    ];
  }

  protected function mutateFormDataBeforeSave(array $data): array
  {
    if ($data['platform_id'] != 1) {
      $data['url'] = null;
    }

    return $data;
  }
}
