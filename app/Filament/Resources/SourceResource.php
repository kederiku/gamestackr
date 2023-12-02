<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SourceResource\Pages;
use App\Filament\Resources\SourceResource\RelationManagers;
use App\Models\Source;
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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class SourceResource extends Resource
{
    protected static ?string $model = Source::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'News Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        FileUpload::make('logo')->image()->directory('sources/logo'),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('link')
                            ->unique(Source::class, 'link', ignoreRecord: true)
                            ->required(),
                        TextInput::make('link_rss')
                            ->unique(Source::class, 'link_rss', ignoreRecord: true)
                            ->required(),
                        BelongsToSelect::make('language_id')
                            ->relationship('language', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    FileUpload::make('icon')->image()->directory('sources/icon'),
                    Toggle::make('is_activated')
                        ->label('Activated'),
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (Source $source): ?string => $source->created_at?->toFormattedDateString())
                        ->hidden(fn (Source $source) => $source->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (Source $source): ?string => $source->updated_at?->toFormattedDateString())
                        ->hidden(fn (Source $source) => $source->id === null),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon'),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('language.name')->sortable()->searchable(),
                ToggleColumn::make('is_activated')->sortable()->searchable(),
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
            'index' => Pages\ListSources::route('/'),
            'create' => Pages\CreateSource::route('/create'),
            'edit' => Pages\EditSource::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
