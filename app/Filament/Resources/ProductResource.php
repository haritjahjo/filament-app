<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Tables\components\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'name')
                    ->required()
                    ->maxLength(length: 255)
                    ->reactive()
                    ->afterStateUpdated(callback: function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->dehydrateStateUsing(fn ($state) => ucwords($state)),
                Forms\Components\TextInput::make(name: 'slug'),
                Forms\Components\TextInput::make(name: 'price')
                    ->required()
                    ->rule(rule: 'numeric'),
                Forms\Components\FileUpload::make('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'name')->label(label:'Products')->sortable()->searchable(),
                Tables\Columns\TextColumn::make(name: 'price')->sortable()
                    ->label(label:'Price')
                    ->money(currency: 'usd'),
                Tables\Columns\ImageColumn::make('image')
                    ->label(label:'Image')
                    ->width(width:60)->height(height:60)->square(),
            ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
