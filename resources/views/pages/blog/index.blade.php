@extends('pages.layouts.app')

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                        @forelse($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{$post->image}}" alt="">
                                    <a href="{{route('blog.post.show', $post->id)}}" class="blog_item_date">
                                        <h3>{{$post->created_at->format('d')}}</h3>
                                        <p>{{$post->created_at->format('M')}}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('blog.post.show', $post->id)}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>{{$post->subtitle}}</p>
                                </div>
                            </article>
                        @empty
                            <article class="blog_item">
                                <h6>No Blog Posts</h6>
                            </article>
                        @endforelse
                        {{$posts->render()}}
                    </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
