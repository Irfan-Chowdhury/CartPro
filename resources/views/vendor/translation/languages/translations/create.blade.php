@extends('admin.main')
@push('css')
<link rel="stylesheet" href="{{ asset('public/vendor/translation/css/main.css') }}">
@endpush
@section('admin_content')

    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3"><a class="btn btn-sm btn-default mr-1" href="{{route('languages.translations.index',Session::get('currentLocale'))}}"><i class="dripicons-arrow-thin-left"></i></a> @lang('file.Add Translation')</h4>
        <div id="alert_message" role="alert"></div>
        <br>
    </div>

    <div class="panel w-1/2">

        <div class="panel-header">
            {{ __('translation::translation.add_translation') }}

        </div>

        <form action="{{ route('languages.translations.store', $language) }}" method="POST">

            <fieldset>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-body p-4">

                    @include('translation::forms.text_file', ['field' => 'group', 'placeholder' => __('translation::translation.group_placeholder')])

                    @include('translation::forms.text', ['field' => 'key', 'label' => __('translation::translation.key_label'), 'placeholder' => __('translation::translation.key_placeholder')])

                    @include('translation::forms.text', ['field' => 'value', 'label' => __('translation::translation.value_label'), 'placeholder' => __('translation::translation.value_placeholder')])

                    {{-- <div class="input-group">

                        <button v-on:click="toggleAdvancedOptions" class="text-blue">{{ __('translation::translation.advanced_options') }}</button>

                    </div> --}}

                    {{-- <div v-show="showAdvancedOptions">

                        @include('translation::forms.text', ['field' => 'namespace', 'label' => __('translation::translation.namespace_label'), 'placeholder' => __('translation::translation.namespace_placeholder')])

                    </div> --}}


                </div>

            </fieldset>

            <div class="panel-footer flex flex-row-reverse">

                <button class="button button-blue">
                    {{ __('translation::translation.save') }}
                </button>

            </div>

        </form>

    </div>

@endsection
@push('scripts')
<script src="{{ asset('public/vendor/translation/js/app.js') }}"></script>
@endpush
