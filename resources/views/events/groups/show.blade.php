<!-- resources/views/events/group/show.blade.php -->

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
            <div class="p-6 bg-white border-b border-gray-200 top-rounded ">
                <div class="flex justify-between mb-2">
                    <h2>{{ $group->Name }}</h2>
                    <x-secondary-button href="{{ route('events.show', $event->EventID) }}">{{ __('Back') }}</x-secondary-button>
                </div>
            </div>
        </div>
        <div class="custom-rectangle bg-white shadow-sm mb-4 ">
            <div class="p-6 bg-white border-b border-gray-200 "> 
                <div class="form-group">
                    <strong>Project Title:</strong>
                    {{ $group->project->Title }}
                </div>
                <div class="form-group">
                    <strong>Project Description:</strong>
                    {{ $group->project->Description }}
                </div>
                <div class="form-group">
                    <strong>Project Submission Link:</strong>
                    {{ $group->project->SubmissionLink }}
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
