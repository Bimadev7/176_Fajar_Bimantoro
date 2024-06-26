
@extends('layouts.main')

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Data Barang</h3>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('backoffice.barang.create') }}" class="btn btn-primary">Add Barang</a>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Description</th>
                        <th>Stock of Goods</th>
                        <th>Good Stuff</th>
                        <th>Bad Stuff</th>
                        <th>Department</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('backoffice.barang.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'stock_of_goods', name: 'stock_of_goods'},
            {data: 'good_stuf', name: 'good_stuf'},
            {data: 'bad_stuf', name: 'bad_stuf'},
            {data: 'department', name: 'department'},
            {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return '<a href="/backoffice/barang/' + data + '" class="btn btn-info btn-sm">Show</a>' +
                           '<a href="/backoffice/barang/' + data + '/edit" class="btn btn-primary btn-sm mx-1">Edit</a>' +
                           '<form action="/backoffice/barang/' + data + '" method="POST" style="display:inline">' +
                               '@csrf' +
                               '@method("DELETE")' +
                               '<button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>' +
                           '</form>';
                }
            },
        ]
    });
});
</script>
@endpush
