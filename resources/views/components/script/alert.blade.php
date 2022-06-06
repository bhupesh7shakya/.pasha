<script>
    @if (session('success'))
       swal("Success", "{{ session('success') }}", "success");
   @endif

   @if (session('error'))
       swal("Error", "Server Error!!!!!!!Please contact Devloper team.", "error");
   @endif
</script>
