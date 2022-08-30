<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/Cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:08:14 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta name="_token" content="{{ csrf_token() }}" />

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>BitCrypto</title>
    <link rel="icon" href="{{ asset('assets') }}/img/mini_logo.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/vectormap-home/vectormap-2.0.2.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/scroll/scrollable.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/morris/morris.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/css/metisMenu.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style1.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/colors/default.css" id="colorSkinCSS">

    {{-- toastr alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- jqery autocomplete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="crm_body_bg">



    <section id="product" class="main_content dashboard_part large_header_bg" style="padding-left:0">

        <div class="container-fluid g-0">
            <div class="row">

            </div>
        </div>

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                <div class="row mb-2">
                    <div class="col-lg-3">
                        <a href="{{ route('home') }}" class="btn btn-danger" style="margin-right: 3px;"><i class="fa fa-home"></i> HOME</a>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fa fa-cube "></i> Inventory</a>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                <div class=""><i class="fa fa-user-plus" style="color: #065a92;"></i></div>
                            </div>
                            <input type="text" class="form-control" name="customer_name" id="customer_name"
                                placeholder="Customer Name">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                <div class=""><i class="fa fa-phone" style="color: #065a92;"></i></div>
                            </div>
                            <input type="tel" class="form-control" name="customer_number" id="customer_number"
                                placeholder="Customer Contac Number">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group mb-2">
                            <div class="input-group-text">
                                <div class=""><i class="fa fa-address-card" style="color: #065a92;"></i></div>
                            </div>
                            <input class="form-control" name="customer_address" id="customer_address"
                                placeholder="Customer Addresss">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="white_card">
                                    <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3>Categories</h3>
                                            </div>
                                            <div class="box_right d-flex lms_block">
                                                <div class="serach_field_2">
                                                    <div class="search_inner">
                                                        <form active="#">
                                                            <div class="search_field">
                                                                <input id="product_search" type="text"
                                                                    placeholder="Search Produc by product name...">
                                                            </div>
                                                            <button type="submit"> <i class="ti-search"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="white_card_body" style="height: 120px;overflow:scroll">
                                        <div class="">
                                            <button class="btn btn-outline-danger rounded-pill mb-3 all_product">All
                                                Products</button>
                                            @foreach ($categories as $category)
                                                <button type="button"
                                                    class="btn btn-outline-primary rounded-pill mb-3 product_category"
                                                    id="{{ $category->id }}">{{ $category->name }}</button>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="height: 600px; overflow:scroll">
                                <div class="row " id="category_products">
                                    @foreach ($Products as $product)
                                        @if ($product->quentity > 0)
                                            <div class="col-md-3 mt-1">
                                                <a id="{{ $product->id }}" class="product">
                                                    <div class="white_card position-relative mb_20 ">
                                                        <div class="card-body">
                                                            <img src="{{ asset('storage/product_image/' . $product->image) }}"
                                                                alt="" class="d-block mx-auto "
                                                                height="60">
                                                            <div class="row text-center ">
                                                                <div class="col-12">
                                                                    <h6
                                                                        class="f_w_400 color_text_3 f_s_14 d-block this_product_name">
                                                                        {{ $product->name }}
                                                                        <h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h4 style="display: inline-block"
                                                                        class="text-dark mt-0">
                                                                        <small>${{ $product->selling_price }}</small>
                                                                    </h4>
                                                                    <span style="display: inline-block"
                                                                        class="badge badge-sm bg-danger ml-3 product_stock"
                                                                        id="{{ $product->id }}">{{ $product->quentity }}</span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-md-3 mt-1">
                                                <a id="{{ $product->id }}" class="product_out_of_stock">
                                                    <div class="white_card position-relative mb_20 ">
                                                        <div class="card-body">
                                                            <img src="{{ asset('storage/product_image/' . $product->image) }}"
                                                                alt="" class="d-block mx-auto "
                                                                height="60">
                                                            <div class="row text-center ">
                                                                 <div class="col-12">
                                                                    <h6
                                                                        class="f_w_400 color_text_3 f_s_14 d-block this_product_name">
                                                                        {{ $product->name }}
                                                                        <h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h4 style="display: inline-block"
                                                                        class="text-dark mt-0">
                                                                        <small>${{ $product->selling_price }}</small>
                                                                    </h4>
                                                                    <span style="display: inline-block"
                                                                        class="badge badge-sm bg-danger ml-3">{{ $product->quentity }}</span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card QA_section border-0">
                            <div class="card-body QA_table ">
                                <div class="table-responsive shopping-cart ">
                                          <div id="" style="height: 300px; overflow:scroll;justify-content:center">
                                        <img style="" class="empty_cart"
                                            src="{{ asset('assets/img/emptyCart.png') }}" alt="">
                                        <table id="cart_table" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Product</th>
                                                    <th class="border-top-0">Price</th>
                                                    <th class="border-top-0">Quantity</th>
                                                    <th class="border-top-0">Total</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart_item">


                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div id="cart_item" style="height: 300px; overflow:scroll;justify-content:center">
                                        <img style="" class="empty_cart"
                                            src="{{ asset('assets/img/emptyCart.png') }}" alt="">
                                    </div> --}}
                                </div>
                                <div class="row justify-content-end mt_30">
                                    <div class="col-md-12">
                                        <div class="total-payment p-3">
                                            <h4 class="header-title">Total Payment</h4>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="payment-title">Subtotal</td>
                                                        <td>$ <span class="sub_total">0</span><input type="hidden"
                                                                class="purchasing_total"></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="payment-title">Discount <span
                                                                class="text-danger">%</span></td>
                                                        <td><input class="form-control discount" type="number"
                                                                value=""></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="payment-title">Total</td>
                                                        <td class="text-dark"><strong>$ <span
                                                                    class="grand_total">0</span></strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3">
                                                            <button onclick="window.location.reload()" type="button"
                                                                class="btn btn-danger  mb-3">Suspend</button>
                                                            <button id="paymetn_button" type="button"
                                                                class="btn btn-primary mb-3">Payment</button>
                                                        </td>
                                                    </tr>
                                                </tbody>

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

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="{{ asset('assets') }}/#"> <i
                                        class="ti-heart"></i> </a><a href="{{ asset('assets') }}/#">DashboardPack</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="insert_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Customar</h5>
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
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Customer Name">
                                    </div>
                                    <p><cite>Add a new customer.</cite></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_card card_height_100 ">
                                <div class="white_card_body">
                                    <span class="text-danger customer_number_error"></span>
                                    <div class=" mb-0">
                                        <input type="number" class="form-control" name="customer_number"
                                            id="customer_number" placeholder="Enter Customer Number">
                                    </div>
                                    <p><cite>Customer contact number.</cite></p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
       <!-- The Modal -->


        <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                {{-- <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="display:inline-block;margin-right:10px">Invoice</h4> <button
                        class="ml-3 btn btn-sm btn-outline-primary print_btn"><i class="fa fa-print"></i> ptint</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div> --}}

                <!-- Modal body -->
                <div class="modal-body" >
                     <div class="card-body invoice">
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
                                        <td class="right">$ <span class="invoice_sub_total"></span></td>
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
                                            <strong>$ <span class="invoice_grand_total"></span></strong>
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




    <script src="{{ asset('assets') }}/js/jquery1-3.4.1.min.js"></script>

    <script src="{{ asset('assets') }}/js/popper1.min.js"></script>

    <script src="{{ asset('assets') }}/js/bootstrap1.min.js"></script>

    <script src="{{ asset('assets') }}/js/metisMenu.js"></script>

    <script src="{{ asset('assets') }}/vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/chartlist/Chart.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/count_up/jquery.counterup.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatable/js/buttons.print.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/datepicker/datepicker.js"></script>
    <script src="{{ asset('assets') }}/vendors/datepicker/datepicker.en.js"></script>
    <script src="{{ asset('assets') }}/vendors/datepicker/datepicker.custom.js"></script>
    <script src="{{ asset('assets') }}/js/chart.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/chartjs/roundedBar.min.js"></script>

    <script src="{{ asset('assets') }}/vendors/progressbar/jquery.barfiller.js"></script>

    <script src="{{ asset('assets') }}/vendors/tagsinput/tagsinput.js"></script>

    <script src="{{ asset('assets') }}/vendors/text_editor/summernote-bs4.js"></script>
    <script src="{{ asset('assets') }}/vendors/am_chart/amcharts.js"></script>

    <script src="{{ asset('assets') }}/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/scroll/scrollable-custom.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart_am/core.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart_am/charts.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart_am/animated.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart_am/kelly.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart_am/chart-custom.js"></script>

    <script src="{{ asset('assets') }}/js/custom.js"></script>

    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- jquery ui --}}
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- pirnt cdn --}}
    <script src="{{ asset('assets/js/jQuery.print.js') }}"></script>
    <script>
        $('#customer').select2({
            placeholder: 'select a customer',
            allowClear: true,
        });
    </script>

    <script>
        $(document).ready(function() {
            //    product add to cart
            $(document).on('click', '.product', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.add.to.cart') }}",
                    data: {
                        "id": id
                    },
                    dataType: "json",
                    success: function(response) {
                        var image = response.product.image;
                        var per_pices_price = response.product.selling_price;
                        var product_purchasing_price = response.product.purchasing_price;
                        var name = response.product.name;
                        var quentity = response.product.quentity;
                        add_to_cart(name, image, per_pices_price);
                        cart_total();
                        grand_total();



                        function add_to_cart() {
                            var cart_product_name = $('#cart_item .cart_product_name');
                            for (var i = 0; i < cart_product_name.length; i++) {
                                if (cart_product_name[i].text == name) {
                                    toastr.warning('this porduct is alrady in cart.');
                                    return
                                }
                            }
                            // add_row(image, per_pices_price, name);
                            // function add_row(){
                            var cart_row = '  <tr class="cart_row">' +
                                '<td><img src="{{ asset('storage/product_image') }}/' + image +
                                '" alt="" height="52">' +
                                '<p class="d-inline-block align-middle mb-0">' +
                                ' <a class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2 cart_product_name">' +
                                name + '</a><br>' +
                                '<span class="text-muted font_s_13"></span></p>' +
                                '</td>' +
                                '<td>$<span class="item_price">' + per_pices_price +
                                '</span><input type="hidden" class="product_purchasing_price" value="' +
                                product_purchasing_price + '"></td>' +
                                '<td><input class="form-control w cart_quentity" type="number" value="1"' +
                                'id="example-number-input1" max="' + quentity + '"></td>' +
                                '<td><span class="item_total">' + per_pices_price +
                                '</span><input type="hidden" class="product_purchasing_total" value="' +
                                product_purchasing_price + '"></td></td>' +
                                '<td><a href="www.facebook.com" id="" class="text-dark cart_item_delete"><i  class="far fa-times-circle font_s_18"></i></a></td>' +
                                '  </tr>'

                            $('.empty_cart').addClass('d-none');
                            $('#cart_item').append(cart_row);
                            // }
                        }

                        //decrement product quentity
                        // function decrement_quentity(){

                        //     // var current = old_qty-1 ;
                        //     $('.product_stock').text(old_qty);
                        // }


                    }

                });
            });
            // product out of strock
            $('.product_out_of_stock').click(function(e) {
                toastr.error('This Product Out Of Storck!');
            });
            //quetntiy increment or decrement
            $(document).on('change', '.cart_quentity', function() {
                var quentity = parseInt($(this).val());
                var max = parseFloat($(this).attr('max'));
                if (quentity <= max) {
                    var item_price = parseInt($(this).closest('tr').find('td:nth-child(2)').find(
                        '.item_price').text());
                    var product_purchasing_price = parseInt($(this).closest('tr').find('td:nth-child(2)')
                        .find(
                            '.product_purchasing_price').val());
                    var product_total = quentity * item_price;
                    var product_purchasing_total = quentity * product_purchasing_price;
                    $(this).closest('tr').find('td:nth-child(4)').find('.item_total').text(product_total);
                    $(this).closest('tr').find('td:nth-child(4)').find('.product_purchasing_total').val(
                        product_purchasing_total);
                    cart_total();
                    grand_total();
                } else {
                    // $(this).val('1');
                }
            });
            //quetntiy increment or decrement using keyUp
            $(document).on('keyup', '.cart_quentity', function() {
                var quentity = parseFloat($(this).val());
                var max = $(this).attr('max');
                if (quentity <= max) {
                    var item_price = parseInt($(this).closest('tr').find('td:nth-child(2)').find(
                        '.item_price').text());
                    var product_purchasing_price = parseInt($(this).closest('tr').find('td:nth-child(2)')
                        .find(
                            '.product_purchasing_price').val());
                    var product_total = quentity * item_price;
                    var product_purchasing_total = quentity * product_purchasing_price;
                    $(this).closest('tr').find('td:nth-child(4)').find('.item_total').text(product_total);
                    $(this).closest('tr').find('td:nth-child(4)').find('.product_purchasing_total').val(
                        product_purchasing_total);
                    cart_total();
                    grand_total();
                } else {
                    if (quentity > max) {
                        toastr.error('Only ' + max + ' products in stock!');
                        $(this).val(max);
                         var quentity = parseInt($(this).val());
                        var item_price = parseInt($(this).closest('tr').find('td:nth-child(2)').find(
                            '.item_price').text());
                        var product_purchasing_price = parseInt($(this).closest('tr').find(
                            'td:nth-child(2)').find(
                            '.product_purchasing_price').val());
                        var product_total = quentity * item_price;
                        var product_purchasing_total = quentity * product_purchasing_price;
                        $(this).closest('tr').find('td:nth-child(4)').find('.item_total').text(
                            product_total);
                        $(this).closest('tr').find('td:nth-child(4)').find('.product_purchasing_total').val(
                            product_purchasing_total);
                        cart_total();
                        grand_total();
                    } else {
                        $(this).val('');
                        var quentity = $(this).val();
                        var item_price = parseInt($(this).closest('tr').find('td:nth-child(2)').find(
                            '.item_price').text());
                        var product_purchasing_price = parseInt($(this).closest('tr').find(
                            'td:nth-child(2)').find(
                            '.product_purchasing_price').val());
                        var product_total = quentity * item_price;
                        var product_purchasing_total = quentity * product_purchasing_price;
                        $(this).closest('tr').find('td:nth-child(4)').find('.item_total').text(
                            product_total);
                        $(this).closest('tr').find('td:nth-child(4)').find('.product_purchasing_total').val(
                            product_purchasing_total);
                        cart_total();
                        grand_total();
                    }

                }
            });
            //cart total
            function cart_total() {
                var total = 0;
                $("#cart_item .item_total").each(function() {
                    total += parseInt($(this).text());
                    $('.sub_total').text(total);
                })

                var purchasing_total = 0;
                $("#cart_item .product_purchasing_total").each(function() {
                    purchasing_total += parseInt($(this).val());
                    $('.purchasing_total').val(purchasing_total);
                })
            }
            //test
            function test() {
                var data = [];
                $("#cart_item tr").each(function() {
                    var name = $(this).find('td').find('.cart_product_name').text();
                    var sell_price = $(this).find('td').find('.item_price').text();
                    var product_total = $(this).find('td').find('.item_total').text();
                    var quentity = $(this).find('td').find('.cart_quentity').val();

                    data.push({
                        name: name,
                        sell_price: sell_price,
                        quentity: quentity,
                        product_total: product_total
                    });
                    // G.objects.push({title: title,src: src});
                    // console.log(name,sell_price,product_total,quentity);
                });
                console.log(data);
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.test') }}",
                    data: {
                        'data': data
                    },
                    success: function(response) {
                        console.log(response.success);
                    }
                });
            }
            // grand total
            function grand_total() {
                var discount = parseInt($('.discount').val());
                var subtotal = $('.sub_total').text();
                if (isNaN(discount)) {
                    $('.grand_total').text(subtotal);
                } else {
                    var grand_total = subtotal - (subtotal * discount) / 100;
                    $('.grand_total').text(grand_total.toFixed());
                }
            }
            // discount usnig change method
            $(document).on('change', '.discount', function() {
                if ($('.sub_total').text() > 0) {
                    var discount = parseInt($('.discount').val());
                    var subtotal = $('.sub_total').text();

                    var grand_total = subtotal - (subtotal * discount) / 100;
                    $('.grand_total').text(grand_total.toFixed());

                } else {
                    $('.discount').val('0');
                    toastr.warning('select product frist!')
                }
            });
            //discount keyup
            $(document).on('keyup', '.discount', function() {
                if ($('.sub_total').text() > 0) {
                    var discount = parseFloat($('.discount').val());
                    var subtotal = $('.sub_total').text();
                    if (!isNaN(discount)) {
                        var grand_total = subtotal - (subtotal * discount) / 100;
                        $('.grand_total').text(grand_total.toFixed());
                    } else {

                        $('.grand_total').text(subtotal);
                    }
                } else {
                    $('.discount').val('0');
                    toastr.warning('select product frist!')
                }
            });

            //delete cart item
            $(document).on('click', '.cart_item_delete', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                cart_total();
                grand_total();
                var cart_product_name = $('#cart_item .cart_product_name');
                if (cart_product_name.length == 0) {
                    $('.sub_total').text('0');
                    $('.purchasing_total').val('0');
                    $('.grand_total').text(0);
                }
                var cart_product_name = $('#cart_item .cart_product_name');
                if (cart_product_name.length == 0) {
                    $('.empty_cart').removeClass('d-none');
                }
            });

            // add new customer
            $('#insert_form').submit(function(e) {
                e.preventDefault();

                let insert_data = new FormData($('#insert_form')[0]);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.customer.add') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            $('#insert_modal').modal('hide');
                            $('#insert_modal').find('input').val('');
                            toastr.success(response.success);
                            // $('#customer').load(location.href + ' #customer');
                            // location.reload();
                            // $('#customar_option').text(response.name);
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
            //product_category
            $(document).on('click', '.product_category', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.category.product') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#category_products').html(response);
                    }
                });
            });
            //all product
            all_product();

            function all_product() {
                $(document).on('click', '.all_product', function() {
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.product.all') }}",
                        success: function(response) {
                            $('#category_products').html(response);
                        }
                    });
                });
            }
            //porduct search
            $(document).on('keyup', '#product_search', function() {
                var data = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.pos.product.search') }}",
                    data: {
                        'data': data
                    },
                    success: function(response) {
                        console.log(response);
                        $('#category_products').html(response);
                        if (response.null) {

                        }
                    }

                });
            });
            //payment
            $(document).on('click', '#paymetn_button', function() {
                var order_details = [];
                var i = 1;
                $("#cart_item tr").each(function() {
                    var name = $(this).find('td').find('.cart_product_name').text();
                    var product_purchasing_price = $(this).find('td').find(
                        '.product_purchasing_price').val();
                    var sell_price = $(this).find('td').find('.item_price').text();
                    var product_total = $(this).find('td').find('.item_total').text();
                    var product_purchasing_total = $(this).find('td').find(
                        '.product_purchasing_total').val();
                    var quentity = $(this).find('td').find('.cart_quentity').val();

                    order_details.push({
                        name: name,
                        product_purchasing_price: product_purchasing_price,
                        sell_price: sell_price,
                        quentity: quentity,
                        product_purchasing_total: product_purchasing_total,
                        product_selling_total: product_total,
                    });

                    //invoice
                    var invoice_order_details = '<tr>' +
                        '<td class="center">' + i + '</td>' +
                        '<td class="left strong">' + name + '</td>' +
                        '<td class="right">$' + sell_price +
                        '</td>' +
                        '<td class="center">' + quentity + '</td>' +
                        '<td class="right">$' + product_total +
                        '</td>' +
                        ' </tr>'
                    $('#order_details').append(invoice_order_details);
                    i += i;
                });
                var customer_info = {
                    customer_name: $('#customer_name').val(),
                    customer_number: $('#customer_number').val(),
                    customer_address: $('#customer_address').val(),
                };
                //customer informatin for invoice;
                $('.customer_name').text($('#customer_name').val());
                $('.customer_address').text($('#customer_address').val());
                $('.customer_phone').text($('#customer_number').val());
                var product_quentity = 0;
                $('#cart_item .cart_quentity').each(function() {
                    product_quentity += parseInt($(this).val());
                });
                 var invoice_no = Math.floor(Math.random() * 1000000000);
                 $('.invoice_no').text(invoice_no);
                var order = {
                    product_quentity: product_quentity,
                    sub_total: $('.sub_total').text(),
                    discount: $('.discount').val(),
                    purchasing_total: $('.purchasing_total').val(),
                    grand_total: $('.grand_total').text(),
                    invoice_no:invoice_no,
                };

                //order details for invoice order status
                $('.invoice_sub_total').text($('.sub_total').text());
                $('.invoice_grand_total').text($('.grand_total').text());
                var discount_amount = ($('.discount').val() * $('.sub_total').text()) / 100;
                $('.discount_amount').text(discount_amount.toFixed());

                var customer_name = $('#customer_name').val();
                var customer_number = $('#customer_number').val();
                var customer_address = $('#customer_address').val();
                var sub_total = $('.sub_total').text();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.test') }}",
                    data: {
                        'order': order,
                        'order_details': order_details,
                        'customer_name': customer_name,
                        'customer_number': customer_number,
                        'customer_address': customer_address,

                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('order_complete!');
                            $('.invoice').print({
                                 deferred: $.Deferred().done(function() {
                                    location.reload()
                                  })
                            });

                        }
                        if (response.fails) {
                            toastr.warning('customer name and number required');
                        }
                    }
                });
            });
        });

    </script>



</body>

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/Cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:08:14 GMT -->

</html>
