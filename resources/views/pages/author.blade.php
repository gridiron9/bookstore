@extends('layouts.app')


@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Home</a></li>
                            <li><a class="active">about</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- about-main-area-start -->
    <div class="about-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="about-img">
                        <a ><img src="{{$author->avatar}}" alt="man" /></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="about-content">
                        <h3><span>{{$author->name}}</span></h3>
                        <p>{{$author->about}}</p>
                        <ul>
                            <li><a><i class="fa fa-birthday-cake"></i>{{$author->birthday}}</a></li>
                            <li><a><i class="fa fa-frown-o"></i>{{$author->deathday}}</a></li>
                            <li><a><i class="fa fa-briefcase"></i>{{$author->profession}}</a></li>
                            @if($author->facebook_page)<li><a href="{{$author->facebook_page}}"><i class="fa fa-facebook"></i>{{$author->facebook_page}}</a></li>@endif
                            @if($author->twitter_page)<li><a href="{{$author->twitter_page}}"><i class="fa fa-twitter"></i>{{$author->twitter_page}}</a></li>@endif
                            <li><a><i class="fa fa-globe"></i>{{$author->country}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-main-area-end -->
    <!-- counter-area-start -->
    <div class="counter-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-counter text-center">
                        <h2 class="counter">{{$nsolds}}</h2>
                        <span>total solds</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-counter text-center">
                        <h2 class="counter">{{$nbooks}}</h2>
                        <span>number of books</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-counter text-center">
                        <h2 class="counter">{{$ratings}}</h2>
                        <span>Average rating</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area-end -->
    <!-- team-area-start -->
    <div class="team-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title text-center mb-50">
                        <h2>Books</h2>
                    </div>
                </div>
                @foreach($soldBooks as $soldBook)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="{{route('books',$soldBook->id)}}">
                                    <img src="{{$soldBook->img_path}}" alt="book" class="primary" />
                                </a>
                                <div class="quick-view">
                                    <a class="action-view" href="{{route('books',$soldBook->id)}}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        @if(date("Y-m-d",strtotime($soldBook->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                            <li><span class="sale">new</span></li>
                                        @endif
                                        @if($soldBook->discount)
                                            <li><span class="discount-percentage">-{{$soldBook->discount}}%</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        @for($count = 0; $count < $soldBook->rating/2; $count++)
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        @endfor
                                    </ul>
                                </div>
                                <h4><a href="{{route('books',$soldBook->id)}}">{{$soldBook->name}}</a></h4>
                                <div class="product-price">
                                    <ul>
                                        @if($soldBook->discount)
                                            <li>${{round($soldBook->price*(1-$soldBook->discount/100))-0.01}}</li>
                                        @endif
                                        <li @if($soldBook->discount)class="old-price" @endif>${{$soldBook->price}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a title="Details"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- team-area-end -->
@endsection