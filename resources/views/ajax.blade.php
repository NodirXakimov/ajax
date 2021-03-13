@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <table class="table" id="datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Pin Code</th>
                            <th>Country</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': "{{ route('getCustomers') }}",
                'columns': [
                    { 'data': 'id' },
                    { 'data': 'name' },
                    { 'data': 'address' },
                    { 'data': 'city' },
                    { 'data': 'pin_code' },
                    { 'data': 'country' },
                ]
            });
        } );
    </script>
@endsection
