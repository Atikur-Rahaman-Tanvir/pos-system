@extends('admin.layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="main_content_iner overly_inner " >
        <div class="container-fluid p-0 ">


            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 p-2 ">
                        <div class="white_card_body">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <div class="white_card card_height_100 p-2 ">
                        <div class="white_card_body p-5">
                            <a href="{{route('admin.product.index')}}"><button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                                <i class="fa fa-cube fa-4x"></i>
                                <div class="mt-2">Inventory</div>
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
                            <a href="{{route('admin.expencese.index')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                               <i class="fa fa-cubes fa-4x"></i>
                                <div class="mt-2">Daily Expencese</div>
                            </button><a>
                            <a href="{{route('admin.expencese.report')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px">
                               <i class="fa fa-cubes fa-4x"></i>
                                <div class="mt-2">Expencese Report</div>
                            </button><a>
                            <a  href="{{route('admin.supplyer.index')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px;margin-top: 30px;">
                               <i class="fa fa-industry fa-4x"></i>
                                <div class="mt-2">Supplyers</div>
                            </button><a>
                            <a  href="{{route('admin.return.index')}}"> <button class="btn btn-outline-info" style="width: 150px;height: 150px;margin-right:30px;margin-top: 30px;">
                               <i class="fa fa-undo fa-4x"></i>
                                <div class="mt-2">Return</div>
                            </button><a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
