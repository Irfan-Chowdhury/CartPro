@extends('admin.main')
@section('admin_content')

<div class="container-fluid"><span id="general_result"></span></div>
<div class="container-fluid mb-3">

    <div class="d-flex">
        <div class="p-2">
            <h2 class="font-weight-bold mt-3">Storefront</h2>
        </div>
        <div class="ml-auto p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Storefront</li>
                </ol>
            </nav>
        </div>
    </div>
      
    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">General</a>
                <a class="list-group-item list-group-item-action" id="menus-settings-menus" data-toggle="list" href="#menus" role="tab" aria-controls="messages">Menus</a>
                <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Logo</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Footer</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Newsletter</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Features</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Product Page</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Social Links</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">
               
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        <div class="card">
                            <h4 class="card-header"><b>General</b></h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('admin.storefront.general.store')}}" method="POST">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Welcome Text</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="welcome_text" id="navbarText" class="form-control" id="inputEmail3"  value="{{$general_slider->welcome_text}}"  placeholder="Type Text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Theme Color</b></label>
                                                <div class="col-sm-8">
                                                    <select name="theme_color" id="primaryMenuId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Color')}}'>                                                        
                                                        @foreach ($colors as $key => $item)
                                                            <option value="{{$colors[$key]['color_name']}}" {{ $colors[$key]['color_name'] == $general_slider->theme_color ? 'selected="selected"' : '' }}>{{$colors[$key]['color_name']}}</option>     
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Mail Theme Color</b></label>
                                                <div class="col-sm-8">
                                                    <select name="mail_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Color')}}'>
                                                        @foreach ($colors as $key => $item)
                                                            <option value="{{$colors[$key]['color_name']}}" {{ $colors[$key]['color_name'] == $general_slider->mail_theme_color ? 'selected="selected"' : '' }} >{{$colors[$key]['color_name']}}</option>     
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Slider</b></label>
                                                <div class="col-sm-8">
                                                    <select name="slider_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Slider')}}'>
                                                        @foreach ($slider as $item)
                                                            <option value="{{$item->id}}" {{ $item->id == $general_slider->slider_id ? 'selected="selected"' : '' }}>{{$item->slider_title}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Terms & Condition</b></label>
                                                <div class="col-sm-8">
                                                    <select name="terms_condition" id="footerMenuOneId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Terms & Condition')}}'>
                                                        @foreach ($pages as $item)
                                                            <option value="{{$item->id}}" {{ $item->id ==  $general_slider->terms_condition ? 'selected="selected"' : '' }}>{{$item->page_name}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Privacy Policy Page</b></label>
                                                <div class="col-sm-8">
                                                    <select name="privacy_policy_page" id="footerMenuTwoId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Footer Menu')}}'>
                                                        @foreach ($pages as $item)
                                                            {{-- <option value="{{$item->id}}" {{ $item->id == $storefrontMenu->footer_menu_two_id ? 'selected="selected"' : '' }}>{{$item->menu_name}}</option>     --}}
                                                            <option value="{{$item->id}}" {{ $item->id ==  $general_slider->privacy_policy_page ? 'selected="selected"' : '' }}> {{$item->page_name}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Address</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="{{$general_slider->address}}" {{$item->id }} id="navbarText" class="form-control" id="inputEmail3"  value=""  placeholder="{{$general_slider->address}}" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                
                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-settings-logo">
                        <div class="card">
                            <div class="card-body">
                                <p>Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa commodo veniam incididunt veniam ad.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        <div class="card">
                            <h4 class="card-header"><b>Menus</b></h4>
                            {{-- <hr> --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('admin.storefront.menu.store')}}" method="POST">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Navbar Text</b></label>
                                                <div class="col-sm-8">
                                                    {{-- <input type="text" name="navbar_text" id="navbarText" class="form-control" id="inputEmail3" @if($storefrontMenu->primary_menu_id) value="{{$storefrontMenu->navbar_text}}" @else placeholder="Type Text" @endif> --}}
                                                    <input type="text" name="navbar_text" id="navbarText" class="form-control" id="inputEmail3"  value="{{$storefrontMenu->navbar_text}}"  placeholder="Type Text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Primary Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="primary_menu_id" id="primaryMenuId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Primary Menu')}}'>
                                                        <option value="">Select Primary Menu</option>    
                                                        @foreach ($menus as $item)
                                                            <option value="{{$item->id}}" {{ $item->id == $storefrontMenu->primary_menu_id ? 'selected="selected"' : '' }}>{{$item->menu_name}}</option>    
                                                        @endforeach                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="category_menu_id" id="categoryMenuId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category Menu')}}'>
                                                        <option value="">Select Category Menu</option>    
                                                        @foreach ($menus as $item)
                                                            <option value="{{$item->id}}" {{ $item->id == $storefrontMenu->category_menu_id ? 'selected="selected"' : '' }}>{{$item->menu_name}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title One</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="footer_menu_title_one" id="footerMenuTitleOne" value="{{$storefrontMenu->footer_menu_title_one}}" placeholder="Type Footer Menu Title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu One</b></label>
                                                <div class="col-sm-8">
                                                    <select name="footer_menu_one_id" id="footerMenuOneId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Footer Menu')}}'>
                                                        <option value="">Select Footer Menu</option>  
                                                        @foreach ($menus as $item)
                                                            <option value="{{$item->id}}" {{ $item->id == $storefrontMenu->footer_menu_one_id ? 'selected="selected"' : '' }}>{{$item->menu_name}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title Two</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="footer_menu_title_two" id="footerMenuTitleTwo" class="form-control" value="{{$storefrontMenu->footer_menu_title_two}}" placeholder="Type Footer Menu Title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Two</b></label>
                                                <div class="col-sm-8">
                                                    <select name="footer_menu_two_id" id="footerMenuTwoId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Footer Menu')}}'>
                                                        <option value="">Select Footer Menu</option>
                                                        @foreach ($menus as $item)
                                                            <option value="{{$item->id}}" {{ $item->id == $storefrontMenu->footer_menu_two_id ? 'selected="selected"' : '' }}>{{$item->menu_name}}</option>    
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card">
                            <div class="card-body">
                                <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.</p>
                            </div>
                        </div>
                    </div>

              </div>
            </div>
          </div>
    </div>
</div>

@endsection