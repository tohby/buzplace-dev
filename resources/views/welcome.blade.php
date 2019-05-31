<style></style>

@extends('layouts.app') 
@section('content')
<div class="hero-image">
    <div class="container">
        <div class="hero-text">
            <h1>Connect with companies globally.</h1>
            <p> Buzplace extends your market reach, connects your services, products and enquires with desired business across
                the globe
            </p>
            {{--
            <p>Buzplace is a market place for Production companies to meet with buyers accross the globe.</p> --}}
            <a href="{{ route('register') }}" class="button">GET STARTED</a> or <a href="{{ route('login') }}">sign in</a>
        </div>
    </div>
</div>
<div class="container-fluid p-0 row-1 pb-5">
    <div class="seg-1 p-5">
        <h1 class="p-5" data-aos="fade-up" data-aos-duration="4000">
            Enhance your supply chain networks
        </h1>
    </div>
    <div class="row w-100 h-100">
        <div class="col-lg-6 segment-1 ">
            
        </div>
        <div class="col-lg-6 text py-5">
            <div class="m-5">
                <p class="font-weight-bold">
                    Need help with your next purchase?
                </p>
                <h1 class="mt-2">
                    Join a network of Manufacturers, Suppliers and Customers
                </h1>
                <h4 class="font-weight-light mt-5 h4"><small>Buzplace is an entreprenuership ecosystem, enhancing businessse reach
                    intended clients and services directly. Establish business relationship, advertise your products and services to the world. 
                    Buzplace helps you reduce the search for dependable components within your businesses and strengthen your business presence globally. 
                </small></h4>
            </div>
        </div>
    </div>
    {{-- two images thingy --}}
    <div class="container mt-5 mb-5">
        <div class="text">
            <p class="p2 text-center">Welcome home</p>
            <h1 class="text-center">Whether a manufacturer or wholesaler, <br/>you'll find a place with us</h1>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-sm-6">
                <div class="card shadow-lg" data-aos="fade-down-right" data-aos-duration="4000">
                    <img class="card-img-top" src="/images/undraw_business_deal_cpi9.svg" alt="Card image">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Get connected to buyers around the globe</h3>
                        <p class="card-text">Taking businesses global and increasing profitability as a lot of resources go into research and
                            feasibility study. Let's bring you to the buyers and client who need your product and services
                            globally. With our experts and relationships, we can help you grow your business, bring you customers
                            and support you into your full potential in the global business. </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-5 mb-5" data-aos="fade-up-left" data-aos-duration="4000">
                <div class="card mt-5 shadow-lg">
                    <img class="card-img-top" src="/images/undraw_successful_purchase_uyin.svg" alt="Card image">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Meet manufacturers that serve your needs all over the world</h3>
                        <p class="card-text">For years, we have immersed our expertise and acquire both access to manufacturers of different products
                            and services. Buzplace connects your business needs to the manufactures you've been searching
                            for. Our list of manufacturers and service provider is ever increasing. Our job is to connect
                            you to your clients and connect clients to you. We help build businesses with information available
                            to us. So, whether you are a manufacturer or in need of one, Buzplace is the place to be.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- cosult segment --}}
    <div class="row w-100 ml-0 mt-5 h-100">
        <div class="col-lg-6 text bg-blue p-5">
            <p class="p2 font-weight-bold mt-5">Need guiadiance? we've got you.</p>
            <h1 class="text-white">Get consultations from our professionals.</h1>
            <h4 class="font-weight-light mt-3 text-muted font-italic"><small>From our directory, you  can now reach more businesses and services than ever.
                 However, we acknowledge some businesses have specific needs for products/service/connection to some resources sometimes uneasy to find across the world. Let our team of 
                experts and consultancy team locate your needs and products for you. Our goal is to contact business  Get your the best offers, research products and solve any such challenges.
                Let's do the worry and research, just tell us your needs. 
            </small></h4>
        </div>
        <div class="col-lg-6 segment-2">
            
        </div>
    </div>

    {{-- NEWS SECTION --}}
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
@endsection