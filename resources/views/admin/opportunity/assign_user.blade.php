@extends('admin.layouts')

@section('title', 'Opportunities')

@section('styles')
<link href="{{ Vite::asset('resources/assets/vendors/choices/choices.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Assign Users</h4>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.opportunity.index') }}">Opportunities</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.opportunity.show', $opp_id) }}">{{ $opportunity->title }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Assign Users</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.opportunity.assign.users', $opp_id) }}" method="POST">
                    @csrf
                    <label for="organizerMultiple">Select Users (Multiple)</label>
                    <select class="form-select" name="users[]" required id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">Select Users</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Assign Users</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ Vite::asset('resources/assets/vendors/choices/choices.min.js')}}"></script>
@endsection