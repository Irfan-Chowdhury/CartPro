<div class="tab-pane fade show active" aria-labelledby="general-settings-general" id="general" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b>@lang('file.General')</b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('file.Product Name')}} <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="product_name" id="productName" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" id="inputEmail3" placeholder="Type Product Name" >
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('file.Description')}} <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" class="form-control text-editor">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Brand')</b></label>
                        <div class="col-sm-8">
                            <select name="brand_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Brand')}}'>
                                @forelse ($brands as $item)
                                    <option value="{{$item->id}}">{{$item->brand_name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Categories') <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <select name="category_id[]" id="categoryId" class="form-control selectpicker @error('category_id') is-invalid @enderror" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                @foreach ($categories as $item)
                                    @if ($item->categoryTranslation->count()>0)
                                        @foreach ($item->categoryTranslation as $key => $value)
                                            @if ($key<1)
                                                @if ($value->local==$local)
                                                    <option value="{{$item->id}}">{{$value->category_name}}</option>
                                                @elseif($value->local=='en')
                                                    <option value="{{$item->id}}">{{$value->category_name}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">{{__('NULL')}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Tax') Class <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="tax_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                @forelse ($taxes as $tax)
                                    <option value="{{$tax->id}}">{{$tax->taxTranslation->tax_name ?? $tax->taxTranslationDefaultEnglish->tax_name ?? null}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Tags')</b></label>
                        <div class="col-sm-8">
                            <select name="tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                @foreach ($tags as $item)
                                    @if ($item->tagTranslation->count()>0)
                                        @foreach ($item->tagTranslation as $key => $value)
                                            @if ($key<1)
                                                @if ($value->local==$local)
                                                    <option value="{{$item->id}}">{{$value->tag_name}}</option>
                                                @elseif($value->local=='en')
                                                    <option value="{{$item->id}}">{{$value->tag_name}}</option>
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
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Status')</b></label>
                        <div class="col-sm-8">
                            <div class="form-group form-check">
                                <input type="checkbox" checked class="form-check-input" name="is_active" value="1" id="isActive">
                                <span>{{__('file.Enable the product')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">{{__('file.Submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
