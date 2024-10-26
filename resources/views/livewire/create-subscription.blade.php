<div class="max-w-70 w-full">
    <h3 class="font-bold">Add alert subscription</h3>
    <p class="italic w-full">We will send you an alert when the station has less than 3 available bikes or when the stations is offline/service mode</p>
    <form wire:submit.prevent="submit" x-show="!$wire.formSubmitted" x-collapse>
        @csrf
        <div class="mb-4">
            <input type="hidden" value="{{ $station_id }}" id="station_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <x-label for="phone_number" />
            <x-input name="phone_umber" type="text" wire:model="phone_number" id="phone_number" required />
            <x-error field="phone_number" class="text-red-500" />
        </div>
        <div class="mb-4">
            <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Start Time:</label>
            <input type="time" wire:model="start_time" id="start_time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('start_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">End Time:</label>
            <input type="time" wire:model="end_time" id="end_time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('end_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <x-label for="weekdays" />
            <x-checkbox name="weekdays" wire:model="weekdays" id="weekdays" />
            <x-error field="weekdays" class="text-red-500" />
        </div>
        <div class="mb-4">
            <x-label for="weekends" />
            <x-checkbox name="weekends" wire:model="weekends" id="weekends" />
            <x-error field="weekends" class="text-red-500" />
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add subscription
            </button>
        </div>
    </form>

    @php
    foreach ($errors->all() as $message) {
     echo $message;
    }
    @endphp
    @if (session()->has('message'))
        <div class="rounded-md bg-green-50 p-4 mt-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
