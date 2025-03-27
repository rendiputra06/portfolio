<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Page Sections';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
                Forms\Components\Select::make('content_type')
                    ->required()
                    ->options([
                        'App\\Models\\ProfileCard' => 'Profile Card',
                        'App\\Models\\TextDescription' => 'Text Description',
                        'App\\Models\\DataTable' => 'Data Table',
                        'App\\Models\\TagCollection' => 'Tag Collection',
                    ])
                    ->reactive(),
                Forms\Components\Select::make('content_id')
                    ->required()
                    ->options(function (callable $get) {
                        $contentType = $get('content_type');
                        if (!$contentType) {
                            return [];
                        }

                        $options = [];
                        $records = $contentType::all();

                        foreach ($records as $record) {
                            if ($contentType === 'App\\Models\\ProfileCard') {
                                $options[$record->id] = $record->name;
                            } elseif ($contentType === 'App\\Models\\TextDescription') {
                                $options[$record->id] = $record->heading ?? 'Description #' . $record->id;
                            } elseif ($contentType === 'App\\Models\\DataTable' || $contentType === 'App\\Models\\TagCollection') {
                                $options[$record->id] = $record->title;
                            }
                        }

                        return $options;
                    })
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content_type')
                    ->formatStateUsing(fn($state) => match ($state) {
                        'App\\Models\\ProfileCard' => 'Profile Card',
                        'App\\Models\\TextDescription' => 'Text Description',
                        'App\\Models\\DataTable' => 'Data Table',
                        'App\\Models\\TagCollection' => 'Tag Collection',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('position')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('position')
            ->filters([
                Tables\Filters\SelectFilter::make('content_type')
                    ->options([
                        'App\\Models\\ProfileCard' => 'Profile Card',
                        'App\\Models\\TextDescription' => 'Text Description',
                        'App\\Models\\DataTable' => 'Data Table',
                        'App\\Models\\TagCollection' => 'Tag Collection',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
