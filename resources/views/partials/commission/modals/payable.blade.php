<div class="modal fade" id="commission_payable_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal"
    aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-10">
            <div class="modal-body p-0">
                <div class="container outstanding-container">
                    <div class="row">
                        <div
                            class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center cost-container">
                            <div>Total Amount</div>
                        </div>
                        <div
                            class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center ">
                            <input type="text" class="form-control" id="payable-total-amount-main"
                                onblur="update_payable_fields()">
                            <input type="text" class="form-control" id="payable-total-amount-buffer" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Add: Adjuster/Survey Fee</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="payable-adjuster-main" class="form-control"
                                onblur="update_payable_fields()">
                            <input type="text" id="payable-adjuster-buffer" class="form-control" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Claim</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center">
                            <div type="text" id="payable-claim-main">0.00</div>
                            <div type="text" id="payable-claim-buffer" hidden></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Service Charge 10%</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="payable-service-charge-main" class="form-control"
                                onblur="update_payable_fields()">
                            <input type="text" id="payable-service-charge-buffer" class="form-control" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Document Fees</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="payable-document-fees-main" class="form-control"
                                onblur="update_payable_fields()">
                            <input type="text" id="payable-document-fees-buffer" class="form-control" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Comm</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2">
                            <input type="text" id="payable-comm-main" class="form-control"
                                onblur="update_payable_fields()">
                            <input type="text" id="payable-comm-buffer" class="form-control" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Deduct Amount</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center">
                            <div type="text" id="payable-deduct-amount-main">0.00</div>
                            <div type="text" id="payable-deduct-amount-buffer" hidden></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div>Payable to Workshop</div>
                        </div>
                        <div class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center">
                            <div type="text" id="payable-workshop-main">0.00</div>
                            <div type="text" id="payable-workshop-buffer" hidden></div>
                        </div>
                    </div>
                    <div class="row" id="commission-payable-button-row">
                        <div
                            class="col-md-6 commission-payable-title d-flex justify-content-center align-items-center">
                            <div></div>
                        </div>
                        <div
                            class="outstanding-input form-group col-md-6 mb-2 mt-2 d-flex justify-content-center align-items-center">
                            <button class="btn" id="payable-pay-btn"
                                onclick="update_payable_onclick_button()">Pay</button>
                        </div>
                    </div>
                </div>

                <span id="commission_payable_id" hidden></span>
            </div>
        </div>
    </div>
</div>
</div>
