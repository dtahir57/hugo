@extends('admin.layouts')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')
<div class="row mb-3 gy-6">
    <div class="col-12 col-xxl-2">
      <div class="row align-items-center g-3 g-xxl-0 h-100 align-content-between">
        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
          <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-books text-primary-dark"></span>
            <div class="ms-2">
              <div class="d-flex align-items-end">
                <h2 class="mb-0 me-2">{{ $opportunities }}</h2><span class="fs-7 fw-semibold text-body">Opportunities</span>
              </div>
              <p class="text-body-secondary fs-9 mb-0">Awating processing</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
          <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-users-alt text-success-dark"></span>
            <div class="ms-2">
              <div class="d-flex align-items-end">
                <h2 class="mb-0 me-2">{{ $users }}</h2><span class="fs-7 fw-semibold text-body">Users</span>
              </div>
              <p class="text-body-secondary fs-9 mb-0">Working hard</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection