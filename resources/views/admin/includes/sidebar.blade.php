<!-- Sidebar-->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <li><a href="{{url('/admin/dashboard')}}"> <i class="dripicons-meter"></i><span>{{ __('file.dashboard') }}</span></a></li>
          <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{__('file.product')}}</span></a>
            <ul id="product" class="collapse list-unstyled ">
              <li id="category-menu"><a href="{{route('admin.category')}}">{{__('file.category')}}</a></li>
              <li id="category-menu"><a href="{{route('admin.collection')}}">{{__('Collection')}}</a></li>
              <li id="product-list-menu"><a href="{{route('admin.product')}}">{{__('file.product_list')}}</a></li>
              <li id="brand-list-menu"><a href="{{route('admin.brand')}}">{{__('brand')}}</a></li>
              <li id="brand-list-menu"><a href="{{route('admin.attribute_set.index')}}">{{__('Attribute Sets')}}</a></li>
              <li id="brand-list-menu"><a href="{{route('admin.attribute.index')}}">{{__('Attributes')}}</a></li>
              <li id="brand-list-menu"><a href="{{route('admin.tag.index')}}">{{__('Tags')}}</a></li>
              <li id="brand-list-menu"><a href="{{route('admin.products.index')}}">{{__('Catalog')}}</a></li>
            </ul>
          </li>  
           
          <li><a href="{{route('admin.flash_sale.index')}}"><i class="fa fa-bolt"></i><span>{{__('Flash Sales')}}</span></a></li>
          <li><a href="{{route('admin.coupon')}}"><i class="dripicons-list"></i><span>{{__('Coupons')}}</span></a></li>
          <li><a href="{{route('admin.page')}}"><i class="dripicons-list"></i><span>{{trans('Pages')}}</span></a></li>
          <li><a href="{{route('admin.user')}}"><i class="fa fa-user-circle"></i><span>{{trans('Users')}}</span></a></li>            
          <li><a href="{{route('admin.menu')}}"><i class="dripicons-list"></i><span>{{trans('Menus')}}</span></a></li> 
                    
          {{-- <li><a href="{{route('admin.menu')}}"><i class="dripicons-list"></i><span>{{trans('Menus')}}</span></a></li> --}}

          {{-- <li><a href="#menu" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{trans('Menus')}}</span></a>
            <ul id="menu" class="collapse list-unstyled">
              <li id="navigation-menu"><a href="{{route('admin.menu.navigation')}}">{{__('Navigation Menu')}}</a></li>
              <li id="navigation-menu"><a href="#">{{__('Category Menu')}}</a></li>
              <li id="navigation-menu"><a href="#">{{__('Footer Menu')}}</a></li>
            </ul>
          </li>  --}}
          <li><a href="#menu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-paint-brush"></i><span>{{trans('Appearance')}}</span></a>
            <ul id="menu" class="collapse list-unstyled">
              <li id="navigation-menu"><a href="{{route('admin.storefront')}}">{{__('Store Front')}}</a></li>
            </ul>
          </li> 
          
          <li><a href="{{route('admin.slider')}}"><i class="fa fa-picture-o"></i><span>{{__('Slider')}}</span></a></li>

          <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cogs"></i><span>{{trans('file.Settings')}}</span></a>
            <ul id="setting" class="collapse list-unstyled">
              <li id="navigation-menu"><a href="{{route('admin.setting.language')}}">{{trans('file.Language')}}</a></li>
            </ul>
          </li> 

        </ul>
      </div>
    </div>
  </nav>
<!-- Sidebar-->