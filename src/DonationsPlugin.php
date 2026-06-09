<?php

namespace Nizxkyo\Donations;

use App\Contracts\Plugins\HasPluginSettings;
use App\Traits\EnvironmentWriterTrait;
use Filament\Contracts\Plugin;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Notifications\Notification;
use Filament\Panel;
use Nizxkyo\Donations\Filament\App\Pages\Donations as AppDonations;
use Nizxkyo\Donations\Filament\Server\Pages\Donations as ServerDonations;

class DonationsPlugin implements Plugin, HasPluginSettings
{
    use EnvironmentWriterTrait;

    public function getId(): string
    {
        return 'donations';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            AppDonations::class,
            ServerDonations::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function getSettingsForm(): array
    {
        $links = json_decode(config('donations.links', '[]'), true) ?? [];

        return [
            Textarea::make('message')
                ->label('Support Message')
                ->rows(3)
                ->default(config('donations.message')),
            Repeater::make('links')
                ->label('Donation Links')
                ->schema([
                    TextInput::make('label')
                        ->label('Button Label')
                        ->placeholder('Buy Me a Coffee')
                        ->required(),
                    TextInput::make('url')
                        ->label('URL')
                        ->placeholder('https://buymeacoffee.com/yourusername')
                        ->url()
                        ->required(),
                    TextInput::make('emoji')
                        ->label('Emoji (optional)')
                        ->placeholder('☕'),
                    ColorPicker::make('color')
                        ->label('Button Color')
                        ->default('#3b82f6'),
                    ToggleButtons::make('text_color')
                        ->label('Text Color')
                        ->options([
                            '#ffffff' => 'White',
                            '#000000' => 'Black',
                        ])
                        ->default('#ffffff')
                        ->inline(),
                ])
                ->default($links)
                ->addActionLabel('Add Donation Link')
                ->collapsible()
                ->columns(2),
        ];
    }

    public function saveSettings(array $data): void
    {
        $this->writeToEnvironment([
            'DONATIONS_MESSAGE' => $data['message'] ?? '',
            'DONATIONS_LINKS' => json_encode($data['links'] ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ]);

        Notification::make()
            ->title('Donation settings saved!')
            ->success()
            ->send();
    }
}
