<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.add_product', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            console.log(name + price);

            $.ajax({
                url: "{{route('add.product')}}",
                method: 'post',
                data: {name: name, price: price},
                success: function (res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide')
                    }

                }, error: function (err) {
                    let error = err.response;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                    });
                }
            });
        })
    });
</script>
