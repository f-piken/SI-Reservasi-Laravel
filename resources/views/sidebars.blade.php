<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><center>
                <img src="{{ asset('style/images/avatar/logo.png')}}" alt="logo" width="70" height="70" />
                <h4>PUPPY_KARAOKE</h4>
            </center>
            </a>
            <a class="navbar-brand hidden" href="{{ url('/') }}">P</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Room</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('room.index') }}"> <i class="menu-icon fa fa-th"></i>Room</a>
                </li>
                <h3 class="menu-title">Reservasi</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('reservasi.index') }}"> <i class="menu-icon ti-email"></i>Reservasi</a>
                </li>
                <h3 class="menu-title">Transaction</h3><!-- /.menu-title -->               
                <li>
                    <a href="{{ route('pembayaran.index') }}"> <i class="menu-icon ti-money"></i>Pembayaran </a>
                </li>
                <h3 class="menu-title">Customer</h3><!-- /.menu-title -->               
                <li>
                    <a href="{{ route('customer.index') }}"> <i class="menu-icon fa fa-user"></i>Customer</a>
                </li>
                <h3 class="menu-title">Accounts</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="e">Forget Pass</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->