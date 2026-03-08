<?php

namespace App\Filament\Admin\Resources\Menus\Tables;

use App\Enums\PackageType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                IconColumn::make('seo_status')
                    ->label('SEO')
                    ->getStateUsing(fn ($record) => $record->seoStatus())
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor(Color::Green)
                    ->falseColor(Color::Red)
                    ->tooltip(fn ($record) => $record->seoStatus() ? 'SEO Complete' : 'SEO Incomplete'),
                TextColumn::make('package.name')
                    ->badge()
                    ->icon(function($record){
                        if ($record->package->type->value === PackageType::PUBLIC ->value) {
                            return Heroicon::OutlinedGlobeAlt;
                        }
                        return Heroicon::ReceiptPercent;
                    })
                    ->color(function ($record) {
                        if ($record->package->type->value === PackageType::PUBLIC ->value) {
                            return Color::Green;
                        }
                        return Color::Teal;
                    })
                    ->url(fn($record) => route('filament.admin.resources.packages.edit', ['record' => $record]))
                    ->searchable(),
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
                //
            ])
            ->deferLoading(true)
            ->deferFilters(true)
            
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
