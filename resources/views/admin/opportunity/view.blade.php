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
                        <a href="{{ route('admin.opportunity.edit', $opportunity->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                        {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch demo modal 2</button> --}}
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
                <div class="text-center mb-3">
                    <h3>{{ $opportunity->title }}</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-1"><strong>Name:</strong> <span class="text-info">{{ $opportunity->prospect_name }}</span></p>
                                <p class="mb-1"><strong>Email:</strong> <span class="text-info">{{ $opportunity->prospect_email }}</span></p>
                                <p class="mb-1"><strong>Phone Number:</strong> <span class="text-info">{{ $opportunity->prospect_phone }}</span> </p>
                                @if($opportunity->status)
                                    <p><strong>Status:</strong> <span class="badge badge-phoenix badge-phoenix-success">Active</span></p>
                                @else
                                    <p><strong>Status:</strong> <span class="badge badge-phoenix badge-phoenix-danger">In active</span></p>
                                @endif
                            </div>
                            <div>
                                <p class="mb-1"><strong>Type:</strong> <span class="text-info">{{ ucwords(str_replace('-',' ',$opportunity->opportunity_type)) }}</span></p>
                                <p class="mb-1"><strong>Value:</strong> <span class="text-info">$ {{ number_format($opportunity->estimated_budget) }}</span></p>
                                <p class="mb-1"><strong>Date:</strong> <span class="text-info">{{ date_format($opportunity->created_at, 'd/m/Y') }}</span></p>
                                <p class="mb-1"><strong>Closing Date:</strong> <span class="text-info">{{ Carbon\Carbon::parse($opportunity->closing_date)->format('m/d/Y') }}</span></p>
                            </div>
                        </div>
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
                        <div class="d-flex justify-content-between">
                            {{-- Previous button --}}
                            @if ($prev)
                            <a href="{{ route('admin.opportunity.show', $prev) }}" type="button" class="btn btn-info btn-sm">Previous</a>
                            @else
                            <button type="button" disabled="disabled" class="btn btn-info btn-sm">Previous</button>
                            @endif
                            
                            {{-- Next button --}}
                            @if($next)
                            <a href="{{ route('admin.opportunity.show', $next) }}" type="button" class="btn btn-info btn-sm">Next</a>
                            @else
                            <button type="button" disabled="disabled" class="btn btn-info btn-sm">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <form action="{{ route('admin.opportunity.status', $opportunity->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />
                            <label for="Status" class="form-label">Status</label>
                            <select name="status" class="form-select form-control" id="basic-form-status">
                                <option value=1 {{ ($opportunity->status) ? 'selected' : '' }}>Active</option>
                                <option value=0 {{ (!$opportunity->status) ? 'selected' : '' }}>In active</option>
                            </select>
                            <button type="submit" class="btn btn-success btn-sm mt-3">Update Status</button>
                        </form>
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

@include('admin.opportunity.delete_modal')
@endsection