
{{-- @extends('events.layout') --}}
@extends('judge.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Event</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('judge.dashboard') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $event->Name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Start Date:</strong>
            {{ $event->StartDate }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>End Date:</strong>
            {{ $event->EndDate }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $event->Description }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Groups</h3>
        @if($groups->isEmpty())
            <p class="text-center">No groups available!</p>
        @else
            <table class="table">
            <thead>
                <tr>
                    <th>Group Number</th>
                    <th>Group Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event->groups as $group)
                <tr>
                    <td>{{ $group->GroupID }}</td> <!-- Assuming GroupID is the primary key -->
                    <td>{{ $group->Name }}</td>
                    <td>
                        
                        <a class="btn btn-info" href="{{ route('judge.groups.show', ['event' => $event->EventID, 'group' => $group->GroupID]) }}">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection
