<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ApplicationOverview extends BaseWidget
{
  protected function getStats(): array
  {
    return [
      //
      Stat::make('Total Aplikasi', Application::all()->count()),
      Stat::make('Web Base', Application::query()->where('platform_id', '1')->count()),
      Stat::make('Desktop', Application::query()->where('platform_id', '2')->count()),
      Stat::make('Mobile', Application::query()->whereIn('platform_id', ['3', '4'])->count()),
    ];
  }
}
