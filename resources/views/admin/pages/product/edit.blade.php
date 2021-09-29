@extends('admin.main')
@section('admin_content')

<style>
    .list-group-item {
    z-index: 2;
    color: black;
    background-color: #E9E9E9;
    border-color: #FFFFFF;
}
    .list-group-item.active {
    z-index: 2;
    color: black;
    background-color: #FFFFFF;
    border-color: #E9E9E9;
}
</style>


<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    @include('admin.includes.alert_message')

    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3">Edit Product</h3>
        <div id="success_alert" role="alert"></div>
    </div>

    <div class="container">
        <form action="{{route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">{{__('General')}}</a>
                                    <a class="list-group-item list-group-item-action" id="product-price" data-toggle="list" href="#price" role="tab" aria-controls="settings">{{__('Price')}}</a>
                                    <a class="list-group-item list-group-item-action" id="product-inventory" data-toggle="list" href="#inventory" role="tab" aria-controls="inventory">{{__('Inventory')}}</a>
                                    {{-- <a class="list-group-item list-group-item-action" id="product-variant" data-toggle="list" href="#variant" role="tab" aria-controls="inventory">{{__('Variants')}}</a> --}}
                                    <a class="list-group-item list-group-item-action" id="product-images" data-toggle="list" href="#images" role="tab" aria-controls="images">{{__('Images')}}</a>
                                    <a class="list-group-item list-group-item-action" id="product-seo" data-toggle="list" href="#seo" role="tab" aria-controls="seo">{{__('SEO')}}</a>
                                    <a class="list-group-item list-group-item-action" id="product-attribute" data-toggle="list" href="#attribute" role="tab" aria-controls="attribute">{{__('Attributes')}}</a>
                                    <a class="list-group-item list-group-item-action" id="" data-toggle="list" href="" role="tab" aria-controls="seo">{{__('Options')}}</a>
                                    <a class="list-group-item list-group-item-action" id="product-additional" data-toggle="list" href="#additional" role="tab" aria-controls="additional">{{__('Additional')}}</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">

                                    <!-- General -->
                                    <div class="tab-pane fade show active" aria-labelledby="general-settings-general" id="general" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>General</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Product Name')}} <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="product_name" id="productName" class="form-control @error('product_name') is-invalid @enderror" id="inputEmail3" value="{{$product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? null}}" placeholder="Type Product Name">
                                                                <input type="hidden" name="product_translation_id" class="form-control" id="inputEmail3" @if(isset($product->productTranslation->id)) value="{{$product->productTranslation->id ?? $product->productTranslation->id}}" @endif>
                                                                @error('product_name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Description')}} <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="description" id="description" class="form-control text-editor">
                                                                    {{$product->productTranslation->description ?? $product->productTranslationEnglish->description ?? null}}
                                                                </textarea>
                                                                @error('description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Brand</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="brand_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Brand')}}'>

                                                                    @forelse ($brands as $item)
                                                                        <option value="{{$item->id}}" @if(isset($product->brand_id)) @if($item->id==$product->brand_id) selected @endif @endif >{{$item->brandTranslation->brand_name ?? $item->brandTranslationEnglish->brand_name ?? null}}</option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Categories</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="category_id[]" id="categoryId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                                                {{-- <select name="category_id[]" id="categoryId" class="form-control js-example-basic-multiple" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'> --}}
                                                                    @foreach ($categories as $item)
                                                                        @if ($item->categoryTranslation->count()>0)
                                                                            @foreach ($item->categoryTranslation as $key => $value)
                                                                                @if ($key<1)
                                                                                    @if ($value->local==$local)
                                                                                        <option value="{{$item->id}}"
                                                                                            @foreach($product->categories as $productCategory)
                                                                                                @if($productCategory->id == $item->id)
                                                                                                    selected
                                                                                                @endif
                                                                                            @endforeach>
                                                                                            {{$value->category_name}}
                                                                                        </option>
                                                                                    @elseif($value->local=='en')
                                                                                        <option value="{{$item->id}}"
                                                                                            @foreach($product->categories as $productCategory)
                                                                                                @if($productCategory->id == $item->id)
                                                                                                    selected
                                                                                                @endif
                                                                                            @endforeach>
                                                                                            {{$value->category_name}}
                                                                                        </option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">{{__('NULL')}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Tax Class</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="tax_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                                                    @forelse ($taxes as $tax)
                                                                        <option value="{{$tax->id}}" @if($tax->id == $product->tax_id) selected @endif>{{$tax->taxTranslation->tax_name ?? $tax->taxTranslationDefaultEnglish->tax_name ?? null}}</option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Tags</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                                                    @foreach ($tags as $item)
                                                                        @if ($item->tagTranslation->count()>0)
                                                                            @foreach ($item->tagTranslation as $key => $value)
                                                                                @if ($key<1)
                                                                                    @if ($value->local==$local)
                                                                                        <option value="{{$item->id}}"
                                                                                            @foreach($product->tags as $producttag)
                                                                                                @if($producttag->id == $item->id)
                                                                                                    selected
                                                                                                @endif
                                                                                            @endforeach>
                                                                                            {{$value->tag_name}}
                                                                                        </option>
                                                                                    @elseif($value->local=='en')
                                                                                        <option value="{{$item->id}}"
                                                                                            @foreach($product->tags as $producttag)
                                                                                                @if($producttag->id == $item->id)
                                                                                                    selected
                                                                                                @endif
                                                                                            @endforeach>
                                                                                            {{$value->tag_name}}
                                                                                        </option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">{{__('NULL')}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Virtual</b></label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group form-check">
                                                                    <input type="checkbox" class="form-check-input" name="virtual" value="1" id="isActive">
                                                                    <span>{{__("The product won't be shipped")}}</span>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group form-check">
                                                                    <input type="checkbox" class="form-check-input" name="is_active" @if($product->is_active==1) checked @endif value="1" id="isActive">
                                                                    <span>{{__('Enable the product')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/ General -->

                                    <!-- Price -->
                                    <div class="tab-pane fade show" aria-labelledby="product-price" role="tabpanel" id="price">
                                        <div class="card">
                                            <h4 class="card-header"><b>Price</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Price')}} <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="price" id="price" class="form-control" id="inputEmail3" @if(env('FORMAT_NUMBER')) value="{{number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')}}" @endif>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Special Price')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price" id="specialPrice" class="form-control" id="inputEmail3" @if(env('FORMAT_NUMBER')) value="{{number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')}}" @endif >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Special Price Type')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="special_price_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Price Type')}}'>
                                                                    <option value="Fixed" @if($product->special_price_type=='Fixed') selected @endif>{{__('Fixed')}}</option>
                                                                    <option value="Parcent" @if($product->special_price_type=='Parcent') selected @endif>{{__('Parcent')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Special Price Start')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price_start" value="{{$product->special_price_start}}" id="specialPriceStart" class="form-control datepicker">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Special Price End')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price_end" value="{{$product->special_price_end}}" id="specialPriceEnd" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Price-->

                                    <!-- Inventory-->
                                    <div class="tab-pane fade show" aria-labelledby="product-inventory" id="inventory" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>{{__('Inventory')}}</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('SKU')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" id="inputEmail3" value="{{$product->sku}}">
                                                                @error('sku')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Inventroy Management')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control selectpicker" name="manage_stock" id="manageStock" data-live-search="true" data-live-search-style="begins" title='{{__('Select Inventory')}}'>
                                                                    <option value="0" @if($product->manage_stock==0) selected @endif>{{__("Don't Track Inventory")}}</option>
                                                                    <option value="1" @if($product->manage_stock==1) selected @endif>{{__('Track Inventory')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row" id="quantityField">
                                                            @if ($product->qty)
                                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Quantity')}} &nbsp;<span class="text-danger">*</span> </b></label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" value="{{$product->qty}}">
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Stock Availibility')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="in_stock" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Stock')}}'>
                                                                    <option value="1" @if($product->in_stock==1) selected @endif>{{__("In Stock")}}</option>
                                                                    <option value="0" @if($product->in_stock==0) selected @endif>{{__('Out Stock')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Inventory-->

                                    <!--Variants-->
                                    {{-- <div class="tab-pane fade show " aria-labelledby="product-variant" id="variant" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>Variants</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="variants">
                                                    <div class="row">
                                                        <div class="col-2 form-group">
                                                            <label>{{__('Size')}} *</label>
                                                            <input type="text" name="variant_size[]" required class="form-control" placeholder="{{__('XS, S, M ...')}}">
                                                        </div>

                                                        <div class="col-2 form-group">
                                                            <label>{{__('Color')}} *</label>
                                                            <input type="text" name="variant_color[]"  required class="form-control" placeholder="{{__('Color')}}">
                                                        </div>

                                                        <div class="col-2 form-group">
                                                            <label>{{__('SKU')}} *</label>
                                                            <input type="text" name="variant_sku[]" required class="form-control" placeholder="{{__('SKU')}}">
                                                        </div>

                                                        <div class="col-2 form-group">
                                                            <label>{{__('Quantity')}} *</label>
                                                            <input type="text" name="variant_qty[]"  required class="form-control" placeholder="{{__('Quantity')}}">
                                                        </div>

                                                        <div class="col-2 form-group">
                                                            <label>{{__('Price')}}</label>
                                                            <input type="text" name="variant_price[]" required class="form-control" placeholder="{{__('Price')}}">
                                                        </div>

                                                        <div class="col-2">
                                                            <label>Delete</label><br>
                                                            <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> Add More</span>
                                                <br><br>
                                                <div class="form-group row">
                                                    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!--Variants-->

                                    <!-- Images -->
                                    <div class="tab-pane fade show" aria-labelledby="product-images" id="images" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>{{__('Images')}}</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Basic Image')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="base_image" id="baseImage" class="form-control @error('base_image') is-invalid @enderror" onchange="showImage(this,'item_photo')">
                                                                @if(($product->baseImage!==null) && ($product->baseImage->type=='base'))
                                                                    <img id="item_photo" src="{{asset('public/'.$product->baseImage->image)}}"  height="100px" width="100px">
                                                                @endif
                                                                @error('base_image')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Additional Images')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="additional_images[]" multiple id="multipleImages" class="form-control @error('additional_images') is-invalid @enderror">
                                                                @if($product->additionalImage!==null)
                                                                    @foreach ($product->additionalImage as $item)
                                                                        <img src="{{asset('public/'.$item->image)}}"  height="100px" width="100px">
                                                                    @endforeach
                                                                @endif
                                                                @error('additional_images')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Images -->


                                    <!-- SEO -->
                                    <div class="tab-pane fade show" aria-labelledby="product-seo" id="seo" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>{{__('SEO')}}</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Meta Title')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="meta_title" id="metaTitle" class="form-control" id="inputEmail3" placeholder="Type Meta Title" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Meta Description')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="meta_description" id="meta_description" class="form-control" rows="5"></textarea>
                                                                @error('meta_description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ SEO -->

                                    <!-- Attribute -->
                                    <div class="tab-pane fade show" aria-labelledby="product-attribute" id="attribute" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>Attributes</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="variants">
                                                    <div class="row">
                                                        <div class="col-5 form-group">
                                                            <label>{{__('Atrribute')}}</label>
                                                            <select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Attribute')}}'>
                                                                @forelse ($attributes as $item)
                                                                    <option value="{{$item->id}}">{{$item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null}}</option>
                                                                @empty
                                                                @endforelse
                                                            </select>
                                                        </div>

                                                        <div class="col-6 form-group">
                                                            <label>{{__("Values")}}</label>
                                                            <select name="attribute_value_id[]" id="attributeValueId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title="Select Value">

                                                            </select>
                                                        </div>

                                                        <div class="col-1">
                                                            <label>Delete</label><br>
                                                            <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> Add New Attribute</span>
                                                <br><br>
                                                <div class="form-group row">
                                                    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Attribute -->

                                    <!-- Additional -->
                                    <div class="tab-pane fade show" aria-labelledby="product-additional" id="additional" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>{{__('Additional')}}</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Short Description')}} </b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="short_description" id="short_description" class="form-control" rows="5">
                                                                     {{$product->productTranslation->short_description ?? $product->productTranslationEnglish->short_description ?? null}}

                                                                </textarea>
                                                                @error('short_description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Product New From')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="new_from" id="newFrom" value="{{date('Y-m-d',strtotime($product->new_from))}}" class="form-control datepicker">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Product New To')}}</b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="new_to" id="newTo" value="{{date('Y-m-d',strtotime($product->new_to))}}" class="form-control datepicker">
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Additional -->
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </form>
    </div>
</section>

<script type="text/javascript">

        tinymce.init({
            selector: '.text-editor',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            height: 300,

            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },

            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
            branding: false
        });

        $('#specialPriceStart').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#specialPriceEnd').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#newFrom').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#newTo').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });


        $('#manageStock').change(function() {
            var manageStock = $('#manageStock').val();
            if (manageStock==1) {
                data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Quantity')}} &nbsp;<span class="text-danger">*</span> </b></label>';
                data += '<div class="col-sm-8">';
                data += '<input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" placeholder="Type Quantity">';
                data += '</div>';

                $('#quantityField').html(data)
            }else{
                $('#quantityField').empty();
            }

        });

        $(document).on('click', '#addMore2', function(){
            console.log('ok');
            var rand = Math.floor(Math.random() * 90000) + 10000;
            // $('.variants').append('<div class="row"><div class="col-2 form-group"><label>{{__('Size')}} *</label><input type="text" name="variant_size[]" required class="form-control" placeholder="{{__('XS, S, M ...')}}"></div><div class="col-2 form-group"><label>{{__('Color')}} *</label><input type="text" name="variant_color[]" id="product_amount"  required class="form-control" placeholder="{{__('Color')}}"></div><div class="col-2 form-group"><label>{{__('SKU')}} *</label><input type="text" name="variant_sku[]" id="sku" required class="form-control" placeholder="{{__('SKU')}}"></div><div class="col-2 form-group"><label>{{__('Quantity')}} *</label><input type="text" name="variant_qty[]" id="product_amount"  required class="form-control" placeholder="{{__('Quantity')}}"></div><div class="col-2 form-group"><label>{{__('Price')}}</label><input type="text" name="variant_price[]" id="price" required class="form-control" placeholder="{{__('Price')}}"></div><div class="col-2"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div></div>');
            $('.variants').append('<div class="row"><div class="col-2 form-group"><label>{{__('Size')}} *</label><input type="text" name="variant_size[]" required class="form-control" placeholder="{{__('XS, S, M ...')}}"></div><div class="col-2"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div></div>');
        })

        $(document).on('click', '.del-row', function(){
            $(this).parent().parent().html('');
        })



        //--------test-------

        $(document).on('click', '#addMore', function(){

            html = '<div class="row">'+
                        '<div class="col-5 form-group">'+
                            '<label>{{__("Atrribute")}}</label>'+
                            // '<select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Attribute')}}'>'+
                            '<select name="attribute_id[]" id="attributeId2" class="form-control">'+
                                '<option value="">Please Select Attribute</option>'+
                                    '@forelse ($attributes as $item)'+
                                        '<option value="{{$item->id}}">{{$item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null}}</option>'+
                                    '@empty'+
                                    '@endforelse'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-6 form-group">'+
                            '<label>{{__("Values")}}</label>'+
                            // '<select name="attribute_value_id[]" id="attributeValueId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title="Select Value">'+
                            '<select name="attribute_value_id[]" id="attributeValueId2" class="form-control">'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-1">'+
                            '<label>Delete</label><br>'+
                            '<span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>'+
                        '</div>'+
                '</div>';

            console.log(html);

            var rand = Math.floor(Math.random() * 90000) + 10000;
            $('.variants').append(html);

        })

        //---------/ test------

        $('#attributeId').change(function () {
            var attributeId = $('#attributeId').val();
            // console.log(attributeId);
            $.ajax({
                url: "{{route('admin.attribute.get_attribute_values')}}",
                method: "GET",
                data: {attribute_id: attributeId},
                success: function (data) {
                    console.log(data);
                    $('select').selectpicker("destroy");
                    $('#attributeValueId').html(data);
                    // $('#attributeValueId2').html(data);
                    $('select').selectpicker();
                }
            });
        });

        $('#attributeId2').change(function () {
            console.log('ok');

            var attributeId = $('#attributeId2').val();
            // console.log(attributeId);
            $.ajax({
                url: "{{route('admin.attribute.get_attribute_values')}}",
                method: "GET",
                data: {attribute_id: attributeId},
                success: function (data) {
                    console.log(data);
                    $('select').selectpicker("destroy");
                    $('#attributeValueId2').html(data);
                    $('select').selectpicker();
                }
            });
        });
        // $('#attributeValueId').change(function () {
        //     var attributeValueId = $('#attributeValueId').val();

        //     console.log(attributeValueId);
        // });

        //Image Show Before Upload Start
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                if (fileName){
                    $('#fileLabel').html(fileName);
                }
            });
        });

        //Image Show Before Upload End
        function showImage(data, imgId){
            if(data.files && data.files[0]){
                var obj = new FileReader();

                obj.onload = function(d){
                    var image = document.getElementById(imgId);
                    image.src = d.target.result;
                }
                obj.readAsDataURL(data.files[0]);
            }
        }


</script>


@endsection
