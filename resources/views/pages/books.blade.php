@extends('layouts.app')


@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a class="active">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        <div class="section-title-5 mb-30">
                            <h2>Book Options</h2>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Genre</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                @foreach($genres as $genre)
                                    <li><a href="{{route('genre',$genre->id)}}">{{$genre->name}}<span>{{count($genre->book)}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Author</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                @foreach($authors as $author)
                                    <li><a href="{{route('author',$author->id)}}">{{$author->name}}<span>{{count($author->books)}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Price</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                    <li><a href="{{route('ranges',30)}}">$0.00-$29.99<span>{{count($ranges[0])}}</span></a></li>
                                    <li><a href="{{route('ranges',60)}}">$29.99-$59.99<span>{{count($ranges[1])}}</span></a></li>
                                    <li><a href="{{route('ranges',90)}}">$59.99-$89.99<span>{{count($ranges[2])}}</span></a></li>
                                    <li><a href="{{route('ranges',100)}}">$90 and above<span>{{count($ranges[3])}}</span></a></li>
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>BestSeller</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                <div class="product-total-2">
                                    @foreach($books as $book)
                                        <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="{{route('books',$book->id)}}"><img src="{{$book->img_path}}" alt="book" /></a>
                                        </div>
                                        <div class="most-product-content">
                                            <div class="product-rating">
                                                <ul>
                                                    @for($i = 0; $i < $book->rating/2; $i++)
                                                        <li><a><i class="fa fa-star"></i></a></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <h4><a href="{{route('books',$book->id)}}">{{$book->name}}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    @if($book->discount)
                                                        <li>${{round($book->price*(1-$book->discount/100))-0.01}}</li>
                                                    @endif
                                                    <li @if($book->discount)class="old-price" @endif>${{$book->price}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="banner-area mb-30">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{asset('img/banner/31.jpg')}}" alt="banner" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="category-image mb-30">
                        <a href="#"><img src="{{asset('img/banner/32.jpg')}}" alt="banner" /></a>
                    </div>
                    <div class="section-title-5 mb-30">
                        <h2>Book</h2>
                    </div>
                    <div class="toolbar mb-30">
                        <div class="shop-tab">
                            <div class="tab-3">
                                <ul>
                                    <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
                                    <li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
                                </ul>
                            </div>
                            <div class="list-page">
                                <p>Items 1-9 of 11</p>
                            </div>
                        </div>
                        <div class="field-limiter">
                            <div class="control">
                                <span>Show</span>
                                <!-- chosen-start -->
                                <select data-placeholder="Default Sorting" style="width:50px;" class="chosen-select" tabindex="1">
                                    <option value="Sorting">1</option>
                                    <option value="popularity">2</option>
                                    <option value="rating">3</option>
                                    <option value="date">4</option>
                                </select>
                                <!-- chosen-end -->
                            </div>
                        </div>
                        <div class="toolbar-sorter">
                            <span>Sort By</span>
                            <select id="sorter" name = "position" class="sorter-options" href="#" data-role="sorter">
                                <option selected="selected" value="position"> Position </option>
                                <option value="name"> Product Name </option>
                                <option value="price"> Price </option>
                            </select>
                            <a href="#"><i class="fa fa-arrow-up"></i></a>
                        </div>
                    </div>
                    <!-- tab-area-start -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            <div class="row">
                                @foreach($Books as $Book)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            <a href="{{route('books',$Book->id)}}">
                                                <img src="{{$Book->img_path}}" alt="book" class="primary" />
                                            </a>
                                            <div class="quick-view">
                                                <a class="action-view" href="{{route('books',$Book->id)}}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="product-flag">
                                                <ul>
                                                    @if(date("Y-m-d",strtotime($Book->published_at)) > date("Y-m-d",strtotime("-12 Months")))
                                                        <li><span class="sale">new</span></li>
                                                    @endif
                                                    @if($Book->discount)
                                                        <li><span class="discount-percentage">-{{$Book->discount}}%</span></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-rating">
                                                <ul>
                                                    @for($i = 0; $i < $Book->rating/2; $i++)
                                                        <li><a><i class="fa fa-star"></i></a></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <h4><a href="{{route('books',$Book->id)}}">{{$Book->name}}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    @if($Book->discount)
                                                        <li>${{round($Book->price*(1-$Book->discount/100))-0.01}}</li>
                                                    @endif
                                                    <li @if($Book->discount)class="old-price" @endif>${{$Book->price}}</li>
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
                        <div class="tab-pane fade" id="list">
                            @foreach($Books as $Book)
                                <!-- single-shop-start -->
                                <div class="single-shop mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-wrapper-2">
                                                <div class="product-img">
                                                    <a href="{{route('books',$Book->id)}}">
                                                        <img src="{{$Book->img_path}}" alt="book" class="primary" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-wrapper-content">
                                                <div class="product-details">
                                                    <div class="product-rating">
                                                        <ul>
                                                            @for($i = 0; $i < $Book->rating/2; $i++)
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <h4><a href="{{route('books',$Book->id)}}">{{$Book->name}}</a></h4>
                                                    <div class="product-price">
                                                        <ul>
                                                            <li>${{$Book->price}}</li>
                                                        </ul>
                                                    </div>
                                                    {{$Book->about}}
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
                                        </div>
                                    </div>
                                </div>
                                <!-- single-shop-end -->
                            @endforeach
                        </div>
                    </div>
                    <!-- tab-area-end -->
                    <!-- pagination-area-start -->
                    <div class="pagination-area mt-50">
                        <div class="list-page-2">
                            <p>Items 1-9 of 11</p>
                        </div>
                        <div class="page-number">
                            <ul>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#" class="angle"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- pagination-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-main-area-end -->
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