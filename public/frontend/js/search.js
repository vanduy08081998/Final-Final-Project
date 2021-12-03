jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: {
            url: 'http://127.0.0.1:8000/key=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('key'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        name: 'productList',
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item"> Không có kết quả phù hợp! </div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function(data) {
                return '<a href="http://127.0.0.1:8000/shop/product-details/' + data.product_slug + '" class="list-group-item"><i class="fas fa-search"></i> ' + data.product_name + '</a>'
            }
        }
    });
});
