@extends('admin.layouts.master')
@section('title')
    order list
@endsection
@section('styles')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{asset('assets/css')}}/yearpicker.css" />


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
                                    <h4>Selling Report <span class="btn btn-outline-danger"><i class="fa fa-print print_btn"></i></span></h4>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Report Search By Month</label>
                                    <input id="month" type="month" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Report Search By Year</label>
                                    <input id="year" type="month" class="form-control">
                                </div>
                                </div>

                                <div class="QA_table mb_30" id="data_table">
                                    <h5 class="show_date">{{$show_date}}</h5>
                                    <table class="table  text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Quentity</th>
                                                <th scope="col">Purchasing Total</th>
                                                <th scope="col">Grand Total</th>
                                                <th scope="col">Calculation</th>
                                            </tr>
                                        </thead>

                                        <tbody id="table_body">
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $order->day}}</td>
                                                    <td>{{ $order->product_quentity }} pcs</td>
                                                    <td>${{ $order->purchasing_total }}</td>
                                                    <td>${{ $order->grand_total }}</td>
                                                    @if ($order->grand_total > $order->purchasing_total)
                                                        <td >${{$order->grand_total - $order->purchasing_total}} <span class="badge bg-success text-white"> Profit</span></td>
                                                        @else
                                                        <td >${{$order->purchasing_total - $order->grand_total}} <span class="badge bg-danger text-white"> lose</span></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            @if ($orders->sum('grand_total') != 0)
                                            <tr>

                                                <td colspan="2"><span class="text-danger">Total</span></td>
                                                <td><span class="text-danger">{{$orders->sum('product_quentity')}} pcs</span></td>
                                                <td><span class="text-danger">${{$orders->sum('purchasing_total')}}</span></td>
                                                <td><span class="text-danger">${{$orders->sum('grand_total')}}</span></td>
                                                    @if ($orders->sum('grand_total') >$orders->sum('purchasing_total'))
                                                        <td ><span class="text-danger">${{$orders->sum('grand_total') - $orders->sum('purchasing_total')}}</span> <span class="badge bg-success text-white"> Profit</span></td>
                                                        @else
                                                        <td ><span class="text-danger">${{$orders->sum('purchasing_total') - $orders->sum('grand_total')}}</span> <span class="badge bg-danger text-white"> lose</span></td>
                                                    @endif
                                            </tr>
                                                @endif
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
<script src="{{asset('assets/js')}}/yearpicker.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            // print
            $('.print_btn').click(function(e) {
                e.preventDefault();
                $("#data_table").print({
        	title: "Relling Report",

                });
            });

            //report search by month
            $(document).on('change', '#month', function(){
               var data = $(this).val();

               $.ajax({
                type:'get',
                url:"{{route('admin.monthly.report')}}",
                data:{'data' : data},
                success:function(response){
                if(response.not_found){
                //  $('#data_table').append('<h4>'+response.not_found+'</h4>');
                 toastr.error('No Record Found!');
                 console.log(response.not_found);

                    }
                    $('#data_table').html(response);

                }
               });
            });

            //report search by year
            $(document).on('change', '#year', function(){
               var data = $(this).val();

               $.ajax({
                type:'get',
                url:"{{route('admin.yearly.report')}}",
                data:{'data' : data},
                success:function(response){
                if(response.not_found){
                //  $('#data_table').append('<h4>'+response.not_found+'</h4>');
                 toastr.error('No Record Found!');
                 console.log(response.not_found);

                    }
                    $('#data_table').html(response);

                }
               });
            });


        });
    </script>
@endsection
