<?php

namespace App\Filament\Resources\ApplicationResource\Pages;

use App\Filament\Resources\ApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApplication extends CreateRecord
{
  protected static string $resource = ApplicationResource::class;

  public function mutateFormDataBeforeCreate(array $data): array
  {
    $data['user_id'] = auth()->user()->id;
    // $data['developer'] = [
    //   'name' => $data['developer_name'],
    //   'phone' => $data['developer_phone'],
    //   'email' => $data['developer_email'],
    //   'website' => $data['developer_website'],
    // ];
    return $data;
  }
}
