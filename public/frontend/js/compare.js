function delete_compare(id) {
    if (localStorage.getItem("compare") != null) {
        var data = JSON.parse(localStorage.getItem("compare"));
        var index = data.filter((item) => item.id != id);
        localStorage.setItem("compare", JSON.stringify(index));
        document.getElementById("row_compare" + id).remove();
    }
}


function show() {
    $("#sosanh").modal("show");
}

function add_compare(product_id) {
    $("#title-compare").innerText = "Chỉ cho phép so sánh 3 sản phẩm";
    var id = product_id;
    var name = document.getElementById("wishlist_productname" + id).value;
    var content = document.getElementById("wishlist_productsku" + id).value;
    //  var value = document.getElementById('wishlist_skuvalue'+id).value;
    var price = document.getElementById("wishlist_productprice" + id).value;
    var img = document.getElementById("wishlist_productimg" + id).value;
    var url = document.getElementById("wishlist_producturl" + id).href;
    var newItem = {
        url: url,
        id: id,
        name: name,
        price: price,
        img: img,
        content: content,
    };
    if (localStorage.getItem("compare") == null) {
        localStorage.setItem("compare", "[]");
    }
    var old_data = JSON.parse(localStorage.getItem("compare"));
    var matches = $.grep(old_data, function (obj) {
        return obj.id == id;
    });

    if (matches.length) {
        toastr.error(
            "Sản phẩm đã có trong so sánh",
            "Xin mời chọn sản phẩm khác"
        );
        //   alert('Sản phẩm đã có trong so sánh');
        localStorage.setItem("compare", JSON.stringify(old_data));
        // $('#sosanh').modal('show');
    } else {
        if (old_data.length <= 2) {
            old_data.push(newItem);
            var html = "";
            let list_compare = "";

            html +=
                `<div class="col-sm-4" id="row_compare` +
                newItem.id +
                `">
                       <span><img width="200px" style="padding: 10px;" src="` +
                newItem.img +
                `"></span>
                       <div style="padding: 10px;">
                           <span><a href="` +
                newItem.url +
                `" style="color:black;">` +
                newItem.name +
                `</a></span>
                           <p> <b style="text-align:center">` +
                newItem.price +
                `VNĐ</b> </p>
                           <a href="` +
                newItem.url +
                `" style="color:green;cursor:pointer";position: absolute;top: 3px;right: 60px; class="deleteProduct" >Xem chi tiết</a> &nbsp;|&nbsp;
                           <a style="cursor:pointer";position: absolute;top: 3px;right: 60px; class="deleteProduct" onclick="delete_compare(` +
                id +
                `)">Xóa so sánh</a>
                       </div>
                       <strong style="background-color: #f1f1f1;text-transform: uppercase;padding: 8px;display: block;"> Thông số kỹ thuật</strong>
                       <div>
                       <ul class="compare-list-attribute-${newItem.id}">

                       </ul>
                       </div>
                   </div>`;
            //foreach item conten ra gắn vào list_compare
            $.each(JSON.parse(newItem.content), function (index, value) {
                list_compare += `<li>${value.specifications}: ${value.value}</li>`;
            });
            $("#row_compare").find(".anh").append(html);
            //gắn list compare vào html
            $(`.compare-list-attribute-${newItem.id}`).html(list_compare);
            $("#sosanh").modal("show");
        } else {
            toastr.error("Chỉ có thể so sánh tối đa 3 sản phẩm", "Rất tiếc");
        }
        localStorage.setItem("compare", JSON.stringify(old_data));
    }
}
