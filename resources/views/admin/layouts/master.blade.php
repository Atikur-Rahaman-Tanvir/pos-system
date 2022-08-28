<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:06:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta name="_token" content="{{ csrf_token() }}" />

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'pos system')</title>
    <link rel="icon" href="{{ asset('assets') }}/img/mini_logo.png" type="image/png">
    @include('admin.layouts.partials.style')
    @yield('styles')
</head>

<body class="crm_body_bg">

    {{-- @include('admin.layouts.partials.sidebar') --}}

    <section class="main_content dashboard_part large_header_bg" style="padding-left:0">
        @include('admin.layouts.partials.header')
        @yield('content')
        @include('admin.layouts.partials.footer')
    </section>



    @include('admin.layouts.partials.script')
    @yield('scripts')
</body>

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:07:11 GMT -->

</html>
