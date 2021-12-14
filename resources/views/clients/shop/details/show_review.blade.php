@extends('layouts.client_master')


@section('title', $product->product_name)

@section('meta')
    <meta name="description" content="{!! $product->meta_description !!}">
    <meta name="keywords" content="{!! $product->meta_keywords !!}">
    <meta name="author" content="{!! $product->meta_title !!}">
@endsection

@section('content')
    <hr class="mb-5">
    @livewire('reviews',['product' => $product])
@endsection

@push('script')

    <script type="text/javascript">
        $('.wrap-rating').each(function() {
            var item = $(this).find('.item-rating');
            var rated = -1;

            //Lúc di chuột vào tp
            $(item).on('mouseenter', function() {
                var index = item.index(this);
                var i = 0;
                for (i = 0; i <= index; i++) {
                    $(item[i]).removeClass('ci-star');
                    $(item[i]).addClass('ci-star-filled');
                }

                for (var j = i; j < item.length; j++) {
                    $(item[j]).addClass('ci-star');
                    $(item[j]).removeClass('ci-star-filled');
                }

            });

            $(item).on('click', function() {
                var index = item.index(this);
                rated = index;
                $('.text-rating_' + [index]).css({
                    'color': '#fe8c23',
                    'font-weight': 'bold'
                });
                for (var t = 0; t <= 4; t++) {
                    if (t != index) {
                        $('.text-rating_' + [t]).removeAttr('style');
                    }
                }

            });


            //Lúc di chuột ra khỏi tp
            $(this).on('mouseleave', function() {
                var i = 0;
                for (i = 0; i <= rated; i++) {
                    $(item[i]).removeClass('ci-star');
                    $(item[i]).addClass('ci-star-filled');
                }
                for (var j = i; j < item.length; j++) {
                    $(item[j]).addClass('ci-star');
                    $(item[j]).removeClass('ci-star-filled');
                }
            });
        });
        $(document).on('click', '.item-rating', function() {
            $('.count-rating').val($(this).data('count'));
        })
    </script>
@endpush
