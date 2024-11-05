<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content-="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@200">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

        * {
            font-family: "Manrope", sans-serif;
            font-size: 13px;
        }

        main {
            padding-top: 38px;
            padding-bottom: 38px;
        }

        input,
        select,
        .search-btn {
            padding-top: 6px !important;
            padding-bottom: 6px !important;
        }

        .container-fluid {
            padding-left: 64px;
            padding-right: 64px;
        }

        .table {
            margin-bottom: 0;
        }

        .btn,
        .card,
        .form-control,
        .list-group {
            border-radius: 0;
        }

        .list-group .list-group-item {
            padding-top: 12px;
            padding-bottom: 12px;
            border-radius: 0;
        }

        .list-group .list-group-item a {
            display: block;
        }

        .list-group .list-group-item .m-icon {
            font-size: 22px !important;
            vertical-align: -6px;
            margin-right: 5px;
        }

        .action-btn span {
            font-size: 20px !important;
            vertical-align: middle;
        }

        .card .card-header {
            min-height: 50px;
        }

        .card .card-header .card-ttl {
            font-weight: 600;
        }

        /* Styling Table */
        table thead tr th,
        table tbody tr td {
            text-align: center;
            vertical-align: middle;
        }

        table thead tr th {
            padding-top: 12px !important;
            padding-bottom: 12px !important;
        }

        /* Custom Styling Sweet Alert 2 */
        .swal2-popup {
            font-size: 12.5px !important;
            padding: 0 0 1.65rem !important;
        }

        .swal2-styled.swal2-confirm {
            padding-right: 25px !important;
            padding-left: 25px !important;
        }

        .swal2-styled.swal2-cancel,
        .swal2-styled.swal2-confirm {
            box-shadow: none !important;
            outline: none !important;
            border-radius: 0 !important;
        }

        /* Custom Styling Pagination */
        .pagination {
            margin-bottom: 0;
            padding-top: 8px;
            padding-bottom: 8px
        }

        .pagination .page-item .page-link  {
            border-radius: 0;
            padding: 8px 14px;
        }

        /* Material Icon Font */
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 14px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            /* vertical-align: -2.25px; */
            /* vertical-align: -3px; */
            vertical-align: middle;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>

    @yield('css')
</head>
