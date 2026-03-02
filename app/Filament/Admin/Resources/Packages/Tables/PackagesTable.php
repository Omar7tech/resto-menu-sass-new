<?php

namespace App\Filament\Admin\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('max_categories')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_products')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('can_add_images')
                    ->boolean(),
                IconColumn::make('can_add_tags')
                    ->boolean(),
                IconColumn::make('has_multi_branches')
                    ->boolean(),
                TextColumn::make('max_branches')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('can_add_to_cart')
                    ->boolean(),
                IconColumn::make('can_have_social_media')
                    ->boolean(),
                IconColumn::make('can_edit_theme')
                    ->boolean(),
                IconColumn::make('remove_branding')
                    ->boolean(),
                IconColumn::make('featured')
                    ->boolean(),
                TextColumn::make('yearly_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('discount_yearly_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('setup_fees')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('discount_setup_fees')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
