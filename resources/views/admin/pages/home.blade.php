@extends('admin.layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="main_content_iner overly_inner " >
        <div class="container-fluid p-0 ">

            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="mb-0">Dashboard</h3>
                            <p>Dashboard/Crypto currenct</p>
                        </div>
                        <div class="monitor_list_widget">
                            <div class="simgle_monitor_list">
                                <div class="simgle_monitor_count d-flex align-items-center">
                                    <span>Purchase</span>
                                    <div id="monitor_1"></div>
                                </div>
                                <h4 class="counter">6,250</h4>
                            </div>
                            <div class="simgle_monitor_list">
                                <div class="simgle_monitor_count d-flex align-items-center">
                                    <span>Purchase</span>
                                    <div id="monitor_2"></div>
                                </div>
                                <h4>$ <span class="counter">55,250</span> </h4>
                            </div>
                            <div class="simgle_monitor_list">
                                <div class="simgle_monitor_count d-flex align-items-center">
                                    <span>Purchase</span>
                                    <div id="monitor_3"></div>
                                </div>
                                <h4>$ <span class="counter">451.6 </span>M </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 p-2 ">
                        <div class="white_card_body">

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_card card_height_100 p-2 ">
                        <div class="white_card_body">
                            <a href="{{route('admin.product.index')}}"><button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                                <i class="fa fa-cube fa-4x"></i>
                                <div class="mt-2">Products</div>
                            </button></a>
                            <a href="{{route('admin.category.index')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                                <i class="fas fa-tags fa-4x"></i>
                                <div class="mt-2">Categories</div>
                            </button><a>
                            <a href="{{route('admin.bill')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                               <i class="fa fa-receipt fa-4x"></i>
                                <div class="mt-2">Bill</div>
                            </button><a>
                            <a href="{{route('admin.report')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                               <i class="fa fa-file fa-4x"></i>
                                <div class="mt-2">Report</div>
                            </button><a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
