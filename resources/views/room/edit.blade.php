<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@PuppyKaraoke</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('apple-icon.png')}}">
    <link rel="shortcut icon" href="'favicon.ico'">

    <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/jqvmap/dist/jqvmap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->
    @include('sidebars')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('navbars')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Buat Data Room</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('room.update', $room->ID_Room) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="ro" class="form-control-label">Nomor Room</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="ro" name="ro" placeholder="Nomor Room" class="form-control" value="{{ $room->No_Room }}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tipe" class="form-control-label">Tipe Room</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tipe" name="tipe" placeholder="No. Telepon" class="form-control" value="{{ $room->Tipe_Room }}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="harga" class="form-control-label">Harga Room</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="harga" name="harga" placeholder="Alamat" class="form-control" value="{{ $room->Harga_Room }}"></div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('style/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>


    <script src="{{ asset('style/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/dashboard.js')}}"></script>
    <script src="{{ asset('style/assets/js/widgets.js')}}"></script>
    <script src="{{ asset('style/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('style/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('style/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
        (function ($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
        function updateUserId() {
        var emailDropdown = document.getElementById('email');
        var userIdInput = document.getElementById('id');
        var selectedUserId = emailDropdown.options[emailDropdown.selectedIndex].value;
        userIdInput.value = selectedUserId;
    }
    </script>

</body>

</html>