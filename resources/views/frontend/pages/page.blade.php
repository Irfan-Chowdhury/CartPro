@extends('frontend.layouts.master')
@section('frontend_content')
    <!--FAQ Section starts-->
    <section class="faq-section">
        <div class="container">
            <div class="col-12">
            </div>
            <div class="row">
                @if ($page->pageTranslation)
                    {!! htmlspecialchars_decode($page->pageTranslation->body ?? null) !!}
                @else
                    <h1>@lang('file.Empty Data')</h1>
                @endif
            </div>
        </div>
    </section>
    <!--FAQ Section ends-->
@endsection
