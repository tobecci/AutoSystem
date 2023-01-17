<div class="modal fade" id="bill_balance_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content rounded-10">
			<div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div class="col-md-6 balance-title d-flex justify-content-center align-items-center cost-container">
                            <div>Total</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <div id="total-main"></div>
                                <div id="total-buffer" hidden></div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 balance-title d-flex justify-content-center align-items-center">
                            <div>Receive 1</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="receive-payment1-main" class="form-control" onblur="update_balance()">
                                <input type="text" id="receive-payment1-buffer" hidden>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 balance-title d-flex justify-content-center align-items-center">
                            <div>Receive 2</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                                <input type="text" id="receive-payment2-main" class="form-control" onblur="update_balance()">
                                <input type="text" id="receive-payment2-buffer" hidden>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 balance-title d-flex justify-content-center align-items-center">
                            <div>Receive 3</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2">
                                <input type="text" id="receive-payment3-main" class="form-control" onblur="update_balance()" >
                                <input type="text" id="receive-payment3-buffer" hidden>
                            </div>
                    </div>

                    <div class="row" style="height:54px">
                        <div class="col-md-6 balance-title d-flex justify-content-center align-items-center outstanding-container">
                            <div>Balance</div>
                        </div>
                            <div class="outstanding-input form-group col-md-6  mb-2 mt-2 d-flex justify-content-center align-items-center ">
                                <div id="balance-main" class="border-0"></div>
                                <div id="balance-buffer" hidden></div>
                            </div>
                    </div>
                </div>

				<span id="bill_balance_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
