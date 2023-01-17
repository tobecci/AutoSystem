<div class="modal fade" id="bill_referrer_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content rounded-10">
			<div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div class="col-md-6 referrer-title d-flex justify-content-center align-items-center cost-container">
                            <div>Company</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <input type="text" class="form-control" id="company" onblur="update_referrer()">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 referrer-title d-flex justify-content-center align-items-center">
                            <div>Referrer</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="referrer-main" class="form-control" onblur="update_referrer()">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 referrer-title d-flex justify-content-center align-items-center">
                            <div>Commission</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="commision-main" class="form-control" onblur="update_referrer()">
                                <input type="text" id="commision-buffer" hidden>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 referrer-title d-flex justify-content-center align-items-center">
                            <div>Paid</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2">
                                <input type="text" id="paid-main" class="form-control" onblur="update_referrer()" >
                                <input type="text" id="paid-buffer" hidden>
                            </div>
                    </div>

                    <div class="row" style="height:54px">
                        <div class="col-md-6 referrer-title d-flex justify-content-center align-items-center outstanding-container">
                            <div>Outstanding</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <div id="outstanding-main" class="border-0">0.00</div>
                                <div id="outstanding-buffer" hidden></div>
                            </div>
                    </div>
                </div>

				<span id="bill_referrer_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
