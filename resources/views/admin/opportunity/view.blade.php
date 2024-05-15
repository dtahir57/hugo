@extends('admin.layouts')

@section('title', "$opportunity->title | View Details")

@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link href="{{ Vite::asset('resources/assets/vendors/choices/choices.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Opportunities</h4>
                    <div class="buttons">
                        <a href="{{ route('admin.opportunity.edit', $opportunity->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.opportunity.delete', $opportunity->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn btn-danger mt-3" type="submit">Delete</button>
                        </form>
                        {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button> --}}
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
                                @if($opportunity->status === 'active')
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
                                <option value="active" {{ ($opportunity->status === 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ ($opportunity->status === 'inactive') ? 'selected' : '' }}>In active</option>
                            </select>
                            <button type="submit" class="btn btn-success btn-sm mt-3">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Assigned Users</h5>
                    <a href="{{ route('admin.opportunity.assign.view', $opportunity->id) }}" type="button" class="btn btn-primary btn-sm">Assign User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="usersTable">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($opportunity->users as $user)
                            <tr>
                                <td scope="row">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.opportunity.detach.user', [$opportunity->id, $user->id]) }}" type="button" class="btn btn-danger btn-sm">Remove User</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Feedbacks</h4>
            </div>
            <div class="card-body">
                @forelse($opportunity->feedbacks as $feedback)
                <h5>{{ $feedback->user->name }}</h5>
                <p class="text-muted">{{ $feedback->user->email }} - {{ date_format($feedback->created_at, 'd/m/Y') }} ({{ $feedback->created_at->diffForHumans() }}) </p>
                <p class="mt-3">{{ $feedback->feedback }}</p>
                <hr />
                @empty
                <p>No feedbacks found!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<form action="{{ route('admin.opportunity.delete', $opportunity->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
    <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white dark__text-gray-1100" id="staticBackdropLabel">Delete Opportunity</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9 text-white dark__text-gray-1100"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-0">Are you sure you want to delete this opportunity?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</form>
<form action="{{ route('admin.opportunity.assign.users', $opportunity->id) }}" method="POST">
    @csrf
    <div class="modal modal-lg fade" id="assignUserModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="assignUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white dark__text-gray-1100" id="assignUserModalLabel">Assign User</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9 text-white dark__text-gray-1100"></span></button>
            </div>
            <div class="modal-body">
                <label for="organizerMultiple">Select Users (Multiple)</label>
                <select class="form-select" name="users[]" required id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Select Users</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Save</button>
                <button class="btn btn-outline-success" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{ Vite::asset('resources/assets/vendors/choices/choices.min.js')}}"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#usersTable');
</script>
@endsection