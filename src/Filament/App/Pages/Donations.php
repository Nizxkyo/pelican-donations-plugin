<?php

namespace Nizxkyo\Donations\Filament\App\Pages;

use Filament\Pages\Page;

class Donations extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'tabler-heart';
    protected static ?string $navigationLabel = 'Support Us';
    protected static ?string $title = 'Support Us';
    protected static ?int $navigationSort = 99;

    protected string $view = 'donations::donations';

    public function getViewData(): array
    {
        $links = json_decode(config('donations.links', '[]'), true) ?? [];

        return [
            'links' => $links,
            'message' => config('donations.message'),
        ];
    }
}
