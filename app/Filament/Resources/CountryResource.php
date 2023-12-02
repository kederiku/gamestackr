<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        FileUpload::make('flag')
                            ->image()
                            ->preserveFilenames()
                            ->directory('countries/flag'),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('name_locale')
                            ->required(),
                        TextInput::make('alpha2')
                            ->required(),
                        Select::make('region')
                            ->options([
                                'AMERICA' => 'AMERICA',
                                'EUROPE' => 'EUROPE',
                                'ASIA + PACIFIC' => 'ASIA + PACIFIC',
                                'MIDDLE EAST + AFRICA' => 'MIDDLE EAST + AFRICA',
                            ])
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (Country $country): ?string => $country->created_at?->toFormattedDateString())
                        ->hidden(fn (Country $country) => $country->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (Country $country): ?string => $country->updated_at?->toFormattedDateString())
                        ->hidden(fn (Country $country) => $country->id === null),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('flag'),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('name_locale')->sortable()->searchable(),
                TextColumn::make('alpha2')->sortable(),
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
