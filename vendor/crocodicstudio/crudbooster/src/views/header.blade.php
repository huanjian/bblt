<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a style="background-color: #ffcc00; height: 70px; padding: 10px 0;" href="{{url(config('crudbooster.ADMIN_PATH'))}}" title='{{Session::get('appname')}}' class="logo"><img src="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}" width="80"></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1 d-block" style="background: linear-gradient(to right, #ffcc00 0%, #ffffff 100%); height: 70px; padding: 10px 0;">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" style="padding: 0 20px;">
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu" style="background-color: #d40411; border-radius: 10px;">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ CRUDBooster::myPhoto() }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ CRUDBooster::myName() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ CRUDBooster::myPhoto() }}" class="img-circle" alt="User Image"/>
                            <p>
                                {{ CRUDBooster::myName() }}
                                <small>{{ CRUDBooster::myPrivilegeName() }}</small>
                                <small><em><?php echo date('d F Y')?></em></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-{{ cbLang('left') }}">
                                <a href="{{ route('AdminCmsUsersControllerGetProfile') }}" class="btn btn-default btn-flat"><i
                                            class='fa fa-user'></i> {{cbLang("label_button_profile")}}</a>
                            </div>
                            <div class="pull-{{ cbLang('right') }}">
                                <a title='Lock Screen' href="{{ route('getLockScreen') }}" class='btn btn-default btn-flat'><i class='fa fa-key'></i></a>
                                <a href="javascript:void(0)" onclick="swal({
                                        title: '{{cbLang('alert_want_to_logout')}}',
                                        type:'info',
                                        showCancelButton:true,
                                        allowOutsideClick:true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: '{{cbLang('button_logout')}}',
                                        cancelButtonText: '{{cbLang('button_cancel')}}',
                                        closeOnConfirm: false
                                        }, function(){
                                        location.href = '{{ route("getLogout") }}';

                                        });" title="{{cbLang('button_logout')}}" class="btn btn-danger btn-flat"><i class='fa fa-power-off'></i></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-default" style="margin-left: 0px; background-color: #32332d;">
      <div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-left: 5px;">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">File<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Backup</a></li>
                <li><a href="#">Setting</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Frontline<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/lokasi'}}">Lokasi</a></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/cabang'}}">Cabang / Unit</a></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/pelanggan'}}">Pelanggan</a></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/kendaraan'}}">Kendaraan</a></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/satuan'}}">Tabel Harga</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/register'}}">Register</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{url(config('crudbooster.ADMIN_PATH')).'/manifest'}}">Manifest</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Terima Kiriman</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Delivery Barang</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Inquiry</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounting<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Account Receivable</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Account Payable</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Report</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Tambah Admin</a></li>
              </ul>
            </li>
          </ul>
          
      </div><!-- /.container-fluid -->
    </nav>

</header>
