@extends('pages.layouts.app')

@section('content')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            @forelse($sliders as $slider)
                <div class="single_slider  d-flex align-items-center slider_bg_2" style="background-image: url('{{$slider->image}}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="slider_text">
                                    <h3>{{$slider->title}}</h3>
                                    <p>{{$slider->subtitle}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="single_slider  d-flex align-items-center slider_bg_2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="slider_text ">
                                    <h3>{{__('No data')}}</h3>
                                    <p>{{__('No data')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- slider_area_end -->


    <!-- service_area_start -->
    @forelse($speciality as $spec)
        <div class="service_area">
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-xl-4 col-md-4">
                        <div class="single_service">
                            <div class="icon">
                            </div>
                            <h3>{{$spec->title_1}}</h3>
                            <p>{{$spec->subtitle_1}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="single_service">
                            <div class="icon">
                            </div>
                            <h3>{{$spec->title_2}}</h3>
                            <p>{{$spec->subtitle_2}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="single_service">
                            <div class="icon">
                            </div>
                            <h3>{{$spec->title_3}}</h3>
                            <p>{{$spec->subtitle_3}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="service_area">
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-xl-4 col-md-4">
                        <div class="single_service">
                            <div class="icon">
                            </div>
                            <h3>{{__('No data')}}</h3>
                            <p>{{__('No data')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
    <!-- service_area_end -->


    <!-- welcome_docmed_area_start -->
    @forelse($welcome as $data)
        <div class="welcome_docmed_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_thumb">
                            <div class="thumb_1">
                                <img src="{{asset($data->image)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_docmed_info">
                            <h2>{{$data->title}}</h2>
                            <h3>{{$data->subtitle}}</h3>
                            <p>{!! $data->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="welcome_docmed_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_thumb">
                            <div class="thumb_1">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_docmed_info">
                            <h2>{{__('No data')}}</h2>
                            <h3>{{__('No data')}}</h3>
                            <p>{{__('No data')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
    <!-- welcome_docmed_area_end -->


    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>{{__('Göstərilən Xidmətlər')}}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($departments as $department)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department">
                            <div class="department_thumb">
                                <img src="{{$department->image}}" alt="">
                            </div>
                            <div class="department_content">
                                <h3><a href="{{route('department.show', $department->id)}}">{{$department->title}}</a></h3>
                                <p>{{$department->subtitle}}</p>
                                <a href="{{route('department.show', $department->id)}}" class="learn_more">{{__('Ətraflı')}}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department">
                            <div class="department_thumb">
                                <img src="" alt="">
                            </div>
                            <div class="department_content">
                                <h3><a href="#"> {{__('No data')}}</a></h3>
                                <p>{{__('No data')}}</p>
                                <a href="#" class="learn_more">{{__('No data')}}</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- testmonial_area_start -->
    <div class="testmonial_area">
        <div class="testmonial_active owl-carousel">
            @forelse($comments as $comment)
                <div class="single-testmonial testmonial_bg_1 overlay2" style="background-image: url('{{$comment->image}}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">

                                <div class="testmonial_info text-center">
                                    <div class="quote">
                                        <i class="flaticon-straight-quotes"></i>
                                    </div>
                                    <p> {{$comment->title}} </p>
                                    <p> {!! $comment->text !!} </p>
                                    <div class="testmonial_author">
                                        <h4>{{$comment->commentator}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="single-testmonial testmonial_bg_1 overlay2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">

                                <div class="testmonial_info text-center">
                                    <div class="quote">
                                        <i class="flaticon-straight-quotes"></i>
                                    </div>
                                    <p>{{__('No data')}}</p>
                                    <p>{{__('No data')}}</p>
                                    <div class="testmonial_author">
                                        <h4>{{__('No data')}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
        </div>
        <!-- testmonial_area_end -->


        <!-- expert_doctors_area_start -->
        <div class="expert_doctors_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="doctors_title mb-55">
                            <h3>{{__('Ekspertlər')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="expert_active owl-carousel">
                            @forelse($experts as $expert)
                                <div class="single_expert">
                                    <div class="expert_thumb">
                                        <img src="{{$expert->image}}" alt="">
                                    </div>
                                    <div class="experts_name text-center">
                                        <h3>{{$expert->title}}</h3>
                                        <span>{{$expert->subtitle}}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="single_expert">
                                    <div class="expert_thumb">
                                        <img src="" alt="">
                                    </div>
                                    <div class="experts_name text-center">
                                        <h3>No data</h3>
                                        <span>No data</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- expert_doctors_area_end -->


        <!-- Emergency_contact start -->
        <div class="Emergency_contact">
            <div class="conatiner-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div
                            class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                            <div class="info">
                                <h3>{{__('Təcili əlaqə')}}</h3>
                            </div>
                            <div class="info_button">
                                <a href="tell:{{$contact->phone}}" class="boxed-btn3-white">{{$contact->phone}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div
                            class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                            <div class="info">
                                <h3>{{__('Online qəbula yazıl')}}</h3>
                            </div>
                            <div class="info_button">
                                <a href="{{$contact->whatsapp}}" class="boxed-btn3-white">{{__("Qəbula yazıl")}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Emergency_contact end -->
@endsection
