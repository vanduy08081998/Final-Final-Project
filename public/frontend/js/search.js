jQuery(document).ready(function($) {
    let url_to = $('meta[name="url-to"]').attr('content')
    const formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    })

    var engine = new Bloodhound({
        remote: {
            url: url_to+'/search?key=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('key'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    }, {
        displayKey: 'value',
        source: engine.ttAdapter(),
        name: 'productList',
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item"> Không có kết quả phù hợp! </div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown"><li class="product-suggest">'
            ],
            suggestion: function(data) {
                return '<a href="' + url_to + '/shop/product-details/' + data.product_slug + '" class="list-group-item"><div class="item-img"><img src="'+url_to+'/'+ data.product_image + '" height="60" width="50" style="margin-right: 20px"></div><div class="item-info"><span class="search-name">' + data.product_name + '</span><p class="search-price">' + formatter.format(data.unit_price) + '</p></div></a></li></div>'
            }
        }
    });
});
