$('document').ready(function() {
    console.log('ok');

    $("#img_input").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $('#cartModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let title = button.data('title')
        console.log(title);

        $('.product-title').val(title)

        let price = $('#real-price').text()
        console.log($.number(price))

        let format_number = $.number(price)
        $('.subtotal').val('Rp ' + format_number)

    });

    $('#buyModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let title = button.data('title')
        console.log(title);

        $('.product-title').val(title)

        let price = $('#real-price').text()
        console.log($.number(price))

        let format_number = $.number(price)
        $('.subtotal').val('Rp ' + format_number)

    });

    $("input[type=number").change(function(){
        if($("input[type=number").val() < 1){
            $("input[type=number").val(1)
            console.log('minimal harus 1')
        }else{
            let total_tmp = parseInt($('#real-price').text()) * $("input[type=number").val()
            console.log(total_tmp);

            let format_number = $.number(total_tmp)
            $('.subtotal').val('Rp ' + format_number)
        }   
    });

    $('#submit').click(function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: $('form.formCart').attr('action'),
            data: $('form.formCart').serialize(),
            success: function(response) {
                alert('Sukses');
                $('#cartModal').modal('hide');
            },
            error: function() {
                alert('Error');
            }
        });
        console.log('clicked');
        return false;
    });


    $('#beli').click(function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: $('form.formCart').attr('action'),
            data: $('form.formCart').serialize(),
            success: function(response) {
                alert('Sukses');
                let uri = $('form.formCart').attr('action').replace('add','');
                window.location.href = uri;
            },
            error: function() {
                alert('Error');
            }
        });
        console.log('clicked');
        return false;
    });
});