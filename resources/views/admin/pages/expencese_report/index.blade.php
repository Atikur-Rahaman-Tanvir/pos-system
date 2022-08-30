@extends('admin.layouts.master')
@section('title')
    expencese list
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
                                    <h4>Expencse Report <span class="btn btn-outline-danger"><i class="fa fa-print print_btn"></i></span></h4>

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
                                                <th scope="col">Amount</th>

                                            </tr>
                                        </thead>

                                        <tbody id="table_body">
                                            @foreach ($expenceses as $expencese)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $expencese->day}}</td>
                                                    <td>${{ $expencese->amount }}</td>
                                                </tr>
                                            @endforeach
                                            <tr style="text-align: center">
                                                <td></td>
                                                <td colspan=""><span class="text-danger" style="font-weight: bold">Total</span></td>
                                                <td style=""><span class="text-danger" style="font-weight: bold">${{$expencese->sum('amount')}}</span></td>
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
        	title: "Expencese Report",

                });
            });

            //expencese report search by month
            $(document).on('change', '#month', function(){
               var data = $(this).val();

               $.ajax({
                type:'get',
                url:"{{route('admin.expencese.monthly.report')}}",
                data:{'data' : data},
                success:function(response){
                if(response.not_found){
                 toastr.error('No Record Found!');
                    }
                    $('#data_table').html(response);

                }
               });
            });

            //expencese report search by year
            $(document).on('change', '#year', function(){
               var data = $(this).val();

               $.ajax({
                type:'get',
                url:"{{route('admin.expencese.yearly.report')}}",
                data:{'data' : data},
                success:function(response){
                if(response.not_found){
                 toastr.error('No Record Found!');
                    }
                    $('#data_table').html(response);

                }
               });
            });


        });
    </script>
@endsection
