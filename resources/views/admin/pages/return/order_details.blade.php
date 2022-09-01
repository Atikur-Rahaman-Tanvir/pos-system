@extends('admin.layouts.master')
@section('title')
    Return Product
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
                    <h4>Return Product </h4>
                    <a href="{{route('admin.return.index')}}" class="btn btn-sm btn-primary">Go To Back</a>
                    <div class="white_card card_height_100 mb_30 p-5">
                        <div class="white_card_body" id="load">
                            <div class="QA_section">

                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h6 class="mb-3">From:</h6>
                                        <div>
                                            <strong>New Grocery</strong>
                                        </div>
                                        <div>71-101 Szczecin, England</div>
                                        <div>Phone: +0000</div>
                                        <h6>Invoice NO : <span class="invoice_no">{{ $order->invoice_no }}</span></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="mb-3">To:</h6>
                                        <div>
                                            <strong class="customer_name">{{ $customer->customer_name }}</strong>
                                        </div>
                                        <div class="customer_address">{{ $customer->customer_address }}</div>
                                        <div>Phone: <span class="customer_phone">{{ $customer->customer_number }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    <table class="table  text-center">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Image</th>
                                                <th>Item Name</th>
                                                <th class="right">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                                <th class="right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order_details">
                                            @foreach ($order_details as $order_detail)
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><img width="50"
                                                            src="{{ asset('storage/product_image/' . $order_detail->product->image) }}"
                                                            alt=""></td>
                                                    <td>{{ $order_detail->product_name }}</td>
                                                    <td>${{ $order_detail->product_selling_price }}</td>
                                                    {{-- <td>{{ $order_detail->product_quentity }} <small>pcs</small></td> --}}
                                                    <td><input id="return_quentity" class="form-control" type="number" value="{{$order_detail->product_quentity }}"></td>
                                                    <td>${{ $order_detail->product_selling_total }}</td>
                                                    <td><a id="{{ $order_detail->id }}"
                                                            class=" btn btn-sm btn-danger return"><i class="fa fa-undo"></i>
                                                            RETURN</a></td>
                                                </tr>
                                            @endforeach
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
                                                    <td class="right">$ <span
                                                            class="sub_total">{{ $order->sub_total }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Discount ( <span
                                                                class="discount_parcent">{{ $order->discount }}</span>
                                                            %)</strong>
                                                    </td>
                                                    @if ($order->discount == 0)
                                                        <td class="right">$ <span class="discount_amount">0</span></td>
                                                    @else
                                                        <td class="right">$ <span
                                                                class="discount_amount">{{ $order->sub_total - ($order->sub_total * $order->discount) / 100 }}</span>
                                                        </td>
                                                    @endif

                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong>$ <span
                                                                class="grand_total">{{ $order->grand_total }}</span></strong>
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
            // return
            $(document).on('click', '.return', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var return_quentity = $('#return_quentity').val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.return') }}",
                    data: {
                        'id': id,
                        'return_quentity':return_quentity,
                    },
                    success: function(response) {

                        if (response.order_null) {
                            var url = "{{route('admin.return.index')}}";
                            $(location).attr('href', url);
                            toastr.error("NO Bill Available");
                        }
                        if (response.success) {
                            console.log(response)
                            toastr.success(response.success);
                            $('#load').load(location.href + " #load");
                        }

                    }

                });
            });





        });
    </script>
@endsection
