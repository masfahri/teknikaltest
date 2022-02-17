<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#btnSave').click(function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer {{ $token }}'
                }
            });
            var token = $('meta[name="token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{url('api/phones')}}",
                data: $('#form-handphone').serialize(),
                dataType: "json",
                success: function (response) {
                    console.log(response.message);
                    alert(response.message)
                },
                error: function(response, textStatus, errorThrown) { 
                    alert(response.responseJSON.message)
                }
            });
        });
        
        $('#btnAuto').click(function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer {{ $token }}'
                }
            });
            var token = $('meta[name="token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{url('api/phones/generate')}}",
                dataType: "json",
                success: function (response) {
                    console.log(response.message);
                    alert(response.message)
                },
                error: function(response, textStatus, errorThrown) { 
                    alert(response.responseJSON.message)
                }
            });
        });
    });
</script>