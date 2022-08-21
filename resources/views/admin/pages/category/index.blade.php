@extends('admin.layouts.master')
@section('title')
category list
@endsection
@section('styles')
<style>
    .fa, .far, .fas{
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
                                        <h4>All categorys</h4>
                                        <div class="box_right d-flex lms_block">
                                            <div class="serach_field_2">
                                                <div class="search_inner">

                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here..."
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
                                    <div class="QA_table mb_30">

                                        <table class="table lms_table_active3 " id="data_table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sl No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>

                                            <tbody id="table_body">
                                                @foreach ($categorys as $category)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            @if ($category->status == 0)
                                                                <span class="badge badge-danger">Pending</span>
                                                            @else
                                                                <span class="badge badge-success">Active</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="action_btns d-flex">


                                                                <a id="{{ $category->id }}"
                                                                    class="action_btn mr_10 status "> <i
                                                                        class="{{ $category->status == 0 ? 'far fa-eye-slash' : 'fa fa-eye' }}"></i>
                                                                </a>

                                                                <a id="{{ $category->id }}" class="action_btn mr_10 edit "
                                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"> <i
                                                                        class="far fa-edit"></i> </a>


                                                                <a id="{{ $category->id }}" class="action_btn delete"
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
@endsection

        <div class="modal fade" id="insert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_form">
                            @csrf
                            <div class="col-lg-12">
                                <div class="white_card card_height_100 ">
                                    <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3 class="m-0">category Name</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white_card_body">
                                        <span class="text-danger name_error"></span>
                                        <div class=" mb-0">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="category Name">
                                        </div>
                                        <p><cite>category name must be unique.</cite></p>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">category Edit And Update</h5>
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
                                    <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3 class="m-0">category Name</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white_card_body">
                                        <span class="text-danger name_error"></span>
                                        <div class=" mb-0">
                                            <input type="text" class="form-control" name="name" id="edit_name"
                                                placeholder="category name">
                                        </div>
                                        <p><cite>category name must be unique.</cite></p>
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



@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            // insert
            $('#insert_form').submit(function(e){
                e.preventDefault();

                let insert_data = new FormData($('#insert_form')[0]);
                $.ajax({
                    type:"post",
                    url:"{{route('admin.category.store')}}",
                    data:insert_data,
                    contentType: false,
                    processData: false,
                    success:function(response){
                      if (response.success) {
                            $('#insert_modal').modal('hide');
                            $('#insert_modal').find('input').val('');
                             toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                        } else {
                            console.log(response.fails.name);
                            if (response.fails.name) {
                                $('.name_error').text(response.fails.name);
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
                    url: "{{ route('admin.category.show') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#edit_id').val(response.category.id);
                        $('#edit_name').val(response.category.name);
                    }
                });
            });

            // edit data
            $('#edit_form').submit(function(e) {
                e.preventDefault();

                let formdata = new FormData($('#edit_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.category.edit') }}",
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
                    url: "{{ route('admin.category.delete') }}",
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

            //status control
            $(document).on('click', '.status', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.category.status') }}",
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        toastr.success(response.success);
                        $('#data_table').load(location.href + ' #data_table');
                        $('#search_box').val('');

                    }

                });
            });



             //search
            $('#search_box').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.category.search') }}",
                    data: {
                        'search': value
                    },
                    success: function(response) {
                        $('#data_table').html(response);
                        if (response.not_found) {
                            $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");

                        }
                        if(response.null){
                                 location.reload();
                        }
                    }
                })
            });


        });
    </script>
@endsection

