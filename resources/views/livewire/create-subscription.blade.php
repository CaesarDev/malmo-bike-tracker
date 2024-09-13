<form wire:submit.prevent="submit">
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
    <div class="mb-4">
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
            Submit
        </button>
    </div>
    @php
    foreach ($errors->all() as $message) {
     echo $message;
    }
    @endphp
    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</form>
