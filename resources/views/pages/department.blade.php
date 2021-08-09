@extends('pages.layouts.app')

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{asset($department->image)}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                {{$department->title}}
                            </h2>
                            <p>
                                {!! $department->text !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection

