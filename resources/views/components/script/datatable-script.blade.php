<script>
    getData()
      function getData() {
          $(function() {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              var table = $('#myTable').DataTable({
                  clear: true,
                  destroy: true,
                  processing: true,
                  serverSide: true,
                  language: {
                      "processing": "Loading..."
                  },
                  ajax: "{{ $options['route'] }}",
                  columns: [{
                          data: 'DT_RowIndex',
                          name: 'DT_RowIndex'
                      },
                      @foreach($options['columns'] as $column)
                      {
                          data:
                          @if (isset($column['name']))
                              '{{ $column['name']}}'
                          @else
                              '{{ $column}}'
                          @endif
                          ,
                          name:
                          @if (isset($column['name']))
                              '{{ $column['name']}}'
                          @else
                              '{{ $column}}'
                          @endif
                          ,
                          render: function(data, type, row) {

                              if (data == '1') {
                                  return `
                                  <span class="badge text-success">
                                      @if (isset($column['whileTrue']))
                                          {{$column["whileTrue"]}}
                                      @endif
                                  </span>`
                              }else if(data == '0'){
                                  return `
                                  <span class="badge text-danger">
                                      @if (isset($column['whileTrue']))
                                          {{$column["whileFalse"]}}
                                      @endif
                                  </span>`
                              }
                              return data;
                          }
                      },
                      @endforeach
                      {
                          data: 'action',
                          name: 'action',
                          orderable: false,
                          searchable: false
                      }
                  ]
              });

          });
      }

</script>
