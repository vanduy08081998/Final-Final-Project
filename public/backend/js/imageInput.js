console.log("added");
const singleModalShow = () => {
    $("#filemanagerModal").modal("show");
};

const multipleModalShow = () => {
    $("#filemanagerModalMultiple").modal("show");
};

$("#filemanagerModal").on("hide.bs.modal", (event) => {
    let image = $("#image").val();
    let imageValue = "{{ url('uploads/') }}";
    $("#render__image__single").html(
        `<img src="${imageValue}/${image}" width="150px" height="150px" id="" alt="">`
    );
});

$("#filemanagerModalMultiple").on("hide.bs.modal", (event) => {
    let multipleImage = $("#multipleImage").val();
    let renderMultipleImage = "";

    try {
        var args = JSON.parse(multipleImage);
        for (let i = 0; i < args.length; i++) {
            renderMultipleImage += `<img src="{{ url('uploads/${args[i]}') }}" width="150" style="margin: 15px" height="150" />`;
        }
        $("#render__image__multiple").html(renderMultipleImage);
    } catch (e) {
        renderMultipleImage += `<img src="{{ url('uploads/${multipleImage}') }}" width="150" style="margin: 15px" height="150" />`;
        $("#render__image__multiple").html(renderMultipleImage);
    }
});
