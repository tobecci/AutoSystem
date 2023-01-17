/**
 * @author tobecci
 * start of utility functions
 *
 */

function formatCurrency(value) {
    const moneyFormatter = new Intl.NumberFormat("en-US", {
        minimumFractionDigits: 2,
    });
    return moneyFormatter.format(value);
}

function atm_money(num) {
    let result;
    if (num.toString().length == 1) {
        result = "00.0" + num.toString();
    } else if (num.toString().length == 2) {
        result = "00." + num.toString();
    } else if (num.toString().length == 3) {
        result =
            "0" +
            num.toString()[0] +
            "." +
            num.toString()[1] +
            num.toString()[2];
    } else if (num.toString().length >= 4) {
        result =
            num.toString().slice(0, num.toString().length - 2) +
            "." +
            num.toString()[num.toString().length - 2] +
            num.toString()[num.toString().length - 1];
    }
    return formatCurrency(result);
}

function cent_to_dollar(cent) {
    return Number(cent) / 100;
}

function get_number_from_text_element(element) {
    element = $(`#${element}`);
    const number_as_string = element.text();
    return Number(number_as_string);
}

/**
 * sets the text_element main(formatted) and buffer element(raw)
 * @param {object} element
 * @param {number} amount
 * @returns {void}
 */
function set_number_to_text_element(element, amount) {
    const main_element = $(`#${element}-main`);
    const buffer_element = $(`#${element}-buffer`);
    const formatted_amount = formatCurrency(cent_to_dollar(Number(amount)));
    main_element.text(formatted_amount);
    buffer_element.text(amount);
}

/**
 * sets the input's main(formatted) and buffer element(raw)
 * @param {object} element
 * @param {number} amount
 */
function set_number_to_input_element(element, amount) {
    const main_element = $(`#${element}-main`);
    const buffer_element = $(`#${element}-buffer`);
    const formatted_amount = formatCurrency(cent_to_dollar(Number(amount)));
    main_element.val(formatted_amount);
    buffer_element.val(amount);
}

/**
 * sets the input text to the value
 * @param {object} element
 * @param {number} value
 */
function set_text_to_one_input_element(element, value) {
    const input_element = $(`#${element}`);
    input_element.val(value);
}

/**
 * sets text element to the given value
 * @param {object} element
 * @param {number} value
 * @returns {void}
 */
function set_text_to_one_text_element(element, value) {
    const text_element = $(`#${element}`);
    text_element.text(value);
}

/**
 * gets number from an input element
 * @param { string } element
 * @returns { number } number
 */
function get_number_from_input_element(element) {
    element = $(`#${element}`);
    const number_as_string = element.val();
    return Number(number_as_string);
}

/**
 * gets number from an input element's buffer
 * @param { string } element
 * @returns { number } number
 */
function get_number_from_input_buffer_element(element) {
    element = $(`#${element}-buffer`);
    const number_as_string = element.val();
    return Number(number_as_string);
}

/**
 * gets text from an input element
 * @param { string } element
 * @returns { string } text
 */
function get_text_from_input_element(element) {
    element = $(`#${element}`);
    return element.val();
}

/**
 * gets text from a text element e.g div
 * @param { string } element
 * @returns { string } text
 */
function get_text_from_text_element(element) {
    element = $(`#${element}`);
    return element.text();
}

/**
 * fill main and buffer with appropriate data, and add
 * currency input validator
 * @param {string} element
 * @param {number} amount
 */
function fill_main_and_buffer(element, amount) {
    let main_element = $(`#${element}-main`);
    let buffer_element = $(`#${element}-buffer`);
    main_element.val(formatCurrency(cent_to_dollar(amount)));
    buffer_element.val(amount);
    const validator = validateCurrencyDigits(main_element, buffer_element);
    validator();
}

function fill_input_element(element, value) {
    const input_element = $(`#${element}`);
    console.log({ input_element });
    input_element.val(value);
}

/**
 * fill main and buffer text element with a value
 * @param {*} element
 * @param {*} amount
 */
function fill_text_and_buffer(element, amount) {
    let main_element = $(`#${element}-main`);
    let buffer_element = $(`#${element}-buffer`);
    main_element.text(formatCurrency(cent_to_dollar(amount)));
    buffer_element.text(amount);
}

function validateCurrencyDigits(target_input_field, buffer_input_field) {
    // remove event listener
    target_input_field.off("keyup");

    return function () {
        // console.log("registering formatter", { target_input_field, buffer_input_field})
        target_input_field.on("keyup", function (event) {
            //when backspace is pressed
            if (event.keyCode == 8) {
                let old_number = buffer_input_field.val();
                let number_without_last_character = old_number.slice(0, -1);
                // console.log({ old_number, number_without_last_character})
                buffer_input_field.val(number_without_last_character);
            }
            /** prevents the following keys from being recognized
               Enter, direction buttons, and non numeric keys
               **/
            if (
                isNaN(event.key) ||
                $.inArray(event.keyCode, [13, 38, 40, 37, 39]) !== -1 ||
                event.keyCode == 13
            ) {
                if (buffer_input_field.val() != "") {
                    let buffer_valid_number = atm_money(
                        parseInt(buffer_input_field.val())
                    );
                    target_input_field.val(buffer_valid_number);
                    if (buffer_valid_number === "00.00") {
                        target_input_field.val("0.00");
                    }
                } else {
                    target_input_field.val("0.00");
                }
                return null;
            }

            const input = event.key;
            old_val = buffer_input_field.val();
            if (old_val === "0.00") {
                buffer_input_field.val("");
                target_input_field.val("");
                old_val = "";
            }
            let combined_buffer_value = "" + old_val + input;
            buffer_input_field.val(combined_buffer_value);
            let combined_formatted_value = atm_money(
                parseInt(buffer_input_field.val())
            );
            target_input_field.val(combined_formatted_value);
        });
    };
}

function getDisplayDate(dateObject) {
    let date = new Date(dateObject);
    let months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sept",
        "Oct",
        "Nov",
        "Dec",
    ];
    let customDate = `${date.getDate()}${months[date.getMonth()]}${date
        .getFullYear()
        .toString()
        .substring(2, 4)}`;
    return customDate;
}

function getDateTimeStamp(date) {
    return new Date(date).getTime() / 1000;
}

function fetch_bill_record(id, modal_element = false, function_to_run = false) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: `/billrecord/${id}`,
        async: false,
        success: function (res) {
            if (res.status) {
                if (function_to_run) function_to_run(res);
                $("#bill_record").DataTable().draw(false);
                return res;
            } else {
                console.log("failure");
            }
        },
    });

    if (modal_element && modal_element !== "") modal_element.modal("toggle");
}

function fetch_commission_record(
    id,
    modal_element = false,
    function_to_run = false
) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: `/commission/find-record/${id}`,
        async: false,
        success: function (res) {
            if (res.status) {
                if (function_to_run) function_to_run(res);
                $("#commision_record").DataTable().draw(false);
                return res;
            } else {
                console.log("failure");
            }
        },
    });

    if (modal_element && modal_element !== "") modal_element.modal("toggle");
}

/**
 *
 * end of utility functions
 *
 */

$(document).ready(function () {
    // Bill record Datatable
    let billRecord = $("#bill_record").DataTable({
        // lengthChange: false,
        // language: { search: '', searchPlaceholder: "Search" },
        ajax: "/landing",
        serverSide: true,
        processing: true,
        autoWidth: false,
        retrieve: true,
        ordering: true,
        order: [[1, "desc"]],
        // paging:false,
        // bInfo:false,
        columnDefs: [
            {
                data: "DT_RowIndex",
                targets: 0,
                width: "30px",
                orderable: false,
                searchable: false,
            },
            { data: "created_at", targets: 1, width: "150px" },
            { data: "car_no", targets: 2, width: "100px" },
            { data: "model", targets: 3, width: "100px" },
            { data: "total", targets: 4, width: "100px" },
            { data: "cost", targets: 5, width: "100px" },
            { data: "profitloss", targets: 6, width: "100px" },
            { data: "referrer", targets: 7, width: "auto" },
            { data: "ref_fee", targets: 8, width: "100px" },
            { data: "outstanding", targets: 9, width: "100px" },
            { data: "balance", targets: 10, width: "100px" },
            {
                data: "action",
                targets: 11,
                orderable: false,
                searchable: false,
                width: "30px",
            },
        ],
    });

    $(".new-button-bill").on("click", function () {
        // api calling for
        let data = {};
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            type: "POST",
            contentType: "application/json",
            url: "/billrecord/add/record",
            data: data,
            success: function (res) {
                if (res.status) {
                    console.log("success");
                    $("#bill_record").DataTable().draw(false);
                } else {
                    console.log("failure");
                }
            },
        });
    });

    $(document).on("click", ".delete-bill-record", function (e) {
        e.preventDefault();
        console.log($(this));
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var url = $(this).data("remote");
        console.log("url");
        // confirm then
        $.ajax({
            url: url,
            type: "DELETE",
            dataType: "json",
            data: { method: "_DELETE", submit: true },
        }).always(function (data) {
            $("#bill_record").DataTable().draw(false);
        });
    });

    // Commission Record Datatable
    let commissionRecord = $("#commision_record").DataTable({
        // lengthChange: false,
        // language: { search: '', searchPlaceholder: "Search" },
        ajax: "/commission",
        serverSide: true,
        processing: true,
        autoWidth: false,
        retrieve: true,
        ordering: true,
        order: [[10, "desc"]],
        // paging:false,
        // bInfo:false,
        columnDefs: [
            {
                data: "DT_RowIndex",
                targets: 0,
                width: "30px",
                orderable: false,
                searchable: false,
            },
            { data: "car_no", targets: 1, width: "100px" },
            { data: "model", targets: 2, width: "100px" },
            { data: "company", targets: 3, width: "auto" },
            { data: "claim", targets: 4, width: "100px" },
            { data: "checker", targets: 5, width: "100px" },
            { data: "commission", targets: 6, width: "100px" },
            { data: "payable", targets: 7, width: "100px" },
            { data: "status", targets: 8, width: "100px" },
            {
                data: "action",
                targets: 9,
                orderable: false,
                searchable: false,
                width: "30px",
            },
            { data: "created_at", targets: 10, width: "150px", visible: false },
        ],
    });

    $(".new-button-commission").on("click", function () {
        // api calling for
        let data = {};
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            type: "POST",
            contentType: "application/json",
            url: "/commission/add/record",
            data: data,
            success: function (res) {
                if (res.status) {
                    console.log("success");
                    $("#commision_record").DataTable().draw(false);
                } else {
                    console.log("failure");
                }
            },
        });
    });

    // Delete Record
    $(document).on("click", ".delete-commission-record", function (e) {
        e.preventDefault();
        console.log($(this));
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var url = $(this).data("remote");
        console.log("url");
        // confirm then
        $.ajax({
            url: url,
            type: "DELETE",
            dataType: "json",
            data: { method: "_DELETE", submit: true },
        }).always(function (data) {
            $("#commision_record").DataTable().draw(false);
        });
    });
});

// edit bill date
async function editBillDate(id) {
    await fetchBillRecord(id);
    // show modal
    $("#billDateClickModal").modal("toggle");
    $("#billDateClickModal").attr("style", "padding-right:0px;");
}

function editCost(id) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: `/billrecord/${id}`,
        success: function (res) {
            if (res.status) {
                //fill modal
                let cost_in_dollars = Number(res.data.cost) / 100;
                $("input#cost-input-box").val(formatCurrency(cost_in_dollars));

                $("input#cost-input-box-buffer").val(res.data.cost);
                $("#bill--cost-id").text(id);
                Window.bill_record = res.data;
                //atm number input
                const cost_input_element = $("#cost-input-box");
                const cost_input_buffer_element = $("#cost-input-box-buffer");
                const validator = validateCurrencyDigits(
                    cost_input_element,
                    cost_input_buffer_element
                );
                validator();
                console.log({ validator });
                $("#bill_record").DataTable().draw(false);
            } else {
                console.log("failure");
            }
        },
    });

    $("#billCostModal").modal("toggle");
}

async function fetchBillRecord(id) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: `/billrecord/${id}`,
        success: function (res) {
            if (res.status) {
                console.log({ bill_record: res.data });
                //fill modal
                $("input#car-number").val(res.data.car_no);
                $("input#model").val(res.data.model);
                $("#bill_record_id").text(id);
                $("#bill_record").DataTable().draw(false);
            } else {
                console.log("failure");
            }
        },
    });
}

function update_billrecord(request_body) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: "/updatebillrecord",
        data: request_body,
        success: function (res) {
            if (res.status) {
                $("#bill_record").DataTable().draw("page");
            } else {
                console.log("failure");
            }
        },
    });
}

function updateBillRecordFromDateContext() {
    const bill_record_id = $("#bill_record_id").text();
    const request_body = {
        car_no: $("input#car-number").val(),
        model: $("input#model").val(),
        id: bill_record_id,
    };

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: "/updatebillrecord",
        data: request_body,
        success: function (res) {
            if (res.status) {
                $("#bill_record").DataTable().draw("page");
            } else {
                console.log("failure");
            }
        },
    });
}

// fetch and edit functions

// functions that run when table columns are clicked

function updateBillRecordCost() {
    const id = $("#bill--cost-id").text();
    let costValue = $("input#cost-input-box-buffer").val();
    let costInCents = Number(costValue);
    let profitloss = 0;
    const bill_record = fetch_bill_record(id, "", function (res) {
        profitloss = res.data.total - costInCents;
    });
    const request_body = {
        cost: costInCents,
        id: id,
        profitloss: profitloss,
    };
    update_billrecord(request_body);
}

function editOutstanding(id) {
    fetch_bill_record(id, $("#bill_outstanding_modal"), function (res) {
        const { data } = res;
        const { bill_outstanding } = data;
        console.log({ data, bill_outstanding });
        $("#bill_outstanding_id").text(id);

        //fill main inputs
        $("#cost-main").text(formatCurrency(cent_to_dollar(data.cost)));
        $("#cost-outstanding-main").text(
            formatCurrency(cent_to_dollar(data.outstanding))
        );
        $("#cost-payment1-main").val(
            formatCurrency(cent_to_dollar(bill_outstanding.opayment1))
        );
        $("#cost-payment2-main").val(
            formatCurrency(cent_to_dollar(bill_outstanding.opayment2))
        );
        $("#cost-payment3-main").val(
            formatCurrency(cent_to_dollar(bill_outstanding.opayment3))
        );

        //fill buffer inputs
        $("#cost-buffer").text(data.cost);
        $("#cost-outstanding-buffer").text(data.outstanding);
        $("#cost-payment1-buffer").val(bill_outstanding.opayment1);
        $("#cost-payment2-buffer").val(bill_outstanding.opayment2);
        $("#cost-payment3-buffer").val(bill_outstanding.opayment3);

        // register formatters on relevant fields
        const payment_1_validator = validateCurrencyDigits(
            $("#cost-payment1-main"),
            $("#cost-payment1-buffer")
        );
        const payment_2_validator = validateCurrencyDigits(
            $("#cost-payment2-main"),
            $("#cost-payment2-buffer")
        );
        const payment_3_validator = validateCurrencyDigits(
            $("#cost-payment3-main"),
            $("#cost-payment3-buffer")
        );
        // const cost_validator = validateCurrencyDigits($('#cost-main'), $('#cost-buffer'));
        // const cost_outstanding_validator = validateCurrencyDigits($('#cost-outstanding-main'), $('#cost-outstanding-buffer'));

        payment_1_validator();
        payment_2_validator();
        payment_3_validator();
        // cost_outstanding_validator();
    });
}

function update_billrecord_outstanding() {
    let cost = Number($("#cost-buffer").text());
    let payment_1 = Number($("#cost-payment1-buffer").val());
    let payment_2 = Number($("#cost-payment2-buffer").val());
    let payment_3 = Number($("#cost-payment3-buffer").val());
    let outstanding = cost - (payment_1 + payment_2 + payment_3);

    // if outstanding is negative reset all payment fields
    if (outstanding < 0) {
        let default_payment_value = 0;
        //main
        $("#cost-payment1-main").val(
            formatCurrency(cent_to_dollar(default_payment_value))
        );
        $("#cost-payment2-main").val(
            formatCurrency(cent_to_dollar(default_payment_value))
        );
        $("#cost-payment3-main").val(
            formatCurrency(cent_to_dollar(default_payment_value))
        );

        //buffer
        $("#cost-payment1-buffer").val(default_payment_value);
        $("#cost-payment2-buffer").val(default_payment_value);
        $("#cost-payment3-buffer").val(default_payment_value);

        return null;
    }

    //change outstanding element to reflect
    $("#cost-outstanding-buffer").text(outstanding);
    $("#cost-outstanding-main").text(
        formatCurrency(cent_to_dollar(outstanding))
    );

    //prepare buffer values
    let request_body = {
        cost: cost,
        id: Number($("#bill_outstanding_id").text()),
        outstanding: Number($("#cost-outstanding-buffer").text()),
        bill_outstanding: {
            opayment1: payment_1,
            opayment2: payment_2,
            opayment3: payment_3,
            outstanding: outstanding,
        },
    };

    update_billrecord(request_body);

    console.log({ request_body });
}

function register_total_input_formatters() {
    // gross fields
    const gross_1_validator = validateCurrencyDigits(
        $("#gross-1"),
        $("#gross-1-buffer")
    );
    const gross_2_validator = validateCurrencyDigits(
        $("#gross-2"),
        $("#gross-2-buffer")
    );
    const gross_3_validator = validateCurrencyDigits(
        $("#gross-3"),
        $("#gross-3-buffer")
    );

    //cart fields
    const cart_1_validator = validateCurrencyDigits(
        $("#cart-1"),
        $("#cart-1-buffer")
    );
    const cart_2_validator = validateCurrencyDigits(
        $("#cart-2"),
        $("#cart-2-buffer")
    );
    const cart_3_validator = validateCurrencyDigits(
        $("#cart-3"),
        $("#cart-3-buffer")
    );

    //adj fields
    const adj_1_validator = validateCurrencyDigits(
        $("#adj-1"),
        $("#adj-1-buffer")
    );
    const adj_2_validator = validateCurrencyDigits(
        $("#adj-2"),
        $("#adj-2-buffer")
    );
    const adj_3_validator = validateCurrencyDigits(
        $("#adj-3"),
        $("#adj-3-buffer")
    );

    //total fields
    // const total_1_validator = validateCurrencyDigits($('#total-1'), $('#total-1-buffer'));
    // const total_2_validator = validateCurrencyDigits($('#total-2'), $('#total-2-buffer'));
    // const total_3_validator = validateCurrencyDigits($('#total-3'), $('#total-3-buffer'));

    gross_1_validator();
    gross_2_validator();
    gross_3_validator();

    cart_1_validator();
    cart_2_validator();
    cart_3_validator();

    adj_1_validator();
    adj_2_validator();
    adj_3_validator();

    // total_1_validator();
    // total_2_validator();
    // total_3_validator();
}

/**
 * fill total input boxes
 * @param {*} id
 * @param {*} data
 * @param {*} bill_total
 */
function fill_total_inputs(id, data, bill_total) {
    $("#bill_total_id").text(id);
    console.log({ id, data, bill_total });

    //fill main inputs
    $("#gross-1").val(formatCurrency(cent_to_dollar(bill_total[0]["gross"])));
    $("#cart-1").val(formatCurrency(cent_to_dollar(bill_total[0]["cart"])));
    $("#adj-1").val(formatCurrency(cent_to_dollar(bill_total[0]["adj"])));
    $("#total-1").text(formatCurrency(cent_to_dollar(bill_total[0]["total"])));

    $("#gross-2").val(formatCurrency(cent_to_dollar(bill_total[1]["gross"])));
    $("#cart-2").val(formatCurrency(cent_to_dollar(bill_total[1]["cart"])));
    $("#adj-2").val(formatCurrency(cent_to_dollar(bill_total[1]["adj"])));
    $("#total-2").text(formatCurrency(cent_to_dollar(bill_total[1]["total"])));

    $("#gross-3").val(formatCurrency(cent_to_dollar(bill_total[2]["gross"])));
    $("#cart-3").val(formatCurrency(cent_to_dollar(bill_total[2]["cart"])));
    $("#adj-3").val(formatCurrency(cent_to_dollar(bill_total[2]["adj"])));
    $("#total-3").text(formatCurrency(cent_to_dollar(bill_total[2]["total"])));

    //fill buffer inputs
    $("#gross-1-buffer").val(bill_total[0]["gross"]);
    $("#cart-1-buffer").val(bill_total[0]["cart"]);
    $("#adj-1-buffer").val(bill_total[0]["adj"]);
    $("#total-1-buffer").text(bill_total[0]["total"]);

    $("#gross-2-buffer").val(bill_total[1]["gross"]);
    $("#cart-2-buffer").val(bill_total[1]["cart"]);
    $("#adj-2-buffer").val(bill_total[1]["adj"]);
    $("#total-2-buffer").text(bill_total[1]["total"]);

    $("#gross-3-buffer").val(bill_total[2]["gross"]);
    $("#cart-3-buffer").val(bill_total[2]["cart"]);
    $("#adj-3-buffer").val(bill_total[2]["adj"]);
    $("#total-3-buffer").text(bill_total[2]["total"]);

    //fill date inputs

    // main
    // $('#date-1').text(getDisplayDate(new Date(bill_total[0]['totaldate'])));
    // $('#date-2').text(getDisplayDate(new Date(bill_total[1]['totaldate'])));
    // $('#date-3').text(getDisplayDate(new Date(bill_total[2]['totaldate'])));
    $("#date-1").val(bill_total[0]["totaldate"]);
    $("#date-2").val(bill_total[1]["totaldate"]);
    $("#date-3").val(bill_total[2]["totaldate"]);

    console.log({
        fill_total_inputs: bill_total,
        date: getDateTimeStamp(new Date(bill_total[0]["totaldate"])),
    });
}

function update_bill_total() {
    const id = Number($("#bill_total_id").text());

    let bill_total = [
        {
            gross: Number($("#gross-1-buffer").val()),
            cart: Number($("#cart-1-buffer").val()),
            adj: Number($("#adj-1-buffer").val()),
            total: 0,
            totaldate: $("#date-1").val(),
        },
        {
            gross: Number($("#gross-2-buffer").val()),
            cart: Number($("#cart-2-buffer").val()),
            adj: Number($("#adj-2-buffer").val()),
            total: 0,
            totaldate: $("#date-2").val(),
        },
        {
            gross: Number($("#gross-3-buffer").val()),
            cart: Number($("#cart-3-buffer").val()),
            adj: Number($("#adj-3-buffer").val()),
            total: 0,
            totaldate: $("#date-3").val(),
        },
    ];

    bill_total[0]["total"] =
        bill_total[0]["gross"] + bill_total[0]["cart"] + bill_total[0]["adj"];
    bill_total[1]["total"] =
        bill_total[1]["gross"] + bill_total[1]["cart"] + bill_total[1]["adj"];
    bill_total[2]["total"] =
        bill_total[2]["gross"] + bill_total[2]["cart"] + bill_total[2]["adj"];

    $("#total-1").text(formatCurrency(cent_to_dollar(bill_total[0]["total"])));
    $("#total-2").text(formatCurrency(cent_to_dollar(bill_total[1]["total"])));
    $("#total-3").text(formatCurrency(cent_to_dollar(bill_total[2]["total"])));

    $("#total-1-buffer").val(bill_total[0]["total"]);
    $("#total-2-buffer").val(bill_total[1]["total"]);
    $("#total-3-buffer").val(bill_total[2]["total"]);

    // select right total
    let selected_total = 0;
    let total1 = bill_total[0]["total"];
    let total2 = bill_total[1]["total"];
    let total3 = bill_total[2]["total"];

    selected_total = total3;

    if (selected_total === 0) selected_total = total2;
    if (selected_total === 0) selected_total = total1;

    // const cost = Number(Window.bill_record.profitloss);
    let profitloss = 0;
    const bill_record = fetch_bill_record(id, "", function (res) {
        profitloss = selected_total - res.data.cost;
    });
    //make calculations and update

    // //prepare buffer values
    let request_body = {
        id: id,
        total: selected_total,
        profitloss: profitloss,
        bill_total: bill_total,
    };
    update_billrecord(request_body);
}

function edit_total(id) {
    fetch_bill_record(id, $("#bill_total_modal"), function (res) {
        const { data } = res;
        const { bill_total } = data;
        Window.bill_record = data;
        console.log({ bill_record_window: Window.bill_record });
        fill_total_inputs(id, data, bill_total);
        // register formatters on relevant fields
        register_total_input_formatters();
    });

    //increase modal width
    $("#bill_total_modal .modal-dialog").attr("style", "max-width: 900px;");

    console.log({ modal: $("#bill_total_modal .modal-dialog") });
}

function fill_balance_inputs(id, data, bill_balance) {
    console.log({ id, data, bill_balance });
    $("#bill_balance_id").text(id);
    fill_text_and_buffer("total", data.total);
    // $('#total-main').text(formatCurrency(cent_to_dollar(data.total)));
    fill_main_and_buffer("receive-payment1", bill_balance["balreceive1"]);
    fill_main_and_buffer("receive-payment2", bill_balance["balreceive2"]);
    fill_main_and_buffer("receive-payment3", bill_balance["balreceive3"]);
    fill_text_and_buffer("balance", data["balance"]);
}

function edit_balance(id) {
    fetch_bill_record(id, $("#bill_balance_modal"), function (res) {
        const { data } = res;
        const { bill_balance } = data;
        fill_balance_inputs(id, data, bill_balance);
    });

    //increase modal width
    // $('#bill_total_modal .modal-dialog').attr('style', 'max-width: 900px;');
    // console.log({ modal: $('#bill_total_modal .modal-dialog')})
}

function update_balance() {
    const total = get_number_from_text_element("total-buffer");
    const receive_1 = get_number_from_input_element("receive-payment1-buffer");
    const receive_2 = get_number_from_input_element("receive-payment2-buffer");
    const receive_3 = get_number_from_input_element("receive-payment3-buffer");
    const balance = total - (receive_1 + receive_2 + receive_3);

    if (balance < 0) {
        console.log("balance less than zero");
        set_number_to_input_element("receive-payment1", 0);
        set_number_to_input_element("receive-payment2", 0);
        set_number_to_input_element("receive-payment3", 0);
        return;
    }
    set_number_to_text_element("balance", balance);

    const request_body = {
        id: get_number_from_text_element("bill_balance_id"),
        total: total,
        balance: balance,
        bill_balance: {
            balreceive1: receive_1,
            balreceive2: receive_2,
            balreceive3: receive_3,
            balance: balance,
        },
    };
    update_billrecord(request_body);
    console.log({
        total,
        receive_1,
        receive_2,
        receive_3,
        balance,
        request_body,
    });
}

function update_referrer() {
    const id = get_number_from_text_element("bill_referrer_id");
    const commision = get_number_from_input_element("commision-buffer");
    const paid = get_number_from_input_element("paid-buffer");

    const outstanding = commision - paid;
    if (outstanding < 0) {
        set_number_to_input_element("commision", 0);
        set_number_to_input_element("paid", 0);
        set_number_to_text_element("outstanding", 0);
        return;
    }

    set_number_to_text_element("outstanding", outstanding);
    // set_number_to_text_element('balance', balance);

    const request_body = {
        id: id,
        referrer: $("#referrer-main").val(),
        ref_fee: outstanding,
        bill_referrer: {
            refname: $("#referrer-main").val(),
            refcompany: $("#company").val(),
            refcomm: commision,
            refpaid: paid,
            refoutstanding: outstanding,
        },
    };
    update_billrecord(request_body);
    console.log({ commision, paid, request_body });
}

function fill_referrer_inputs(id, data, bill_referrer) {
    console.log({ bill_referrer, data, ref: data["referrer"] });
    $("#bill_referrer_id").text(id);
    fill_main_and_buffer("commision", bill_referrer["refcomm"]);
    fill_main_and_buffer("paid", bill_referrer["refpaid"]);
    fill_text_and_buffer("outstanding", bill_referrer["refoutstanding"]);
    fill_input_element("company", bill_referrer["refcompany"]);
    fill_input_element("referrer-main", data["referrer"]);
}

function edit_referrer(id) {
    console.log("hello");
    fetch_bill_record(id, $("#bill_referrer_modal"), function (res) {
        const { data } = res;
        const { bill_referrer } = data;
        fill_referrer_inputs(id, data, bill_referrer);
    });
}

/**
 *
 * commission based record
 * START
 */

function get_commision_element_index() {
    return {
        full_id: {
            INPUT_CAR_NO: "commission-car-number-main",
            INPUT_MODEL: "commission-model-main",
            MODAL_CAR_NO: "commission_car_number_modal",
            MODAL_RECORD_ID: "commission_record_id",
            MODAL_COMPANY: "commission_company_modal",
            MODAL_COMPANY_ID: "commission_company_id",
            MODAL_COMPANY_INPUT_COMPANY: "commission-company",
            MODAL_COMPANY_INPUT_REFERRER: "commission-referrer",
            MODAL_COMPANY_INPUT_FEE: "commission-fee-main",

            MODAL_CLAIM_MODAL_ID: "commission_claim_modal",
            MODAL_CLAIM_RECORD_ID: "commission_claim_id",
            MODAL_CLAIM_INPUT_TOTAL_AMOUNT: "claim-total-amount",
            MODAL_CLAIM_INPUT_LAWYER_COMMISSION: "claim-lawyer-commission",
            MODAL_CLAIM_INPUT_ADJUSTER_FEE: "claim-adjuster-fee",
            MODAL_CLAIM_INPUT_FROM_LAWYER: "claim-from-lawyer",
            MODAL_CLAIM_BUTTON_PAY: "commission-claim-pay-btn",
            MODAL_CLAIM_BUTTON_ROW: "commission-claim-button-row",

            MODAL_COMMISSION_MODAL_ID: "commission_commission_modal",
            MODAL_COMMISSION_RECORD_ID: "commission_commission_id",
            MODAL_COMMISSION_INPUT_MAIN: "commission---commission-input-main",
        },
        general: {
            MODAL_COMPANY_INPUT_FEE: "commission-fee",
            MODAL_COMMISSION_INPUT: "commission---commission-input",
        },
        modals: {
            payable: {
                input_fields: {
                    TOTAL_AMOUNT: "payable-total-amount",
                    ADJUSTER_FEE: "payable-adjuster",
                    SERVICE_CHARGE: "payable-service-charge",
                    DOCUMENT_FEES: "payable-document-fees",
                    COMM: "payable-comm",
                },
                text_fields: {
                    CLAIM: "payable-claim",
                    DEDUCT_AMOUNT: "payable-deduct-amount",
                    PAYABLE: "payable-workshop",
                },
                buttons: {
                    PAY_BUTTON: "payable-pay-btn",
                },
                others: {
                    BUTTON_ROW: "commission-payable-button-row",
                    MODAL_ID: "commission_payable_modal",
                    RECORD_ID: "commission_payable_id",
                },
            },
        },
    };
}

/**
 * update commission record
 * @param {*} request_body
 */
function update_commissionrecord(request_body, function_to_run = false) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: "/commission/update-record",
        data: request_body,
        success: function (res) {
            if (res.status) {
                if (function_to_run) function_to_run(res.data);
                $("#commision_record").DataTable().draw("page");
            } else {
                console.log("failure");
            }
        },
    });
}

function get_commissionrecord_checker() {
    const response = $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        type: "GET",
        contentType: "application/json",
        url: "/commission/get-checker",
        async: false,
        success: function (res) {
            if (res.status) {
                return res.data;
            } else {
                console.log("failure");
            }
        },
    });
    return response.responseJSON;
}

function update_car_number() {
    const index = get_commision_element_index();
    const car_no = get_text_from_input_element(index.full_id.INPUT_CAR_NO);
    const model = get_text_from_input_element(index.full_id.INPUT_MODEL);

    const request_body = {
        car_no: car_no,
        model: model,
        id: get_text_from_text_element(index.full_id.MODAL_RECORD_ID),
    };
    console.log({ msg: "updating", car_no, model, request_body });
    update_commissionrecord(request_body);
}

function edit_car_number(id) {
    const index = get_commision_element_index();

    fetch_commission_record(
        id,
        $(`#${index.full_id.MODAL_CAR_NO}`),
        function (res) {
            const {
                data: { car_no, model, id },
            } = res;
            set_text_to_one_text_element(index.full_id.MODAL_RECORD_ID, id);
            set_text_to_one_input_element(index.full_id.INPUT_CAR_NO, car_no);
            set_text_to_one_input_element(index.full_id.INPUT_MODEL, model);
            console.log({ car_no, model });
        }
    );
    console.log({ id });
}

function edit_company(id) {
    const index = get_commision_element_index();

    fetch_commission_record(
        id,
        $(`#${index.full_id.MODAL_COMPANY}`),
        function (res) {
            const { data } = res;
            const { commcompany } = data;
            console.log({ data });
            set_text_to_one_text_element(index.full_id.MODAL_COMPANY_ID, id);
            set_text_to_one_input_element(
                index.full_id.MODAL_COMPANY_INPUT_COMPANY,
                commcompany.company_name
            );
            set_text_to_one_input_element(
                index.full_id.MODAL_COMPANY_INPUT_REFERRER,
                commcompany.referrer_name
            );
            fill_main_and_buffer(
                index.general.MODAL_COMPANY_INPUT_FEE,
                commcompany.commission
            );
        }
    );
}

function update_commission_referrer() {
    const index = get_commision_element_index();
    console.log({ msg: "updating" });
    const company = get_text_from_input_element(
        index.full_id.MODAL_COMPANY_INPUT_COMPANY
    );
    const referrer = get_text_from_input_element(
        index.full_id.MODAL_COMPANY_INPUT_REFERRER
    );
    const referral_fee = get_number_from_input_element(
        `${index.general.MODAL_COMPANY_INPUT_FEE}-buffer`
    );
    const id = get_text_from_text_element(index.full_id.MODAL_COMPANY_ID);

    const request_body = {
        company: company,
        id: id,
        commcompany: {
            referrer_name: referrer,
            company_name: company,
            commission: referral_fee,
        },
    };
    update_commissionrecord(request_body);
    console.log({ request_body });
}

function edit_commission(id) {
    const index = get_commision_element_index();
    console.log({ id, index });
    fetch_commission_record(
        id,
        $(`#${index.full_id.MODAL_COMMISSION_MODAL_ID}`),
        function (res) {
            const { data } = res;
            set_text_to_one_text_element(
                index.full_id.MODAL_COMMISSION_RECORD_ID,
                id
            );
            fill_main_and_buffer(
                index.general.MODAL_COMMISSION_INPUT,
                data.commission
            );
            console.log({ data });
        }
    );
}

function update_commission_commission() {
    const index = get_commision_element_index();
    console.log({ msg: "updating" });
    const id = get_text_from_text_element(
        index.full_id.MODAL_COMMISSION_RECORD_ID
    );
    const commission = get_number_from_input_element(
        `${index.general.MODAL_COMMISSION_INPUT}-buffer`
    );

    const request_body = {
        id: id,
        commission: commission,
    };
    update_commissionrecord(request_body);
    console.log({ request_body });
}

function disable_claim_buttons() {
    const index = get_commision_element_index();
    $(`#${index.full_id.MODAL_CLAIM_BUTTON_ROW}`).attr("style", "display:none");
    // input buttons
    $(`#${index.full_id.MODAL_CLAIM_INPUT_TOTAL_AMOUNT}-main`).attr(
        "disabled",
        "true"
    );
    $(`#${index.full_id.MODAL_CLAIM_INPUT_LAWYER_COMMISSION}-main`).attr(
        "disabled",
        "true"
    );

    $(`#${index.full_id.MODAL_CLAIM_INPUT_ADJUSTER_FEE}-main`).attr(
        "disabled",
        "true"
    );
}

function enable_claim_buttons() {
    const index = get_commision_element_index();
    $(`#${index.full_id.MODAL_CLAIM_BUTTON_ROW}`).attr(
        "style",
        "display:flex;"
    );

    // input buttons
    $(`#${index.full_id.MODAL_CLAIM_INPUT_TOTAL_AMOUNT}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.full_id.MODAL_CLAIM_INPUT_LAWYER_COMMISSION}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.full_id.MODAL_CLAIM_INPUT_ADJUSTER_FEE}-main`).removeAttr(
        "disabled"
    );
}

function update_claim() {
    // update_claim_fields();
    const index = get_commision_element_index();

    console.log({ msg: "updating claim" });
    const id = get_number_from_text_element(
        index.full_id.MODAL_CLAIM_RECORD_ID
    );
    const total_amount = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_TOTAL_AMOUNT
    );
    const lawyer_commission = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_LAWYER_COMMISSION
    );
    const adjuster_fee = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_ADJUSTER_FEE
    );
    const from_lawyer = get_number_from_text_element(
        `${index.full_id.MODAL_CLAIM_INPUT_FROM_LAWYER}-buffer`
    );

    const request_body = {
        id: id,
        checker: get_commissionrecord_checker().data,
        claim: from_lawyer,
        commclaim: {
            total_amount: total_amount,
            lawyer_commission: lawyer_commission,
            adjuster_fee: adjuster_fee,
            from_lawyer: from_lawyer,
        },
    };
    update_commissionrecord(request_body, function (res) {
        disable_claim_buttons();
    });
    console.log({ request_body });
}

function update_claim_fields() {
    const index = get_commision_element_index();
    const id = get_number_from_text_element(
        index.full_id.MODAL_CLAIM_RECORD_ID
    );
    console.log({ msg: "calculating claim fields" });

    const total_amount = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_TOTAL_AMOUNT
    );
    const lawyer_commission = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_LAWYER_COMMISSION
    );
    const adjuster_fee = get_number_from_input_buffer_element(
        index.full_id.MODAL_CLAIM_INPUT_ADJUSTER_FEE
    );
    const from_lawyer = total_amount - lawyer_commission + adjuster_fee;
    fill_text_and_buffer(
        index.full_id.MODAL_CLAIM_INPUT_FROM_LAWYER,
        from_lawyer
    );
    const request_body = {
        id: id,
        claim: from_lawyer,
        commclaim: {
            total_amount: total_amount,
            lawyer_commission: lawyer_commission,
            adjuster_fee: adjuster_fee,
            from_lawyer: from_lawyer,
        },
    };
    update_commissionrecord(request_body);
}

function edit_claim(id) {
    const index = get_commision_element_index();
    console.log("edit claim");
    console.log({ id, index });
    fetch_commission_record(
        id,
        $(`#${index.full_id.MODAL_CLAIM_MODAL_ID}`),
        function (res) {
            const {
                data: { commclaim, claim },
                data,
            } = res;

            // hide and disable buttons if payed
            if (data.checker !== null) {
                disable_claim_buttons();
            } else {
                enable_claim_buttons();
            }
            set_text_to_one_text_element(
                index.full_id.MODAL_CLAIM_RECORD_ID,
                id
            );
            fill_main_and_buffer(
                index.full_id.MODAL_CLAIM_INPUT_TOTAL_AMOUNT,
                commclaim.total_amount
            );
            fill_main_and_buffer(
                index.full_id.MODAL_CLAIM_INPUT_LAWYER_COMMISSION,
                commclaim.lawyer_commission
            );
            fill_main_and_buffer(
                index.full_id.MODAL_CLAIM_INPUT_ADJUSTER_FEE,
                commclaim.adjuster_fee
            );
            fill_text_and_buffer(
                index.full_id.MODAL_CLAIM_INPUT_FROM_LAWYER,
                commclaim.from_lawyer
            );
            console.log({ data, commclaim, claim });
        }
    );
}

function disable_payable_elements() {
    const index = get_commision_element_index();
    $(`#${index.modals.payable.others.BUTTON_ROW}`).attr(
        "style",
        "display:none"
    );
    // input buttons
    $(`#${index.modals.payable.input_fields.TOTAL_AMOUNT}-main`).attr(
        "disabled",
        "true"
    );
    $(`#${index.modals.payable.input_fields.ADJUSTER_FEE}-main`).attr(
        "disabled",
        "true"
    );
    $(`#${index.modals.payable.input_fields.SERVICE_CHARGE}-main`).attr(
        "disabled",
        "true"
    );
    $(`#${index.modals.payable.input_fields.DOCUMENT_FEES}-main`).attr(
        "disabled",
        "true"
    );
    $(`#${index.modals.payable.input_fields.COMM}-main`).attr(
        "disabled",
        "true"
    );
}

function enable_payable_elements() {
    const index = get_commision_element_index();
    $(`#${index.modals.payable.others.BUTTON_ROW}`).attr(
        "style",
        "display:flex;"
    );
    // input buttons
    $(`#${index.modals.payable.input_fields.TOTAL_AMOUNT}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.modals.payable.input_fields.ADJUSTER_FEE}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.modals.payable.input_fields.SERVICE_CHARGE}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.modals.payable.input_fields.DOCUMENT_FEES}-main`).removeAttr(
        "disabled"
    );
    $(`#${index.modals.payable.input_fields.COMM}-main`).removeAttr("disabled");
}

/**
 * gets the request body for payable modal
 * also updates the text fields based on calculations
 * @returns
 */
function get_payable_request_body() {
    const index = get_commision_element_index();
    const id = get_text_from_text_element(
        index.modals.payable.others.RECORD_ID
    );

    //get input fields
    const total_amount = get_number_from_input_buffer_element(
        index.modals.payable.input_fields.TOTAL_AMOUNT
    );
    const adjuster_fee = get_number_from_input_buffer_element(
        index.modals.payable.input_fields.ADJUSTER_FEE
    );
    const service_charge = get_number_from_input_buffer_element(
        index.modals.payable.input_fields.SERVICE_CHARGE
    );
    const document_fee = get_number_from_input_buffer_element(
        index.modals.payable.input_fields.DOCUMENT_FEES
    );
    const comm = get_number_from_input_buffer_element(
        index.modals.payable.input_fields.COMM
    );

    // make calculations
    const claim = total_amount + adjuster_fee;
    const deduct_amount = service_charge + document_fee + comm;
    const payable = claim - deduct_amount;

    // update text fields
    fill_text_and_buffer(index.modals.payable.text_fields.CLAIM, claim);
    fill_text_and_buffer(
        index.modals.payable.text_fields.DEDUCT_AMOUNT,
        deduct_amount
    );
    fill_text_and_buffer(index.modals.payable.text_fields.PAYABLE, payable);
    return {
        id: id,
        payable: payable,
        commpayable: {
            total_amount: total_amount,
            adjuster_fee: adjuster_fee,
            service_charge: service_charge,
            document_fee: document_fee,
            comm: comm,
            payable_to_workshop: payable,
            deduct_amount: deduct_amount,
            claim: claim,
        },
    };
}

function update_payable_fields() {
    const index = get_commision_element_index();
    const request_body = get_payable_request_body();
    update_commissionrecord(request_body);
}

function update_payable_onclick_button() {
    const index = get_commision_element_index();
    const request_body = get_payable_request_body();
    request_body.status = get_commissionrecord_checker().data;
    update_commissionrecord(request_body, function (res) {
        disable_payable_elements();
    });
}

function edit_payable(id) {
    const index = get_commision_element_index();
    console.log({ id, index });
    fetch_commission_record(
        id,
        $(`#${index.modals.payable.others.MODAL_ID}`),
        function (res) {
            const {
                data: { commpayable, status },
            } = res;

            //store id in element
            set_text_to_one_text_element(
                index.modals.payable.others.RECORD_ID,
                id
            );

            if (status !== null) {
                disable_payable_elements();
            } else {
                enable_payable_elements();
            }

            // fill inputs and register input validation
            fill_main_and_buffer(
                index.modals.payable.input_fields.TOTAL_AMOUNT,
                commpayable.total_amount
            );
            fill_main_and_buffer(
                index.modals.payable.input_fields.ADJUSTER_FEE,
                commpayable.adjuster_fee
            );
            fill_main_and_buffer(
                index.modals.payable.input_fields.SERVICE_CHARGE,
                commpayable.service_charge
            );
            fill_main_and_buffer(
                index.modals.payable.input_fields.DOCUMENT_FEES,
                commpayable.document_fee
            );
            fill_main_and_buffer(
                index.modals.payable.input_fields.COMM,
                commpayable.comm
            );

            // fill text fields and buffer
            fill_text_and_buffer(
                index.modals.payable.text_fields.CLAIM,
                commpayable.claim
            );
            fill_text_and_buffer(
                index.modals.payable.text_fields.DEDUCT_AMOUNT,
                commpayable.deduct_amount
            );
            fill_text_and_buffer(
                index.modals.payable.text_fields.PAYABLE,
                commpayable.payable_to_workshop
            );

            console.log({ commpayable });
        }
    );
}

/**
 *
 * commission based record
 * END
 */

function showDatePicker(element, function_to_run) {
    window.datepicker_current_element = element;
    var start_date_dialog = osmanli_calendar;
    $(".prev-month").click(function () {
        start_date_dialog.pre_month();
    });
    $(".next-month").click(function () {
        start_date_dialog.next_month();
    });
    start_date_dialog.ON_SELECT_FUNC = function () {
        //set value to buffer element
        let customDate = getDisplayDate(osmanli_calendar.SELECT_DATE);
        let dateTimeStamp = getDateTimeStamp(osmanli_calendar.SELECT_DATE);
        $(element).text(customDate);
        $(`${element}-buffer`).text(dateTimeStamp);
        $("#date_modal").modal("toggle");
        console.log({ date: osmanli_calendar.SELECT_DATE, osmanli_calendar });
        console.log({ element, customDate, dateTimeStamp });
        function_to_run();
    };

    //only dates between created_at and current date are selectable
    start_date_dialog.DAYS_DISABLE_MIN = "ON";
    start_date_dialog.DAYS_DISABLE_MAX = "ON";
    start_date_dialog.MIN_DATE = new Date(Window.bill_record.created_at);
    start_date_dialog.MAX_DATE = new Date();
    start_date_dialog.init();

    $("#date_modal").modal("toggle");
}

function showTotalDatePicker(element) {
    showDatePicker(element, function () {
        update_bill_total();
    });
}
