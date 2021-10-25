<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($general->favicon) }}">
    <title>{{ $general->title }}</title>
    <link href="{{ asset('Back') }}/dist/css/style.css" rel="stylesheet">
    <link href="{{ asset('Back') }}/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="{{ asset('Back') }}/dist/css/pages/data-table.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Back') }}/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Back') }}/assets/libs/ckeditor/samples/css/samples.css">
    @toastr_css
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">{{ $general->title }}</p>
            </div>
        </div>
        <header class="topbar">
            <nav>
                <div class="nav-wrapper">
                    <ul class="left">
                        <li class="hide-on-med-and-down">
                            <a href="javascript: void(0);" class="nav-toggle">
                                <span class="bars bar1"></span>
                                <span class="bars bar2"></span>
                                <span class="bars bar3"></span>
                            </a>
                        </li>
                        <li class="hide-on-large-only">
                            <a href="javascript: void(0);" class="sidebar-toggle">
                                <span class="bars bar1"></span>
                                <span class="bars bar2"></span>
                                <span class="bars bar3"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @include('Back.menus')