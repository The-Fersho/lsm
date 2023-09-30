<div>
    <div class='flex flex-col lg:flex-row items-center justify-between gap-4 p-4'>
        @foreach ($items as $model => $data)
            <div class='flex w-full flex-col rounded-lg  bg-gradient-to-bl from-amber-300 via-amber-300 to-amber-500 p-1'>
                <div class='flex w-full flex-col rounded-lg bg-white p-4 shadow-lg bg-opacity-90'>
                    <p class='mb-4 border-b border-ugreen-400 font-bold uppercase text-ugreen-700'>{{ $data['label'] }}
                    </p>
                    <div class='mt-4 flex items-center justify-between'>
                        @svg($data['icon'], 'h-12 w-12 text-ugreen-400 dark:text-gray-100')
                        <span class='text-[2rem] font-bold'>
                            {{ $model::count() }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
