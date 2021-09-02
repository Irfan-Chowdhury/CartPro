@extends('admin.main')
@section('admin_content')

<section>
    <div class="container-fluid"><span id="form_result"></span></div>
    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3">Flash Sale Create</h4>
        <div id="success_alert" role="alert"></div>
        <br>
    </div>

    <div class="container">
        <form action="{{route('admin.flash_sale.store')}}" id="submitForm" method="POST">
            @csrf

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
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <h5><i class="fa fa-th" aria-hidden="true"></i></h5>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h5 for="inputEmail3">Flash Sale Product</h5>
                                                    </div>
                                                    {{-- <div class="col-1">
                                                        <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                                    </div> --}}
                                                    <br><br>

                                                    <div class="col-md-12">
                                                        <div class="form-row">
                                                            <label><b>Product Name <span class="text-danger">*</span></b></label>
                                                            <select name="product_id[]" required class="form-control @error('product_id') is-invalid @enderror selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Product')}}'>
                                                                @foreach ($products as $item)
                                                                    @forelse ($item->productTranslation as $key => $value)
                                                                        @if ($key<1)
                                                                            @if ($value->local==$local)
                                                                                <option value="{{$item->id}}">{{$value->product_name}}</option>
                                                                            @elseif($value->local=='en')
                                                                                <option value="{{$item->id}}">{{$value->product_name}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @empty
                                                                        <option value="">{{__('NULL')}}</option>
                                                                    @endforelse
                                                                @endforeach
                                                            </select>
                                                            @error('product_id')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-2 form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">End Date <span class="text-danger">*</span></label>
                                                                <input type="date" required name="end_date[]" id="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Date">
                                                                @error('end_date')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Price <span class="text-danger">*</span></label>
                                                                <input type="text" required name="price[]" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                                                @error('price')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Quantity <span class="text-danger">*</span></label>
                                                                <input type="number" required min="0" name="qty[]" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity">
                                                                @error('qty')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- //Testing  --}}
                                                {{-- <div class="mt-5 row">
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
                                                            <select name="product_id[]" required class="form-control @error('product_id') is-invalid @enderror selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Brand')}}'>
                                                                @foreach ($products as $item)
                                                                    @forelse ($item->productTranslation as $key => $value)
                                                                        @if ($key<1)
                                                                            @if ($value->local==$local)
                                                                                <option value="{{$item->id}}">{{$value->product_name}}</option>
                                                                            @elseif($value->local=='en')
                                                                                <option value="{{$item->id}}">{{$value->product_name}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @empty
                                                                        <option value="">{{__('NULL')}}</option>
                                                                    @endforelse
                                                                @endforeach
                                                            </select>
                                                            @error('product_id')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-2 form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">End Date <span class="text-danger">*</span></label>
                                                                <input type="date" required name="end_date[]" id="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Date">
                                                                @error('end_date')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Price <span class="text-danger">*</span></label>
                                                                <input type="text" required name="price[]" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                                                @error('price')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="text-bold">Quantity <span class="text-danger">*</span></label>
                                                                <input type="text" required name="qty[]" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity">
                                                                @error('qty')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> Add More</span>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
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
                                                        <input type="text" required name="campaign_name" class="form-control @error('campaign_name') is-invalid @enderror" placeholder="{{__('Campaign Name')}}">
                                                        @error('campaign_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-bold">Status</span></label>
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" name="is_active" value='1' id="isActive">
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
                        '@foreach ($products as $item)'+
                            '@forelse ($item->productTranslation as $key => $value)'+
                                '@if ($key<1)'+
                                    '@if ($value->local==$local)'+
                                        '<option value="{{$item->id}}">{{$value->product_name}}</option>'+
                                    '@elseif($value->local=="en")'+
                                       '<option value="{{$item->id}}">{{$value->product_name}}</option>'+
                                    '@endif'+
                                '@endif'+
                            '@empty'+
                                '<option value="">NULL</option>'+
                            '@endforelse'+
                        '@endforeach'+
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


    $('#submitForm').on('submit', function (event) {
        event.preventDefault();
        console.log('ok');
        $.ajax({
            url: "{{ route('admin.flash_sale.store') }}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);

                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.error) {
                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#submitForm')[0].reset();
                    $('select').selectpicker('refresh');
                    $('.date').datepicker('update');
                    $('#employee-table').DataTable().ajax.reload();
                }
                $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            }
        });
    });
</script>

@endsection