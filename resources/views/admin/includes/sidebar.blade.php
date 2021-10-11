<!-- Sidebar-->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <ul id="side-main-menu" class="side-menu list-unstyled">
          <li><a href="{{url('/admin/dashboard')}}"> <i class="dripicons-meter"></i><span>{{__('file.Dashboard') }}</span></a></li>
          @can('product')
            <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cube"></i><span>{{__('file.Products')}}</span></a>
                <ul id="product" class="collapse list-unstyled ">
                @can('category')
                    <li id="category-menu"><a href="{{route('admin.category')}}">{{__('file.Category')}}</a></li>
                @endcan
                @can('brand')
                    <li id="brand-list-menu"><a href="{{route('admin.brand')}}">{{__('file.Brand')}}</a></li>
                @endcan
                @can('attribute_set')
                    <li id="brand-list-menu"><a href="{{route('admin.attribute_set.index')}}">{{__('file.Attribute-Set')}}</a></li>
                @endcan
                @can('attribute')
                    <li id="brand-list-menu"><a href="{{route('admin.attribute.index')}}">{{__('file.Attributes')}}</a></li>
                @endcan
                @can('tag')
                    <li id="brand-list-menu"><a href="{{route('admin.tag.index')}}">{{__('file.Tags')}}</a></li>
                @endcan
                @can('catalog')
                    <li id="brand-list-menu"><a href="{{route('admin.products.index')}}">{{__('file.Catalog')}}</a></li>
                @endcan
                </ul>
            </li>
          @endcan

          <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-dollar"></i><span>{{__('file.Sales')}}</span></a>
            <ul id="sale" class="collapse list-unstyled">
              <li id="sale-list-menu"><a href="#">{{__('file.Orders')}}</a></li>
              <li id="sale-list-menu"><a href="#">{{__('file.Transactions')}}</a></li>
            </ul>
          </li>

          @can('flash_sale')
            <li><a href="{{route('admin.flash_sale.index')}}"><i class="fa fa-bolt"></i><span>{{__('file.Flash Sales')}}</span></a></li>
          @endcan

          @can('coupon')
            <li><a href="{{route('admin.coupon.index')}}"><i class="fa fa-tags"></i><span>{{__('file.Coupons')}}</span></a></li>
          @endcan
          @can('page')
            <li><a href="{{route('admin.page.index')}}"><i class="fa fa-file-text"></i><span>{{trans('file.Pages')}}</span></a></li>
          @endcan
          @can('menu')
            <li><a href="{{route('admin.menu')}}"><i class="dripicons-list"></i><span>{{trans('file.Menus')}}</span></a></li>
          @endcan

          @can('users_and_roles')
            <li><a href="#user" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle"></i><span>{{__('file.Users and Roles')}}</span></a>
                <ul id="user" class="collapse list-unstyled">
                @can('user')
                    <li id="navigation-menu"><a href="{{route('admin.user')}}">{{__('file.Users')}}</a></li>
                @endcan
                @can('role')
                    <li id="navigation-menu"><a href="{{route('admin.role.index')}}">{{__('file.Roles')}}</a></li>
                @endcan
                </ul>
            </li>
          @endcan



            <li><a href="#localization" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-globe"></i><span>{{__('Localization')}}</span></a>
                <ul id="localization" class="collapse list-unstyled">
                    <li><a href="{{route('admin.tax.index')}}">{{__('Taxes')}}</a></li>
                    <li><a href="{{route('languages.translations.index',Session::get('currentLocal'))}}">{{__('Translations')}}</a></li>
                    <li><a href="{{route('admin.currency_rate.index')}}">{{__('Currency Rates')}}</a></li>
                </ul>
            </li>

          @can('appearance')
            <li><a href="#menu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-paint-brush"></i><span>{{trans('Appearance')}}</span></a>
                <ul id="menu" class="collapse list-unstyled">
                    @can('store_front')
                        <li id="navigation-menu"><a href="{{route('admin.storefront')}}">{{__('Store Front')}}</a></li>
                    @endcan
                    @can('slider')
                        <li><a href="{{route('admin.slider')}}"><i class="fa fa-picture-o"></i><span>{{__('Slider')}}</span></a></li>
                    @endcan
                </ul>
            </li>
          @endcan



          @can('site-setting')
            <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cogs"></i><span>{{__('Site Settings')}}</span></a>
                <ul id="setting" class="collapse list-unstyled">
                    @can('setting')
                        <li id="navigation-menu"><a href="{{route('admin.setting.index')}}">{{__('Setting')}}</a></li>
                    @endcan
                    @can('locale')
                        <li id="navigation-menu"><a href="{{route('admin.setting.language')}}">{{trans('file.Language')}}</a></li>
                    @endcan
                </ul>
            </li>
          @endcan

        </ul>
      </div>
    </div>
  </nav>
<!-- Sidebar-->
