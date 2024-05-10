@extends('admin.layouts')

@section('title', "$opportunity->title | View Details")

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Opportunities</h4>
                    <div>
                        <a href="" type="button" class="btn btn-primary btn-sm">Edit</a>
                        <a href="" type="button" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.opportunity.index') }}">Opportunities</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $opportunity->title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                @if($opportunity->status)
                    <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                @else
                    <span class="badge badge-phoenix badge-phoenix-danger">In active</span>
                @endif

                <div class="text-center mt-3">
                    <h3>{{ $opportunity->title }}</h3>
                    {{-- <h4>{{ $opportunity->prospect_name }}</h4>
                    <p>{{ $opportunity->prospect_email }}</p> --}}
                </div>
                <div class="row mt-5">
                    <div class="col-3">
                        <p>Date: {{ date_format($opportunity->created_at, 'd/m/Y') }}</p>
                    </div>
                    <div class="col-3">
                        <p>Closing Date: {{ ($opportunity->closing_date) ? date_format($opportunity->closing_date, 'd/m/Y') : ''}}</p>
                    </div>
                    <div class="col-3">
                        <p>Value: $ {{ number_format($opportunity->estimated_budget) }}</p>
                    </div>
                    <div class="col-3">
                        <p>Type : {{ ucwords(str_replace('-',' ',$opportunity->opportunity_type)) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <p>
                            {{ $opportunity->opportunity_info }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-around">
                            @if ($prev)
                            <a href="{{ route('admin.opportunity.show', $prev) }}" type="button" class="btn btn-info btn-sm">Previous</a>
                            @else
                            <button type="button" disabled="disabled" class="btn btn-info btn-sm">Previous</button>
                            @endif
                            @if($next)
                            <a href="{{ route('admin.opportunity.show', $next) }}" type="button" class="btn btn-info btn-sm">Next</a>
                            @else
                            <button type="button" disabled="disabled" class="btn btn-info btn-sm">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h5>Assign Users</h5>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
</div>
@endsection