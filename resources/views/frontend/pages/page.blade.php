@extends('frontend.layouts.master')
@section('frontend_content')
    <!--FAQ Section starts-->
    <section class="faq-section">
        <div class="container">
            <div class="col-12">
                {{-- <h1 class="page-title h2 text-center uppercase mt-1 mb-5">{{$page->pageTranslation->page_name}}</h1> --}}
            </div>
            <div class="row">
                {!! $page->pageTranslation->body !!}
                {{-- <div class="col-md-12 single-faq-section mar-tb-30">

                    <div class="row">
                        <div class="col-md-3 col-sm-12 faq-category">
                            <h3 class="title" data-bs-toggle="collapse" href="#collapseShipping" aria-expanded="true">Shipping</h3>
                        </div>
                        <div class="col-md-9 col-sm-12 collapse show" id="collapseShipping">
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query ">
                                        <h5>What shipping methods are availabe?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="faq-ans ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query ">
                                        <h5>Do you Ship internationally?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query ">
                                        <h5>how long will it take to get my packages?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 single-faq-section mar-tb-30">
                    <div class="row">
                        <div class="col-md-3 faq-category">
                            <h3 class="title" data-bs-toggle="collapse" href="#collapsePayment" aria-expanded="true">Payments</h3>
                        </div>
                        <div class="col-md-9 collapse show" id="collapsePayment">
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query  ">
                                        <h5>What payment methods are accepted?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans  ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query  ">
                                        <h5>Is buying online safe?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans  ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 single-faq-section mar-tb-30">
                    <div class="row">
                        <div class="col-md-3 faq-category">
                            <h3 class="title" data-bs-toggle="collapse" href="#collapseOrder" aria-expanded="true">Order & returns</h3>
                        </div>
                        <div class="col-md-9 collapse show" id="collapseOrder">
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query ">
                                        <h5>How do I place an order?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row single-faq-item">
                                <div class="col-md-6">
                                    <div class="faq-query ">
                                        <h5>How Can I Cancel or Change my order?</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="faq-ans ">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--FAQ Section ends-->
@endsection
