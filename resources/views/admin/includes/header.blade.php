<header class="header">
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">

          <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>

          <span class="brand-big" id="site_logo_main">
                @if(isset($setting_store->admin_logo) && $setting_store->admin_logo)
                    <img src="{{asset('public/'.$setting_store->admin_logo)}}" width="150">
                    &nbsp; &nbsp;
                @else
                <img src="https://dummyimage.com/150x150/12787d/ffffff&text=Logo" width="150">
                    &nbsp; &nbsp;
                @endif
            </span>


          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

            <li class="nav-item">
                <a class="dropdown-toggle dropdown-header-name" style="padding-right: 10px" href="{{route('cartpro.home')}}" target="_blank"><i class="fa fa-globe"></i> <span>View Website</span> </a>
            </li>

            <li class="nav-item">
                <a>
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge badge-defaultr bg-danger" style="width:25px"><span class="text-light"> @if($orders) {{$orders->where('order_status','pending')->count()}} @endif</span></span>
                </a>
            </li>

            <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>

            @php


                 $languages = DB::table('languages')
                            ->select('id','language_name','local')
                            // ->where('default','=',0)
                            ->where('local','!=',Session::get('currentLocal'))
                            ->orderBy('language_name','ASC')
                            ->get();
            @endphp

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="dripicons-web">
                        @if (Session::has('currentLocal'))
                            {{ __(strtoupper(Session::get('currentLocal'))) }}
                        @endif
                    </i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @foreach ($languages as $item)
                      <a class="dropdown-item" href="{{route('admin.setting.language.defaultChange',$item->id)}}">
                            {{ $item->language_name }} ({{__(strtoupper($item->local))}})
                      </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item">
            <a rel="nofollow" href="#" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item">
                @if(!empty(auth()->user()->image))
                    <img class="profile-photo sm mr-1"
                            src="{{asset('public/'.auth()->user()->image)}}">
                @else
                    <img class="profile-photo sm mr-1"
                            src="{{ asset('admin.png')}}">
                @endif
                <span> {{auth()->user()->username}}</span>
            </a>
              {{-- <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span>{{Auth::user()->username}}</span> <i class="fa fa-angle-down"></i>
              </a> --}}
              <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                <li>
                    <a href="{{route('admin.profile')}}">
                        <i class="dripicons-user"></i>
                        {{trans('file.Profile')}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}"><i class="dripicons-power"></i>
                        {{trans('file.logout')}}
                    </a>
                  </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
