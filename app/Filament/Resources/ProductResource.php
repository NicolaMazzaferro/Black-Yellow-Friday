<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart'; // Icona del menu

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\TextInput::make('price')->numeric()->required(),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\TextInput::make('discount')
                    ->numeric()
                    ->minLength(0)
                    ->maxLength(100)
                    ->default(0)
                    ->label('Sconto (%)'),
                Forms\Components\Select::make('category_id')
                    ->label('Categoria')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.name') // Mostra il nome della categoria
                    ->label('Categoria')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('discount')
                    ->label('Sconto (%)')
                    ->sortable(),
                Tables\Columns\TextColumn::make('discounted_price')
                    ->label('Prezzo Scontato')
                    ->getStateUsing(fn ($record) => '€' . number_format($record->discounted_price, 2)),
            ])
            ->filters([
                //
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
