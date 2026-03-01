<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use App\Enums\UserRole;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                return $query->where('role', '!=', UserRole::ADMIN->value);
            })
            ->columns([
                ImageColumn::make('facehash_avatar_url')
                    ->label('')
                    ->size(25),
                TextColumn::make('name')
                    ->searchable()->weight(FontWeight::Bold),
                TextColumn::make('email')
                    ->label('Email address')
                    ->icon('heroicon-m-envelope')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->icon('heroicon-m-phone')
                    ->searchable()->placeholder('-'),
                TextColumn::make('menus_count')->counts('menus')
                    ->label('Menu')->badge()->sortable(),
                TextColumn::make('role')->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->striped()
            ->defaultSort('created_at', 'desc')
            ->description('Users with admin role are not displayed here.')

            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),
                EditAction::make()->hiddenLabel(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
