@extends('admin.main')
@section('admin_content')

<section>
    <div class="container-fluid"><span id="form_result"></span></div>
    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3">Flash Sale Edit</h4>
        <div id="success_alert" role="alert"></div>
        <br>
    </div>

    <div class="container">
        <form action="{{route('admin.flash_sale.update',$flashSale->id)}}" id="submitForm" method="POST">
            @csrf
            <input type="hidden" name="flash_sale_id" value="{{$flashSale->id}}">

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">Products</a>
                                <a class="list-group-item list-group-item-action" id="attribute-values" data-toggle="list" href="#values" role="tab" aria-controls="settings">Settings</a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                                    <div class="card">
                                        <h4 class="card-header"><b>Products</b></h4>
                                        <hr>

                                        <div class="card-body">
                                            <div class="variants">

                                            @foreach ($flashSale->flashSaleProducts as $flahSaleProduct)
                                                <div class="row mb-5">
                                                    <div class="col-md-1">
                                                        <h5><i class="fa fa-th" aria-hidden="true"></i></h5>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h5 for="inputEmail3">Flash Sale Product</h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                                    </div>
                                                    <br><br>
                                                    <div class="col-md-12">
                                                        <div class="form-row">
                                                            <label><b>Product Name <span class="text-danger">*</span></b></label>
                                                            <select name="product_id[]" required class="form-control @error('product_id') is-invalid @enderror selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Product')}}'>
                                                                @forelse ($products as $item)
                                                                    <option value="{{$item->id}}" @if($item->id == $flahSaleProduct->product_id) selected @endif>{{$item->productTranslation->product_name ?? $item->productTranslationEnglish->product_name ?? null}}</option>
                                                                @empty
                                                                @endforelse
                                                            </select>
                                                            @error('product_id')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-2 form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">End Date <span class="text-danger">*</span></label>
                                                                <input type="date" required name="end_date[]" value="{{$flahSaleProduct->end_date}}" class="form-control @error('end_date') is-invalid @enderror" placeholder="Date">
                                                                @error('end_date')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Price <span class="text-danger">*</span></label>
                                                                <input type="text" required name="price[]" value="{{$flahSaleProduct->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                                                @error('price')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Quantity <span class="text-danger">*</span></label>
                                                                <input type="number" required min="0" name="qty[]" value="{{$flahSaleProduct->qty}}" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity">
                                                                @error('qty')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            </div>
                                            <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> Add More</span>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="values" role="tabpanel" aria-labelledby="attribute-values">
                                    <div class="card">
                                        <h4 class="card-header"><b>Settings</b></h4>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-bold">Campaign Name <span class="text-danger">*</span></label>

                                                        {{-- @forelse($flashSale->flashSaleTranslations as $key => $item)
                                                                @if ($item->local==$local) value="{{$item->campaign_name}}" @break
                                                                @elseif($item->local=='en') value="{{$item->campaign_name}}" @break
                                                                @endif
                                                        @empty
                                                            placeholder="Campaign Name"
                                                        @endforelse --}}
                                                @if ($flashSale->flashSaleTranslations!=null)
                                                    <input type="text" required name="campaign_name" class="form-control" value="{{$flashSale->flashSaleTranslations[0]->campaign_name}}">
                                                    <input type="hidden" name="product_translation_id" value="{{$flashSale->flashSaleTranslations[0]->id}}">
                                                @else
                                                    <input type="text" required name="campaign_name" class="form-control" placeholder="Campaign Name">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="text-bold">Status</span></label>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" name="is_active" value='1' @if($flashSale->is_active==1) checked @endif id="isActive">
                                                    <span>{{__('Active')}}</span>
                                                </div>
                                            </div>

                                            <br><br>
                                            <div class="d-flex justify-content-start">
                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

</section>



<script type="text/javascript">

        // $('#end_date[]').datepicker({
        //     uiLibrary: 'bootstrap4'
        // });

    $(document).on('click', '#addMore', function(){

        html = '<div class="row mt-5">'+
            '<div class="col-md-1">'+
                '<h5><i class="fa fa-th" aria-hidden="true"></i></h5>'+
            '</div>'+
            '<div class="col-md-10">'+
                '<h5 for="inputEmail3">Flash Sale Product</h5>'+
            '</div>'+
            '<div class="col-1">'+
                '<span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>'+
            '</div>'+
            '<br><br>'+

            '<div class="col-md-12">'+
                '<div class="form-row">'+
                    '<label><b>Product Name <span class="text-danger">*</span></b></label>'+
                    '<select name="product_id[]" required class="form-control">'+
                        '<option value="">Select Product</option>'+
                            '@forelse ($products as $item)'+
                                '<option value="{{$item->id}}" @if($item->id == $flahSaleProduct->product_id) selected @endif>{{$item->productTranslation->product_name ?? $item->productTranslationEnglish->product_name ?? null}}</option>'+
                            '@empty'+
                            '@endforelse'+
                    '</select>'+
                    '@error("product_id")'+
                        '<div class="text-danger">{{ $message }}</div>'+
                    '@enderror'+
                '</div>'+

                '<div class="mt-2 form-row">'+
                    '<div class="form-group col-md-4">'+
                        '<label class="text-bold">End Date <span class="text-danger">*</span></label>'+
                        '<input type="date" required name="end_date[]" id="end_date" class="form-control @error("end_date") is-invalid @enderror" placeholder="Date">'+
                        '@error("end_date")'+
                            '<div class="text-danger">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label class="text-bold">Price <span class="text-danger">*</span></label>'+
                        '<input type="text" required name="price[]" class="form-control @error("price") is-invalid @enderror" placeholder="Price">'+
                        '@error("price")'+
                            '<div class="text-danger">{{ $message }}</div>'+
                       ' @enderror'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label class="text-bold">Quantity <span class="text-danger">*</span></label>'+
                        '<input type="text" required name="qty[]" class="form-control @error("qty") is-invalid @enderror" placeholder="Quantity">'+
                        '@error("qty")'+
                            '<div class="text-danger">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
               ' </div>'+
            '</div>'+
        '</div>';

        console.log(html);
        var rand = Math.floor(Math.random() * 90000) + 10000;
        $('.variants').append(html);
    })

    $(document).on('click', '.del-row', function(){
        $(this).parent().parent().html('');
    })

    $(document).ready(function(){
        $(".mul-select").select2({
                placeholder: "Select Category", //placeholder
                tags: true,
                tokenSeparators: ['/',',',';'," "]
        });
    })


    // $('#submitForm').on('submit', function (event) {
    //     event.preventDefault();
    //     console.log('ok');
    //     $.ajax({
    //         url: "",
    //         method: "POST",
    //         data: new FormData(this),
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         dataType: "json",
    //         success: function (data) {
    //             console.log(data);

    //             var html = '';
    //             if (data.errors) {
    //                 html = '<div class="alert alert-danger">';
    //                 for (var count = 0; count < data.errors.length; count++) {
    //                     html += '<p>' + data.errors[count] + '</p>';
    //                 }
    //                 html += '</div>';
    //             }
    //             if (data.error) {
    //                 html = '<div class="alert alert-danger">' + data.error + '</div>';
    //             }
    //             if (data.success) {
    //                 html = '<div class="alert alert-success">' + data.success + '</div>';
    //                 $('#submitForm')[0].reset();
    //                 $('select').selectpicker('refresh');
    //             }
    //             $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
    //         }
    //     });
    // });
</script>

@endsection
