<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'News Management';

    protected static ?int $navigationSort = 1;

    public ?string $tableSortColumn = 'published_at';

    public ?string $tableSortDirection = 'desc';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('title')
                            ->required(),
                        Textarea::make('description')
                            ->rows(10)
                            ->cols(20)
                            ->required(),
                        TextInput::make('link')
                            ->unique(News::class, 'link', ignoreRecord: true)
                            ->required(),
                        TextInput::make('image'),
                        BelongsToSelect::make('source_id')
                            ->relationship('source', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                    ])->columnSpan(2), 
                ])->columnSpan(2),
                
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Creted at')
                        ->content(fn (News $news): ?string => $news->created_at?->toFormattedDateString())
                        ->hidden(fn (News $news) => $news->id === null),
                    Placeholder::make('updated_at')
                        ->label('Updated at')
                        ->content(fn (News $news): ?string => $news->updated_at?->toFormattedDateString())
                        ->hidden(fn (News $news) => $news->id === null),
                    DateTimePicker::make('published_at')->nullable(),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('source.name')->sortable()->searchable(),
                TextColumn::make('published_at')->sortable()
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }

}
