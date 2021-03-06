@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name <i class="fa fa-sort"></i></th>
                    <th>Address</th>
                    <th>City <i class="fa fa-sort"></i></th>
                    <th>Pin Code</th>
                    <th>Country <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="showAllCustomersTable">

                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('modal')

    <!-- Show a customer modal -->
    <div class="modal fade" id="showCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showCustomerTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <tbody id="ShowCustomerTableBody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jquery_scripts')
    <script>
        $(document).ready(function(){
            fetchAllCustomers();
            $('#showCustomer').on('hidden.bs.modal', function (){
                $('#ShowCustomerTableBody').empty();
            });
        });
        function fetchAllCustomers() {
            $.ajax({
                url: "{{ route('customers.index') }}",
                method: 'GET',
                success: function (result){
                    for (let key in result)
                    {
                        let tr = "<tr><input style='display: none' value='${result[key].id}'><td>" + result[key].id + "</td><td>" + result[key].name + "</td><td>" + result[key].address + "</td><td>" + result[key].city + "</td><td>" + result[key].pin_code + "</td><td>" + result[key].country + "</td>" + buttons(result[key].id) + "</tr>";
                        $('#showAllCustomersTable').append(tr);
                    }
                }
            });
        }
        function buttons(id) {
            return '<td><a href="#showCustomer" class="view" title="View" data-toggle="modal" data-target="#showCustomer" onclick="fetchCustomer('+id+')"><i class="material-icons">&#xE417;</i></a><a href="#editCustomer" class="edit" title="Edit" data-toggle="modal" data-target="#editCustomer"><i class="material-icons">&#xE254;</i></a><a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>';
        }
        function fetchCustomer(id) {
            let url = "{{ route('customers.show', ":id") }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function (result) {
                    let tr = "<tr><td>ID</td><td>" + result.id + "</td></tr>";
                    tr += "<tr><td>Name</td><td>" + result.name + "</td></tr>"
                    tr += "<tr><td>Adress</td><td>" + result.address + "</td></tr>"
                    tr += "<tr><td>Pin code</td><td>" + result.pin_code + "</td></tr>"
                    tr += "<tr><td>City</td><td>" + result.city + "</td></tr>"
                    tr += "<tr><td>Country</td><td>" + result.country + "</td></tr>"
                    tr += "<tr><td>Created</td><td>" + result.created_at + "</td></tr>"
                    tr += "<tr><td>Updated</td><td>" + result.updated_at + "</td></tr>"
                    $('#showCustomerTitle').html('Customer: <b>' + result.name + '</b>');
                    $('#ShowCustomerTableBody').append(tr);
                }
            });
        }
    </script>
@endsection
