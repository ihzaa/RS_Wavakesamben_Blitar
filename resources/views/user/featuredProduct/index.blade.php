@extends('user.template.master')

@section('page_title', $data['post']->title)

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $data['post']->title }}</h2>
                    <ul class="blog-info-link mt-3 mb-4 border_bottom p-1">
                        {{-- <li><i class="fa fa-user"></i> Travel, Lifestyle</li> --}}
                        <li><i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($data['post']->created_at)->format('d.m.Y') }}</li>
                    </ul>
                    <div class="border_bottom p-1">
                        @php
                            echo $data['post']->description;
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection