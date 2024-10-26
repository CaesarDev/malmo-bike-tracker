<div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right">
        <tr>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Id</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Station</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Phone</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Start</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">End</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Weekdays/ends</th>
        </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
        @foreach($subscriptions as $subscription)
            <tr class="odd:bg-gray-50">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    {{ $subscription->id }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ $subscription->station_id }} {{ $subscription->station()->name }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ $subscription->phone_number }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ $subscription->start_time }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ $subscription->end_time }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ $subscription->weekdays }}/{{ $subscription->weekends }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
