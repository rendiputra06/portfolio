<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileCardResource\Pages;
use App\Models\ProfileCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileCardResource extends Resource
{
    protected static ?string $model = ProfileCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Section Content';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('front_degree')
                    ->label('Gelar Depan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('back_degree')
                    ->label('Gelar Belakang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->label('Jabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('specialization')
                    ->label('Bidang Keahlian')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->directory('profile-images')
                    ->visibility('public'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->url()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->formatStateUsing(function ($state, $record) {
                        $fullName = '';
                        if ($record->front_degree) {
                            $fullName .= $record->front_degree . ' ';
                        }
                        $fullName .= $state;
                        if ($record->back_degree) {
                            $fullName .= ', ' . $record->back_degree;
                        }
                        return $fullName;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Jabatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialization')
                    ->label('Bidang Keahlian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfileCards::route('/'),
            'create' => Pages\CreateProfileCard::route('/create'),
            'edit' => Pages\EditProfileCard::route('/{record}/edit'),
        ];
    }
}
