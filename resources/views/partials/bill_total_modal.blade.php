<div class="modal fade" id="bill_total_modal" tabindex="-1" role="dialog" aria-labelledby="billDateClickModal" aria-modal="true" data-mdb-backdrop="true" data-mdb-keyboard="true" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
                <div class="container" style="">
                    <div class="row bill-total--heading">
                        <div class="col-md-2"
							style="border-top-left-radius:10px !important;
								border:1px solid white">
                            <div>Date</div>
                        </div>
                        <div class="col-md-10"
							style="border-top-right-radius:10px !important;
							border:1px solid white;border-left:0">
                            <div class="row m-0">
                                <div class="col-md-3">
                                    <div>Gross</div>
                                </div>
                                <div class="col-md-3 midborder1">
                                    <div>Cart</div>
                                </div>
                                <div class="col-md-3 midborder1">
                                    <div>Adj</div>
                                </div>
                                <div class="col-md-3 midborder1">
                                    <div>Total</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bill-total--body">
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="date-1" onchange="update_bill_total()">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="gross-1" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="gross-1-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="cart-1" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="cart-1-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="adj-1" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="adj-1-buffer" hidden>
                                </div>
                                <div class="col-md-3 total-display-container">
                                    <div id="total-1" class="total-display"></div>
                                    <div id="total-1-buffer" hidden></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bill-total--body">
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="date-2" onchange="update_bill_total()">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="gross-2" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="gross-2-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="cart-2" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="cart-2-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="adj-2" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="adj-2-buffer" hidden>
                                </div>
                                <div class="col-md-3 total-display-container">
                                    <div id="total-2" class="total-display"></div>
                                    <div id="total-2-buffer" hidden></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bill-total--body">
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="date-3" onchange="update_bill_total()">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="gross-3" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="gross-3-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="cart-3" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="cart-3-buffer" hidden>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="2800.00" id="adj-3" onblur="update_bill_total()">
                                    <input type="text" class="form-control" id="adj-3-buffer" hidden>
                                </div>
                                <div class="col-md-3 total-display-container">
                                    <div id="total-3" class="total-display"></div>
                                    <div id="total-3-buffer" hidden></div>
                                </div>
                            </div>
                        </div>
                    </div>
				<span id="bill_total_id" hidden></span>
			</div>
		</div>
	</div>
</div>
</div>
