<div class="py-2">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-session-message />
        <div class="overflow-hidden bg-white shadow-2xl dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
