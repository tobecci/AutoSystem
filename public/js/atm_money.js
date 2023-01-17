    function filter_price(target_field, buffer_in) {
        $(target_field).off();

        $(target_field).on("keydown", function(event) {
            event.preventDefault()

            //when backspace is pressed
            if (event.keyCode == 8) {
                $(buffer_in).val('')
                $(target_field).val('')
                return null
            }

            /** prevents the following keys from being recognized
            Enter, direction buttons, and non numeric keys
            **/
            if (isNaN(event.key) ||
                $.inArray(event.keyCode, [13, 38, 40, 37, 39]) !== -1 ||
                event.keyCode == 13) {
                    console.log({ invalid_key: "key  is invalid"})
                if ($(buffer_in).val() != '') {
                    $(target_field).val(atm_money(parseInt($(buffer_in).val())))
                } else {
                    $(target_field).val('')
                }
                return null;
            }

            const input = event.key;
            old_val = $(buffer_in).val()
            if (old_val === '0.00') {
                $(buffer_in).val('')
                $(target_field).val('')
                old_val = ''
            }
            $(buffer_in).val('' + old_val + input)
            $(target_field).val(atm_money(parseInt($(buffer_in).val())))
        });
    }


	function atm_money(num) {
		if (num.toString().length == 1) {
			return '00.0' + num.toString()
		} else if (num.toString().length == 2) {
			return '00.' + num.toString()
		} else if (num.toString().length == 3) {
			return '0' + num.toString()[0] + '.' + num.toString()[1] +
				num.toString()[2];
		} else if (num.toString().length >= 4) {
			return num.toString().slice(0, (num.toString().length - 2)) +
				'.' + num.toString()[(num.toString().length - 2)] +
				num.toString()[(num.toString().length - 1)];
		}
	}


       function prdOpenItemPrice(data, old_value , pro) {
            $("#normalPriceModal").modal("show");
            if (parseInt(old_value) > 0) {
                $("#retail_price_normal_fk").val(atm_money(old_value));
                $("#retail_price_normal_fk_text").text(atm_money(old_value));
            } else {
                $("#retail_price_normal_fk").val('');
                $("#retail_price_normal_fk_text").text("0.00");
            }
            $("#retail_price_normal").val(old_value);
            $("#element_price").attr("value", data);
            $("#pro_id").attr("value", pro);
        }


        $("#retail_price_normal_fk").on("keyup keypress", function (evt) {
            let old_value = "";
            let type_evt_not_use = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            if (evt.type === "keypress") {
                let value = $("#retail_price_normal_fk").val();
                console.log("value", value);
                old_value = parseInt(value.replace('.', ''));
                $("#retail_price_normal").val(old_value == '' ? 0 : old_value);
            } else {
                if (evt.key === "Backspace") {
                    let value = $("#retail_price_normal_fk").val();
                    console.log("value", value);
                    old_value = parseInt(value.replace('.', ''));
                    $("#retail_price_normal").val(old_value);
                }

                let use_key = "";
                if (type_evt_not_use.includes(evt.key)) {
                    use_key = evt.key;
                    console.log(evt.key);
                }

                old_value = parseInt((isNaN($("#retail_price_normal").val()) == false ? $("#retail_price_normal").val() : 0) + "" + use_key);
                let nan = isNaN(old_value);
                console.log("up", old_value);

                if (old_value !== "" && nan == false) {
                    $("#retail_price_normal_fk").val(atm_money(parseInt(old_value)));
                    $("#retail_price_normal_fk_text").text(atm_money(parseInt(old_value)));
                    $("#retail_price_normal").val(parseInt(old_value));
                } else {
                    $("#retail_price_normal_fk").val("0.00");
                    $("#retail_price_normal_fk_text").text("0.00");
                    $("#retail_price_normal").val(0);
                }
            }
        });

        function priceChange() {

            let value = $("#retail_price_normal_fk").val();
            if (value != "") {
                $("#retail_price_normal_fk").val(atm_money(parseInt(value.replace('.', ''))));
                $("#retail_price_normal").val(parseInt(value.replace('.', '')));
            } else {
                $("#retail_price_normal_fk").val("0.00");
                $("#retail_price_normal").val(0);
            }
        }


        $('#normalPriceModal').on('hidden.bs.modal', function (e) {
            let key = "price";
            let value = $("#retail_price_normal").val();
            let element = $("#element_price").val();


            $.ajax({
                method: "post",
                url: "{{route('openitem.update_open')}}",
                data: {key: key, value: value, element: element}
            })
                .done((data) => {

                    console.log("data", data);
                     payload = {
                    id: $('#pro_id').val()

            };
            console.log("data", payload);
                localStorage.removeItem('update_product');
                localStorage.setItem("update_product",JSON.stringify(payload));
                openitemtable.ajax.reload();

                })
                .fail((data) => {
                    console.log("data", data)
                });
        });

