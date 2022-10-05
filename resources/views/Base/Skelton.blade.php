<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.34/dist/sweetalert2.all.js" integrity="sha256-dM3nV3SuUwK04X1Jp1Pul6Uqob1z+3igyB10aYS48xM=" crossorigin="anonymous"></script>



</head>

<body class="">
    <!-- [ navigation menu ] start -->
    @include('Base.SideBar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('Base.Header')

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        @yield('head-content')
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                @yield('main-content')
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upsert Data</h4>
                </div>
            
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="form-upsert">
                        @yield('form')
                    </form>
                </div>
            
                <!-- Modal footer -->
                <div class="modal-footer" id="md-footer">
                    <button type="button" class="btn btn-primary rounded" id="btn-send">Kirim</button>
                    <button type="button" class="btn btn-danger mr-2 rounded" data-dismiss="modal">Tutup</button>
                </div>
            
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ripple.js') }}"></script>
    {{-- <script src="assets/js/pcoded.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.34/dist/sweetalert2.all.min.js" integrity="sha256-VY+q0sN0i/R2qdIEtHeJ62U1Q1x1H7qvd08vkIJLDbc=" crossorigin="anonymous"></script>
    @yield('js-content')

</body>

</html>
