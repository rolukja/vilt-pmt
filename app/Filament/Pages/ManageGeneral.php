<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name')
                    ->label('Copyright notice')
                    ->required(),
                Repeater::make('site_links')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('url')
                            ->url()
                            ->required(),
                    ]),
                Forms\Components\Checkbox::make('site_run')
            ]);
    }
}
