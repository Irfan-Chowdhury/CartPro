@extends('frontend.layouts.master')
@section('frontend_content')
    <!--FAQ Section starts-->
    <section class="faq-section">
        <div class="container">
            <div class="col-12">
            </div>
            <div class="row">
                @if ($page->pageTranslation)
                    {!! $page->pageTranslation->body !!}
                @else
                    
                @endif


            </div>
        </div>
    </section>
    <!--FAQ Section ends-->
@endsection
