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
}

$('.delete').on('click', function () {
    let id = $(this).data('id');
    console.log(id);
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
});

$('.quantity_buttons').on('click', function () {
    let id = $(this).data('id');
    let qnt = $(".quantity_input").val();
    console.log(qnt);
    console.log(id);
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
});

$('.cart_clear').on('click', function (event) {
        event.preventDefault();
        alert('Do you really want to clear the cart?');
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

});




