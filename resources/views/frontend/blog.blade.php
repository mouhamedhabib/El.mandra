@extends('frontend.layout.frontend_master')
@section('frontend')

<section class="featured">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <article class="featured-post">
          <div class="featured-post-content">
            <div class="featured-post-author">
              <img src="{{ asset('images/authors/author1.png') }}" alt="auteur" />
              <p>بقلم <span>أم أنور</span></p>
            </div>
            <a href="" class="featured-post-title">
              طريقة تخزين الهريسة في جرة تقليدية
            </a>
            <ul class="featured-post-meta">
              <li>
                <i class="fa fa-clock-o"></i>
                10 جوان 2025 - قراءة 3 دقائق
              </li>
            </ul>
          </div>
          <div class="featured-post-thumb">
            <img src="{{ asset('images/blog/featured-chili.jpg') }}" alt="feature-post-thumb" />
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog-section-title">
          <h2>مقالات حول العولة</h2>
          <p>اكتشف طرق وتقنيات التحضير والتخزين التقليدي</p>
        </div>

        {{-- مثال لمقالة --}}
        <article class="blog-post">
          <div class="blog-post-thumb">
            <img src="{{ asset('images/blog/blog-thum-keskes.jpg') }}" alt="كسكاس" />
          </div>
          <div class="blog-post-content">
            <div class="blog-post-tag">
              <a href="">مطبخ</a>
            </div>
            <div class="blog-post-title">
              <a href="">فوائد خزن الكسكسي في القفة</a>
            </div>
            <div class="blog-post-meta">
              <ul>
                <li>بقلم <a href="#">خالتي مبروكة</a></li>
                <li><i class="fa fa-clock-o"></i> 7 جوان 2025 - 2 دقائق</li>
              </ul>
            </div>
            <p>تعرف على الطريقة التقليدية لتخزين الكسكسي في مناطق الشمال الغربي...</p>
            <a href="" class="blog-post-action">اقرأ المزيد <i class="fa fa-angle-right"></i></a>
          </div>
        </article>

        {{-- أضف بقية المقالات بنفس الشكل --}}

        {{-- Pagination --}}
        <div class="blog-post-pagination">
          <nav aria-label="Page navigation example" class="nav-bg">
            <ul class="pagination">
              <li class="page-item"><a class="page-link active" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

      {{-- Sidebar --}}
      <div class="col-lg-4">
        <div class="blog-post-widget">
          <div class="latest-widget-title">
            <h2>مقالات رائجة</h2>
          </div>

          <div class="latest-widget">
            <div class="latest-widget-thum">
              <a href="#"><img src="{{ asset('images/blog/blog-thum-harissa.jpg') }}" alt="الهريسة" /></a>
              <div class="icon"><img src="{{ asset('images/blog/icon.svg') }}" alt="icon" /></div>
            </div>
            <div class="latest-widget-content">
              <div class="content-title">
                <a href="#">طرق تخزين الهريسة الحمراء دون مواد حافظة</a>
              </div>
              <div class="content-meta">
                <ul><li><i class="fa fa-clock-o"></i> 5 جوان 2025 - 2 دقائق</li></ul>
              </div>
            </div>
          </div>

          {{-- أضف المزيد حسب الحاجة --}}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
