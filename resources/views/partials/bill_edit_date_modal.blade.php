<div class="modal fade" id="billDateClickModal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true" style="padding-right:0 !important">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bill--edit-table">
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
						<input id="car-number"
							onblur="updateBillRecordFromDateContext()"
							type="text" value="default">
					</div>
					<div class="col-md-6">
						<input id="model"
							onblur="updateBillRecordFromDateContext()"
							type="text" value="default">
					</div>
				</div>

				<span id="bill_record_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
