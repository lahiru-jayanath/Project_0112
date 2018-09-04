<style>
    .bg_cat:hover{
        border:solid 3px #F2784B;
    }
</style>

<!-- custom js ----- -->
<script>

    function newBill() {
        $('#new_cart').hide();
        $('#cancel_cart').show();
        $('#proceed_cart').show();
        $('#view_bill').show();

        if ($('#bill_session_id').val() == "") {
            $('#bill_session_id').val("");
            $.post('<?php echo base_url() ?>Bill/create_new_bill',
                    function (returnedData) {
                        //alert(returnedData);
                        $('#bill_session_id').val(returnedData);
                    });
        } else {
            alert("Please cancel current bill to create new bill.");
        }
    }

   /* function proceedBill() {
        if ($('#bill_session_id').val() != "") {
            notifi_beep.play();
            if (confirm('Are you sure you want to proceed the bill?')) {

                var session_id = $('#bill_session_id').val();
                $.post('<?php echo base_url() ?>Bill/print_bill_check?id=' + session_id,
                        function (returnedData) {
                            var session_id = $('#bill_session_id').val(returnedData);
                            viewBill("PB");
                        });

            }
        } else {
            audio_error.play();
            alert("There is no bill to precced.");
        }
    } */

    function proceedBill() {
        if ($('#bill_session_id').val() != "") {
            notifi_beep.play();
            if (confirm('Are you sure you want to proceed the bill?')) {

                var session_id = $('#bill_session_id').val();

                $.post('<?php echo base_url() ?>Bill/proceed_bill?id=' + session_id,
                    function (returnedData) {
                        if (returnedData != 0) {
                            //Show bill
                            $.post('<?php echo base_url() ?>Bill/print_bill_check?id=' + session_id,
                                function (data) {
                                    var sid = $('#bill_session_id').val(data);
                                    viewBill("PB");
                                });

                        } else {
                            alert("Sorry.!.There is an error occured.\n Please try again.");
                        }
                    });

            }
        } else {
            audio_error.play();
            alert("There is no bill to precced.");
        }
    }

    function cancelBill() {
        if ($('#bill_session_id').val() != "") {
            if (confirm('Are you sure you want to cancel?')) {
                closeBill();
            }
        } else {
            alert("No Bill to cancel.");
        }
    }

    function closeBill() {

        var session_id = $('#bill_session_id').val();
        $.post('<?php echo base_url() ?>Bill/cancel_bill?id=' + session_id,
                function (returnedData) {
                    $('#new_cart').show();
                    $('#proceed_cart').hide();
                    $('#cancel_cart').hide();
                    $('#bill_session_id').val("");
                    window.location.reload();
                    $('#view_bill').hide();
                });
    }

    function addToCart(item, type) {
        var session_id = $('#bill_session_id').val();
        var table = $('#table_no_load').val();
        var waiter = $('#waiters_load').val();
        var bill_type = $('#bill_type').val();
        if (session_id == "") {
            err_beep.play();
            alert("There is error occured.Please crete a new Bill.");
            cancelBill();
            return;
        }
        if (table == 0) {
            err_beep.play();
            alert("Please select a table.");
            return;
        }

        if (waiter == 0) {
            err_beep.play();
            alert("Please select a waiter.");
            return;
        }

        if (bill_type == 0) {
            err_beep.play();
            alert("Please select a Bill Type.");
            return;
        }

        var item_id = item;
        if (item_id.indexOf("IF_NEW") > -1) {
            //$('#add_new_foods').modal('show');
            openModal('ADD', []);
        } else if (item_id.indexOf("ID_NEW") > -1) {

        } else if (item_id.indexOf("IB_NEW") > -1) {

        } else if (item_id.indexOf("IL_NEW") > -1) {

        } else {
            $.post('<?php echo base_url() ?>Bill/add_to_cart?id=' + session_id + "&item_id=" + item_id + "&type=" + type + "&bill_type=" + bill_type,
                    function (returnedData) {
                        if (returnedData == "ERROR") {
                            alert("Please Create a New Bill.");
                        } else {
                            notifi_beep.play();
                            displayCart(session_id);
                        }
                    });
        }
    }

    function removeFromCart(element) {
        var id = element.id;
        var session_id = $('#bill_session_id').val();
        $.post('<?php echo base_url() ?>Bill/delete_item_by_id?id=' + id,
                function (returnedData) {
                    displayCart(session_id);
                    //set_amounts();
                });
    }


    function showLiqModel(item_id) {
        $('#item_code').val(item_id);
        $('#liq_model').modal('show');
    }

    function selectLiqModel(item_id, type_id) {
        addToCart(item_id, type_id);
    }

    function displayCart(id) {

        $("#finalTotal").html(("0") + ".00");

        $("#bill_items").find("tr:gt(0)").remove();
        var sid = id;
        var table = document.getElementById("bill_items");
        $.post('<?php echo base_url() ?>Bill/get_all_cart_items?id=' + sid,
                function (returnedData) {
                    var grandTotal = 0;
                    var obj = JSON.parse(returnedData);
                    if (obj.length > 0) {
                        for (var i = 0; i < obj.length; i++) {
                            var cart_id = obj[i].cart_id;
                            var item_type = obj[i].item_type;
                            var l_type = obj[i].l_type;
                            var item_id = obj[i].item_id;
                            var item_name = obj[i].item_name;
                            var item_price = obj[i].item_price;
                            var item_discount = obj[i].item_discount;
                            var qty = obj[i].qty;
                            var subtotal = (item_price - ((item_price * item_discount) / 100)) * qty;
                            var row = table.insertRow(i + 1);
                            var cell_no = row.insertCell(0);
                            var cell_item_name = row.insertCell(1);
                            var cell_item_type = row.insertCell(2);
                            var cell_item_qty = row.insertCell(3);
                            var cell_item_price = row.insertCell(4);
                            var cell_item_discount = row.insertCell(5);
                            var cell_sub_total = row.insertCell(6);
                            var cell_action = row.insertCell(7);


//                            var subtotal1 = (parseInt(item_price) * parseInt(item_discount));
//                            var subtotal2 = subtotal1 - (subtotal1 * item_discount / 100);
                            grandTotal = grandTotal + parseInt(subtotal);
                            var grand_amount = grandTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            $("#finalTotal").html((grand_amount) + ".00");
                            //alert(grandTotal);

                            var no = obj.length - i;
                            cell_no.innerHTML = i + 1;
                            cell_item_name.innerHTML = item_name;
                            var t_type = "";
                            if (item_type == 'F') {
                                t_type = "<span class='badge bg-blue'>Food</span>";
                            } else if (item_type == 'D') {
                                t_type = "<span class='badge bg-purple'>Dessert</span>";
                            } else if (item_type == 'B') {
                                t_type = "<span class='badge bg-red'>Beverage</span>";
                            } else if (item_type == 'L') {
                                t_type = "<span class='badge bg-green'>Liquor - <b>" + l_type + "</b></span>";
                            }
                            var number = i + 1;
                            cell_item_type.innerHTML = t_type;
                            cell_item_qty.innerHTML = "<input type='number' class='form-control' id='CI_" + cart_id + "' name='" + number + "' value='" + qty + "' style='width:80px;' min='0' onchange='change_amounts(this);'> ";
                            cell_item_price.innerHTML = parseInt(item_price).toFixed(2);
                            cell_item_discount.innerHTML = item_discount;
                            cell_sub_total.innerHTML = "<input type='text' class='form-control' id='txtsub_total' name='txtsub_total[]' value='" + subtotal + "' style='width:100px;' readonly=''>";
                            cell_action.innerHTML = "<button id='" + cart_id + "' class='btn btn-sm btn-danger' onclick='removeFromCart(this)'><i class='fa fa-times-circle'></i></button>";
                        }
                    } else {
                        $("#finalTotal").html(("0") + ".00");
                    }
                });
    }

//set global variable
    var ser = 0;
//load items 
    function myFunction(a) {
        var val = a;
        var BASE_URL = "<?php echo base_url('Bill/load_items'); ?>";
        if (val == 'food') { //check if food

            document.getElementById("menu_food").style = "border:solid 3px #F2784B;";
            document.getElementById("menu_beverage").style = "border:none";
            document.getElementById("menu_dessert").style = "border:none";
            document.getElementById("menu_liquor").style = "border:none";
            var catID = val;
            if (catID) {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL,
                    ContentType: 'application/json',
                    data: {'catID': catID},
                    success: function (data) {
                        var data2 = jQuery.parseJSON(data);
                        $('#items_load').empty();
                        var select = document.getElementById("items_load");
                        var option = document.createElement("option");
                        option.text = 'ADD NEW FOOD';
                        option.value = 'IF_NEW';
                        select.add(option);
                        for (var i = 0; i < data2.length; i++) {
                            var select = document.getElementById("items_load");
                            var option = document.createElement("option");
                            option.text = data2[i].food_name;
                            option.value = "IF_" + data2[i].food_id;
                            select.add(option);
                        }


                    }
                });
            } else {

            }
        }// if food end

        if (val == 'beverage') { //check if drink

            document.getElementById("menu_food").style = "border:none";
            document.getElementById("menu_beverage").style = "border:solid 3px #F2784B;";
            document.getElementById("menu_dessert").style = "border:none";
            document.getElementById("menu_liquor").style = "border:none";
            var catID = val;
            if (catID) {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL,
                    ContentType: 'application/json',
                    data: {'catID': catID},
                    success: function (data) {
                        //alert(data);
                        var data2 = jQuery.parseJSON(data);
                        $('#items_load').empty();
                        var select = document.getElementById("items_load");
                        var option = document.createElement("option");
                        option.text = 'ADD NEW BEVERAGE';
                        option.value = 'IB_NEW';
                        select.add(option);
                        for (var i = 0; i < data2.length; i++) {
                            var select = document.getElementById("items_load");
                            var option = document.createElement("option");
                            //alert(data2[i].drink_current_stock);
                            option.text = data2[i].drink_name;
                            option.value = "IB_" + data2[i].drink_id;
                            select.add(option);
                        }


                    }
                });
            } else {

            }
        }// if drink end

        if (val == 'dessert') { //check if food

            document.getElementById("menu_food").style = "border:none";
            document.getElementById("menu_beverage").style = "border:none";
            document.getElementById("menu_dessert").style = "border:solid 3px #F2784B;";
            document.getElementById("menu_liquor").style = "border:none";
            var catID = val;
            if (catID) {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL,
                    ContentType: 'application/json',
                    data: {'catID': catID},
                    success: function (data) {
                        //alert(data);
                        var data2 = jQuery.parseJSON(data);
                        $('#items_load').empty();
                        var select = document.getElementById("items_load");
                        var option = document.createElement("option");
                        option.text = 'ADD NEW DESSERT';
                        option.value = 'ID_NEW';
                        select.add(option);
                        for (var i = 0; i < data2.length; i++) {
                            var select = document.getElementById("items_load");
                            var option = document.createElement("option");
                            option.text = data2[i].dessert_name;
                            option.value = "ID_" + data2[i].dessert_id;
                            select.add(option);
                        }


                    }
                });
            } else {

            }

        }// if dessert end



        if (val == 'liquor') { //check if food

            document.getElementById("menu_food").style = "border:none";
            document.getElementById("menu_beverage").style = "border:none";
            document.getElementById("menu_dessert").style = "border:none";
            document.getElementById("menu_liquor").style = "border:solid 3px #F2784B;";
            var catID = val;
            if (catID) {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL,
                    ContentType: 'application/json',
                    data: {'catID': catID},
                    success: function (data) {
                        //alert(data);
                        var data2 = jQuery.parseJSON(data);
                        $('#items_load').empty();
                        var select = document.getElementById("items_load");
                        var option = document.createElement("option");
                        option.text = '';
                        option.value = '';
                        select.add(option);
                        for (var i = 0; i < data2.length; i++) {
                            var select = document.getElementById("items_load");
                            var option = document.createElement("option");
                            option.text = data2[i].liq_name;
                            option.value = "IL_" + data2[i].iid;
                            select.add(option);
                        }


                    }
                });
            }
        }

    }
//end item load


// ---------- add item to bill ----------------------------------------
    $(document).ready(function () {

        $('#table_no_load').on('change', function () {
            var itemId = $('#table_no_load').val();
            if (itemId != 0) {
                var itemname = $('#table_no_load option:selected').text();
                $('#finalTable').text(itemname);
            } else {
                $('#finalTable').text("-");
            }
        });
        $('#waiters_load').on('change', function () {
            var itemId = $('#waiters_load').val();
            if (itemId != 0) {
                var itemname = $('#waiters_load option:selected').text();
                $('#finalWaiter').text(itemname);
            } else {
                $('#finalWaiter').text("-");
            }
        });
        $('#items_load').on('change', function () {

            if ($('#items_load').val().indexOf("L_") > 0) {
                showLiqModel($('#items_load').val());
            } else {
                addToCart($('#items_load').val(), "");
            }

        });
//        $('#items_load').on('change', function () {
//            var BASE_URL = "<?php echo base_url('Bill/add_item_to_bill'); ?>";
//            var itemId = $('#items_load').val();
//
//            if (itemId) {
//                $.ajax({
//                    type: 'POST',
//                    url: BASE_URL,
//                    ContentType: 'application/json',
//                    data: {'itemId': itemId},
//                    success: function (data) {
//                        var data2 = jQuery.parseJSON(data);
//                        //alert(data2);
//                        if (data) {
//                            var table = $('#bill_items');
//                            var grand_total = 0;
//
//                            //table.find("tbody td").remove();
//                            data2.forEach(function (data2) {
//
//                                if (data2.food_id) {
//                                    ser = +ser + 1;
//                                    table.append("<tr><td>" + ser + "</td><td>" + data2.food_name + " <br/> this is mix with checken</td><td> <input type='number' onChange='change_send(" + ser + ");' id='food_qty'  name='food_q' class='qty'> </td><td>" + data2.food_discount + "</td><td>" + data2.food_price + "</td><td><span id='food_item_total'>0</span></td><td><button type='button' id='removeItem' class='btn red-mint' onClick='remove_item(" + ser + ");'>Remove</button></td></tr>");
//                                } else if (data2.drink_id) {
//                                    ser = +ser + 1;
//                                    table.append("<tr><td>" + ser + "</td><td>" + data2.drink_name + "<br/>300ml Bottle</td><td> <input type='number' id='drink_qty' onChange='change_send(" + ser + ");' name='drink_q' class='qty'> </td><td>" + data2.drink_discount + "</td><td>" + data2.drink_price + "</td><td> <span id='drink_item_total'>0</span></td><td><button type='button' id='removeItem' class='btn red-mint' onClick='remove_item(" + ser + ");'>Remove</button></td></tr>");
//                                } else if (data2.dessert_id) {
//                                    ser = +ser + 1;
//                                    table.append("<tr><td>" + ser + "</td><td>" + data2.dessert_name + "<br/>70ml Cup</td><td> <input type='number' id='dessert_qty' onChange='change_send(" + ser + ");' name='dessert_q' class='qty'> </td><td>" + data2.dessert_discount + "</td><td>" + data2.dessert_price + "</td><td> <span id='dessert_item_total'>0</span></td><td><button type='button' id='removeItem' class='btn red-mint' onClick='remove_item(" + ser + ");'>Remove</button></td></tr>");
//                                }
//                                //grand_total = +grand_total + +data2.amount;
//
//                            });
//
//                            $("#grand_total").val(grand_total);
//
//                        } else {
//                            var table = $('#food_record_data');
//                            table.find("tbody td").remove();
//
//                        }
//                    }
//                });
//            } else {
//
//            }
//        });

    });
//------------------- add item to bill end ---------------------------


    function set_amounts() {
        var table = document.getElementById('bill_items');
        var rowLength = table.rows.length;
        var grandTotal = 0;
        for (var i = 1; i < rowLength; i += 1) {

            var row = table.rows[i];
            var qty = parseInt(row.cells[3].getElementsByTagName("input")[0].value);
            var price = parseInt(row.cells[4].innerText);
            var discount = parseInt(row.cells[5].innerText);
            var subtotal1 = (price * qty);
            var subtotal2 = subtotal1 - (subtotal1 * discount / 100);
            row.cells[6].getElementsByTagName("input")[0].value = subtotal2.toFixed(2);
            grandTotal = grandTotal + parseInt(subtotal);
        }
        var grand_amount = grandTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $("#finalTotal").html((grand_amount) + ".00");
    }


    function change_amounts(item) {
        var x = item.name;
        var cartid = item.id;
        var table = document.getElementById('bill_items');
        var row = table.rows[x];
        var qty = parseInt(row.cells[3].getElementsByTagName("input")[0].value);
        var price = parseInt(row.cells[4].innerText);
        var discount = parseInt(row.cells[5].innerText);
        var subtotal1 = (price * qty);
        var subtotal2 = subtotal1 - (subtotal1 * discount / 100);
        var subtotal = (price - ((price * discount) / 100)) * qty;
        row.cells[6].getElementsByTagName("input")[0].value = subtotal.toFixed(2);
        var grandTotal = 0;
        // calculate grand total
        var rowLength = table.rows.length;
        for (var i = 1; i < rowLength; i += 1) {
            var total = (table.rows[i].cells[6].getElementsByTagName("input")[0].value);
            grandTotal = grandTotal + parseInt(total);
            // grandTotal = +grandTotal + +table.rows[i].cells[6].getElementsByTagName("input")[0].value;
        }
        var grand_amount = grandTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $("#finalTotal").html((grand_amount) + ".00");
        updateCart(cartid, qty, x, subtotal2);
    }


    function updateCart(cartid, qty, x , subtotal2) {
        var table = $('#table_no_load').val();
        var waiter = $('#waiters_load').val();
        $.post('<?php echo base_url() ?>Bill/update_cart?id=' + cartid + "&qty=" + qty + "&subtotal2=" + subtotal2 + "&table_id=" + table + "&waiter_id=" + waiter,
                function (returnedData) {
                    var obj = JSON.parse(returnedData);
                    var count = obj.count;
                    var state = obj.state;
                    if (state == '') {
                        var table = document.getElementById('bill_items');
                        var row = table.rows[x];
                        row.cells[3].getElementsByTagName("input")[0].value = 0;
                        audio_error.play();
                        alert("You not enough QTY in stock.\n MINIMUM QTY: " + count);
                    }
                });
    }


    function viewBill(type) {
        var session_id = $('#bill_session_id').val();
        if (session_id != '') {
            window.open('<?php echo base_url('Bill/view_bill'); ?>?id=' + session_id + "&camed=" + type, 'Bill', 'width=320,height=480,toolbar=no,location=no,directories=no,statu s=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=yes');
        }
    }

//***************************************************************************
    function remove_item(x)
    {

        var table = document.getElementById('bill_items');
        var rowLength = table.rows.length;
        var row = table.rows[x];
        var subTotal = row.cells[5].innerText;
        var grantTotal = document.getElementById("finalTotal").innerHTML;
        var newGrandTotal = grantTotal - subTotal;
        $("#finalTotal").html(newGrandTotal.toFixed(2));
        //end grand total

        if (x == 1 && !(table.rows[x + 1])) {
            row.remove();
            //set global variable
            window.ser = 0;
        }

        if (x == window.ser) {
            row.remove();
            //set global variable
            window.ser = x - 1;
        }

        if (x == window.ser - 1) {

            for (var i = x; i < rowLength; i++) {

                var row2 = table.rows[x + 1];
                var ser_row = row2.cells[0].innerText;
                var new_ser = +ser_row - 1;
                row2.cells[0].innerText = new_ser;
                row2.cells[6].innerHTML = "<button type='button' id='removeItem' class='btn red-mint' onClick='remove_item(" + new_ser + ");'>Remove</button>";
            }

            row.remove();
            alert('Removed.');
        }

    }
//------------------- remove item from bill end --------------------------

// ---------- save  bill ----------------------------------------
    $(document).ready(function () {
        $('#save_bill').on('click', function () {

            var BASE_URL = "<?php echo base_url(''); ?>";
            var foodTableVal = document.getElementById('table_no_load').value;
            if (foodTableVal == '') {
                swal('NO TABLE NUMBER', 'SELECT', 'warning');
                return false;
            } else {
                var table = document.getElementById('bill_items');
                var rowLength = table.rows.length;
                if (rowLength > 1) {// check bill table empty
                    if (foodTableVal != 0) {//check take away
                        var jsonArr = [];
                        for (var i = 1, row; row = table.rows[i]; i++) {
                            // create array variables
                            var serNo = row.cells[0].innerText;
                            var ItemName = row.cells[1].innerText;
                            var qty = row.cells[2].getElementsByTagName("input")[0].value;
                            var discount = row.cells[3].innerText;
                            var price = row.cells[4].innerText;
                            var subTotal = row.cells[5].innerText;
                            //end create variables

                            var col = row.cells;
                            var jsonObj = {
                                tableNo: foodTableVal,
                                serNo: serNo,
                                ItemName: ItemName,
                                qty: qty,
                                discount: discount,
                                price: price,
                                subTotal: subTotal
                            }

                            jsonArr.push(jsonObj);
                        }//for loop	
                        console.log(jsonArr);
                        //json ajax
                        var val = jsonArr;
                        var BASE_URL = "<?php echo base_url('Bill/save_table_items'); ?>";
                        var dataArray = val;
                        if (val) {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL,
                                ContentType: 'application/json',
                                data: {'val': val},
                                success: function (data) {
                                    alert(data);
                                }
                            });
                        } else {

                        }//end json							
                        // jason ajax

                    } else {
                        swal('Take Away Bill', 'Click Print', 'error');
                        return false;
                    }//check take away
                } else {
                    swal('NO ITEM FOUND', 'SELECT', 'warning');
                    return false;
                }// check bill table empty

            }//check table ise set

        });
    }
    );
//------------------- save bill end ---------------------------


</script>

<!-- end custom js -->