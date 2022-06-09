<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlashResource\Pages;
use App\Filament\Resources\FlashResource\RelationManagers;
use App\Models\Flash;
use App\Models\User;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class FlashResource extends Resource
{
    protected static ?string $model = Flash::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->autofocus()->required(),
                TextInput::make('price')->numeric()->required(),
                Toggle::make('active'),
                TextInput::make('color'),
                Select::make('customer_id')->options(User::all()->pluck('name', 'id'))->searchable(),
                Select::make('tattooist_id')->options(User::all()->pluck('name', 'id'))->searchable(),
                TextInput::make('skin_id'),
                TextInput::make('category_flashes_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListFlashes::route('/'),
            'create' => Pages\CreateFlash::route('/create'),
            'edit' => Pages\EditFlash::route('/{record}/edit'),
        ];
    }
}
