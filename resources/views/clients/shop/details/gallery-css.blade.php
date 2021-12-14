<style>
    .box-gallery {
        width: 90%;
        height: 75%;
        margin: 0 auto;
        overflow: hidden;
    }

    .gallery-slider {
        width: 100%;
        margin: 0 0 10px 0;
        border-radius: 1rem;
        border: 1px solid #D1D5DB;
    }

    .gallery-slider .swiper-slide {
        height: 400px;
    }

    .gallery-slider .swiper-slide img {
        display: block;
        width: 90%;
        height: 90%;
        margin-top: 5%;
        margin-left: 5%;
    }

    .gallery-thumbs {
        width: 100%;
        padding: 0;
        overflow: hidden;
    }

    .gallery-thumbs .swiper-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-thumbs .swiper-slide {
        width: 100px;
        border-radius: 1rem;
        text-align: center;
        overflow: hidden;
    }

    .gallery-thumbs .swiper-slide-active {
        opacity: 1;
    }

    .gallery-thumbs .swiper-slide img {
        width: 100%;
        height: auto;
        margin-left: 5%;
        border-radius: 1rem;
    }

    .swiper-button-prev {
        width: 30px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.3);
        color: #ffffff;
        top: 48%;
        transition: 0.3s;
        outline: none;
        border-radius: 100px 0 0 100px;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        font-size: 16px;
    }

    .swiper-button-next {
        width: 30px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.3);
        color: #ffffff;
        top: 48%;
        transition: 0.3s;
        outline: none;
        border-radius: 0 100px 100px 0;
    }

    div[class*=box-] {
        margin-bottom: 10px;
    }

    .box-promotion {
        width: 100%;
        border: 1px solid #FEE2E2;
        border-radius: 10px;
        overflow: hidden;
    }

    .box-promotion .box-title {
        width: 100%;
        padding: 10px;
        background: #FEE2E2;
    }

    .box-content {
        width: 100%;
        display: inline-block;
        padding: 10px;
    }

    .box-promotion .box-content .list-promotions {
        width: 100%;
        display: inline-block;
        counter-reset: item;
        margin: 0;
        padding: 0 0 0 20px;
        list-style: none;
    }



    .box-title {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .box-promotion .box-title {
        width: 100%;
        padding: 10px;
        background: #FEE2E2;
    }

    .box-promotion .box-title .box-title__title {
        display: flex;
        margin-bottom: 0;
        font-size: 16px;
        color: #D70018;
    }

    .box-title .box-title__title {
        font-weight: 700;
        line-height: 22px;
        color: #444444;
    }

    .box-title .box-title__title svg {
        margin-top: 2px;
    }

    .box-promotion .box-content .list-promotions>.item-promotion:before {
        content: counter(item);
        width: 15px;
        height: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5px;
        border-radius: 50px;
        background: #E11B1E;
        font-size: 10px;
        font-weight: 700;
        color: white;
        text-align: center;
        position: absolute;
        top: 3px;
        left: calc(-15px + -5px);
    }

    .box-content .cps-additional-note {
        width: 100%;
        margin: 10px 0 0 0;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: #FEE2E2;
        font-size: 12px;
        font-weight: 700;
    }

    .box-content .cps-additional-note p {
        margin-bottom: 0;
    }

    .box-content .cps-additional-note a {
        color: #d70018;
        text-decoration: none;
        font-family: sans-serif !important;
    }

    .box-promotion .box-content .list-promotions .item-promotion:not(:last-child) {
        margin-bottom: 5px;
    }

    .box-promotion .box-content .list-promotions .item-promotion>a {
        color: #444444;
    }

    .color-red {
        color: #d70018;
    }

    .box-promotion .box-content .list-promotions .item-promotion {
        counter-increment: item;
        margin-bottom: 0;
        font-size: 14px;
        position: relative;
    }

    .hhVFoh .label {
        font-size: 15px;
        line-height: 1.6;
    }

    .hhVFoh .group-input {
        display: inline-flex;
        -webkit-box-align: center;
        align-items: center;
        margin-top: -16px;
        margin-left: 10px;
    }

    .hhVFoh .group-input span:first-child {
        border-right: none;
        border-radius: 4px 0px 0px 4px;
        padding: 4px;
    }

    .hhVFoh .group-input span {
        cursor: pointer;
        width: 30px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(236, 236, 236);
    }

    .hhVFoh .group-input input {
        width: 40px;
        border: 1px solid rgb(236, 236, 236);
    }

    .hhVFoh .group-input span,
    .hhVFoh .group-input input {
        height: 30px;
        color: rgb(36, 36, 36);
        font-size: 14px;
        text-align: center;
        outline: none;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    }

    .hhVFoh .disable {
        pointer-events: none !important;
    }

    .price-and-icon {
        display: flex;
        flex-direction: column;
        border-radius: 4px;
        background-color: rgb(250, 250, 250);
        padding: 0px 0px 12px;
    }

    .price-and-icon .product-price {
        padding-top: 12px;
        display: flex;
        align-items: flex-end;
        color: rgb(56, 56, 61);
    }

    .price-and-icon .product-price__current-price,
    .total_product_price span {
        font-size: 1.25rem;
        line-height: 40px;
        margin-right: 8px;
        font-weight: 700;
        color: #D70018;
    }

    #thumbnails img,
    #main {
        box-shadow: none !important;
    }

    .boxed-check .cpslazy {
        width: 30px;
        height: auto;
    }

    .boxed-check-text {
        display: flex;
    }

    .boxed-check-label .boxed-check-text p {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
        font-size: 12px;
        color: #444444;
    }

    .boxed-check-label .boxed-check-text img {
        width: 26px;
        height: auto;
        margin-top: 8px;
        margin-bottom: 8px;
        margin-right: 5px;
    }
</style>