<div class="modal fade" id="commission_company_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content rounded-10">
			<div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div class="col-md-6 commission-referrer-title d-flex justify-content-center align-items-center cost-container">
                            <div>Company</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <input type="text" class="form-control" id="commission-company" onblur="update_commission_referrer()">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-referrer-title d-flex justify-content-center align-items-center">
                            <div>Referrer</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="commission-referrer" class="form-control" onblur="update_commission_referrer()">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-referrer-title d-flex justify-content-center align-items-center">
                            <div>Commission</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="commission-fee-main" class="form-control" onblur="update_commission_referrer()">
                                <input type="text" id="commission-fee-buffer" hidden>
                            </div>
                    </div>
                </div>

				<span id="commission_company_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
