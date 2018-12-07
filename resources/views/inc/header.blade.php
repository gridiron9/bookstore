<!-- header-area-start -->
<header>
    <!-- header-top-area-start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="language-area">
                        <ul>
                            <li><img src="{{asset('img/flag/1.jpg')}}" alt="flag" /><a href="#">English<i class="fa fa-angle-down"></i></a>
                                <div class="header-sub">
                                    <ul>
                                        <li><a href="#"><img src="{{asset('img/flag/2.jpg')}}" alt="flag" />france</a></li>
                                        <li><a href="#"><img src="{{asset('img/flag/3.jpg')}}" alt="flag" />croatia</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">USD $<i class="fa fa-angle-down"></i></a>
                                <div class="header-sub dolor">
                                    <ul>
                                        <li><a href="#">EUR €</a></li>
                                        <li><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-area text-right">
                    @if(Route::has('login'))
                            @auth
                                <ul>
                                    <li><span> {{ Auth::user()->name }}</span></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            @else
                                <div class="account-area text-right">
                                    <ul>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    </ul>
                                </div>
                            @endauth
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="header-search">
                        <form action="{{route('search')}}" method="get" role="search">
                            {{csrf_field()}}
                            <input type="text" name="book_name" placeholder="Search entire store here..." />
                            <a href="{{route('search')}}"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="{{route('dashboard')}}"><img src="{{asset('img/logo/logo.png')}}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="my-cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                <span>2</span>
                                <div class="mini-cart-sub">
                                    <div class="cart-product">
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{asset('img/product/1.jpg')}}" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Joust Duffle Bag</a></h5>
                                                <p>1 x £60.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{asset('img/product/3.jpg')}}" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
                                                <p>1 x £52.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-totals">
                                        <h5>Total <span>£12.00</span></h5>
                                    </div>
                                    <div class="cart-bottom">
                                        <a class="view-cart" href="cart.html">view cart</a>
                                        <a href="checkout.html">Check out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('dashboard')}}">Home</a></li>
                                <li><a href="{{route('books')}}">Book<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu">
                                        <span>
                                            <a class="title">Genres</a>
                                            @foreach($genres as $genre)
                                                <a href="{{route('genre_category',$genre->id)}}">{{$genre->name}}</a>
                                            @endforeach
                                        </span>
                                    </div>
                                </li>
                                <li><a href="{{route('books')}}">Audio books<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu">
                                        <span>
                                            <a href="{{route('books')}}" class="title">Shirts</a>
                                            <a href="{{route('books')}}">Tops</a>
                                            <a href="{{route('books')}}">Sweaters </a>
                                            <a href="{{route('books')}}">Hoodies</a>
                                            <a href="{{route('books')}}">Jackets & Coats</a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="{{route('books')}}">children’s books<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu mega-menu-2">
                                        <span>
													<a href="#" class="title">Tops</a>
													<a href="shop.html">Shirts</a>
													<a href="shop.html">Florals</a>
													<a href="shop.html">Crochet</a>
													<a href="shop.html">Stripes</a>
												</span>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="safe-area">
                        <a href="product-details.html">sales off</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li><a href="product-details.html">Book</a>
                                    <ul>
                                        <li><a href="shop.html">Tops & Tees</a></li>
                                        <li><a href="shop.html">Polo Short Sleeve</a></li>
                                        <li><a href="shop.html">Graphic T-Shirts</a></li>
                                        <li><a href="shop.html">Jackets & Coats</a></li>
                                        <li><a href="shop.html">Fashion Jackets</a></li>
                                        <li><a href="shop.html">Crochet</a></li>
                                        <li><a href="shop.html">Sleeveless</a></li>
                                        <li><a href="shop.html">Stripes</a></li>
                                        <li><a href="shop.html">Sweaters</a></li>
                                        <li><a href="shop.html">hoodies</a></li>
                                        <li><a href="shop.html">Heeled sandals</a></li>
                                        <li><a href="shop.html">Polo Short Sleeve</a></li>
                                        <li><a href="shop.html">Flat sandals</a></li>
                                        <li><a href="shop.html">Short Sleeve</a></li>
                                        <li><a href="shop.html">Long Sleeve</a></li>
                                        <li><a href="shop.html">Polo Short Sleeve</a></li>
                                        <li><a href="shop.html">Sleeveless</a></li>
                                        <li><a href="shop.html">Graphic T-Shirts</a></li>
                                        <li><a href="shop.html">Hoodies</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-details.html">Audio books</a>
                                    <ul>
                                        <li><a href="shop.html">Tops & Tees</a></li>
                                        <li><a href="shop.html">Sweaters</a></li>
                                        <li><a href="shop.html">Hoodies</a></li>
                                        <li><a href="shop.html">Jackets & Coats</a></li>
                                        <li><a href="shop.html">Long Sleeve</a></li>
                                        <li><a href="shop.html">Short Sleeve</a></li>
                                        <li><a href="shop.html">Polo Short Sleeve</a></li>
                                        <li><a href="shop.html">Sleeveless</a></li>
                                        <li><a href="shop.html">Sweaters</a></li>
                                        <li><a href="shop.html">Hoodies</a></li>
                                        <li><a href="shop.html">Wedges</a></li>
                                        <li><a href="shop.html">Vests</a></li>
                                        <li><a href="shop.html">Polo Short Sleeve</a></li>
                                        <li><a href="shop.html">Sleeveless</a></li>
                                        <li><a href="shop.html">Graphic T-Shirts</a></li>
                                        <li><a href="shop.html">Hoodies</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-details.html">children’s books</a>
                                    <ul>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Florals</a></li>
                                        <li><a href="shop.html">Crochet</a></li>
                                        <li><a href="shop.html">Stripes</a></li>
                                        <li><a href="shop.html">Shorts</a></li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Trousers</a></li>
                                        <li><a href="shop.html">Jeans</a></li>
                                        <li><a href="shop.html">Heeled sandals</a></li>
                                        <li><a href="shop.html">Flat sandals</a></li>
                                        <li><a href="shop.html">Wedges</a></li>
                                        <li><a href="shop.html">Ankle boots</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-details.html">Page</a>
                                    <ul>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="product-details.html">product-details</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">blog-details</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->
</header>
<!-- header-area-end -->