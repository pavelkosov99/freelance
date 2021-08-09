<!-- header-start -->
<header>
    <div class="header-area ">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            <a href="#">
                                <img width="25" src="{{asset('img/azicon.png')}}" alt="AZ">
                            </a>
                            <a href="#">
                                <img width="25" src="{{asset('img/rusicon.png')}}" alt="RU">
                            </a>
                            <a href="#">
                                <img width="25" src="{{asset('img/engicon.png')}}" alt="EN">
                            </a>
                            <a href="{{$contact->instagram}}">
                                <i style="margin-left: 10px; color: #5db2ff" class="fa fa-instagram"></i>
                            </a>
                            <a href="{{$contact->facebook}}">
                                <i style="color: #5db2ff" class="fa fa-facebook"></i>
                            </a>
                            <a href="{{$contact->whatsapp}}">
                                <i style="color: #5db2ff" class="fa fa-whatsapp"></i>
                            </a>

                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li>
                                    <a href="mailto:{{$contact->mail}}"> <i class="fa fa-envelope"></i>{{$contact->mail}}</a>
                                </li>
                                <li>
                                    <a href="tel:{{$contact->phone}}"> <i class="fa fa-phone"></i>{{$contact->phone}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                <!-- <img src="img/logo.png" alt=""> -->
                                <b style="color: black">  Dr Fariz Məmmədov </b>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{route('index')}}">{{__('Ana səhifə')}}</a></li>
                                    <li><a href="{{route('blog')}}">{{__('Blog')}}</a> </li>
                                    <li><a href="{{route('contact')}}">{{__('Əlaqə')}}</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a href="{{$contact->whatsapp}}">{{__('Qəbula yazıl')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->
