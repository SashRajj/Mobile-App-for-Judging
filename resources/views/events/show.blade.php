@extends('events.layout')

@section('content')
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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="custom-rectangle bg-white shadow-sm mb-4 ">
            <div class="p-6 bg-white border-b border-gray-200 top-rounded bottom-rounded">
                <div class="flex justify-between mb-2">
                    <h2>{{ $event->Name }}</h2>
                    <x-secondary-button href="{{ route('admin.dashboard') }}">{{ __('Back') }}</x-secondary-button>
                </div>
                <div class="form-group">
                    <strong>Start Date:</strong>
                    {{ $event->StartDate }}
                </div>
                <div class="form-group">
                    <strong>End Date:</strong>
                    {{ $event->EndDate }}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $event->Description }}
                </div>
            </div>
        </div>

        <div class="custom-rectangle bg-white rounded-lg shadow-sm mb-4 bottom-sharp">
            <div class="p-6 bg-white border-b border-gray-200 top-rounded">
                <div class="flex justify-between mb-2">
                    <h2 class="text-lg font-semibold">Groups</h2>
                    <x-secondary-button href="{{route('events.groups.create', $event->EventID)}}">{{ __('Create New Group') }}</x-secondary-button>
                </div>
            </div>
        </div>
        <div class="custom-rectangle bg-white rounded-lg shadow-sm mb-4">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="overflow-x-auto">
                    @if($groups->isEmpty())
                        <p class="text-center">No groups available! Please create a new group.</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Group Number</th>
                                    <th class="px-4 py-2">Group Name</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event->groups as $group)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $group->GroupID }}</td> <!-- Assuming GroupID is the primary key -->
                                        <td class="border px-4 py-2">{{ $group->Name }}</td>
                                        <td class="border px-4 py-2">
                                            <x-dropdown width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 dropdown-toggle" type="button" id="dropdownMenuButton_{{ $event->EventID }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Options
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('events.groups.edit', ['event' => $event->EventID, 'group' => $group->GroupID])">Edit</x-dropdown-link>
                                                    <x-dropdown-link :href="route('events.groups.show', ['event' => $event->EventID, 'group' => $group->GroupID])">Show</x-dropdown-link>
                                                    <form action="{{ route('events.groups.destroy', ['event' => $event->EventID, 'group' => $group->GroupID]) }}" method="POST">
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
@endsection
