<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="{{route('index')}}">
                                <b style="color: white">Dr Fariz Məmmədov </b>
                            </a>
                        </div>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="{{$contact->facebook}}">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$contact->whatsapp}}">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$contact->instagram}}">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            {{__('Faydalı linklər')}}
                        </h3>
                        <ul>
                            <li><a href="{{route('index')}}">{{__('Ana səhifə')}}</a></li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('contact')}}">{{__('Əlaqə')}}</a></li>
                            <li><a href="{{$contact->whatsapp}}">{{__('Qəbula yazıl')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            {{__('Ünvan')}}
                        </h3>
                        <p>
                            {{$contact->address}} <br> {{$contact->phone}} <br> {{$contact->mail}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end  -->
