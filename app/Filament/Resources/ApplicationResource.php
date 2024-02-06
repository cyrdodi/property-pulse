<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Platform;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Application;
use Filament\Resources\Resource;
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
use Filament\Forms\Components\Grid;
use Filament\Tables\Filters\SelectFilter;

class ApplicationResource extends Resource
{
  protected static ?string $model = Application::class;

  protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Grid::make(2)
          ->schema(
            [
              Section::make([
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
                TextInput::make('url')
                  ->url()
                  ->visible(function ($get, $record) {
                    if (isset($record->platform_id)) {
                      if ($get('platform_id') == 1) {
                        return true;
                      } else {
                        return false;
                      }
                    }
                    if ($get('platform_id') == 1) {
                      return true;
                    }
                  }),
                // }),
                Select::make('categories')
                  ->relationship('categories', 'name')
                  ->searchable()
                  ->preload()
                  ->multiple()
                  ->createOptionForm([
                    TextInput::make('name')
                  ]),
              ]),
              Section::make([
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
              ])->grow(false)
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
        TextColumn::make('organization.name'),
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
        Tables\Filters\TrashedFilter::make(),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
        Tables\Actions\ForceDeleteAction::make(),
        Tables\Actions\RestoreAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
          Tables\Actions\ForceDeleteBulkAction::make(),
          Tables\Actions\RestoreBulkAction::make(),
        ]),
      ]);
  }

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()
      ->withoutGlobalScopes([
        SoftDeletingScope::class,
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
