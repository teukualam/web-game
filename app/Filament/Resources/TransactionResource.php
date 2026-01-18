<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use App\Models\Message;
use App\Models\GameKey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Schema;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->label('Pembeli'),

                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'name')
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => 
                        $set('total_price', \App\Models\Game::find($state)?->price ?? 0)
                    ),

                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Total Harga'),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending (Belum Bayar)',
                        'success' => 'Success (Lunas)',
                        'failed' => 'Failed (Gagal)',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pembeli')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('game.name')
                    ->label('Game')
                    ->limit(20),

                Tables\Columns\TextColumn::make('total_price')
                    ->money('IDR')
                    ->sortable()
                    ->label('Total Bayar'),

                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Via')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'BCA' => 'info',
                        'DANA' => 'primary',
                        default => 'gray',
                    }),

                Tables\Columns\ImageColumn::make('payment_proof')
                    ->label('Bukti Transfer')
                    ->square()
                    ->disk('public'),

                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'failed' => 'Failed',
                    ])
                    ->label('Status')
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state === 'success') {
                            $gameName = $record->game ? $record->game->name : 'Game';
                            
                            $statusColumn = Schema::hasColumn('game_keys', 'terpakai') ? 'terpakai' : 'is_redeemed';
                            
                            $keyData = GameKey::where('game_id', $record->game_id)
                                ->where($statusColumn, false)
                                ->first();

                            $foundKey = null;

                            if ($keyData) {
                                $keyCodeColumn = Schema::hasColumn('game_keys', 'key_code') ? 'key_code' : 'key';
                                $foundKey = $keyData->$keyCodeColumn;
                                
                                // Tandai sudah terpakai
                                $keyData->update([$statusColumn => true]);
                            }
                            
                            // DISINI PERBAIKANNYA: Pastikan kolom 'cd_key' diisi
                            Message::create([
                                'user_id' => $record->user_id,
                                'order_id' => $record->id, // Tambahkan jika ada kolom order_id
                                'subject' => 'Pembelian Berhasil: ' . $gameName,
                                'body' => "Pembayaran Anda untuk " . $gameName . " telah diverifikasi. Terima kasih telah berbelanja!",
                                'cd_key' => $foundKey, // Isi langsung ke kolom cd_key
                                'game_id' => $record->game_id,
                                'is_read' => false,
                            ]);
                        }
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'failed' => 'Failed',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}