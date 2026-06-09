<x-filament-panels::page>
    <div class="flex flex-col items-center justify-center gap-8 py-8">
        <div class="text-center max-w-lg">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                ❤️ Support the Server
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                {{ $message ?? 'Running these servers takes time and money. If you enjoy playing here, consider supporting me!' }}
            </p>
        </div>

        @if(!empty($links))
        <div class="flex flex-col sm:flex-row flex-wrap gap-4 items-center justify-center w-full max-w-2xl">
            @foreach($links as $link)
            <a href="{{ $link['url'] }}"
               target="_blank"
               class="flex items-center justify-center gap-3 px-6 py-4 rounded-xl font-semibold text-white transition-transform hover:scale-105 hover:opacity-90 w-64"
               style="background-color: {{ $link['color'] ?? '#3b82f6' }}; color: {{ $link['text_color'] ?? '#ffffff' }}; width: 16rem; min-width: 16rem;">
                @if(!empty($link['emoji']))
                <span class="text-2xl">{{ $link['emoji'] }}</span>
                @endif
                <span>{{ $link['label'] }}</span>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500 dark:text-gray-400">
            <p>No donation links have been configured yet.</p>
        </div>
        @endif

        <p class="text-sm text-gray-500 dark:text-gray-500 text-center">
            Thank you for your support! 🙏
        </p>
    </div>
</x-filament-panels::page>
