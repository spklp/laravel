@extends('layouts.layout', ['title' => "Contact"])

@section('content')

    <!-- Home -->

    <div class="home home-small">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset('images/contact.jpg')}})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li>Contact</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Get in touch -->
                <div class="col-lg-8 contact_col">
                    <div class="get_in_touch">
                        @if (session('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
                        @endif
                        <div class="section_title">Get in Touch</div>
                        <div class="section_subtitle">Say hello</div>
                        <div class="contact_form_container">
                            <form action="{{ route('contact.send') }}" method="post" id="contact_form" class="contact_form">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="contact_name">First Name*</label>
                                        <input type="text" name="name" id="contact_name" class="contact_input"
                                               value="{{ old('name') ?? '' }}" required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="contact_last_name">Last Name*</label>
                                        <input type="text" name="last_name" id="contact_last_name" class="contact_input"
                                               value="{{ old('last_name') ?? '' }}" required="required">
                                    </div>
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <label for="contact_company">Subject</label>
                                    <input type="text" name="subject" id="contact_company"
                                           value="{{ old('subject') ?? '' }}" class="contact_input">
                                </div>
                                <div>
                                    <label for="contact_textarea">Message*</label>
                                    <textarea id="contact_textarea" name="text" class="contact_input contact_textarea"
                                              required="required">{{ old('text') ?? '' }}</textarea>
                                </div>
                                <button class="button contact_button newsletter_button"><span>Send Message</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 offset-xl-1 contact_col">
                    <div class="contact_info">
                        <div class="contact_info_section">
                            <div class="contact_info_title">Marketing</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>shop.ggvabi@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Shippiing & Returns</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>shop.ggvabi@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Information</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>shop.ggvabi@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row map_row">-->
            <!--<div class="col">-->

            <!--&lt;!&ndash; Google Map &ndash;&gt;-->
            <!--<div class="map">-->
            <!--<div id="google_map" class="google_map">-->
            <!--<div class="map_container">-->
            <!--<div id="map"></div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->

            <!--</div>-->
            <!--</div>-->
        </div>
    </div>

@endsection
@include('parts.search')