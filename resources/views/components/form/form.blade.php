<form style="width: 100%;" id="form" method="POST" action="{{ $form['route'] }}" enctype="multipart/form-data">
    @csrf
    @if ($form['method'] == 'put' || $form['method'] == 'patch')
        @method('put')
    @endif
    @foreach ($form['fields'] as $row)
        <div class="row">
            @foreach ($row as $field)
                <div class="col">
                    <div class="form-group">
                        @if (isset($field['type']))
                            <label for="{{ $field['label'] }}" class="form-label">{{ $field['label'] }}</label>
                            {{-- input start --}}
                            <input type="{{ $field['type'] }}" {{-- for the text field only --}}
                            @if ($field['type'] == 'file')

                                class="form-control

                            @endif
                                @if ($field['type'] == 'text') class="form-control
                                    @if (isset($field['class'])) {{ $field['class'] }} @endif
                            "
                                 @endif
                            @if ($field['type'] == 'number') class="form-control
                                    @if (isset($field['class'])) {{ $field['class'] }}
                             @endif
                            "
                        @endif
                        {{-- for the date --}}
                        @if ($field['type'] == 'date') class="form-control ndp-nepali-calendar" @endif
                        {{-- checkbox oncheck event id --}}
                        @if ($field['type'] == 'checkbox') id="{{ $field['name'] }}click"
                            @else
                                id="{{ $field['name'] }}"
                                name="{{ $field['name'] }}" @endif
                        {{-- for the place holder --}} placeholder="{{ $field['placeholder'] }}" {{-- value isset or not --}}
                        @if (isset($field['value'])) value="{{ $field['value'] }}" @endif
                        {{-- checked checkbox --}}
                        @if (isset($field['checked']) && $field['checked'] == true)
                        checked
                        @endif
                        {{-- disabled --}}
                         @if ((isset($field['disabled']) && $field['disabled'] == true))
                             disabled
                         @endif

                         @if ((isset($field['readonly']) && $field['readonly'] == true))
                            readonly
                        @endif
                        >
                        {{-- input ends --}}

                        @if ($field['type'] == 'checkbox')
                            <input type="hidden" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                                @if (isset($field['checked']) && $field['checked'] == true)
                                value="1"
                                @else
                                     value="0"
                                @endif>
                        @endif
                        {{-- throws the error --}}
                        @error($field['name'])
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    @else
                        {{-- <h3><b>
                            {{$field}}
                            <b></h1> --}}
                        @if (isset($field['label']) && empty($field['options']))

                          <u>  <label for="{{ $field['label'] }}" class="form-label fs-4">{{ $field['label'] }}</label></u>

                            <hr style="margin-top:-4px">
                        @endif
            @endif
            {{-- for the options tag --}}
            @if (isset($field['options']))
                <label for="{{ $field['label'] }}" class="form-label">{{ $field['label'] }}</label>
                <select class="form-select form-control" name="{{ $field['name'] }}" id="">{{ $field['value'] }}>
                    @foreach ($field['options'] as $key => $option)
                        <option @if ($field['value'] == $option) selected @endif value="{{ $key }}">
                            {{ $option }}</option>
                    @endforeach
                </select>
                @error($field['name'])
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            @endif
        </div>
        </div>
    @endforeach
    </div>
    @endforeach
    {{-- <div class="row">
            <div class="col">
                <div class="form-group mb-2">
                    <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>कोड</label>
                    <input type="text" class="form-control" name="code" placeholder="कोड">
                </div>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <div class="form-group mb-2">
                    <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>पुरा
                        नाम</label>
                    <input type="text" class="form-control" name="full_name" placeholder="पुरा नाम">
                </div>
                @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div> --}}
        <br>
        <button type="submit" class="float-end btn btn-primary">Save</button>
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
</form>

@section('custom-script')
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"
        type="text/javascript"></script>
    {{-- <script>
         var startDate = document.getElementById("date");
        startDate.nepaliDatePicker();
</script> --}}
    @foreach ($form['fields'] as $row)
        @foreach ($row as $field)
            @if (isset($field['type']) && $field['type'] == 'checkbox')
                {{-- <x-script.check-box-script id="{{ $field['name'] }}">
                    </x-script> --}}
            @endif
            @if (isset($field['class']) && $field['class'] == 'ndp-nepali-calendar')
                <script>
                    var {{ $unique_object = Str::random($strlentgh = 16) }} = document.getElementById("{{ $field['name'] }}");
                    {{ $unique_object }}.nepaliDatePicker();
                </script>
            @endif
        @endforeach
    @endforeach
@endsection
