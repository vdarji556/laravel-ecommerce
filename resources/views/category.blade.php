@extends('masterlayout')

@section('content')

<!-- Breadcrumb -->

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Category</h4>
                    <div class="breadcrumb__links">
                        <a href="#">Home</a>
                        <span>Category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Section -->

<section class="product spad">
    <div class="container">

```
    <!-- Title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <span>Shop By Category</span>
                <h2>Categories</h2>
            </div>
        </div>
    </div>


    <!-- Categories -->

    <div class="row">

        @foreach($categories as $category)

            <div class="col-lg-4 col-md-6 col-sm-6">

                <div class="product__item">

                    <!-- Category Image -->

                    <div class="product__item__pic set-bg"
                         data-setbg="{{ asset('categories/' . $category->image) }}"
                         style="
                            height: 300px;
                            background-size: cover;
                            background-position: center;
                         ">

                        <ul class="product__hover">

                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon/search.png') }}" alt="">
                                </a>
                            </li>

                        </ul>

                    </div>


                    <!-- Category Details -->

                    <div class="product__item__text">

                        <h6>{{ $category->name }}</h6>

                        <a href="#" class="add-cart">
                            View Products
                        </a>

                        @if($category->description)
                            <h5>{{ $category->description }}</h5>
                        @endif

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>
```

</section>

@endsection
