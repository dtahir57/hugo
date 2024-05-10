@extends('admin.layouts')

@section('title', "$opportunity->title | View Details")

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Opportunities</h4>
                </div>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.opportunity.index') }}">Opportunities</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Opportunities</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection