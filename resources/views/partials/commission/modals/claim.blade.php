<div class="modal fade" id="commission_claim_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal"
    aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-10">
            <div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div
                            class="col-md-6 commission-claim-title d-flex justify-content-center align-items-center cost-container">
                            <div>Total Amount</div>
                        </div>
                        <div
                            class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                            <input type="text" class="form-control" id="claim-total-amount-main"
                                onblur="update_claim_fields()">
                            <input type="text" class="form-control" id="claim-total-amount-buffer" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-claim-title d-flex justify-content-center align-items-center">
                            <div>(Less) Lawyer Commission</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="claim-lawyer-commission-main" class="form-control"
                                onblur="update_claim_fields()">
                            <input type="text" id="claim-lawyer-commission-buffer" hidden class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-claim-title d-flex justify-content-center align-items-center">
                            <div>Add: Adjuster/Survey Fee</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="claim-adjuster-fee-main" class="form-control"
                                onblur="update_claim_fields()">
                            <input type="text" id="claim-adjuster-fee-buffer" hidden class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-claim-title d-flex justify-content-center align-items-center">
                            <div>From Lawyer</div>
                        </div>
                        <div
                            class="outstanding-input form-group col-md-6 mb-2 mt-2  d-flex justify-content-center align-items-center">
                            <div id="claim-from-lawyer-main">0.00</div>
                                    <div id="claim-from-lawyer-buffer" hidden></div>
                                </div>
                            </div>

                            <div class="row" id="commission-claim-button-row">
                                <div
                                    class="col-md-6 commission-claim-title d-flex justify-content-center align-items-center">
                                    <div></div>
                                </div>
                                <div
                                    class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center">
                                    <button class="btn" id="commission-claim-pay-btn"
                                        onclick="update_claim()">Pay</button>
                                </div>
                            </div>
                        </div>

                        <span id="commission_claim_id" hidden></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
