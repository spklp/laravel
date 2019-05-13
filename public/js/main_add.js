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

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    let qnt = $("#quantity_input").val();

    $.ajax({
        url: '/cart/add/',
        data: {name: name, qnt: qnt},
        type: 'GET',
        success: function () {
            updateCart();
        },
        error: function () {
            alert('error');
        }
    })
});




