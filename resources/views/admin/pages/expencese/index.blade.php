@extends('admin.layouts.master')
@section('title')
    expencese list
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

                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">

                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>All expenceses</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">

                                                <div class="search_field">
                                                    <input type="date" placeholder="Search content here..."
                                                        id="search_box" name="search">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2">
                                            <button type="button" class="btn_1" data-bs-toggle="modal"
                                                data-bs-target="#insert_modal">
                                                Add New
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30" id="data_table">
                                    <div class="bg-success" style="width:220px; padding:10px">Today Expenceses : ${{$expenceses->sum('amount')}}</div>
                                    <table class="table lms_table_active3 text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody id="table_body">
                                            @foreach ($expenceses as $expencese)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $expencese->created_at->format('d M Y') }}</td>
                                                    <td>{{ $expencese->name }}</td>
                                                    <td>${{ $expencese->amount }}</td>
                                                    <td>
                                                        <div class="action_btns d-flex">
                                                            <a id="{{ $expencese->id }}" class="action_btn mr_10 edit "
                                                                data-bs-toggle="modal" data-bs-target="#edit_modal"> <i
                                                                    class="far fa-edit"></i> </a>

                                                            <a id="{{ $expencese->id }}" class="action_btn delete"
                                                                data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="fas fa-trash"></i> </a>
                                                        </div>
                                                    </td>
                                                    <td></td>
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
    <div class="modal fade" id="insert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New expencese</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insert_form">
                        @csrf
                        <div class="col-lg-12">
                            <div class="white_card card_height_100 ">
                                <div class="white_card_body">
                                    <span class="text-danger name_error"></span>
                                    <div class=" mb-0">
                                        <label class="label-control" for="">Expencese Name</label>
                                      <textarea name="name" id="name" cols="47" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_card card_height_100 ">
                                <div class="white_card_body">
                                    <span class="text-danger name_error"></span>
                                    <div class=" mb-0">
                                        <label class="label-control" for="">Expencese Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            placeholder="Enter expencese amount">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">expencese Edit And Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                                   <div class="col-lg-12">
                            <div class="white_card card_height_100 ">
                                <div class="white_card_body">
                                    <span class="text-danger name_error"></span>
                                    <div class=" mb-0">
                                        <label class="label-control" for="">Expencese Name</label>
                                      <textarea name="name" id="edit_name" cols="47" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_card card_height_100 ">
                                <div class="white_card_body">
                                    <span class="text-danger name_error"></span>
                                    <div class=" mb-0">
                                        <label class="label-control" for="">Expencese Amount</label>
                                        <input type="number" class="form-control" name="amount" id="edit_amount"
                                            placeholder="Enter expencese amount">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-5">Submit</button>
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
        {{-- pirnt cdn  --}}
<script src="{{asset('assets/js/jQuery.print.js')}}"></script>


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
                    url: "{{ route('admin.expencese.store') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
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
                    url: "{{ route('admin.expencese.show') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#edit_id').val(response.expencese.id);
                        $('#edit_name').val(response.expencese.name);
                        $('#edit_amount').val(response.expencese.amount);

                    }
                });
            });

            // edit data
            $('#edit_form').submit(function(e) {
                e.preventDefault();

                let formdata = new FormData($('#edit_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.expencese.edit') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#edit_modal').modal('hide');
                            $('#edit_modal').find('input').val('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                            $('#search_box').val('');
                        } else {
                            console.log(response.fails.name);
                            if (response.fails.name) {
                                $('.name_error').text(response.fails.name);
                            }
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
                    url: "{{ route('admin.expencese.delete') }}",
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
            $('#search_box').on('change', function() {
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.expencese.search') }}",
                    data: {
                        'search': value
                    },
                    success: function(response) {
                        console.log(response);
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
    </script>
@endsection
