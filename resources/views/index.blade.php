@extends('masterlayout')

@section('content')

<!-- =========================================================
     HERO SECTION
========================================================= -->
<section class="hero">

    <div class="hero__slider owl-carousel">

        <!-- Hero 1 -->
        <div
            class="hero__items set-bg"
            data-setbg="{{ asset('img/hero/hero-1.jpg') }}"
        >

            <div class="container">

                <div class="row">

                    <div class="col-xl-5 col-lg-7 col-md-8">

                        <div class="hero__text">

                            <h6>
                                Summer Collection
                            </h6>

                            <h2>
                                Fall - Winter Collections 2030
                            </h2>

                            <p>
                                A specialist label creating luxury essentials.
                                Ethically crafted with an unwavering commitment
                                to exceptional quality.
                            </p>

                            <a
                                href="{{ route('shop') }}"
                                class="primary-btn"
                            >
                                Shop Now
                                <span class="arrow_right"></span>
                            </a>

                            <div class="hero__social">

                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Hero 2 -->
        <div
            class="hero__items set-bg"
            data-setbg="{{ asset('img/hero/hero-2.jpg') }}"
        >

            <div class="container">

                <div class="row">

                    <div class="col-xl-5 col-lg-7 col-md-8">

                        <div class="hero__text">

                            <h6>
                                Summer Collection
                            </h6>

                            <h2>
                                Fall - Winter Collections 2030
                            </h2>

                            <p>
                                A specialist label creating luxury essentials.
                                Ethically crafted with an unwavering commitment
                                to exceptional quality.
                            </p>

                            <a
                                href="{{ route('shop') }}"
                                class="primary-btn"
                            >
                                Shop Now
                                <span class="arrow_right"></span>
                            </a>

                            <div class="hero__social">

                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>

                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Hero Section End -->


<!-- =========================================================
     BANNER SECTION
========================================================= -->
<section class="banner spad">

    <div class="container">

        <div class="row">

            <!-- Banner 1 -->
            <div class="col-lg-7 offset-lg-4">

                <div class="banner__item">

                    <div class="banner__item__pic">

                        <img
                            src="{{ asset('img/banner/banner-1.jpg') }}"
                            alt="Clothing Collection"
                        >

                    </div>

                    <div class="banner__item__text">

                        <h2>
                            Clothing Collections 2030
                        </h2>

                        <a href="{{ route('shop') }}">
                            Shop Now
                        </a>

                    </div>

                </div>

            </div>


            <!-- Banner 2 -->
            <div class="col-lg-5">

                <div class="banner__item banner__item--middle">

                    <div class="banner__item__pic">

                        <img
                            src="{{ asset('img/banner/banner-2.jpg') }}"
                            alt="Accessories"
                        >

                    </div>

                    <div class="banner__item__text">

                        <h2>
                            Accessories
                        </h2>

                        <a href="{{ route('shop') }}">
                            Shop Now
                        </a>

                    </div>

                </div>

            </div>


            <!-- Banner 3 -->
            <div class="col-lg-7">

                <div class="banner__item banner__item--last">

                    <div class="banner__item__pic">

                        <img
                            src="{{ asset('img/banner/banner-3.jpg') }}"
                            alt="Shoes"
                        >

                    </div>

                    <div class="banner__item__text">

                        <h2>
                            Shoes Spring 2030
                        </h2>

                        <a href="{{ route('shop') }}">
                            Shop Now
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Banner Section End -->


<!-- =========================================================
     LATEST PRODUCTS SECTION
========================================================= -->
<section class="product spad">

    <div class="container">

        <!-- Section Heading -->
        <div class="row">

            <div class="col-lg-12">

                <div class="section-title">

                    <span>
                        Our Products
                    </span>

                    <h2>
                        Latest Products
                    </h2>

                </div>

            </div>

        </div>


        <!-- Products -->
        <div class="row">

            @forelse($products as $product)

                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div
                        class="product__item {{ $product->sale_price ? 'sale' : '' }}"
                    >

                        <!-- Product Image -->
                        <div
                            class="product__item__pic set-bg"
                           data-setbg="{{ $product->images->first()
                            ? asset('uploads/products/' . $product->images->first()->image)
                            : asset('pro_img.png') }}"
                        >

                        



                            <!-- Sale -->
                            @if($product->sale_price)

                                <span class="label">
                                    Sale
                                </span>

                            @endif


                            <!-- Product Hover -->
                            <ul class="product__hover">

                                <!-- Wishlist -->
                                <li>

                                    <a href="#">

                                        <img
                                            src="{{ asset('img/icon/heart.png') }}"
                                            alt="Wishlist"
                                        >

                                    </a>

                                </li>


                                <!-- Compare -->
                                <li>

                                    <a href="#">

                                        <img
                                            src="{{ asset('img/icon/compare.png') }}"
                                            alt="Compare"
                                        >

                                        <span>
                                            Compare
                                        </span>

                                    </a>

                                </li>


                                <!-- View Product -->
                                <li>

                                    <a
                                        href="{{ route('shop.details', $product->id) }}"
                                    >

                                        <img
                                            src="{{ asset('img/icon/search.png') }}"
                                            alt="View Product"
                                        >

                                    </a>

                                </li>

                            </ul>

                        </div>


                        <!-- Product Information -->
                        <div class="product__item__text">

                            <!-- Product Name -->
                            <h6>
                                {{ $product->name }}
                            </h6>


                            <!-- Product Details -->
                            <a
                                href="{{ route('shop.details', $product->id) }}"
                                class="add-cart"
                            >
                                View Product
                            </a>


                            <!-- Product Price -->
                            @if($product->sale_price)

                                <h5>

                                    ${{ number_format($product->sale_price, 2) }}

                                    <del>
                                        ${{ number_format($product->price, 2) }}
                                    </del>

                                </h5>

                            @else

                                <h5>
                                    ${{ number_format($product->price, 2) }}
                                </h5>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-lg-12">

                    <div class="text-center">

                        <h4>
                            No products available.
                        </h4>

                    </div>

                </div>

            @endforelse

        </div>


        <!-- View All Products -->
        <div class="row">

            <div class="col-lg-12 text-center">

                <a
                    href="{{ route('shop') }}"
                    class="primary-btn"
                >
                    View All Products
                </a>

            </div>

        </div>

    </div>

</section>

<!-- Product Section End -->


<!-- =========================================================
     CATEGORIES SECTION
========================================================= -->
<section class="categories spad">

    <div class="container">

        <!-- Heading -->
        <div class="row">

            <div class="col-lg-12">

                <div class="section-title">

                    <span>
                        Shop By Category
                    </span>

                    <h2>
                        Categories
                    </h2>

                </div>

            </div>

        </div>


        <!-- Categories -->
        <div class="row">

            @forelse($categories as $category)

                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="categories__item">

                        <!-- Category Image -->
                        <div
                            class="categories__item__pic set-bg"
                            data-setbg="{{ asset('uploads/categories/' . $category->image) }}"
                            style="
                                height: 350px;
                                background-size: cover;
                                background-position: center;
                            "
                        >
                        </div>


                        <!-- Category Information -->
                        <div class="categories__item__text">

                            <h2>
                                {{ $category->name }}
                            </h2>


                            @if($category->description)

                                <p>
                                    {{ $category->description }}
                                </p>

                            @endif


                            <!-- Category Products -->
                            <a
                                href="{{ route('category.products', $category->id) }}"
                            >
                                Shop Now
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-lg-12 text-center">

                    <h4>
                        No categories available.
                    </h4>

                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- Categories Section End -->


<!-- =========================================================
     INSTAGRAM SECTION
========================================================= -->
<section class="instagram spad">

    <div class="container">

        <div class="row">

            <!-- Images -->
            <div class="col-lg-8">

                <div class="instagram__pic">

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-1.jpg') }}"
                    >
                    </div>

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-2.jpg') }}"
                    >
                    </div>

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-3.jpg') }}"
                    >
                    </div>

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-4.jpg') }}"
                    >
                    </div>

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-5.jpg') }}"
                    >
                    </div>

                    <div
                        class="instagram__pic__item set-bg"
                        data-setbg="{{ asset('img/instagram/instagram-6.jpg') }}"
                    >
                    </div>

                </div>

            </div>


            <!-- Instagram Text -->
            <div class="col-lg-4">

                <div class="instagram__text">

                    <h2>
                        Instagram
                    </h2>

                    <p>
                        Follow our latest fashion updates and
                        discover new collections.
                    </p>

                    <h3>
                        #Male_Fashion
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Instagram Section End -->


<!-- =========================================================
     BLOG SECTION
========================================================= -->
<section class="latest spad">

    <div class="container">

        <!-- Blog Heading -->
        <div class="row">

            <div class="col-lg-12">

                <div class="section-title">

                    <span>
                        Latest News
                    </span>

                    <h2>
                        Fashion New Trends
                    </h2>

                </div>

            </div>

        </div>


        <!-- Blog -->
        <div class="row">


            <!-- Blog 1 -->
            <div class="col-lg-4 col-md-6 col-sm-6">

                <div class="blog__item">

                    <div
                        class="blog__item__pic set-bg"
                        data-setbg="{{ asset('img/blog/blog-1.jpg') }}"
                    >
                    </div>

                    <div class="blog__item__text">

                        <span>

                            <img
                                src="{{ asset('img/icon/calendar.png') }}"
                                alt=""
                            >

                            16 February 2020

                        </span>

                        <h5>
                            What Curling Irons Are The Best Ones
                        </h5>

                        <a href="{{ route('blog') }}">
                            Read More
                        </a>

                    </div>

                </div>

            </div>


            <!-- Blog 2 -->
            <div class="col-lg-4 col-md-6 col-sm-6">

                <div class="blog__item">

                    <div
                        class="blog__item__pic set-bg"
                        data-setbg="{{ asset('img/blog/blog-2.jpg') }}"
                    >
                    </div>

                    <div class="blog__item__text">

                        <span>

                            <img
                                src="{{ asset('img/icon/calendar.png') }}"
                                alt=""
                            >

                            21 February 2020

                        </span>

                        <h5>
                            Eternity Bands Do Last Forever
                        </h5>

                        <a href="{{ route('blog') }}">
                            Read More
                        </a>

                    </div>

                </div>

            </div>


            <!-- Blog 3 -->
            <div class="col-lg-4 col-md-6 col-sm-6">

                <div class="blog__item">

                    <div
                        class="blog__item__pic set-bg"
                        data-setbg="{{ asset('img/blog/blog-3.jpg') }}"
                    >
                    </div>

                    <div class="blog__item__text">

                        <span>

                            <img
                                src="{{ asset('img/icon/calendar.png') }}"
                                alt=""
                            >

                            28 February 2020

                        </span>

                        <h5>
                            The Health Benefits Of Sunglasses
                        </h5>

                        <a href="{{ route('blog') }}">
                            Read More
                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>

<!-- Blog Section End -->

@endsection