@extends('admin.layouts.master')
@section('title')
    order list
@endsection
@section('styles')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


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
                                    <h4>All orders</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">

                                                <div class="search_field">
                                                    <input type="text" placeholder="Search by invoice no or phone number..."
                                                        id="search_box" name="search">

                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="QA_table mb_30" id="data_table">
                                    <h6 class="bg-danger text-white p-2" style="width: 150px;display:inline-block">Totla
                                        Bill : <span class="badge">${{ $orders->count() }}</span></h6>
                                    <h6 class="bg-success text-white p-2" style="width: 250px;display:inline-block">
                                        Purchasing Total : <span
                                            class="badge">${{ $orders->sum('purchasing_total') }}</span></h6>
                                    <h6 class="bg-primary text-white p-2" style="width: 250px;display:inline-block">Selling
                                        Total : <span class="badge">${{ $orders->sum('grand_total') }}</span></h6>

                                    @if ($orders->sum('grand_total') < $orders->sum('purchasing_total'))
                                        <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">Loss
                                            : <span
                                                class="badge">${{ $orders->sum('purchasing_total') - $orders->sum('grand_total') }}</span>
                                        </h6>
                                    @elseif ($orders->sum('grand_total') == $orders->sum('purchasing_total'))
                                        <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">No
                                            profit No loss</span></h6>
                                    @else
                                        <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">
                                            Profit : <span
                                                class="badge">${{ $orders->sum('grand_total') - $orders->sum('purchasing_total') }}</span>
                                        </h6>
                                    @endif
                                    <table class="table lms_table_active3 text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Invoice No</th>
                                                <th scope="col">Quentity</th>
                                                <th scope="col">Sub Total</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Grand Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="table_body">
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                                    <td>#{{ $order->invoice_no }}</td>
                                                    <td>{{ $order->product_quentity }}</td>
                                                    <td>${{ $order->sub_total }}</td>
                                                    <td>{{ $order->discount }}%</td>
                                                    <td>${{ $order->grand_total }}</td>


                                                    <td>
                                                        <div class="action_btns d-flex">
                                                            <a id="{{ $order->id }}" class="action_btn mr_10 invoice"
                                                                data-bs-toggle="modal" data-bs-target="#myModal">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a id="{{ $order->id }}" class="action_btn delete"
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="display:inline-block;margin-right:10px">Invoice</h4> <button
                        class="ml-3 btn btn-sm btn-outline-primary print_btn"><i class="fa fa-print"></i> ptint</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body invoice_body" >
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="mb-3">From:</h6>
                                <div>
                                    <strong>New Grocery</strong>
                                </div>
                                <div>71-101 Szczecin, England</div>
                                <div>Phone: +0000</div>
                                <h6>Invoice NO : <span class="invoice_no"></span></h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3">To:</h6>
                                <div>
                                    <strong class="customer_name"></strong>
                                </div>
                                <div class="customer_address"></div>
                                <div>Phone: <span class="customer_phone"></span></div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th class="right">Unit Cost</th>
                                        <th class="center">Qty</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="order_details">

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ms-auto QA_section">
                                <table class="table table-clear QA_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right">$ <span class="sub_total"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Discount ( <span class="discount_parcent"></span> %)</strong>
                                            </td>
                                            <td class="right">$ <span class="discount_amount"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong>$ <span class="grand_total"></span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    {{-- pirnt cdn --}}
    <script src="{{ asset('assets/js/jQuery.print.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
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
                    url: "{{ route('admin.bill.delete') }}",
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

            // search
            $('#search_box').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.bill.search') }}",
                    data: {
                        'search': value
                    },
                    success: function(response) {
                        console.log(response);
                        $('#data_table').html(response);
                        if (response.not_found) {
                            $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");
                            toastr.error('No Bill Found');

                        }
                        if (response.null) {
                            location.reload();
                        }
                    }
                })
            });

            // print
            $('.print_btn').click(function(e) {
                e.preventDefault();
                $(".invoice_body").print({
                    title:'Invoice',
                });
            });

            //invoice
            $(document).on('click', '.invoice', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.bill.invoice') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        var obj = response.order_details;
                        var i = 1;
                        $.each(obj, function(key, value) {
                            var id = obj[key].order_id;
                            var name = obj[key].product_name;
                            var product_selling_price = obj[key].product_selling_price;
                            var product_quentity = obj[key].product_quentity;
                            var product_selling_total = obj[key].product_selling_total;
                            var order_details = '<tr>' +
                                '<td class="center">' + i + '</td>' +
                                '<td class="left strong">' + name + '</td>' +
                                '<td class="right">$' + product_selling_price +
                                '</td>' +
                                '<td class="center">' + product_quentity + '</td>' +
                                '<td class="right">$' + product_selling_total +
                                '</td>' +
                                ' </tr>'
                            $('#order_details').append(order_details);
                            i += i;
                        });
                        $('.sub_total').text(response.order.sub_total);
                        $('.discount_parcent').text(response.order.discount);
                        var discount_amount = (response.order
                            .discount * response.order.sub_total) / 100;
                        $('.discount_amount').text(discount_amount.toFixed());
                        $('.grand_total ').text(response.order.grand_total);
                        $('.invoice_no ').text(response.order.invoice_no);

                        $('.customer_name').text(response.customer.customer_name);
                        $('.customer_address').text(response.customer.customer_address);
                        $('.customer_phone').text(response.customer.customer_number);
                    }
                });
            });
            //model table tr remove
            $("#myModal").on('hidden.bs.modal', function() {
                $('#order_details tr').remove();

            });

        });
    </script>
@endsection
