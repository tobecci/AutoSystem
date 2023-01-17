<div class="modal fade" id="commission_car_number_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true" style="padding-right:0 !important">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header commission--car-number">
				<div class="row col-md-12 m-0 p-0 text-center">
					<div class="col-md-6 m-0 p-0">
						Car No
					</div>
					<div class="col-md-6 m-0 p-0 midborder">
						Model
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<input id="commission-car-number-main"
							onblur="update_car_number()"
							type="text"
                            class="form-control"
                            >
					</div>
					<div class="col-md-6">
						<input id="commission-model-main"
							onblur="update_car_number()"
							type="text"
                            class="form-control"
                            >
					</div>
				</div>

				<span id="commission_record_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
