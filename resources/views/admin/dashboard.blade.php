@extends('admin.layouts')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')
<div class="row gy-3 mb-6 justify-content-between">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Dashboard</h5>
            </div>
            <div class="card-body">
                <p>{{ __('Admin Dashboard!') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="pb-5">
    <div class="row">
        <div class="col-12 col-xxl-12">
        </div>
    </div>
</div>
@endsection