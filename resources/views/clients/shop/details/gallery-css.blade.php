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




    .box-promotion-more {
        width: 100%;
        margin-bottom: 20px !important;
        border: 1px solid #D1D5DB;
        border-radius: 10px;
        overflow: hidden;
    }

    .box-promotion-more .box-title {
        width: 100%;
        padding: 8px 10px;
        background: #D1D5DB;
    }

    .box-promotion-more .box-title .box-title__title {
        margin-bottom: 0;
        font-size: 14px;
        text-transform: uppercase;
        color: #444444;
    }

    .box-promotion-more .box-content {
        padding: 10px;
    }

    .box-promotion-more .box-content .list-promotions {
        width: 100%;
        display: inline-block;
        counter-reset: item;
        margin: 0;
        padding: 0 0 0 20px;
        list-style: none;
    }

    .box-promotion-more .box-content .list-promotions .item-promotion {
        counter-increment: item;
        margin-bottom: 0;
        font-size: 12px;
        color: #444444;
        position: relative;
    }

    .box-promotion-more .box-content .list-promotions .item-promotion>a {
        color: #444444;
        cursor: pointer;
    }

    .box-promotion-more .box-content .list-promotions .item-promotion:not(:last-child) {
        margin-bottom: 5px;
    }

    .box-promotion-more .box-content .list-promotions .item-promotion:before {
        content: "";
        width: 12px;
        height: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5px;
        padding: 2px 0 0 0;
        border-radius: 50px;
        background: #2BA832;
        background-image: url(https://cdn.cellphones.com.vn/media/icons/checkmark.svg);
        background-size: 63%;
        background-repeat: no-repeat;
        background-position: center;
        color: #ffffff;
        position: absolute;
        top: 4px;
        left: calc(-12px + -5px);
    }

    .egheYC {
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        background: linear-gradient(100deg, rgb(255, 66, 78), rgb(253, 130, 10));
        color: rgb(255, 255, 255);
        padding: 4px 16px 6px;
        /* margin: 0px -16px; */
        border-radius: 4px;
        width: 500px;
    }

    .egheYC>.flash-sale-price>span {
        font-size: 32px;
        font-weight: bold;
        line-height: 40px;
    }

    .egheYC>.flash-sale-price .list-price {
        color: rgba(255, 255, 255, 0.5);
        text-decoration: line-through;
        margin-right: 8px;
    }

    .egheYC .sale>span {
        font-size: 13px;
        line-height: 20px;
    }

    .egheYC>.flash-sale-countdown {
        margin-top: 2px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .egheYC>.flash-sale-countdown {
        margin-top: 2px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .egheYC>.flash-sale-countdown>span {
        font-size: 13px;
        line-height: 20px;
    }

    .egheYC>.flash-sale-countdown .time {
        color: rgb(255, 66, 78);
        display: flex;
    }

    .egheYC>.flash-sale-countdown .status {
        margin-top: 6px;
    }

    .egheYC>.flash-sale-countdown>span {
        font-size: 13px;
        line-height: 20px;
    }
</style>