<script>
    function del(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            /* Read more about isConfirmed, isDenied below */
            if (willDelete) {
                var data = {
                    id: id,
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    type: "delete",
                    url: "{{ $route }}" + "/" + id,
                    data: data,
                    success: function(response) {
                        getData();
                        if (response.status == 200) {
                            swal(response.message, {
                                icon: "success",
                            });
                        } else {
                            swal(response.message, {
                                icon: "error",
                            });
                        }
                    }
                });
            } else {
                swal('Deletion was Cancel', '', 'info')
            }
        })

    }
</script>
