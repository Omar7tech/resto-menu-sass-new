<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use App\Enums\UserRole;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('User Details')
                    ->persistTab()
                    ->id('user-tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon(Heroicon::User)
                            ->schema([
                                Section::make('User Profile')
                                    ->description('Configure basic user information')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('name')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->placeholder('Enter full name')
                                                    ->helperText('The display name for this user'),
                                                TextInput::make('email')
                                                    ->required()
                                                    ->email()
                                                    ->maxLength(255)
                                                    ->unique(ignoreRecord: true)
                                                    ->placeholder('user@example.com')
                                                    ->helperText('Unique email address for login'),
                                            ]),
                                        TextInput::make('phone_number')
                                            ->tel()
                                            ->maxLength(20)
                                            ->placeholder('+1234567890')
                                            ->helperText('Optional phone number for contact'),
                                        Select::make('role')
                                            ->options(UserRole::class)
                                            ->required()
                                            ->default(UserRole::CLIENT)
                                            ->helperText('Select the user role and permissions'),
                                    ]),
                            ]),
                        
                        Tab::make('Password & Security')
                            ->icon(Heroicon::LockClosed)
                            ->schema([
                                Section::make('Password Configuration')
                                    ->description('Set up user authentication credentials')
                                    ->schema([
                                        TextInput::make('password')
                                            ->password()
                                            ->required(fn (string $context): bool => $context === 'create')
                                            ->revealable()
                                            ->rule(Password::default())
                                            ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                                            ->dehydrated(fn ($state) => filled($state))
                                            ->label(fn (string $context): string => $context === 'edit' ? 'New Password' : 'Password')
                                            ->helperText(fn (string $context): string => 
                                                $context === 'edit' 
                                                    ? 'Leave empty to keep current password' 
                                                    : 'Must be at least 8 characters with mixed case and numbers'
                                            ),
                                        TextInput::make('password_confirmation')
                                            ->password()
                                            ->required()
                                            ->revealable()
                                            ->label('Confirm Password')
                                            ->same('password')
                                            ->dehydrated(false)
                                            ->helperText('Re-enter the password to confirm'),
                                    ]),
                                
                                Section::make('Security Settings')
                                    ->description('Additional security configuration')
                                    ->schema([
                                        Toggle::make('email_verified')
                                            ->label('Email Verified')
                                            ->default(false)
                                            ->helperText('Mark the user\'s email as verified')
                                            ->dehydrateStateUsing(fn ($state) => $state ? now() : null)
                                            ->dehydrated(fn ($state) => filled($state)),
                                    ]),
                            ]),
                        
                        Tab::make('Account Settings')
                            ->icon(Heroicon::Cog6Tooth)
                            ->schema([
                                Section::make('Account Status')
                                    ->description('Manage user account status and permissions')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Toggle::make('is_active')
                                                    ->label('Active Account')
                                                    ->default(true)
                                                    ->helperText('User can login and access the system'),
                                                
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
