// global variables
var menuItems = [];
var deletedMenuItems = [];

// events

$("#add_new_button").click(function(){
    $("#new_menu_item_form").css("display", "block");
});
$("#new_menu_item_close_button").click(function () {
    $("#new_menu_item_form").css("display", "none");
});
$("#search_box").on('keyup', function(){
    var searchText = $(this).val();

    if(searchText.trim().length == 0){
        populateTable("#menu_items_table", menuItems, false);
        return;
    }

    var foundItems = [];
    for(var i=0; i<menuItems.length; i++){
        if(menuItems[i].productName.includes(searchText)){
            foundItems.push(menuItems[i]);
        }
    }
    populateTable("#menu_items_table", foundItems, false);
});
$("#new_menu_item_add_button").click(function () {
    var name = $("#new_menu_item_form_name").val();
    var price = $("#new_menu_item_form_price").val();

    if(name.length == 0){
        alert("Name is required!");
        return;
    }
    
    if (isNaN(parseFloat(price)) || parseFloat(price) <= 0){
        alert("Price should be a positive number!");
        return;
    }

    menuItems.push({
        productName: name,
        productPrice: price
    });

    $("#new_menu_item_form_name").val("");
    $("#new_menu_item_form_price").val("");

    populateTable("#menu_items_table", menuItems, false);
});

function populateTable(tableId, items, areDeleted){
    $(tableId).html("");

    var template =
    "<tr>"+
    "    <td>"+
    "        <span>{product_name}</span><br>"+
    "        <span>{product_price}</span>"+
    "    </td>"+
    "    <td>"+
        (
            areDeleted ?
             "<button onclick='revertItem({product_idx})' style='color: orange'>REVERT</button>" :
    "        <button onclick='deleteItem({product_idx})' style='color: red'>DELETE</button>"
        )+
    "    </td>"+
    "</tr>";

    if (items.length == 0){
        return;
    }

    items = items.sort(function(a, b){
        if(a.productPrice == b.productPrice){
            return 0;
        }else if (a.productPrice < b.productPrice){
            return -1;
        }

        return 1;
    });

    for (var i = 0; i < items.length; i++){
        var row = template;
        row = row.replace("{product_name}", items[i].productName);
        row = row.replace("{product_price}", items[i].productPrice);
        row = row.replace("{product_idx}", i);
        $(tableId).append(row);
    }
}

function deleteItem(idx) {
    deletedMenuItems.push(menuItems[idx]);
    menuItems.splice(idx, 1);
    populateTable("#menu_items_table", menuItems, false);
    populateTable("#deleted_menu_items_table", deletedMenuItems, true);
}

function revertItem(idx){
    menuItems.push(deletedMenuItems[idx]);
    deletedMenuItems.splice(idx, 1);
    populateTable("#menu_items_table", menuItems, false);
    populateTable("#deleted_menu_items_table", deletedMenuItems, true);
}