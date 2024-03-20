@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Event</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"> Back</a>
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
        <a href="{{ route('events.groups.create', $event->EventID) }}" class="btn btn-primary">Create New Group</a>
        @if($groups->isEmpty())
            <p class="text-center">No groups available! Please create a new group.</p>
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
                        
                        <a class="btn btn-info" href="{{ route('events.groups.show', ['event' => $event->EventID, 'group' => $group->GroupID]) }}">Show</a>
<a class="btn btn-primary" href="{{ route('events.groups.edit', ['event' => $event->EventID, 'group' => $group->GroupID]) }}">Edit</a>
<form action="{{ route('events.groups.destroy', ['event' => $event->EventID, 'group' => $group->GroupID]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection
