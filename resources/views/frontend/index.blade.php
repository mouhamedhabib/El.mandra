@extends('frontend.layout.frontend_master')

@section('frontend')

<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                @foreach ($sliders as $slider)
                <div class="single-hero-slider single-animation-wrap"
                    style="background-image: url({{ file_exists(public_path('uploaded/sliders/'.$slider->image)) ? asset('uploaded/sliders/'.$slider->image) : asset('uploaded/no_image.jpg') }})">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40">
                            {{ $slider->title }}
                        </h1>
                        <p class="mb-65">{{$slider->sub_title}}</p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">S'abonner</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
<!--End hero slider-->

<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Catégories en vedette </h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                
                @foreach ($categories as $category)
                <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="img-hover-scale overflow-hidden">
                        {{-- CORRECTED: Use $category->id for the route link --}}
                        <a href="{{ route('product_by_category', $category->id) }}"><img
                                src="{{ file_exists(public_path('uploaded/categories/'.$category->image)) ? asset('uploaded/categories/'.$category->image) : asset('uploaded/no_image.jpg') }}"
                                alt="{{ $category->name }}" /></a>
                    </figure>
                    {{-- CORRECTED: Use $category->id for the route link --}}
                    <h6><a href="{{ route('product_by_category', $category->id) }}">{{ $category->name }}</a></h6>
                    <span>{{ $category->products_count }} items</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--End category slider-->

<section class="banners mb-25">
    <div class="container">
        <div class="row">
            @foreach($banners as $banner)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ file_exists(public_path('uploaded/banners/'.$banner->image)) ? asset('uploaded/banners/'.$banner->image) : asset('uploaded/no_image.jpg') }}"
                        alt="{{ $banner->title }}" />
                    <div class="banner-text"style="display:none;">
                        <h4>
                            {{ $banner->title }}
                        </h4>
                        {{-- CORRECTED: Use a dynamic link from the banner (e.g., $banner->url) or a fallback.
                             Assuming $banner might have a 'url' property or a target_category_id.
                             As a fallback, it links to the first category if available, or '#' --}}
                        <a href="{{ $banner->url ?? (isset($categories_with_products[0]) ? route('product_by_category', $categories_with_products[0]->id) : '#') }}" class="btn btn-xs">
                            Shop Now <i class="fi-rs-arrow-small-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End banners-->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Nouveaux produits </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one-all-products"
                        type="button" role="tab" aria-controls="tab-one-all-products" aria-selected="true">Tous</button>
                </li>
                
                @foreach($categories as $category)
                <li class="nav-item" role="presentation">
                    {{-- Ensure unique IDs for tabs and targets --}}
                    <button class="nav-link" id="nav-tab-category-{{ $category->id }}" data-bs-toggle="tab"
                        data-bs-target="#category-products-{{ $category->id }}" type="button" role="tab" aria-controls="category-products-{{ $category->id }}"
                        aria-selected="false">{{ $category->name }}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one-all-products" role="tabpanel" aria-labelledby="nav-tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product )
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a
                                        href="{{ route('product_details',['product' => $product->id,'slug' => $product->product_slug]) }}">
                                        <img class="default-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                        <img class="hover-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    {{-- Pass product ID to quickViewLoad --}}
                                    <a onclick="quickViewLoad({{ $product->id }})" aria-label="Quick view" class="action-btn"
                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        @if ($product->discount)
                                        {{ "save ". $product->discount . " %" }}
                                        @elseif ($product->featured)
                                        Featured
                                        @elseif ($product->special_offer)
                                        Special Offer
                                        @elseif($product->special_deal)
                                        Special Deal
                                        @else
                                        New
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('product_by_category', $product->category_id) }}">{{
                                        $product->category?->name }}</a> {{-- Null safe operator for category name --}}
                                </div>
                                <h2><a
                                        href="{{ route('product_details',['product'=>$product->id,'slug' =>$product->product_slug]) }}">{{
                                        $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div> {{-- Consider making rating dynamic --}}
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span> {{-- Consider making rating dynamic --}}
                                </div>
                                <div>
                                    {{-- IMPROVED: Null safe operator for vendor and correct route --}}
                                    <span class="font-small text-muted">By <a
                                            href="{{ $product->vendor_id ? route('vendor_details', $product->vendor_id) : '#' }}">{{
                                            $product->vendor?->name ?? 'Owner' }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    @if($product->discount)
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price - ($product->selling_price * ($product->discount / 100)), 2) }} Dt</span>
                                        <span class="old-price">{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @endif
                                    <div class="add-cart">
                                        {{-- Passing product ID directly to cartSubmit is preferred. The hidden input might be redundant. --}}
                                        <input type="hidden" id="product_new_product_{{$product->id}}" value="{{ $product->id }}">
                                        <a class="add" href="#" onclick="cartSubmit({{ $product->id }})"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Ajouter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Tabs for each category's products --}}
            @foreach ($categories as $category )
            <div class="tab-pane fade" id="category-products-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-tab-category-{{ $category->id }}">
                <div class="row product-grid-4">
                    {{-- Products are eager loaded with categories in the controller: $category->products --}}
                    @forelse ($category->products as $product )
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a
                                        href="{{ route('product_details',['product' => $product->id,'slug' => $product->product_slug]) }}">
                                        <img class="default-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                        <img class="hover-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a onclick="quickViewLoad({{ $product->id }})" aria-label="Quick view" class="action-btn"
                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        @if ($product->discount)
                                        {{ "save ". $product->discount . " %" }}
                                        @elseif ($product->featured)
                                        Featured
                                        @elseif ($product->special_offer)
                                        Special Offer
                                        @elseif($product->special_deal)
                                        Special Deal
                                        @else
                                        New
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('product_by_category', $product->category_id) }}">{{
                                        $product->category?->name }}</a>
                                </div>
                                <h2><a
                                        href="{{ route('product_details',['product' => $product->id,'slug'=>$product->product_slug] )}}">{{
                                        $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="{{ $product->vendor_id ? route('vendor_details',$product->vendor_id) : '#' }}">{{
                                            $product->vendor?->name ?? 'Owner' }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    @if($product->discount)
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price - ($product->selling_price * ($product->discount / 100)), 2) }} Dt</span>
                                        <span class="old-price">{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @endif
                                    <div class="add-cart">
                                        <a class="add" href="#" onclick="cartSubmit({{ $product->id }})"><i class="fi-rs-shopping-cart mr-5"></i>Ajouter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center col-12">No products found in this category.</p>
                    @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Products Tabs-->

<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Produits vedettes </h3>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">عولة الدار... ذوقها حكاية  وسرّها في المحبّة</h2>
                        {{-- Link to the first category from $categories_with_products or $categories as fallback --}}
                        <a href="{{ isset($categories_with_products[0]) ? route('product_by_category', $categories_with_products[0]->id) : (isset($categories[0]) ? route('product_by_category', $categories[0]->id) : '#') }}" class="btn btn-xs">
                            Shop Now <i class="fi-rs-arrow-small-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @foreach ($feature_products as $featured_product )
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="{{ route('product_details',['product' => $featured_product->id,'slug' => $featured_product->product_slug]) }}">
                                                <img class="default-img"
                                                    src="{{ file_exists(public_path('uploaded/product/'.$featured_product->thumbnail)) ? asset('uploaded/product/'.$featured_product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                                    alt="{{ $featured_product->product_name }}" />
                                                <img class="hover-img"
                                                    src="{{ file_exists(public_path('uploaded/product/'.$featured_product->thumbnail)) ? asset('uploaded/product/'.$featured_product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                                    alt="{{ $featured_product->product_name }}" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a>
                                            {{-- CORRECTED: Use $featured_product->id for quickViewLoad --}}
                                            <a onclick="quickViewLoad({{ $featured_product->id }})" aria-label="Quick view" class="action-btn"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">
                                                @if ($featured_product->discount)
                                                {{ "save ". $featured_product->discount . " %" }}
                                                @elseif ($featured_product->featured)
                                                Featured
                                                @elseif ($featured_product->special_offer)
                                                Special Offer
                                                @elseif($featured_product->special_deal)
                                                Special Deal
                                                @else
                                                New
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product_by_category', $featured_product->category_id) }}">{{
                                                $featured_product->category?->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product_details',['product' => $featured_product->id,'slug'=>$featured_product->product_slug] )}}">{{
                                                $featured_product->product_name }}</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="{{ $featured_product->vendor_id ? route('vendor_details', $featured_product->vendor_id) : '#' }}">{{
                                                    $featured_product->vendor?->name ?? 'Owner' }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            @if($featured_product->discount)
                                            <div class="product-price">
                                                <span>{{ number_format($featured_product->selling_price - ($featured_product->selling_price * ($featured_product->discount / 100)), 2) }} Dt</span>
                                                <span class="old-price">{{ number_format($featured_product->selling_price, 2) }} Dt</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>{{ number_format($featured_product->selling_price, 2) }} Dt</span>
                                            </div>
                                            @endif
                                            <div class="add-cart">
                                                <a class="add" href="#" onclick="cartSubmit({{ $featured_product->id }})"><i class="fi-rs-shopping-cart mr-5"></i>Ajouter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Best Sales-->

<!-- Category With Products -->
{{-- $categories_with_products contains the first 3 categories from the controller --}}
@foreach ($categories_with_products as $category_with_prods )
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $category_with_prods->name }} </h3>
        </div>
        <div class="tab-content" id="myTabContent-cat-{{$category_with_prods->id}}"> {{-- Unique ID for tab content --}}
            <div class="tab-pane fade show active" id="tab-cat-{{$category_with_prods->id}}" role="tabpanel" aria-labelledby="tab-cat-{{$category_with_prods->id}}-tab">
                <div class="row product-grid-4">
                    {{-- Products are eager loaded: $category_with_prods->products --}}
                    @forelse ($category_with_prods->products->slice(0,5) as $product )
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a
                                        href="{{ route('product_details',['product' => $product->id,'slug' => $product->product_slug]) }}">
                                        <img class="default-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                        <img class="hover-img"
                                            src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg')  }}"
                                            alt="{{ $product->product_name }}" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a onclick="quickViewLoad({{ $product->id }})" aria-label="Quick view" class="action-btn"
                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        @if ($product->discount)
                                        {{ "save ". $product->discount . " %" }}
                                        @elseif ($product->featured)
                                        Featured
                                        @elseif ($product->special_offer)
                                        Special Offer
                                        @elseif($product->special_deal)
                                        Special Deal
                                        @else
                                        New
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('product_by_category', $product->category_id) }}">{{
                                        $product->category?->name }}</a>
                                </div>
                                <h2><a
                                        href="{{ route('product_details',['product' => $product->id,'slug'=>$product->product_slug] )}}">{{
                                        $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="{{ $product->vendor_id ? route('vendor_details', $product->vendor_id) : '#' }}">{{
                                            $product->vendor?->name ?? 'Owner' }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    @if($product->discount)
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price - ($product->selling_price * ($product->discount / 100)), 2) }} Dt</span>
                                        <span class="old-price">{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 2) }} Dt</span>
                                    </div>
                                    @endif
                                    <div class="add-cart">
                                        <a class="add" href="#" onclick="cartSubmit({{ $product->id }})"><i class="fi-rs-shopping-cart mr-5"></i>Ajouter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center col-12">No products found in this category.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!--End CAtegory with products -->

<section class="section-padding mb-30"style="display: none;">
    <div class="container" >
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">
                    @foreach ($hot_offers as $hot_offer )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a
                                href="{{ route('product_details',['product'=>$hot_offer->id,'slug' => $hot_offer->product_slug]) }}"><img
                                    src="{{ file_exists(public_path('uploaded/product/'.$hot_offer->thumbnail)) ? asset('uploaded/product/'.$hot_offer->thumbnail) : asset('uploaded/no_image.jpg') }}"
                                    alt="{{ $hot_offer->product_name }}" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a
                                    href="{{ route('product_details',['product'=>$hot_offer->id,'slug' => $hot_offer->product_slug]) }}">{{
                                    $hot_offer->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if ($hot_offer->discount)
                                <span>${{ number_format($hot_offer->selling_price - ($hot_offer->selling_price * ($hot_offer->discount/100)), 2) }}</span>
                                <span class="old-price">${{ number_format($hot_offer->selling_price, 2) }}</span>
                                @else
                                <span>${{ number_format($hot_offer->selling_price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
                <div class="product-list-small animated animated">
                    @foreach ($special_offers as $special_offer )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a
                                href="{{ route('product_details',['product'=>$special_offer->id,'slug' => $special_offer->product_slug]) }}"><img
                                    src="{{ file_exists(public_path('uploaded/product/'.$special_offer->thumbnail)) ? asset('uploaded/product/'.$special_offer->thumbnail) : asset('uploaded/no_image.jpg') }}"
                                    alt="{{ $special_offer->product_name }}" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a
                                    href="{{ route('product_details',['product'=>$special_offer->id,'slug' => $special_offer->product_slug]) }}">{{
                                    $special_offer->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if ($special_offer->discount)
                                <span>${{ number_format($special_offer->selling_price - ($special_offer->selling_price * ($special_offer->discount/100)), 2) }}</span>
                                <span class="old-price">${{ number_format($special_offer->selling_price, 2) }}</span>
                                @else
                                <span>${{ number_format($special_offer->selling_price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">
                    @foreach ($recent_products as $recent_product )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a
                                href="{{ route('product_details',['product'=>$recent_product->id,'slug' => $recent_product->product_slug]) }}"><img
                                    src="{{ file_exists(public_path('uploaded/product/'.$recent_product->thumbnail)) ? asset('uploaded/product/'.$recent_product->thumbnail) : asset('uploaded/no_image.jpg') }}"
                                    alt="{{ $recent_product->product_name }}" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a
                                    href="{{ route('product_details',['product'=>$recent_product->id,'slug' => $recent_product->product_slug]) }}">{{
                                    $recent_product->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if ($recent_product->discount)
                                <span>${{ number_format($recent_product->selling_price - ($recent_product->selling_price * ($recent_product->discount/100)), 2) }}</span>
                                <span class="old-price">${{ number_format($recent_product->selling_price, 2) }}</span>
                                @else
                                <span>${{ number_format($recent_product->selling_price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">
                    @foreach ($special_deals as $special_deal )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a
                                href="{{ route('product_details',['product'=>$special_deal->id,'slug' => $special_deal->product_slug]) }}"><img
                                    src="{{ file_exists(public_path('uploaded/product/'.$special_deal->thumbnail)) ? asset('uploaded/product/'.$special_deal->thumbnail) : asset('uploaded/no_image.jpg') }}"
                                    alt="{{ $special_deal->product_name }}" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a
                                    href="{{ route('product_details',['product'=>$special_deal->id,'slug' => $special_deal->product_slug]) }}">{{
                                    $special_deal->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if ($special_deal->discount)
                                <span>${{ number_format($special_deal->selling_price - ($special_deal->selling_price * ($special_deal->discount/100)), 2) }}</span>
                                <span class="old-price">${{ number_format($special_deal->selling_price, 2) }}</span>
                                @else
                                <span>${{ number_format($special_deal->selling_price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End 4 columns-->

<!--Vendor List -->
<div class="container">
    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
        <h3 class="">Toute notre liste de fournisseurs
        </h3>
        <a class="show-all" href="{{ route('vendor_list') }}">
            Tous les fournisseurs
            <i class="fi-rs-angle-right"></i>
        </a>
    </div>
    <div class="row vendor-grid">
        @foreach ($vendor_list as $vendor)
        <div class="col-lg-3 col-md-6 col-12 col-sm-6">
            <div class="vendor-wrap mb-40">
                <div class="vendor-img-action-wrap">
                    <div class="vendor-img">
                        <a href="{{ route('vendor_details', $vendor->id) }}">
                            {{-- CORRECTED: Vendor image display with fallback --}}
                            <img class="default-img"
                                src="{{ ($vendor->photo && file_exists(public_path('uploaded/vendor/'.$vendor->photo))) ? asset('uploaded/vendor/'.$vendor->photo) : asset('uploaded/no_image.jpg') }}"
                                alt="{{ $vendor->name }}" />
                        </a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">Mall</span> {{-- Consider if this badge should be dynamic --}}
                    </div>
                </div>
                <div class="vendor-content-wrap">
                    <div class="d-flex justify-content-between align-items-end mb-30">
                        <div>
                            <div class="product-category">
                                <span class="text-muted">Since {{ $vendor->created_at->format('Y') }}</span>
                            </div>
                            <h4 class="mb-5"><a href="{{ route('vendor_details', $vendor->id) }}">{{ $vendor->name }}</a></h4>
                            <div class="product-rate-cover">
                                <span class="font-small total-product">{{ $vendor->products_count }} products</span>
                            </div>
                        </div>
                    </div>
                    <div class="vendor-info mb-30">
                        <ul class="contact-infor text-muted">
                            @if($vendor->phone)
                            <li><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-contact.svg"
                                    alt="" /><strong>Call Us:</strong><span>{{ $vendor->phone }}</span></li>
                            @endif
                        </ul>
                    </div>
                    <a href="{{ route('vendor_details', $vendor->id) }}" class="btn btn-xs">Visit Store <i
                            class="fi-rs-arrow-small-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--End Vendor List -->

@endsection

@push('scripts')
<script>
    // Ensure quickViewLoad and cartSubmit functions are defined globally or imported correctly
    // For example:
    function quickViewLoad(productId) {
        // Implement your AJAX logic to load product data into the modal
        console.log('Requesting quick view for product ID:', productId);
        // Example: Open modal and show loading, then fetch data
        // $('#quickViewModal').modal('show');
        // $('#quickViewModal .modal-body').html('<p>Loading product details...</p>');
        // $.get('/products/quick-view/' + productId, function(data) {
        //     $('#quickViewModal .modal-body').html(data); // Assuming server returns HTML for modal body
        // });
    }

    function cartSubmit(productId) {
        // Implement your AJAX logic to add product to cart
        console.log('Adding product ID to cart:', productId);
        // Example:
        // $.post('/cart/add', { product_id: productId, _token: '{{ csrf_token() }}' }, function(response) {
        //    if(response.success) {
        //        alert('Product added to cart!');
        //        // Update cart count or UI
        //    } else {
        //        alert('Failed to add product: ' + response.message);
        //    }
        // });
    }
</script>
@endpush