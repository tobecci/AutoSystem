<div class="modal fade" id="billCostModal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true" style="padding-right:0 !important">
	<div class="modal-dialog modal-dialog-centered d-flex flex-row justify-content-center" role="document">
		<div class="modal-content" style="width:300px">
            <div class="modal-header border-bottom-0 bill--edit-cost-modal">
				<div class="row col-md-12 m-0 p-0 text-center">
					<div class="col-12 m-0 p-0 midborder input-container">
                        <input inputmode="numeric" class="text-center"
							id="cost-input-box" onblur="updateBillRecordCost()">
                        <input type="text" hidden class="text-center"
							id="cost-input-box-buffer">
					</div>
				</div>
			</div>
		</div>
	</div>
    <span hidden id="bill--cost-id"></span>
</div>
</div>
