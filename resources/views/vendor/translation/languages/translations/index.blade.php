@extends('translation::layout')
@section('body')


    <form action="{{ route('languages.translations.index', ['language' => $language]) }}" method="get">

        <div class="container-fluid mt-3 mb-3">
            <div class="d-flex">

                <div class="sm:hidden lg:flex items-center">
                    <a href="{{ route('languages.translations.create', $language) }}" class="btn btn-primary mr-1">
                        {{__('Add Translation')}}
                    </a>
                </div>
                <div class="w-20">
                    @include('translation::forms.select', ['name' => 'language', 'items' => $languages, 'submit' => true, 'selected' => $language])
                </div>
            </div>
        </div>


        @if(count($translations))
            <div class="table-responsive">
                <table id="language-table" class="table ">

                    <thead>
                    <tr>
                        <th class="w-1/5 uppercase">{{ __('translation::translation.key') }}</th>

                        <th class="w-2/5 uppercase">{{ config('app.locale') }}</th>
                        <th class="w-2/5 uppercase">{{ $language }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($translations as $type => $items)

                        @foreach($items as $group => $translations)

                            @foreach($translations as $key => $value)

                                @if(!is_array($value[config('app.locale')]))
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $value[config('app.locale')] }}</td>
                                        <td>
                                            <textarea class="edit_textarea form-control">{{ $value[$language] }}</textarea>
                                            <button class="update_btn hidden" type="button" data-key="{{ $key }}" data-language="{{ $language }}" data-group="{{ $group }}" title="Update"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                            <span class="check_icon hidden"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach

                        @endforeach

                    @endforeach

                    </tbody>

                </table>
            </div>

        @endif

    </form>

    <script type="text/javascript">
            (function($) {
                "use strict";

                $(document).ready(function () {

                    var dataSrc = [];

                    var table = $('#language-table').DataTable({

                        "order": [],
                        'language': {
                            'lengthMenu': '_MENU_ {{__("records per page")}}',
                            "info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
                            "search": '{{trans("file.Search")}}',
                            'paginate': {
                                'previous': '{{trans("file.Previous")}}',
                                'next': '{{trans("file.Next")}}'
                            }
                        },

                        'select': {style: 'multi', selector: 'td:first-child'},
                        'lengthMenu': [[5000,-1], [5000,"All"]], //Add more because of avoiding update issue
                    });


                    $(".edit_textarea").on('click',function(){
                        console.log('ok');
                        $(".update_btn").hide(); //for all
                        $(this).siblings('.update_btn').show();
                    });

                    $(".update_btn").on('click',function(){
                        var language = $(this).data('language');
                        var key   = $(this).data('key');
                        var group = $(this).data('group');
                        var value = $(this).siblings('textarea').val();

                        $(this).siblings('.check_icon').show();

                        $.ajax({
                            url: "{{ route('languages.translations.update') }}",
                            type: "GET",
                            data: {
                                language:language,
                                key:key,
                                group:group,
                                value:value
                            },
                            success: function (data) {
                                $(".update_btn").hide();
                                console.log(data);
                                setTimeout(function() {
                                    $('.check_icon').fadeOut("slow");
                                }, 3000);
                            }
                        });
                    });

                });
        })(jQuery);
    </script>

@endsection
