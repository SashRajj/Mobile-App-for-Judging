@extends('events.layout')

@section('content')

<div class="row text-gray-800 dark:text-gray-200">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Event</h2>
        </div>
        <div class="pull-right">
            <x-primary-button href="{{ route('admin.dashboard') }}">{{ __('Back') }}</x-primary-button>

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

<form action="{{ route('events.store') }}" method="POST">
    @csrf   
    <div class="row text-gray-800 dark:text-gray-200">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="Name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6"> {{-- Adjust column sizes as needed --}}
            <div class="form-group">
                <strong>Start Date:</strong>
                <input type="text" name="StartDate" id="StartDate" class="form-control datepicker" placeholder="Start Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6"> {{-- Adjust column sizes as needed --}}
            <div class="form-group">
                <strong>End Date:</strong>
                <input type="text" name="EndDate" id="EndDate" class="form-control datepicker" placeholder="End Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
    });
</script>
@endpush
