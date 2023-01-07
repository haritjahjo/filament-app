<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengusahaResource\Pages;
use App\Filament\Resources\PengusahaResource\RelationManagers;
use App\Models\Pengusaha;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengusahaResource extends Resource
{
    protected static ?string $model = Pengusaha::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name:'kd_kantor')->label(label:'Kantor'),
                Forms\Components\TextInput::make(name:'nppbkc')->label(label:'NPPBKC'),
//                Forms\Components\DateTimePicker::make(name:'tg_nppbkc')->label(label:'Tgl NPPBKC')->date('d-m-Y'),
                Forms\Components\TextInput::make(name:'nm_perusahaan')->label(label:'Nama Perusahaan'),
                Forms\Components\TextInput::make(name:'npwp')->label(label:'NPWP'),
                Forms\Components\TextInput::make(name:'pemilik')->label(label:'Pemilik'),
                Forms\Components\TextInput::make(name:'alm_pemilik')->label(label:'Alamat'),
                Forms\Components\TextInput::make(name:'kota')->label(label:'Kota'),
                Forms\Components\TextInput::make(name:'kuasa')->label(label:'Kuasa'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name:'kd_kantor')->label(label:'Kantor'),
                Tables\Columns\TextColumn::make(name:'nppbkc')->label(label:'NPPBKC'),
                Tables\Columns\TextColumn::make(name:'nm_perusahaan')->label(label:'Nama Perusahaan'),
                Tables\Columns\TextColumn::make(name:'npwp')->label(label:'NPWP'),
                
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
            'index' => Pages\ListPengusahas::route('/'),
            'create' => Pages\CreatePengusaha::route('/create'),
            'edit' => Pages\EditPengusaha::route('/{record}/edit'),
        ];
    }    
}
