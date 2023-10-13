<!DOCTYPE html>
<html lang="ar" direction="rtl" style="direction: rtl;">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="صالة عبده جيم لكمال الاجسام">
        <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('system/admin/assets/logo.png') }}" />
        <title>صالة عبده جيم</title>
        @include('system.admin.layouts.include.frontEnd.style')
    </head>
    <body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed 
    aside-enabled aside-fixed aside-minimize-hoverable page-loading" id="kt_body">
    @include('system.admin.layouts.include.parts.settings')
        <div class="d-flex flex-column flex-root">
             <div class="d-flex flex-row flex-column-fluid page">
                @include('system.admin.layouts.include.parts.sidebar')
                <div class="d-flex flex-column flex-row-fluid wrapper">
                    @include('system.admin.layouts.include.parts.header')
                    @include('system.admin.layouts.include.parts.content')
                    @include('system.admin.layouts.include.parts.footer')
                </div>
            </div>
        </div>
        @include('system.admin.layouts.include.frontEnd.script')
    </body>
</html>
