<?php

namespace App\Filament\Resources\ApplicationResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ApplicationOverview extends BaseWidget
{
  protected function getStats(): array
  {
    return [
      Stat::make('Jumlah', 3)
    ];
  }
}
