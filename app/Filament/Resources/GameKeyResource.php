<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameKeyResource\Pages;
use App\Filament\Resources\GameKeyResource\RelationManagers;
use App\Models\GameKey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameKeyResource extends Resource
{
    protected static ?string $model = GameKey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('game_id')
                ->relationship('game', 'name')
                ->required()
                ->searchable()
                ->label('Pilih Game'),
            
            Forms\Components\TextInput::make('key_code')
                ->required()
                ->label('Kode Lisensi / CD Key'),
            
            Forms\Components\Toggle::make('is_redeemed')
                ->label('Sudah Terpakai?')
                ->default(false),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('game.name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('key_code')->searchable()->copyable(), // Bisa dicopy
            Tables\Columns\IconColumn::make('is_redeemed')
                ->boolean()
                ->label('Terpakai'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListGameKeys::route('/'),
            'create' => Pages\CreateGameKey::route('/create'),
            'edit' => Pages\EditGameKey::route('/{record}/edit'),
        ];
    }
}
