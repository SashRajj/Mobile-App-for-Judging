<!-- resources/views/events/group/show.blade.php -->

@extends('judge.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Group</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('judge.show', $event->EventID) }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Group Name:</strong>
            {{ $group->Name }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Title:</strong>
            {{ $group->project->Title }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Description:</strong>
            {{ $group->project->Description }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Submission Link: and more</strong>
            {{ $group->project->SubmissionLink }}
        </div>
    </div>
</div>

@endsection
