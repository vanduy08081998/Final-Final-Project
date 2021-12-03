const formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0
})
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = formatter.format(slider.value);

slider.oninput = function() {
    output.innerHTML = formatter.format(this.value);
}