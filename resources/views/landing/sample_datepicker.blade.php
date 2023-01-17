<script>
<div class="row col-md-8 text-left m-0"
	style="justify-content:flex-end">

	 <form action="{{route('export_excel_fuel_receipt')}}"
		method="POST" style="margin-right: 0;margin-bottom:0">

		<div style="display:inline;padding-left:0;">
			<input class="to_date form-control btnremove"
			style="display:inline;margin-top:10px;padding-top:0px !important;
			position:relative;top:2px;
			padding-bottom: 0px; width:110px;padding-right:0;padding-left:0px;
			text-align: center;"
			value="Start Date"
			onclick="ev_start_dialog()"
			id="ev_start_date" name="fuel_start_date" placeholder="Select" />
		</div>
		{{ csrf_field() }}
		To
		<div style="display:inline;padding-left:0;
			margin-bottom:20px">
			<input class="to_date form-control btnremove"
			style="display:inline;margin-top:10px;padding-top:0px !important;
			position:relative;top:2px;
			padding-bottom: 0px; width:110px;padding-right:0;
			padding-left:0px; text-align: center;"
			value="End Date"
			onclick="ev_end_dialog()"
			id="ev_end_date" name="fuel_end_date" placeholder="Select" />
		</div>
		<div style="right:200px;display:inline;
			padding-left:30px;margin-bottom:20px" id="btnFetch2">
			 <button class="btn btn-success "
				style="height:70px;width: 70px; border-radius:10px !important;"
				id="fulltank-rl" style="color:white;">
			   <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true" style="z-index:2; position: fixed; margin-top: 3px;
				margin-left:14px"></span>
				Excel
			</button>
		</div>
	</form>

</div>

</script>
