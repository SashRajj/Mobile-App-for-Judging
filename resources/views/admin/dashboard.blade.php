<style>
    .custom-rectangle {
        border-radius: 8px;
    }

    .top-rounded {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .bottom-rounded {
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .top-sharp {
        border-top-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .bottom-sharp {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="custom-rectangle bg-white rounded-lg shadow-sm mb-4 bottom-sharp">
                <div class="p-6 bg-white border-b border-gray-200 top-rounded">
                    <div class="flex justify-between mb-2">
                        <h2 class="text-lg font-semibold">Event List</h2>
                        <!-- Add your button here -->
                        <x-secondary-button href="{{ route('events.create') }}">{{ __('Create New Event') }}</x-secondary-button>
                    </div>
                </div>
            </div>
            <div class="custom-rectangle bg-white rounded-lg shadow-sm mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        @if($events->isEmpty())
                        <p class="text-center">No events available! Please create a new event.</p>
                        @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Event Name</th>
                                    <th class="px-4 py-2">Start Date</th>
                                    <th class="px-4 py-2">End Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td class="border px-4 py-2">{{ $event->Name }}</td>
                                    <td class="border px-4 py-2">{{ $event->StartDate }}</td>
                                    <td class="border px-4 py-2">{{ $event->EndDate }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Action buttons with dropdown menu -->
                                        <x-dropdown width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 dropdown-toggle" type="button" id="dropdownMenuButton_{{ $event->EventID }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('events.edit', $event->EventID)">Edit</x-dropdown-link>
                                                <x-dropdown-link :href="route('events.show', $event->EventID)">Show</x-dropdown-link>
                                                <form action="{{ route('events.destroy', $event->EventID) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out mb-0" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="custom-rectangle bg-white rounded-lg shadow-sm mb-4 tob-sharp">
                <div class="p-6 bg-white bottom-rounded">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
