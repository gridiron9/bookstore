@extends('layouts.app')


@section('content')
    <!-- banner-area-start -->
    <div class="banner-area banner-res-large ptb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{asset('img/banner/1.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Free shipping item</h4>
                            <p>For all orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{asset('img/banner/2.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Money back guarantee</h4>
                            <p>100% money back guarante</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{asset('img/banner/3.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Cash on delivery</h4>
                            <p>Lorem ipsum dolor consecte</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner mrg-none-xs">
                        <div class="banner-img">
                            <a href="#"><img src="{{asset('img/banner/4.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Help & Support</h4>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider pt-125 pb-130 bg-img" id="firstSlider" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="slider-content slider-animated-1 text-center">
                                <h1>Huge Sale</h1>
                                <h2>koparion</h2>
                                <h3>Now starting at £99.00</h3>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" id="secondSlider">
                <div class="container">
                    <div class="slider-content slider-content-2 slider-animated-1">
                        <h1>We can help get your</h1>
                        <h2>Books in Order</h2>
                        <h3>and Accessories</h3>
                        <a href="#">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- product-area-start -->
    <div class="product-area pt-95 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Top interesting</h2>
                        <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely find what you are looking for..</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul>
                            <li class="active"><a href="#Audiobooks" data-toggle="tab">New Arrival	</a></li>
                            <li><a href="#books"  data-toggle="tab">Discounted</a></li>
                            <li><a href="#bussiness" data-toggle="tab">Featured Products</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane active" id="Audiobooks">
                    <div class="tab-active owl-carousel">
                        @foreach($booksNA as $bookNA)
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{route('books',$bookNA->id)}}">
                                        <img src="{{$bookNA->img_path}}" alt="book" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="books/{{$bookNA->id}}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if(date("Y-m-d",strtotime($bookNA->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                                <li><span class="sale">new</span></li>
                                            @endif
                                            @if($bookNA->discount)
                                                <li><span class="discount-percentage">-{{$bookNA->discount}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            @for($count = 0; $count < $bookNA->rating/2; $count++)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <h4><a href="books/{{$bookNA->id}}">{{$bookNA->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($bookNA->discount)
                                                <li>${{round($bookNA->price*(1-$bookNA->discount/100))-0.01}}</li>
                                            @endif
                                            <li @if($bookNA->discount)class="old-price" @endif>${{$bookNA->price}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="books">
                    <div class="tab-active owl-carousel">
                        @foreach($booksOS as $bookOS)
                            <!-- single-product-start -->
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="books/{{$bookOS->id}}">
                                        <img src="{{$bookOS->img_path}}" alt="book" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="books/{{$bookOS->id}}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if(date("Y-m-d",strtotime($bookOS->published_at)) > date("Y-m-d",strtotime("-12 Month")))
                                                <li><span class="sale">new</span></li>
                                            @endif
                                            @if($bookOS->discount)
                                                <li><span class="discount-percentage">-{{$bookOS->discount}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            @for($count = 0; $count < $bookOS->rating/2; $count++)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <h4><a href="books/{{$bookOS->id}}">{{$bookOS->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($bookOS->discount)
                                                <li>${{round($bookOS->price*(1-$bookOS->discount/100))-0.01}}</li>
                                            @endif
                                            <li @if($bookOS->discount)class="old-price" @endif>${{$bookOS->price}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-end -->
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="bussiness">
                    <div class="tab-active owl-carousel">
                        @foreach($booksBS as $bookBS)
                            <!-- single-product-start -->
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="books/{{$bookBS->id}}">
                                        <img src="{{$bookBS->img_path}}" alt="book" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if(date("Y-m-d",strtotime($bookBS->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                                <li><span class="sale">new</span></li>
                                            @endif
                                            @if($bookBS->discount)
                                                <li><span class="discount-percentage">-{{$bookBS->discount}}%</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-rating">
                                        <ul>
                                            @for($count = 0; $count < $bookNA->rating/2; $count++)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <h4><a href="books/{{$bookBS->id}}">{{$bookBS->name}}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($bookOS->discount)
                                                <li>${{round($bookOS->price*(1-$bookOS->discount/100))-0.01}}</li>
                                            @endif
                                            <li @if($bookOS->discount) class="old-price" @endif>${{$bookOS->price}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-end -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- banner-area-start -->
    <div class="banner-area-5 mtb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="img/banner/5.jpg" alt="banner" /></a>
                        <div class="banner-text">
                            <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                            <h2>Sale up to 30% off</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- bestseller-area-start -->
    <div class="bestseller-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="bestseller-content">
                        <h1>Author best selling</h1>
                        <h2>{{$BSAuthor->name}}</h2>
                        <p class="categories">Genre:<a>{{$BSAuthor->genres[0]->name}}</a> , <a>{{$BSAuthor->genres[1]->name}}</a></p>
                        <p>{{$BSAuthor->about}}</p>
                        <div class="social-author">
                            <ul>
                                <li><a href="facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="banner-img-2">
                        <a href="books/{{$BSAuthor->id}}"><img src="{{$BSAuthor->avatar}}" alt="banner" /></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="bestseller-active owl-carousel">
                        @for($i = 0; $i < count($BSAuthor->books)-1;$i++)
                            <div class="bestseller-total">
                                <div class="single-bestseller mb-25">
                                    <div class="bestseller-img">
                                        <a href="books/{{$BSAuthor->books[$i]->id}}"><img src="{{$BSAuthor->books[$i]->img_path}}" alt="book" /></a>
                                        <div class="product-flag">
                                            <ul>
                                                @if(date("Y-m-d",strtotime($BSAuthor->books[$i]->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                                    <li><span class="sale">new</span></li>
                                                @endif
                                                @if($BSAuthor->books[$i]->discount)
                                                    <li><span class="discount-percentage">-{{$BSAuthor->books[$i]->discount}}%</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bestseller-text text-center">
                                        <h3> <a href="books/{{$BSAuthor->books[$i]->id}}">{{$BSAuthor->books[$i]->name}}</a></h3>
                                        <div class="price">
                                            <ul>
                                                @if($BSAuthor->books[$i]->discount)
                                                    <li><span class="new-price">${{$BSAuthor->books[$i]->price*($BSAuthor->books[$i]->discount/100)}}</span></li>
                                                @endif
                                                <li><span @if($BSAuthor->books[$i]->discount) class="old-price" @endif>${{$BSAuthor->books[$i]->price}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-bestseller">
                                    <div class="bestseller-img">
                                        <a href="books/{{$BSAuthor->books[$i+1]->id}}"><img src="{{$BSAuthor->books[$i+1]->img_path}}" alt="book" /></a>
                                        <div class="product-flag">
                                            <ul>
                                                @if(date("Y-m-d",strtotime($BSAuthor->books[$i+1]->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                                    <li><span class="sale">new</span></li>
                                                @endif
                                                @if($BSAuthor->books[$i+1]->discount)
                                                    <li><span class="discount-percentage">-{{$BSAuthor->books[$i+1]->discount}}%</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bestseller-text text-center">
                                        <h3> <a href="books/{{$BSAuthor->books[$i+1]->id}}">{{$BSAuthor->books[$i+1]->name}}</a></h3>
                                        <div class="price">
                                            <ul>
                                                @if($BSAuthor->books[$i+1]->discount)
                                                    <li><span class="new-price">${{$BSAuthor->books[$i+1]->price*($BSAuthor->books[$i+1]->discount/100)}}</span></li>
                                                @endif
                                                <li><span @if($BSAuthor->books[$i+1]->discount) class="old-price" @endif>${{$BSAuthor->books[$i++]->price}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bestseller-area-end -->
    <!-- new-book-area-start -->
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                        <h2>Discounted Books with paperback</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                @foreach($BooksPB as $BookPB)
                    <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="{{route('books',$BookPB->id)}}">
                                <img src="{{$BookPB->img_path}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="{{route('books',$BookPB->id)}}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    @if(date("Y-m-d",strtotime($BookPB->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                        <li><span class="sale">new</span></li>
                                    @endif
                                    @if($BookPB->discount)
                                        <li><span class="discount-percentage">-{{$BookPB->discount}}%</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-details text-center">
                            <div class="product-rating">
                                <ul>
                                    @for($count = 0; $count < $BookPB->rating/2; $count++)
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    @endfor
                                </ul>
                            </div>
                            <h4><a href="{{route('books',$BookPB->id)}}">{{$BookPB->name}}</a></h4>
                            <div class="product-price">
                                <ul>
                                    @if($BookPB->discount)
                                         <li class="new-price">${{round($BookPB->price*($BookPB->discount/100))}}</li>
                                    @endif
                                    <li @if($BookPB->discount) class = "old-price" @endif>${{$BookPB->price}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- new-book-area-start -->
    <!-- banner-static-area-start -->
    <div class="banner-static-area bg ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="banner-shadow-hover xs-mb">
                        <a href="#"><img src="img/banner/8.jpg" alt="banner" /></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="banner-shadow-hover">
                        <a href="#"><img src="img/banner/9.jpg" alt="banner" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-static-area-end -->
    <!-- testimonial-area-start -->
    <div class="testimonial-area ptb-100 bg">
        <div class="container">
            <div class="row">
                <div class="testimonial-active owl-carousel">
                    <div class="col-lg-12">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <a href="#"><i class="fa fa-quote-right"></i></a>
                            </div>
                            <div class="testimonial-text">
                                <p>I'm so happy with all of the themes, great support, could not wish for more. These people are <br /> geniuses ! Kudo's from the Netherlands !</p>
                                <a href="#">Sandy Wilcke/user</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <a href="#"><i class="fa fa-quote-right"></i></a>
                            </div>
                            <div class="testimonial-text">
                                <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support ,<br /> advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                                <a href="#">Sandy Wilcke/user</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area-end -->
    <!-- recent-post-area-start -->
    <div class="recent-post-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center">
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="img/post/1.jpg" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">06</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">Nam tincidunt vulputate felis</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="img/post/2.jpg" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">06</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">Interdum et malesuada</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="img/post/3.jpg" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">07</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">What is Bootstrap?</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="img/post/4.jpg" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">08</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">Etiam eros massa</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent-post-area-end -->
@endsection
@push('modal')
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="modal-tab">
                                <div class="product-details-large tab-content">
                                    <div class="tab-pane active" id="image-1">
                                        <img src="img/product/quickview-l4.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-2">
                                        <img src="img/product/quickview-l2.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-3">
                                        <img src="img/product/quickview-l3.jpg" alt="" />
                                    </div>
                                    <div class="tab-pane" id="image-4">
                                        <img src="img/product/quickview-l5.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="product-details-small quickview-active owl-carousel">
                                    <a class="active" href="#image-1"><img src="img/product/quickview-s4.jpg" alt="" /></a>
                                    <a href="#image-2"><img src="img/product/quickview-s2.jpg" alt="" /></a>
                                    <a href="#image-3"><img src="img/product/quickview-s3.jpg" alt="" /></a>
                                    <a href="#image-4"><img src="img/product/quickview-s5.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h3>Chaz Kangeroo Hoodie3</h3>
                                <div class="price">
                                    <span>$70.00</span>
                                </div>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select class="select">
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                        </select>
                                    </div>
                                    <div class="quickview-color-wrap">
                                        <label>Color*</label>
                                        <div class="quickview-color">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="red">r</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form action="#">
                                    <input type="number" value="1" />
                                    <button>Add to cart</button>
                                </form>
                                <span><i class="fa fa-check"></i> In stock</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endpush