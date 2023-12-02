<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocaleResource\Pages;
use App\Filament\Resources\LocaleResource\RelationManagers;
use App\Models\Locale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Columns\TextColumn;

class LocaleResource extends Resource
{
    protected static ?string $model = Locale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('name')
                            ->required(),
                        BelongsToSelect::make('language_id')
                            ->relationship('language', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        BelongsToSelect::make('country_id')
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (Locale $locale): ?string => $locale->created_at?->toFormattedDateString())
                        ->hidden(fn (Locale $locale) => $locale->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (Locale $locale): ?string => $locale->updated_at?->toFormattedDateString())
                        ->hidden(fn (Locale $locale) => $locale->id === null),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
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
            'index' => Pages\ListLocales::route('/'),
            'create' => Pages\CreateLocale::route('/create'),
            'edit' => Pages\EditLocale::route('/{record}/edit'),
        ];
    }
}
