@extends('admin.layouts.master')
@section('title')
    order list
@endsection
@section('styles')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('assets/css') }}/yearpicker.css" />


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
                                    <h4>All Bills</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <div class="search_field">
                                                    <input type="text"
                                                        placeholder="Search by invoice no or phone number..."
                                                        id="search_box" name="search">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="QA_table mb_30" id="data_table">
                                    <table class="table lms_table_active3  text-center">
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

                                                    <td>{{ $order->product_quentity }} pcs</td>
                                                    <td>${{ $order->sub_total }}</td>
                                                    <td>{{ $order->discount }}%</td>
                                                    <td>${{ $order->grand_total }}</td>
                                                    <td><a href="{{route('admin.order.details',$order->id)}}" class="btn btn-sm btn-danger">Go To Return</a></td>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    {{-- pirnt cdn --}}
    <script src="{{ asset('assets/js/jQuery.print.js') }}"></script>
    <!-- Moment Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{ asset('assets/js') }}/yearpicker.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            // search
            $('#search_box').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.return.search') }}",
                    data: {
                        'search': value
                    },
                    success: function(response) {
                        console.log(response);
                        $('#data_table').html(response);
                        if (response.not_found) {
                            $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");
                            toastr.error('No Found');

                        }
                        if (response.null) {
                            location.reload();
                        }
                    }
                })
            });


        });
    </script>
@endsection
