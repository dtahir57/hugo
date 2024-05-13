@extends('layouts.master')

@section('title', "$opportunity->title | View Details")

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>View Opportunity</h4>
                </div>
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Opportunities</a></li>
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
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
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
                </div> --}}
                
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        @if($feedback)
        <div class="card">
            <div class="card-header">
                <h4>Your Feedback</h4>
                <li class="alert alert-success">We've got your feedback and will response accordingly!</li>
            </div>
            <div class="card-body">
                <h5>{{ $feedback->feedback }}</h5>
                <p class="text-muted">{{ $feedback->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <h4>Post a Feedback</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.feedback.store', $opportunity->id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label" for="feedbackTextarea">Feedback</label>                      
                        <textarea name="feedback" required class="form-control" id="feedbackTextarea" rows="3"> </textarea>
                    </div>
                    <div class="mb-0">
                        <input type="submit" class="btn btn-success btn-sm" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection