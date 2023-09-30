@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="mb-2 rounded-md bg-amber-500 p-3 text-center font-bold text-white">
        {{ session('message') }}
    </div>
@endif
