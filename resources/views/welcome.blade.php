<x-guest-layout>
    @if (Route::has('login'))
        <div class="flex flex-row gap-4">
            <a href="{{ route('login') }}" class="px-4 py-2 font-semibold text-white bg-blue-600 rounded focus:bg-blue-900/70 hover:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 font-semibold text-white bg-blue-600 rounded focus:bg-blue-900/70 hover:text-white dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
       </div>
    @endif
</x-guest-layout>
