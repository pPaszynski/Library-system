$(document).ready(function(){

    load_name();

    load_product();

    load_cart_data();

    load_orders();

    load_employe_panel();

    load_admin_panel();

    function load_name() {
        var action = 'setName'
        $.ajax({
            url:"Views/HomeController/action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#navbarDropdown').text(data);
            }
        });
    }

    function load_product()
    {
        $.ajax({
            url:"Views/HomeController/fetchItem.php",
            method:"POST",
            success:function(data)
            {
                $('#display_item').html(data);
            }
        });
    }


    function load_orders()
    {
        $.ajax({
            url:"Views/ReaderController/fetchOrders.php",
            method:"POST",
            //dataType:"json",
            success:function(data)
            {
                $('#display_orders').html(data);
            }
        });
    }

    function load_employe_panel()
    {
        $.ajax({
            url:"Views/EmployeController/fetchEmployePanel.php",
            method:"POST",
            //dataType:"json",
            success:function(data)
            {
                $('#display_employe_panel').html(data);
            }
        });
    }

    function load_admin_panel()
    {
        $.ajax({
            url:"Views/AdminController/fetchAdminPanel.php",
            method:"POST",
            //dataType:"json",
            success:function(data)
            {
                $('#display_admin_panel').html(data);
            }
        });
    }

    function load_cart_data()
    {
        $.ajax({
            url:"Views/HomeController/fetchCart.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                $('#cart_details').html(data.cart_details);
                // $('.total_price').text(data.total_price);
                $('.badge').text(data.total_item);
            }
        });
    }


    $('#cart-popover').popover({
        html : true,
        container: 'body',
        content:function(){
            return $('#popover_content_wrapper').html();
        }
    });

    $(document).on('click', '.add_to_cart', function(){
        alert("Item has been Added into Cart");
        var product_id = $(this).attr("id");
        var product_title = $('#title'+product_id+'').val();
        var product_author = $('#author' + product_id + '').val();
        var product_ISBN = $('#ISBN' + product_id + '').val();
        var product_quantity = $('#quantity'+product_id).val();
        var action = "add";
        alert("lease Enter Number of Quantity ottototo "+product_quantity);

        if(product_quantity > 0)
        {
            $.ajax({
                url:"Views/HomeController/action.php",
                method:"POST",
                data:{product_id:product_id, product_title:product_title, product_author:product_author, product_ISBN:product_ISBN, product_quantity:product_quantity, action:action},
                success:function(data)
                {
                    load_cart_data();
                    alert("Item has been Added into Cart"+product_quantity);
                }
            });
        }
        else
        {
            alert("lease Enter Number of Quantity"+product_id);
        }
    });

    $(document).on('click', '.delete', function(){
        var product_id = $(this).attr("id");
        var action = 'remove';
        if(confirm("Are you sure you want to remove this product?"))
        {
            $.ajax({
                url:"Views/HomeController/action.php",
                method:"POST",
                data:{product_id:product_id, action:action},
                success:function()
                {
                    load_cart_data();
                    $('#cart-popover').popover('hide');
                    alert("Item has been removed from Cart");
                }
            })
        }
        else
        {
            return false;
        }
    });

    $(document).on('click', '.deleteOrder', function(){
        var product_id = $(this).attr("id");
        var action = 'removeOrder';
        if(confirm("This order has been completed?"))
        {
            $.ajax({
                url:"Views/HomeController/action.php",
                method:"POST",
                data:{product_id:product_id, action:action},
                success:function(data)
                {
                    if(data === false){
                        alert("Something's wrong");
                    }else{
                    // $('#cart-popover').popover('hide');
                    alert("Order has been finalized");
                    }
                    load_employe_panel();
                }
            })
        }
    });

    $(document).on('click', '.deleteUser', function(){
        var product_id = $(this).attr("id");
        var action = 'removeUser';
        if(confirm("Potwierdzasz chęć usuniecia uzytkownika?"))
        {
            $.ajax({
                url:"Views/HomeController/action.php",
                method:"POST",
                data:{product_id:product_id, action:action},
                success:function(data)
                {
                    if(data === false){
                        alert("Something's wrong");
                    }else{
                    // $('#cart-popover').popover('hide');
                    alert("Konto zostało usunięte");
                    }
                    load_admin_panel();
                }
            })
        }
    });

    $(document).on('click', '#clear_cart', function(){
        var action = 'empty';
        $.ajax({
            url:"Views/HomeController/action.php",
            method:"POST",
            data:{action:action},
            success:function()
            {
                load_cart_data();
                $('#cart-popover').popover('hide');
                alert("Your Cart has been clear");
            }
        });
    });

    $(document).on('click', '#check_out_cart', function(){
        var action = 'checkOut';
        $.ajax({
            url:"Views/HomeController/action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                if(data === false){
                    alert("Something's wrong");
                }else{
                    alert("Your order has been finalized");
                    $.ajax({
                        url:"Views/HomeController/action.php",
                        method:"POST",
                        data:{action:'empty'},
                        success:function()
                        {
                            load_cart_data();
                            $('#cart-popover').popover('hide');
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', '#searchButton', function(){
        var action = 'search';
        var search_text = $('#searchValue').val();
        $.ajax({
            url:"Views/HomeController/fetchItem.php",
            method:"POST",
            data:{search_text:search_text, action:action},
            success:function(data)
            {
                $('#display_item').html(data);
            }
        });
    });
    $(document).on('click', '#searchValue', function(){
        var action = 'search';
        var search_text = $('#searchValue').val();
        $.ajax({
            url:"Views/HomeController/fetchItem.php",
            method:"POST",
            data:{search_text:search_text, action:action},
            success:function(data)
            {
                $('#display_item').html(data);
            }
        });
    });
    $('#searchValue').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('#searchButton').click();//Trigger search button click event
        }
    });

});

function search() {
    var action = 'search';
    var search_text = $('#searchValue').val();
    $.ajax({
        url:"Views/HomeController/fetchItem.php",
        method:"POST",
        data:{search_text:search_text, action:action},
        success:function(data)
        {
            $('#display_item').html(data);
        }
    });
}

function logOut() {
    var action = 'logOut'
    $.ajax({
        url:"Views/HomeController/action.php",
        method:"POST",
        data:{action:action},
        success:function()
        {
            location.reload();
        }
    });
}

// function deleteOrder() {
//     var product_id = $(this).attr("id");
//     var action = 'removeOrder';
//     if(confirm("This order has been completed?"+product_id))
//     {
//         $.ajax({
//             url:"Views/HomeController/action.php",
//             method:"POST",
//             data:{product_id:product_id, action:action},
//             success:function(data)
//             {
//                 if(data === false){
//                     alert("Something's wrong");
//                 }else{
//                     // $('#cart-popover').popover('hide');
//                     alert("Order has been finalized");
//                 }
//                 location.reload();
//             }
//         });
//     }
// }


