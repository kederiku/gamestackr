<?php

namespace App\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Game;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class GameResource extends Resource
{
    use Translatable;



    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Games Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('name')
                            #->live(debounce: 250) // Method 1: Pass a debounce value here
                            ->debounce(250) // or Method 2: Use the debounce method 
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug'),
                        FileUpload::make('image')
                            ->image()
                            ->preserveFilenames()
                            ->directory('games'),
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (Game $game): ?string => $game->created_at?->toFormattedDateString())
                        ->hidden(fn (Game $game) => $game->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (Game $game): ?string => $game->updated_at?->toFormattedDateString())
                        ->hidden(fn (Game $game) => $game->id === null),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('created_at')->sortable(),
            TextColumn::make('updated_at')->sortable()
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
