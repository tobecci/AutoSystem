<div class="modal fade" id="bill_outstanding_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content rounded-10">
			<div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div class="col-md-6 outstanding-title d-flex justify-content-center align-items-center cost-container">
                            <div>Cost</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <div id="cost-main"></div>
                                <div id="cost-buffer" hidden></div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 outstanding-title d-flex justify-content-center align-items-center">
                            <div>Payment 1</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="cost-payment1-main" class="form-control" onblur="update_billrecord_outstanding()">
                                <input type="text" id="cost-payment1-buffer" hidden>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 outstanding-title d-flex justify-content-center align-items-center">
                            <div>Payment 2</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="cost-payment2-main" class="form-control" onblur="update_billrecord_outstanding()">
                                <input type="text" id="cost-payment2-buffer" hidden>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 outstanding-title d-flex justify-content-center align-items-center">
                            <div>Payment 3</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2">
                                <input type="text" id="cost-payment3-main" class="form-control" onblur="update_billrecord_outstanding()">
                                <input type="text" id="cost-payment3-buffer" hidden>
                            </div>
                    </div>

                    <div class="row" style="height:54px">
                        <div class="col-md-6 outstanding-title d-flex justify-content-center align-items-center outstanding-container">
                            <div>Outstanding</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <div id="cost-outstanding-main" class="border-0"></div>
                                <div id="cost-outstanding-buffer" hidden></div>
                            </div>
                    </div>
                </div>

				<span id="bill_outstanding_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
