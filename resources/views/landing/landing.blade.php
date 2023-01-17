@extends('layout.app')

@section('content')

<div class="main-container mt-5">
  <div class="row">
    <div class="col-md-12">
      <form class="form-inline float-sm-right" onsubmit="return false">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 datefilter" id="from" placeholder="From">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0 datefilter" id="to" placeholder="To">
        <button class="btn btn-primary excel-button mb-2 mr-sm-2 mb-sm-0">Excel</button>
        <button class="btn btn-primary new-button-bill mb-2 mb-sm-0">New</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 class="title">Bill Based Record</h2>
    </div>
  </div>
  <table id="bill_record" class="table table-bordered table-condensed" >
      <thead>
      <tr>
          <th class="table-numbers">No.</th>
          <th class="main_col">Date</th>
          <th class="main_col">Car&nbsp;No.</th>
          <th class="main_col">Model</th>
          <th class="orange_col">Total</th>
          <th class="purple_col">Cost</th>
          <th class="main_col">P&amp;L</th>
          <th class="ref_col">Referrer</th>
          <th class="main_col">Ref&nbsp;Fee</th>
          <th class="purple_col">Outstanding</th>
          <th class="orange_col">Balance</th>
          <th class="red_col"></th>
      </tr>
      </thead>
  </table>
</div>



@include('partials.bill_edit_date_modal')
@include('partials.bill_edit_cost_modal')
@include('partials.bill_outstanding_modal')
@include('partials.bill_total_modal')
@include('partials.bill_balance_modal')
@include('partials.bill_referrer_modal')
@include('partials.datepicker')
@push('scripts')
<script type="text/javascript" src="{{ asset('js/osmanli_calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom_scripts.js') }}?version={{date("hmis")}}"></script>
@endpush
@endsection
