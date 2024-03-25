@extends('events.layout')

@section('content')

<div class="row text-gray-800 dark:text-gray-200">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Group</h2>
        </div>
        <div class="pull-right">
            <x-primary-button href="{{ route('events.show', $event->EventID) }}">{{ __('Back') }}</x-primary-button>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('events.groups.update', [$event->EventID, $group->GroupID]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row text-gray-800 dark:text-gray-200">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Group Name:</strong>
                <input type="text" name="Name" value="{{ $group->Name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="Title" value="{{ $group->project->Title }}" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Description:</strong>
                <input type="text" name="Description" value="{{ $group->project->Description }}" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Submission Link:</strong>
                <input type="text" name="SubmissionLink" value="{{ $group->project->SubmissionLink }}" class="form-control" placeholder="Submission Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
        </div>
    </div>

</form>

@endsection
