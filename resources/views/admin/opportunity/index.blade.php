@extends('admin.layouts')

@section('title', 'Opportunities')

@section('styles')
@endsection

@section('content')
@if(session('deleted'))
    <li class="alert alert-success">{{ session('deleted') }}</li>
@endif
@if ($opportunities->count() > 0)
<div class="row">
    <div class="col-12">
        @if (session('created'))
            <li class="alert alert-success">{{ session('created') }}</li>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Oppotunities List</h4>
                    <a href="{{ route('admin.opportunity.create') }}" type="button" class="btn btn-success btn-sm">+ Add New</a>
                </div>
                <nav aria-label="breadcrumb" class="mt-3 mb-3">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Opportunities</li>
                    </ol>
                </nav>
                <form action="{{ route('admin.opportunity.filter') }}" method="GET">
                    <div class="row">
                        <h5>Filters</h5>
                        @csrf
                        <div class="col-4">
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected disabled>Select Status</option>
                                <option value="active" {{ (isset($status) AND $status == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ (isset($status) AND $status == 'inactive') ? 'selected': '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="type" class="form-select" aria-label="Default select example">
                                <option selected disabled>Select Type</option>
                                <option value="prospect-intelligence" {{ (isset($type) AND $type == 'prospect-intelligence') ? 'selected' : '' }}>Prospect Intelligence</option>
                                <option value="request-for-proposal" {{ (isset($type) AND $type == 'request-for-proposal') ? 'selected' : '' }}>Request For Proposal</option>
                                <option value="buying-signal" {{ (isset($type) AND $type == 'buying-signal') ? 'selected' : '' }}>Buying Signal</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-around">
                                <input type="submit" class="btn btn-success" value="Apply Filters" />
                                <a href="{{ route('admin.opportunity.index') }}" type="button" class="btn btn-primary">Clear Filters</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col" class="col-2">Closing Date</th>
                        <th scope="col" class="col-1">Type</th>
                        <th scope="col" class="col-2">Title</th>
                        <th scope="col" class="col-3">Description</th>
                        <th scope="col" class="col-2">Your Status</th>
                        <th scope="col" class="col-2">View Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($opportunities as $opp)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($opp->closing_date)->format('m/d/Y') }}</td>
                            <td>{{ ucwords(str_replace('-',' ',$opp->opportunity_type)) }}</td>
                            <td>{{ $opp->title }}</td>
                            <td>
                                {{ Str::limit(strip_tags($opp->opportunity_info), 50) }}
                                @if (Str::limit(strip_tags($opp->opportunity_info)) > 50)
                                <a href="{{ route('admin.opportunity.show', $opp->id) }}">read more</a>
                                @endif
                            </td>
                            <td>
                                @if($opp->status == 'active')
                                    <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                                @else
                                    <span class="badge badge-phoenix badge-phoenix-danger">In active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.opportunity.show', $opp->id) }}" type="button" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $opportunities->links() }}
            </div>
        </div>
    </div>
</div>
@else
<div class="d-flex flex-center content-min-h">
    <div class="text-center py-9">
        <img class="img-fluid mb-7 d-dark-none" src="{{ Vite::asset('resources/assets/img/spot-illustrations/2.png')}}" width="470" alt="" />
        <img class="img-fluid mb-7 d-light-none" src="{{ Vite::asset('resources/assets/img/spot-illustrations/dark_2.png')}}" width="470" alt="" />
      <h1 class="text-body-secondary fw-normal mb-5">Let's start by adding opportunities</h1>
      <a class="btn btn-lg btn-primary" href="{{ route('admin.opportunity.create') }}">Create New</a>
    </div>
  </div>
@endif


@endsection