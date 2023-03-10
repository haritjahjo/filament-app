<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Filament\Resources\VoucherResource\RelationManagers;
use App\Models\Voucher;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignorable: fn ($record) => $record)
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state)),
                Forms\Components\TextInput::make('discount_percent')
                    ->required()
                    ->numeric()
                    ->default(state:10)
                    ->extraInputAttributes(attributes:['min'=> 1, 'max'=> 100, 'step'=>1]),
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label(label:'Code')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('discount_percent')->label(label:'Discount (%)')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('product.name')->label(label:'Product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(format:'d/m/Y H:i')->label(label:'Created at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make(name:'payments_count')
                    ->counts(relationship:'payments')
                    ->label(label:'Times Used'),
            ])
            ->defaultSort(column:'created_at', direction:'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVouchers::route('/'),
            'create' => Pages\CreateVoucher::route('/create'),
            'edit' => Pages\EditVoucher::route('/{record}/edit'),
        ];
    }    
}
