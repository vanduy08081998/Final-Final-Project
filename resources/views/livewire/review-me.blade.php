<div>
    <div class="container-fluid" style="position:relative">
        <h3> Đánh giá của bạn </h3>
        <div class="d-flex pb-4">
            <div class="d-flex flex-nowrap align-items-center sort-star">
                <form wire:submit.prevent="render()">
                <button data-id="all"
                    class="move-top filterstar-all check-filterstar {{ $check == '' ? 'active' : '' }}">Tất
                    cả</button>

                <input
                    class="form-check-input d-none check-star-5 {{ $check == 'fivestar' ? 'check-star-active' : '' }}"
                    wire:model="checkfivestar" value="5star" type="checkbox" id="review_image_5">
                <button data-id="5"
                    class="move-top filterstar-5 check-filterstar  {{ $check == 'fivestar' ? 'active' : '' }}">5
                    sao</button>
                <input
                    class="form-check-input d-none check-star-4 {{ $check == 'fourstar' ? 'check-star-active' : '' }}"
                    wire:model="checkfourstar" value="4star" type="checkbox" id="review_image_4">
                <button data-id="4"
                    class="move-top filterstar-4 check-filterstar  {{ $check == 'fourstar' ? 'active' : '' }}">4
                    sao</button>
                <input
                    class="form-check-input d-none check-star-3 {{ $check == 'threestar' ? 'check-star-active' : '' }}"
                    wire:model="checkthreestar" value="3star" type="checkbox" id="review_image_3">
                <button data-id="3"
                    class="move-top filterstar-3 check-filterstar  {{ $check == 'threestar' ? 'active' : '' }}">3
                    sao</button>
                <input
                    class="form-check-input d-none check-star-2 {{ $check == 'twostar' ? 'check-star-active' : '' }}"
                    wire:model="checktwostar" value="2star" type="checkbox" id="review_image_2">
                <button data-id="2"
                    class="move-top filterstar-2 check-filterstar  {{ $check == 'twostar' ? 'active' : '' }}">2
                    sao</button>
                <input
                    class="form-check-input d-none check-star-1 {{ $check == 'onestar' ? 'check-star-active' : '' }}"
                    wire:model="checkonestar" value="1star" type="checkbox" id="review_image_1">
                <button data-id="1"
                    class="move-top filterstar-1 check-filterstar  {{ $check == 'onestar' ? 'active' : '' }}">1
                    sao</button>
                </form>
            </div>
        </div>
      
  

    </div>
</div>
<style>
    a.nav-link.btn-review {
        color: white;
    }

    a.nav-link.btn-review.active {
        color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        background: #0bc589 !important;
    }

    a.nav-link.btn-review {
        color: white;
        background: #aaadac !important;
    }

    .nav-tabs .nav-link.active::before {
        background-color: #0bc589;
    }

</style>
<script>
    $('.check-filterstar').click(function() {
        var sort_filterstar = $(this).data('id');
        $('.check-star-active').click();
        $("#review_image_" + sort_filterstar).click();
        $(".check-star-" + sort_filterstar).addClass('check-star-active');

    })
</script>
