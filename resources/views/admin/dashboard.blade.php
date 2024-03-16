<!-- dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <h2 class="text-lg font-semibold">Event List</h2>
                        <!-- Add your button here -->
                        <a href="{{ route('events.create') }}" class="btn btn-primary">Create New Event</a>
                    </div>
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
                                        <div class="dropdown">
                                            
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('events.edit', $event->EventID) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('events.show', $event->EventID) }}">Show</a>
                                                <form action="{{ route('events.destroy', $event->EventID) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
