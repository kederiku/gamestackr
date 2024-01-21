<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Filament\Resources\LanguageResource\RelationManagers;
use App\Models\Language;
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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Countries & Regions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        /*
                        FileUpload::make('flag')
                            ->image()
                            ->preserveFilenames()
                            ->directory('language/flag'),*/
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('name_locale')
                            ->required(),
                        TextInput::make('alpha2')
                            ->required(),
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (Language $language): ?string => $language->created_at?->toFormattedDateString())
                        ->hidden(fn (Language $language) => $language->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (Language $language): ?string => $language->updated_at?->toFormattedDateString())
                        ->hidden(fn (Language $language) => $language->id === null),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListLanguages::route('/'),
            'create' => Pages\CreateLanguage::route('/create'),
            'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }
}
