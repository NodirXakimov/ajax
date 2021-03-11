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
                            <input id="search" type="text" class="form-control" placeholder="Search&hellip;">
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
                    <th style="text-align: center; "><a href="#createCustomer" data-toggle="modal" data-target="#createCustomer"><i style="font-size: 25px; color: green" class="fa fa-plus-square"></i></a></th>
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

    <!-- Create a customer modal -->
    <div class="modal fade" id="createCustomer" tabindex="-1" role="dialog" aria-labelledby="centerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="centerTitle">Create a new customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="createCustomerForm" method="post" action="#">
                            <div class="alert alert-danger" id="createDanger" style="display: none">
                                <ul></ul>
                            </div>
                            <div class="form-group">
                                <label for="createName">Customer name</label>
                                <input type="text" class="form-control" id="createName">
                            </div>
                            <div class="form-group">
                                <label for="createAddress">Address</label>
                                <input type="text" class="form-control" id="createAddress">
                            </div>
                            <div class="form-group">
                                <label for="createCity">City</label>
                                <input type="text" class="form-control" id="createCity">
                            </div>
                            <div class="form-group">
                                <label for="createPin_code">Pin code</label>
                                <input type="number" class="form-control" id="createPin_code">
                            </div>
                            <div class="form-group">
                                <label for="createCountry">Country</label>
                                <input type="text" class="form-control" id="createCountry">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="createCustomerSubmit" form="createCustomerForm">Create customer</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Edit a customer modal -->
    <div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="centerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="centerTitle">Edit customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="container">
                      <form>
                          <div class="alert alert-danger" id="editDanger" style="display: none">
                              <ul></ul>
                          </div>
                          <div class="form-group">
                              <label for="name">Customer name</label>
                              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" >
                          </div>
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" id="address" aria-describedby="" >
                          </div>
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" id="city" aria-describedby="" >
                          </div>
                          <div class="form-group">
                              <label for="pin_code">Pin code</label>
                              <input type="number" class="form-control" id="pin_code" aria-describedby="" >
                          </div>
                          <div class="form-group">
                              <label for="country">Country</label>
                              <input type="text" class="form-control" id="country" aria-describedby="" >
                          </div>
                      </form>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateUserSubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete a customer modal -->
    <div class="modal fade" id="deleteCustomer" tabindex="-1" role="dialog" aria-labelledby="centerTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCustomer">Delete customer?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="nameToModal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="deleteUserSubmit">Delete customer?</button>
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
            $('#createCustomer').on('hidden.bs.modal', function () {
                $('#createCustomerForm input[type="text"], input[type="number"]').val('');
            });
            $('#createCustomerSubmit').click(function (e) {
                e.preventDefault();
                let data = {
                    name        : $('#createName').val(),
                     address    : $('#createAddress').val(),
                     city       : $('#createCity').val(),
                     pin_code   : $('#createPin_code').val(),
                     country    : $('#createCountry').val(),
                };
                $.ajax({
                    method: 'POST',
                    url: "{{ route('customers.store') }}",
                    data: data,
                    success: function (result) {
                        tr = newRow(result.id, result.name, result.address, result.city, result.pin_code, result.country);
                        $('#showAllCustomersTable').append(tr);
                        $('#createCustomer').modal('toggle');
                    },
                    error: function (response, status, error) {
                        let json = $.parseJSON(response.responseText);
                        console.log(json['errors'])
                        $('#createDanger').show().delay(2500).fadeOut(function() {
                            $(this).children('ul').empty();
                        });
                        $.each(json.errors, function (index, value) {
                            $('#createDanger').children('ul').append('<li>'+value+'</li>');
                        })
                    }
                });

            });
            $('#search').keyup(function() {
                let queryText = $(this).val();
                $.ajax({
                    url:"{{ route('customers.search') }}",
                    type:"GET",
                    data:{'queryText': queryText},
                    success: function(data) {
                        let tr = '';
                        for (let key in data)
                        {
                            tr += "<tr data-id='"+data[key].id+"'><td>" + data[key].id + "</td><td>" + data[key].name + "</td><td>" + data[key].address + "</td><td>" + data[key].city + "</td><td>" + data[key].pin_code + "</td><td>" + data[key].country + "</td>" + buttons(data[key].id) + "</tr>";
                        }
                        if(!tr)
                            tr = "<tr><td colspan='7' style='text-align: center' class='text-danger'>Did not match</td></tr>";
                        $('#showAllCustomersTable').html(tr);
                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
            });

        });
        function fetchAllCustomers() {
            $('#showAllCustomersTable').empty();
            $.ajax({
                url: "{{ route('customers.index') }}",
                method: 'GET',
                success: function (result){
                    for (let key in result)
                    {
                        let tr = "<tr data-id='"+result[key].id+"'><td>" + result[key].id + "</td><td>" + result[key].name + "</td><td>" + result[key].address + "</td><td>" + result[key].city + "</td><td>" + result[key].pin_code + "</td><td>" + result[key].country + "</td>" + buttons(result[key].id) + "</tr>";
                        $('#showAllCustomersTable').append(tr);
                    }
                }
            });
        }
        function buttons(id) {
            return '<td><a href="#showCustomer" class="view" title="View" data-toggle="modal" data-target="#showCustomer" onclick="fetchCustomer('+id+')"><i class="material-icons">&#xE417;</i></a><a href="#editCustomer" onclick="fetchCustomerForEdit('+id+')" class="edit" title="Edit" data-toggle="modal" data-target="#editCustomer"><i class="material-icons">&#xE254;</i></a><a href="#deleteCustomer" onclick="nameToModal('+id+')" class="delete" title="Delete" data-toggle="modal"><i class="material-icons">&#xE872;</i></a></td>';
        }
        function newRow(id, name, address, city, pin_code, country){
            return "<tr data-id='"+id+"'><td>"+id+"</td><td>"+name+"</td><td>"+address+"</td><td>"+city+"</td><td>"+pin_code+"</td><td>"+country+"</td>"+buttons(id)+"</tr>";
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
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        function fetchCustomerForEdit(id) {
            let url = "{{ route('customers.show', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function (result) {
                    $('#name').val(result.name);
                    $('#address').val(result.address);
                    $('#city').val(result.city);
                    $('#pin_code').val(result.pin_code);
                    $('#country').val(result.country);
                    $("#updateUserSubmit").attr("onclick", "updateCustomer("+ result.id +")");
                }
            });
        }
        function updateCustomer(id) {
            let formData = {
            name     : $('#name').val(),
            address  : $('#address').val(),
            city     : $('#city').val(),
            pin_code : $('#pin_code').val(),
            country  : $('#country').val(),
            }
            let url = "{{ route('customers.update', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'PUT',
                data: formData,
                dataType: 'json',
                success: function (result){
                    $('#editCustomer').modal('toggle');
                    // fetchAllCustomers();
                    // console.log(result.id);
                    let tr = "tr[data-id="+result.id+"]";
                    $(tr).after(newRow(result.id, result.name, result.address, result.city, result.pin_code, result.country));
                    $(tr).first().remove();

                },
                error: function (response, status, error){
                    let json = $.parseJSON(response.responseText);
                    console.log(json['errors'])
                    $('#editDanger').show().delay(3000).fadeOut(function() {
                        $(this).children('ul').empty();
                    });
                    $.each(json.errors, function (index, value) {
                        console.log(index);
                        // let field = '#' + index;
                        // $(field).attr('style', 'border-color:red');
                        $('#editDanger').children('ul').append('<li>'+value+'</li>');
                    })
                }
            });
        }
        function nameToModal(id){
            $('#nameToModal').html('This customer will be deleted. Are you sure?');
            let deleteButton = "deleteCustomer("+id+")";
            $('#deleteUserSubmit').attr('onclick', deleteButton);
        }
        function deleteCustomer(id) {
            let url = "{{ route('customers.destroy', ":id") }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                // data: formData,
                dataType: 'json',
                success: function (result){
                    $('#deleteCustomer').modal('toggle');
                    // console.log(result);
                    let tr = "tr[data-id="+result+"]";
                    $(tr).remove();
                    // fetchAllCustomers();
                },
                error: function (error){
                    console.log(error);
                }
            });
        }
    </script>
@endsection
