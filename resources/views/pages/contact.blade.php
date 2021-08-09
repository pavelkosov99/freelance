@extends('pages.layouts.app')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{__('Əlaqə')}}</h3>
                        <p><a href="{{route('index')}}">{{__('Ana səhifə')}} /</a>{{__('Əlaqə')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            {!! $contact->map !!}


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">{{__('Əlaqə saxla')}}</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{route('sendmail')}}" method="post"
                          id="contactForm"
                          novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" placeholder="{{__('Mövzu')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" placeholder=" {{__('Ad')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" placeholder="{{__('Email')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder=" {{__('Mətn')}}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">{{__('Göndər')}}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <h3>{{$contact->address}}</h3>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <h3>{{$contact->phone}}</h3>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <h3>{{$contact->mail}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
