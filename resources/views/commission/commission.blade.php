@extends('layout.app')

@section('content')

<div class="main-container mt-5">
  <div class="row">
    <div class="col-md-12">
      <form class="form-inline float-sm-right" onsubmit="return false">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 datefilter"  placeholder="From">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 datefilter"  placeholder="To">
        <button class="btn btn-primary excel-button mb-2 mr-sm-2 mb-sm-0">Excel</button>
        <button class="btn btn-primary new-button-commission mb-2 mb-sm-0">New</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 class="title">Commission Based Record</h2>
    </div>
  </div>
  <table id="commision_record" class="table table-bordered table-condensed" >
      <thead>
      <tr>
          <th class="table-numbers_commission">No.</th>
          <th class="main_col_commission">Car&nbsp;No.</th>
          <th class="main_col_commission">Model</th>
          <th class="main_col_commission">Company</th>
          <th class="orange_col">Claim</th>
          <th class="orange_col">Checker</th>
          <th class="main_col_commission">Commission</th>
          <th class="purple_col">Payable</th>
          <th class="purple_col">Status</th>
          <th class="red_col"></th>
      </tr>
      </thead>
  </table>
</div>

@include('partials.commission.modals.car_no')
@include('partials.commission.modals.company')
@include('partials.commission.modals.claim')
@include('partials.commission.modals.commission')
@include('partials.commission.modals.payable')
@push('scripts')
<script type="text/javascript" src="{{ asset('js/custom_scripts.js') }}"></script>
@endpush
@endsection
