<?php

namespace App\Filament\Resources\DataTableResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RowsRelationManager extends RelationManager
{
    protected static string $relationship = 'rows';

    public function form(Form $form): Form
    {
        // Mendapatkan kolom dari dataTable
        $columns = $this->ownerRecord->columns;
        $formFields = [];

        foreach ($columns as $column) {
            $formFields[] = Forms\Components\TextInput::make('values.' . $column['key'])
                ->label($column['label'])
                ->required();
        }

        return $form
            ->schema($formFields);
    }

    public function table(Table $table): Table
    {
        // Mendapatkan kolom dari dataTable
        $columns = $this->ownerRecord->columns;
        $tableColumns = [];

        foreach ($columns as $column) {
            $tableColumns[] = Tables\Columns\TextColumn::make('values.' . $column['key'])
                ->label($column['label']);
        }

        return $table
            ->columns($tableColumns)
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
