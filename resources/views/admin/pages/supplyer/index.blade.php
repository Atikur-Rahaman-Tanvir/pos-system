@extends('admin.layouts.master')
@section('title')
    supplyer list
@endsection
@section('styles')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <style>
        .fa,
        .far,
        .fas {
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="white_box_tittle list_header">
                    <h4>All supplyers</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="serach_field_2">
                            <div class="search_inner">

                                <div class="search_field">
                                    <input type="text" placeholder="Search content here..." id="search_box"
                                        name="search">
                                </div>
                                <button type="submit"> <i class="ti-search"></i> </button>
                            </div>
                        </div>
                        <div class="add_button ms-2">
                            <button type="button" class="btn_1" data-bs-toggle="modal" data-bs-target="#insert_modal">
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
                <div id="data_table">
                    <div class="col-xl-12">
                        <div class="white_card  mb_30">

                            <div class="white_card_body  p-4">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Total Bill</h6>
                                            <h3><span class="counter">{{ $supplyers->count() }}</span> </h3>
                                            <h6>$<span class="counter">{{ $supplyers->sum('total') }}</span> </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Paid</h6>
                                            <h3><span class="counter">{{ $supplyers->where('status', 'paid')->count() }}</span>
                                            </h3>
                                            <h6>$<span
                                                    class="counter">{{ $supplyers->where('status', 'paid')->sum('payment') }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Unpaid</h6>
                                            <h3><span
                                                    class="counter">{{ $supplyers->where('status', 'unpaid')->count() }}</span>
                                            </h3>
                                            <h6>$<span
                                                    class="counter">{{ $supplyers->where('status', 'unpaid')->sum('due') }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Partial Paid</h6>
                                            <h3><span
                                                    class="counter">{{ $supplyers->where('status', 'partial paid')->count() }}</span>
                                            </h3>
                                            <h6>$<span
                                                    class="counter">{{ $supplyers->where('status', 'partial paid')->sum('due') }}</span>(due)
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Total Payment</h6>
                                            <h3>$<span class="counter">{{ $supplyers->sum('payment') }}</span></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="single_analite_content text-center">
                                            <h6>Total Due</h6>
                                            <h3>$<span class="counter">{{ $supplyers->sum('due') }}</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">

                            <div class="white_card_body">
                                <div class="QA_section">

                                    <div class="QA_table mb_30" id="">
                                        <table class="table lms_table_active3 text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sl No</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Invoice No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Contact Number</th>
                                                    <th scope="col">Company Name</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Payment</th>
                                                    <th scope="col">Due</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>

                                            <tbody id="table_body">
                                                @foreach ($supplyers as $supplyer)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $supplyer->created_at->format('d M Y') }}</td>
                                                        <td>#{{ $supplyer->invoice_no }}</td>
                                                        <td>{{ $supplyer->name }}</td>
                                                        <td>{{ $supplyer->number }}</td>
                                                        <td>{{ $supplyer->company_name }}</td>
                                                        <td>${{ $supplyer->total }}</td>
                                                        @if (is_null($supplyer->payment))
                                                            <td>$0</td>
                                                        @else
                                                            <td>{{ $supplyer->payment }}</td>
                                                        @endif
                                                        <td>${{ $supplyer->due }}</td>
                                                        <td class="">
                                                            @if ($supplyer->status == 'paid')
                                                                <span
                                                                    class="badge bg-success text-uppercase">{{ $supplyer->status }}</span>
                                                            @elseif ($supplyer->status == 'unpaid')
                                                                <span
                                                                    class="badge bg-danger text-uppercase">{{ $supplyer->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-info  text-uppercase">{{ $supplyer->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="action_btns d-flex">
                                                                <a id="{{ $supplyer->id }}" class="action_btn mr_10 edit "
                                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"> <i
                                                                        class="far fa-edit"></i> </a>


                                                                <a id="{{ $supplyer->id }}" class="action_btn delete"
                                                                    data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                    <i class="fas fa-trash"></i> </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="insert_modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="display:inline-block;margin-right:10px">Add Suppliyer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="insert_form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Supplyer Name</label>
                                        <div class=" mb-0">
                                            <span class="text-danger name_error"></span>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter supplyer Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Contact Number</label>
                                        <div class=" mb-0">
                                            <span class="text-danger contact_number_error"></span>
                                            <input type="tel" class="form-control" name="contact_number"
                                                id="contact_number" placeholder="Enter Contact Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Company Name</label>
                                        <div class=" mb-0">
                                            <span class="text-danger company_name_error"></span>
                                            <input type="text" class="form-control" name="company_name"
                                                id="company_name" placeholder="Enter Company Name ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Invoice Number</label>
                                        <div class=" mb-0">
                                            <span class="text-danger invoice_no_error"></span>
                                            <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                                placeholder="Enter invoice no ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Total</label>
                                        <div class=" mb-0">
                                            <span class="text-danger total_error"></span>
                                            <input type="number" class="form-control" name="total" id="total"
                                                placeholder="Enter Total Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Payment</label>
                                        <div class=" mb-0">
                                            <span class="text-danger payment_error"></span>
                                            <input type="number" class="form-control" name="payment" id="payment"
                                                placeholder="Enter Payment Quentity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="edit_modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="display:inline-block;margin-right:10px">Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit_form">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" id="edit_id" value="">
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">supplyer Name</label>
                                        <div class=" mb-0">
                                            <span class="text-danger name_error"></span>
                                            <input type="text" class="form-control" name="name" id="edit_name"
                                                placeholder="Enter supplyer Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Contact Number</label>
                                        <div class=" mb-0">
                                            <span class="text-danger contact_number_error"></span>
                                            <input type="tel" class="form-control" name="contact_number"
                                                id="edit_contact_number" placeholder="Enter Contact Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Company Name</label>
                                        <div class=" mb-0">
                                            <span class="text-danger company_name_error"></span>
                                            <input type="text" class="form-control" name="company_name"
                                                id="edit_company_name" placeholder="Enter Company Name ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Invoice No</label>
                                        <div class=" mb-0">
                                            <span class="text-danger invoice_no"></span>
                                            <input type="text" class="form-control" name="invoice_no"
                                                id="edit_invoice_no" placeholder="Enter Company Name ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Total</label>
                                        <div class=" mb-0">
                                            <span class="text-danger total_error"></span>
                                            <input type="number" class="form-control" name="total" id="edit_total"
                                                placeholder="Enter Total Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_body">
                                        <label for="" class="form-label"
                                            style="font-weight: bolder;font-size:20px">Payment</label>
                                        <div class=" mb-0">
                                            <span class="text-danger payment_error"></span>
                                            <input type="number" class="form-control" name="payment" id="edit_payment"
                                                placeholder="Enter Payment Quentity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="delete_id">
                    <h3 class="text-center text-danger">Are You Sure?<br> You Want To Delete This?</h3>
                    <button class="btn btn-danger mt-5 " style="float: right;" id="delete_confirm">Confirm</button>
                    <button type="button" class="btn btn-primary mt-5" style="float: right; margin-right:5px"
                        id="cancle_delete">Cancle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- pirnt cdn --}}
    <script src="{{ asset('assets/js/jQuery.print.js') }}"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            // insert
            $('#insert_form').submit(function(e) {
                e.preventDefault();

                let insert_data = new FormData($('#insert_form')[0]);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.supplyer.store') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.warning) {
                            toastr.warning(response.warning);
                        }
                        if (response.success) {
                            $('#insert_modal').modal('hide');
                            $('#insert_modal').find('input').val('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                        } else {
                            console.log(response.fails.name);
                            if (response.fails) {

                                $.each(response.fails, function(key, value) {
                                    $('.' + key + '_error').text(value);
                                });
                            }

                        }
                    }

                });
            });


            //show data in edit form
            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.supplyer.show') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#edit_id').val(response.supplyer.id);
                        $('#edit_name').val(response.supplyer.name);
                        $('#edit_company_name').val(response.supplyer.company_name);
                        $('#edit_contact_number').val(response.supplyer.number);
                        $('#edit_total').val(response.supplyer.total);
                        $('#edit_payment').val(response.supplyer.payment);
                        $('#edit_invoice_no').val(response.supplyer.invoice_no);
                    }
                });
            });

            // edit data
            $('#edit_form').submit(function(e) {
                e.preventDefault();

                let formdata = new FormData($('#edit_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.supplyer.edit') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.warning) {
                            toastr.warning(response.warning);
                        }
                        if (response.success) {
                            $('#edit_modal').modal('hide');
                            $('#edit_modal').find('input').val('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                            $('#search_box').val('');
                        }
                        if (response.fails) {
                            $.each(response.fails, function(key, value) {
                                $('.' + key + "_error").text(value);

                            });
                        }
                    }

                });

            });

            // delete
            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');
                $('#delete_id').val(id);
            });
            $(document).on('click', '#delete_confirm', function() {
                var id = $('#delete_id').val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.supplyer.delete') }}",
                    data: {
                        'id': id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#delete_modal').modal('hide');
                            $('#delete_modal').find('input').val('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                        }
                    }
                });
            });
            //delete cancle button
            $(document).on('click', '#cancle_delete', function() {
                $('#delete_modal').modal('hide');
                $('#search_box').val('');
            });

            //search
            $('#search_box').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.supplyer.search') }}",
                    data: {
                        'search': value
                    },
                    success: function(response) {
                        $('#data_table').html(response);
                        if (response.not_found) {
                            $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");

                        }
                        if (response.null) {
                            location.reload();
                        }
                    }
                })
            });
        });
    </script>
    <script>
        $('#category').select2({
            dropdownParent: $('#insert_modal')
        });
        $('#edit_category').select2({
            dropdownParent: $('#edit_modal')
        });
    </script>
@endsection
