@extends('admin.layouts')

@section('title', 'Prospect Hacker | Add new opportunity')

@section('styles')
<link href="{{ Vite::asset('resources/assets/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
@endsection

@section('content')
@foreach($errors->all() as $error)
  <li class="alert alert-danger">{{ $error }}</li>
@endforeach
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Add New Opportunity</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="mt-3">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('admin.opportunity.index') }}">Opportunities</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                      </nav>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.opportunity.store') }}">
                      @csrf
                        <div class="row">
                            <div class="mb-3 col-6">

                                <label class="form-label" for="basic-form-name">Prospect Name <span style="color: red;">*</span></label>
      
                                <input class="form-control" name="prospect_name" value="{{ old('prospect_name') }}" id="basic-form-name" type="text" placeholder="Prospect Name" />
                              </div>
                              <div class="mb-3 col-6">
      
                                <label class="form-label" for="basic-form-email">Prospect Email <span style="color: red;">*</span></label>
      
                                <input class="form-control" name="prospect_email" value="{{ old('prospect_email') }}" id="basic-form-email" type="email" placeholder="name@example.com" />
                              </div>
                              <div class="mb-3 col-6">
      
                                <label class="form-label" for="basic-form-password">Prospect Phone</label>
      
                                <input class="form-control" name="prospect_phone" value="{{ old('prospect_ohone') }}" id="basic-form-password" type="text" placeholder="Prospect Phone" />
                              </div>
                              <div class="mb-3 col-6">
                                <label class="form-label" for="basic-form-password">Estimated Budget</label>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1">$</span>
                                
                                  <input class="form-control" name="estimated_budget" value="{{ old('estimated_budget') }}" type="number" min="10" placeholder="Estimated Budget ($)" aria-label="est_budget" aria-describedby="basic-addon1" />
                                </div>
                              </div>

                              <div class="mb-3 col-6">
      
                                <label class="form-label" for="basic-form-email">Title <span style="color: red;">*</span></label>
      
                                <input class="form-control" required name="title" value="{{ old('title') }}" id="basic-form-title" type="text" placeholder="Title" />
                              </div>

                              <div class="mb-3 col-6">
      
                                <label class="form-label" for="basic-form-location">Location</label>
      
                                <input class="form-control" name="location" value="{{ old('location') }}" id="basic-form-location" type="text" placeholder="Location" />
                              </div>

                              <div class="mb-3 col-6">
                                <label class="form-label" for="datepicker">Closing Date <span style="color: red;">*</span></label>

                                <input class="form-control" required name="closing_date" value="{{ old('closing_date') }}" id="datepicker" type="date" placeholder="dd/mm/yyyy"/>
                              </div>
                              
                              <div class="mb-3 col-6">
      
                                <label class="form-label" for="basic-form-type">Opportunity Type</label>
      
                                <select name="opportunity_type" class="form-select" id="basic-form-gender" aria-label="Default select example">
                                  <option selected disabled>Select opportunity type</option>
                                  <option value="prospect-intelligence">Prospect Intelligence</option>
                                  <option value="request-for-proposal">Request For Proposal</option>
                                  <option value="buying-signal">Buying Signal</option>
                                </select>
                              </div>
                              <div class="mb-3">
      
                                <label class="form-label" for="basic-form-info">Opportunity Info</label>
      
                                <textarea class="form-control" name="opportunity_info" id="basic-form-info" rows="5">{{ old('opportunity_info') }}</textarea>
                              </div>
      
                              <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ Vite::asset('resources/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/4q7pc096pg4e1sg52h65m08gb2ljx94x3kvpe55rms49dksw/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
@endsection