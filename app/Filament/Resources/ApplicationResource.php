<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use App\Models\Platform;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Application;
use App\Models\Organization;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use Filament\Tables\Filters\SelectFilter;

class ApplicationResource extends Resource
{
  protected static ?string $model = Application::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Grid::make(2)
          ->schema(
            [
              Section::make()
                ->schema([
                  TextInput::make('name'),
                  Textarea::make('description'),
                  Select::make('organization_id')
                    ->relationship('organization', 'name')
                    ->preload()
                    ->searchable(),
                  ToggleButtons::make('platform_id')
                    ->options(Platform::all()->pluck('name', 'id'))
                    ->inline()
                    ->live(),
                  // TODO: error jika edit tidak muncul walaupun platform == 1
                  TextInput::make('url')
                    ->url()
                    ->visible(fn ($get) => $get('platform_id') === '1'),
                  Select::make('categories')
                    ->relationship('categories', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->createOptionForm([
                      TextInput::make('name')
                    ]),
                ]),
              Section::make('Kontak')
                ->schema([
                  Repeater::make('person_in_charge')
                    ->schema([
                      TextInput::make('name')
                        ->required(),
                      TextInput::make('position')
                        ->label('Jabatan'),
                      TextInput::make('phone')
                    ]),
                  Section::make('Developer')
                    ->schema([
                      TextInput::make('name')
                        ->required(),
                      TextInput::make('phone'),
                      TextInput::make('email')
                        ->email(),
                      TextInput::make('website')
                        ->url(),
                    ]),
                ])
            ]
          )
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')
          ->searchable(),
        TextColumn::make('organization.name')
          ->badge(),
        TextColumn::make('platform.name')
          ->badge(),
        TextColumn::make('categories.name')
          ->badge(),
      ])
      ->filters([
        //
        SelectFilter::make('organization_id')
          ->searchable()
          ->relationship('organization', 'name')
          ->preload(),
        SelectFilter::make('platform_id')
          ->relationship('platform', 'name')
          ->preload(),
        SelectFilter::make('category_id')
          ->relationship('categories', 'name')
          ->preload()
          ->searchable()
          ->multiple(),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListApplications::route('/'),
      'create' => Pages\CreateApplication::route('/create'),
      'edit' => Pages\EditApplication::route('/{record}/edit'),
    ];
  }
}
