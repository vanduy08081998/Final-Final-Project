@extends('layouts.client_master')

@section('title','Flash Sale')

@section('content')
<!-- Page Title-->
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Trang
                chủ</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Flash Sale</a>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 text-center">
          <h1 class="h5 text-light mb-0">
            Flash-sale</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid pb-5 mb-2 mb-md-4">
    <div class="row justify-content-center">
      <section class="col-lg-10 tab-content-shop" style="padding-right: 50px;">
        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5"></div>
        <!-- Products grid-->
        <div class="row mx-n2 mt-5" id="product-short">
          <!-- Product-->
          @foreach ($flashDeals as $item)
              <div class="col-lg-6 col-md-12 col-sm-12 px-2 mb-4">
              <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden"
                  href="{{ route('client-flash-deals.show', $item->id) }}"">
                  <div style="width: 70%;height: 300px; margin-left: 15%">
                      <img srcset="{{ asset($item->banner) }} 2x" alt="Product" width="100%" height="400px"
                    style="margin: auto; display: block">
                  </div>
                </a>
                <div class="card-body py-2 text-center"><a class="product-meta d-block fs-xs pb-1 category-name"
                    href="#"></a>
                  <h3 class="product-title fs-sm"><a
                      href="{{ route('client-flash-deals.show', $item->id) }}" style="font-size: 20px">{{ $item->title }}</a>
                  </h3>
                  <div>
                    <div class="product-price text-center"><span class="text-accent">
                        Khuyến mãi: {{ $item->discount }} %</span>
                    </div>
                  </div>
                </div>
                <!-- Quick View Modal-->
              </div>
            </div>
          @endforeach
            <hr class="d-sm-none">
        </div>

        <!-- Pagination-->
        <nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">
            {{ $flashDeals->render() }}
        </nav>
      </section>
    </div>
  </div>
@endsection
