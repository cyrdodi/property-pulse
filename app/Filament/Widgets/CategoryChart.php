<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Category;
use Filament\Widgets\ChartWidget;

class CategoryChart extends ChartWidget
{
  protected static ?string $heading = 'Jumlah Aplikasi per Kategori';

  protected function getData(): array
  {

    $data = \DB::select('SELECT  c.name label, COUNT(*) value
      FROM application_category ac
      JOIN applications a ON a.id = ac.application_id
      JOIN categories c ON c.id = ac.category_id
      GROUP BY ac.category_id,c.name');

    $label = array_column($data, 'label');
    $value = array_column($data, 'value');

    return [
      'datasets' => [
        [
          'label' => 'Jumlah Aplikasi',
          'data' => $value,
          'backgroundColor' => '#36A2EB',
          'borderColor' => '#9BD0F5',
        ],
      ],
      'labels' => $label,
    ];
  }

  protected function getType(): string
  {
    return 'bar';
  }
}
