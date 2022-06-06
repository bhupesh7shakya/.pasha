<table id="myTable" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            @foreach ($tableHeaders as $tableHeader)
                <th>{{ $tableHeader}}</th>
            @endforeach
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
