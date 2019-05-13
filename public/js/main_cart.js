function updateCart() {
    $.ajax({
        url: '/cart/update',
        type: 'GET',
        success: function (res) {
            $('#mini_cart').html(res);
        },
        error: function () {
            alert('error');
        }
    })
};

function delete_prod(id){
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            $('#cart_items').html(res);
            updateCart();
        },
        error: function () {
            alert('error');
        }
    })
};

$('.cart_clear').on('click', function (event) {
    event.preventDefault();
    if ( confirm('Do you really want to clear the cart?')) {
        $.ajax({
            url: '/cart/clear',
            data: {},
            type: 'GET',
            success: function (res) {
                $('#cart_content').html(res);
                updateCart();
            },
            error: function () {
                alert('error');
            }
        })
    }
});

// function cart_clear (event) {
//     //  event.preventDefault();
//     if ( confirm('Do you really want to clear the cart?')) {
//         $.ajax({
//             url: '/cart/clear',
//             data: {},
//             type: 'GET',
//             success: function (res) {
//                 $('#cart_content').html(res);
//                 updateCart();
//             },
//             error: function () {
//                 alert('error');
//             }
//         })
//     }
// };

function quantity(id) {
    let qnt = $("#qty-value-"+id).val();
    $.ajax({
        url: '/cart/quantity',
        data: {id: id, qnt: qnt},
        type: 'GET',
        success: function (res) {
            $('#cart_items').html(res);
            updateCart();
        },
        error: function () {
            alert('error');
        }
    })
};





