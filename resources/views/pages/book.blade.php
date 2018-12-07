@extends('layouts.app')

@section('content')
    <div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="{{route('dashboard')}}">Home</a></li>
                        <li><a class="active">product-details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- breadcrumbs-area-end -->
    <!-- product-main-area-start -->
    <div class="product-main-area mb-70">
    <div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <!-- product-main-area-start -->
            <div class="product-main-area">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="img/thum-2/1.jpg">
                                    <img src="{{$book->img_path}}" alt="woman"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="product-info-main">
                            <div class="page-title">
                                <h1>{{$book->name}}</h1>
                            </div>
                            <div class="product-info-stock-sku">
                                <span>In stock</span>
                                <div class="product-attribute">
                                    <span>SKU</span>
                                    <span class="value">24-WB05</span>
                                </div>
                            </div>
                            <div class="product-reviews-summary">
                                <div class="rating-summary">
                                    @for($i = 0; $i < $book->rating/2; $i++)
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    @endfor
                                </div>
                                <div class="reviews-actions">
                                    <a href="{{route('books',$book->id)}}">{{$book->solds}} Sold</a>
                                    <a href="{{route('books',$book->id)}}" class="view">Add Your Opinion</a>
                                </div>
                            </div>
                            <div class="product-info-price">
                                <div class="price-final">
                                    <ul>
                                        @if($book->discount)
                                            <span>${{round($book->price*(1-$book->discount/100))-0.01}}</span>
                                        @endif
                                        <span @if($book->discount)class="old-price" @endif>${{$book->price}}</span>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-add-form">
                                <form action="#">
                                    <div class="quality-button">
                                        <input class="qty" type="number" value="1">
                                    </div>
                                    <a href="#">Add to cart</a>
                                </form>
                            </div>
                            <div class="product-social-links">
                                <div class="product-addto-links">
                                    <a><i class="fa fa-heart"></i></a>
                                    <a><i class="fa fa-pie-chart"></i></a>
                                    <a><i class="fa fa-envelope-o"></i></a>
                                </div>
                                <div class="product-addto-links-text">
                                    <p>{{$book->about}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-main-area-end -->
            <!-- product-info-area-start -->
            <div class="product-info-area mt-80">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
                    <li><a href="#Reviews" data-toggle="tab">Reviews 3</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Details">
                        <div class="valu">
                            <p>{{$book->about}}</p>
                            <ul>
                                <li><i class="fa fa-circle"></i>{{$book->cover}}.</li>
                                <li><i class="fa fa-circle"></i>{{$book->pages}} Pages</li>
                                <li><i class="fa fa-circle"></i>{{$book->weight}} g.</li>
                                <li><i class="fa fa-circle"></i>{{$book->size}} mb.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="Reviews">
                        <div class="valu valu-2">
                            <div class="section-title mb-60 mt-60">
                                <h2>Your opinion</h2>
                            </div>
                            <ul>
                                <li>
                                    <div class="review-title">
                                        <h3>themes</h3>
                                    </div>
                                    <div class="review-left">
                                        <div class="review-rating">
                                            <span>Price</span>
                                            <div class="rating-result">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                        <div class="review-rating">
                                            <span>Value</span>
                                            <div class="rating-result">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                        <div class="review-rating">
                                            <span>Quality</span>
                                            <div class="rating-result">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-right">
                                        <div class="review-content">
                                            <h4>themes </h4>
                                        </div>
                                        <div class="review-details">
                                            <p class="review-author">Review by<a href="#">plaza</a></p>
                                            <p class="review-date">Posted on <span>12/9/16</span></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="review-add">
                                <h3>You're reviewing:</h3>
                                <h4>{{$book->name}}</h4>
                            </div>
                            <div class="review-field-ratings">
                                <span>Your Rating <sup>*</sup></span>
                                <div class="control">
                                    <div class="single-control">
                                        <span>Value</span>
                                        <div class="review-control-vote">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                    <div class="single-control">
                                        <span>Quality</span>
                                        <div class="review-control-vote">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                    <div class="single-control">
                                        <span>Price</span>
                                        <div class="review-control-vote">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-form">
                                <div class="single-form">
                                    <label>Nickname <sup>*</sup></label>
                                    <form action="#">
                                        <input type="text" />
                                    </form>
                                </div>
                                <div class="single-form single-form-2">
                                    <label>Summary <sup>*</sup></label>
                                    <form action="#">
                                        <input type="text" />
                                    </form>
                                </div>
                                <div class="single-form">
                                    <label>Review <sup>*</sup></label>
                                    <form action="#">
                                        <textarea name="massage" cols="10" rows="4"></textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="review-form-button">
                                <a href="#">Submit Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-info-area-end -->
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="shop-left">
                <div class="left-title mb-20">
                    <h4>Related Books</h4>
                </div>
                <div class="random-area mb-30">
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @if(!(is_int($recommends)) && $recommends != -1)
                                @foreach($recommends as $recommend)
                                    <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                        <a href="{{route('books',$recommend->id)}}"><img src="{{$recommend->img_path}}" alt="book" /></a>
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                @for($i = 0; $i < $recommend->rating/2; $i++)
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <h4><a href="{{route('books',$recommend->id)}}">{{$recommend->name}}</a></h4>
                                        <div class="product-price">
                                            <ul>
                                                @if($recommend->discount)
                                                    <li>${{$recommend->price*(1-$recommend->discount/100)}}</li>
                                                @else
                                                    <li>${{$recommend->price}}</li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                @for($i = 0; $i < 3; $i++)
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="{{route('books',$BSbooks[$i]->id)}}"><img src="{{$BSbooks[$i]->img_path}}" alt="book" /></a>
                                            </div>
                                            <div class="most-product-content">
                                                <div class="product-rating">
                                                    <ul>
                                                        @for($j = 0; $j < $BSbooks[$i]->rating/2; $j++)
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <h4><a href="{{route('books',$BSbooks[$i]->id)}}">{{$BSbooks[$i]->name}}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        @if($BSbooks[$i]->discount)
                                                            <li>${{$BSbooks[$i]->price*(1-$BSbooks[$i]->discount/100)}}</li>
                                                        @else
                                                            <li>${{$BSbooks[$i]->price}}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endfor
                            @endif
                        </div>
                        {{--<div class="product-total-2">
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="#"><img src="img/product/23.jpg" alt="book" /></a>
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="#">Voyage Yoga Bag</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>$30.00</li>
                                            <li class="old-price">$33.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="#"><img src="img/product/24.jpg" alt="book" /></a>
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="#">Impulse Duffle</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>$70.00</li>
                                            <li class="old-price">$74.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-most-product">
                                <div class="most-product-img">
                                    <a href="#"><img src="img/product/22.jpg" alt="book" /></a>
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="#">Fusion Backpack</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>$59.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="left-title-2 mb-30">
                    <h2>Compare Products</h2>
                    <p>You have no items to compare.</p>
                </div>
                <div class="left-title-2">
                    <h2>My Wish List</h2>
                    <p>You have no items in your wish list.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- product-main-area-end -->
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