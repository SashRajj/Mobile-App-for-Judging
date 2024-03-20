<!-- resources/views/events/group/edit.blade.php -->

@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Group</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.show', $event->EventID) }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('events.groups.update', [$event->EventID, $group->GroupID]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Group Name:</strong>
                <input type="text" name="Name" value="{{ $group->Name }}" class="form-control" placeholder="Name">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="Title" value="{{ $group->project->Title }}" class="form-control" placeholder="Title">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Description:</strong>
                <input type="text" name="Description" value="{{ $group->project->Description }}" class="form-control" placeholder="Description">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Submission Link:</strong>
                <input type="text" name="SubmissionLink" value="{{ $group->project->SubmissionLink }}" class="form-control" placeholder="Submission Link">
            </div>
        </div>
    </div>

    <!-- Add other form fields as necessary -->

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
