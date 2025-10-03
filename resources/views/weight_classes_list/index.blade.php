<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Weight Class Lists') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">People by Weight Class</h1>

        @foreach ($data as $item)
            <div class="mb-8 border rounded-lg shadow p-4">
                <h2 class="text-xl font-semibold mb-2">
                    {{ $item['weight_class']->className->name }}
                    ({{ ucfirst($item['weight_class']->gender) }}, {{ $item['weight_class']->division }})
                    @if ($item['weight_class']->max_weight)
                        - Up to {{ $item['weight_class']->max_weight }} lbs
                    @else
                        - Open Weight
                    @endif
                </h2>

                @if ($item['people']->count() > 0)
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="text-left px-4 py-2">Name</th>
                                <th class="text-left px-4 py-2">Age</th>
                                <th class="text-left px-4 py-2">Weight (lbs)</th>
                                <th class="text-left px-4 py-2">Height (in)</th>
                                <th class="text-left px-4 py-2">Belt Rank</th>
                                <th class="text-left px-4 py-2">School</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item['people'] as $person)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $person->name }}</td>
                                    <td class="px-4 py-2">{{ $person->age }}</td>
                                    <td class="px-4 py-2">{{ $person->weight }}</td>
                                    <td class="px-4 py-2">{{ $person->height }}</td>
                                    <td class="px-4 py-2">{{ $person->belt_rank }}</td>
                                    <td class="px-4 py-2">{{ $person->school_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No participants in this weight class.</p>
                @endif
            </div>
        @endforeach
    </div>

</x-app-layout>
