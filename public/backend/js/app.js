/*
Author       : Dreamguys
Template Name: SmartHR - Bootstrap Admin Template
Version      : 3.6
*/

$(document).ready(function() {
    // Variables declarations

    var $wrapper = $(".main-wrapper");
    var $pageWrapper = $(".page-wrapper");
    var $slimScrolls = $(".slimscroll");

    // Sidebar

    var Sidemenu = function() {
        this.$menuItem = $("#sidebar-menu a");
    };

    function init() {
        var $this = Sidemenu;
        $("#sidebar-menu a").on("click", function(e) {
            if ($(this).parent().hasClass("submenu")) {
                e.preventDefault();
            }
            if (!$(this).hasClass("subdrop")) {
                $("ul", $(this).parents("ul:first")).slideUp(350);
                $("a", $(this).parents("ul:first")).removeClass("subdrop");
                $(this).next("ul").slideDown(350);
                $(this).addClass("subdrop");
            } else if ($(this).hasClass("subdrop")) {
                $(this).removeClass("subdrop");
                $(this).next("ul").slideUp(350);
            }
        });
        $("#sidebar-menu ul li.submenu a.active")
            .parents("li:last")
            .children("a:first")
            .addClass("active")
            .trigger("click");
    }

    // Sidebar Initiate
    init();

    // Mobile menu sidebar overlay

    $("body").append('<div class="sidebar-overlay"></div>');
    $(document).on("click", "#mobile_btn", function() {
        $wrapper.toggleClass("slide-nav");
        $(".sidebar-overlay").toggleClass("opened");
        $("html").addClass("menu-opened");
        $("#task_window").removeClass("opened");
        return false;
    });

    $(".sidebar-overlay").on("click", function() {
        $("html").removeClass("menu-opened");
        $(this).removeClass("opened");
        $wrapper.removeClass("slide-nav");
        $(".sidebar-overlay").removeClass("opened");
        $("#task_window").removeClass("opened");
    });

    // Chat sidebar overlay

    $(document).on("click", "#task_chat", function() {
        $(".sidebar-overlay").toggleClass("opened");
        $("#task_window").addClass("opened");
        return false;
    });

    // Select 2

    if ($(".select").length > 0) {
        $(".select").select2({
            minimumResultsForSearch: -1,
            width: "100%",
        });
    }

    // Modal Popup hide show

    if ($(".modal").length > 0) {
        var modalUniqueClass = ".modal";
        $(".modal").on("show.bs.modal", function(e) {
            var $element = $(this);
            var $uniques = $(modalUniqueClass + ":visible").not($(this));
            if ($uniques.length) {
                $uniques.modal("hide");
                $uniques.one("hidden.bs.modal", function(e) {
                    $element.modal("show");
                });
                return false;
            }
        });
    }

    // Floating Label

    if ($(".floating").length > 0) {
        $(".floating")
            .on("focus blur", function(e) {
                $(this)
                    .parents(".form-focus")
                    .toggleClass(
                        "focused",
                        e.type === "focus" || this.value.length > 0
                    );
            })
            .trigger("blur");
    }

    // Sidebar Slimscroll

    if ($slimScrolls.length > 0) {
        $slimScrolls.slimScroll({
            height: "auto",
            width: "100%",
            position: "right",
            size: "7px",
            color: "#ccc",
            wheelStep: 10,
            touchScrollStep: 100,
        });
        var wHeight = $(window).height() - 60;
        $slimScrolls.height(wHeight);
        $(".sidebar .slimScrollDiv").height(wHeight);
        $(window).resize(function() {
            var rHeight = $(window).height() - 60;
            $slimScrolls.height(rHeight);
            $(".sidebar .slimScrollDiv").height(rHeight);
        });
    }

    // Page Content Height

    var pHeight = $(window).height();
    $pageWrapper.css("min-height", pHeight);
    $(window).resize(function() {
        var prHeight = $(window).height();
        $pageWrapper.css("min-height", prHeight);
    });

    // Date Time Picker

    if ($(".datetimepicker").length > 0) {
        $(".datetimepicker").datetimepicker({
            format: "DD/MM/YYYY",
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: "fa fa-angle-right",
                previous: "fa fa-angle-left",
            },
        });
    }

    // Datatable

    if ($(".datatable").length > 0) {
        $(".datatable").DataTable({
            bFilter: false,
            searching: true,
        });
    }

    // Tooltip

    if ($('[data-toggle="tooltip"]').length > 0) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // Email Inbox

    if ($(".clickable-row").length > 0) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    }

    // Check all email

    $(document).on("click", "#check_all", function() {
        $(".checkmail").click();
        return false;
    });
    if ($(".checkmail").length > 0) {
        $(".checkmail").each(function() {
            $(this).on("click", function() {
                if ($(this).closest("tr").hasClass("checked")) {
                    $(this).closest("tr").removeClass("checked");
                } else {
                    $(this).closest("tr").addClass("checked");
                }
            });
        });
    }

    // Mail important

    $(document).on("click", ".mail-important", function() {
        $(this).find("i.fa").toggleClass("fa-star").toggleClass("fa-star-o");
    });

    // Summernote

    if ($(".summernote").length > 0) {
        $(".summernote").summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });
    }

    // Task Complete

    $(document).on("click", "#task_complete", function() {
        $(this).toggleClass("task-completed");
        return false;
    });

    // Multiselect

    if ($("#customleave_select").length > 0) {
        $("#customleave_select").multiselect();
    }
    if ($("#edit_customleave_select").length > 0) {
        $("#edit_customleave_select").multiselect();
    }

    // Leave Settings button show

    $(document).on("click", ".leave-edit-btn", function() {
        $(this)
            .removeClass("leave-edit-btn")
            .addClass("btn btn-white leave-cancel-btn")
            .text("Cancel");
        $(this)
            .closest("div.leave-right")
            .append(
                '<button class="btn btn-primary leave-save-btn" type="submit">Save</button>'
            );
        $(this).parent().parent().find("input").prop("disabled", false);
        return false;
    });
    $(document).on("click", ".leave-cancel-btn", function() {
        $(this)
            .removeClass("btn btn-white leave-cancel-btn")
            .addClass("leave-edit-btn")
            .text("Edit");
        $(this).closest("div.leave-right").find(".leave-save-btn").remove();
        $(this).parent().parent().find("input").prop("disabled", true);
        return false;
    });

    $(document).on("change", ".leave-box .onoffswitch-checkbox", function() {
        var id = $(this).attr("id").split("_")[1];
        if ($(this).prop("checked") == true) {
            $("#leave_" + id + " .leave-edit-btn").prop("disabled", false);
            $("#leave_" + id + " .leave-action .btn").prop("disabled", false);
        } else {
            $("#leave_" + id + " .leave-action .btn").prop("disabled", true);
            $("#leave_" + id + " .leave-cancel-btn")
                .parent()
                .parent()
                .find("input")
                .prop("disabled", true);
            $("#leave_" + id + " .leave-cancel-btn")
                .closest("div.leave-right")
                .find(".leave-save-btn")
                .remove();
            $("#leave_" + id + " .leave-cancel-btn")
                .removeClass("btn btn-white leave-cancel-btn")
                .addClass("leave-edit-btn")
                .text("Edit");
            $("#leave_" + id + " .leave-edit-btn").prop("disabled", true);
        }
    });

    $(".leave-box .onoffswitch-checkbox").each(function() {
        var id = $(this).attr("id").split("_")[1];
        if ($(this).prop("checked") == true) {
            $("#leave_" + id + " .leave-edit-btn").prop("disabled", false);
            $("#leave_" + id + " .leave-action .btn").prop("disabled", false);
        } else {
            $("#leave_" + id + " .leave-action .btn").prop("disabled", true);
            $("#leave_" + id + " .leave-cancel-btn")
                .parent()
                .parent()
                .find("input")
                .prop("disabled", true);
            $("#leave_" + id + " .leave-cancel-btn")
                .closest("div.leave-right")
                .find(".leave-save-btn")
                .remove();
            $("#leave_" + id + " .leave-cancel-btn")
                .removeClass("btn btn-white leave-cancel-btn")
                .addClass("leave-edit-btn")
                .text("Edit");
            $("#leave_" + id + " .leave-edit-btn").prop("disabled", true);
        }
    });

    // Placeholder Hide

    if (
        $(".otp-input, .zipcode-input input, .noborder-input input").length > 0
    ) {
        $(".otp-input, .zipcode-input input, .noborder-input input")
            .focus(function() {
                $(this)
                    .data("placeholder", $(this).attr("placeholder"))
                    .attr("placeholder", "");
            })
            .blur(function() {
                $(this).attr("placeholder", $(this).data("placeholder"));
            });
    }

    // OTP Input

    if ($(".otp-input").length > 0) {
        $(".otp-input").keyup(function(e) {
            if (
                (e.which >= 48 && e.which <= 57) ||
                (e.which >= 96 && e.which <= 105)
            ) {
                $(e.target).next(".otp-input").focus();
            } else if (e.which == 8) {
                $(e.target).prev(".otp-input").focus();
            }
        });
    }

    // Small Sidebar

    $(document).on("click", "#toggle_btn", function() {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").removeClass("mini-sidebar");
            $(".subdrop + ul").slideDown();
        } else {
            $("body").addClass("mini-sidebar");
            $(".subdrop + ul").slideUp();
        }
        return false;
    });
    $(document).on("mouseover", function(e) {
        e.stopPropagation();
        if (
            $("body").hasClass("mini-sidebar") &&
            $("#toggle_btn").is(":visible")
        ) {
            var targ = $(e.target).closest(".sidebar").length;
            if (targ) {
                $("body").addClass("expand-menu");
                $(".subdrop + ul").slideDown();
            } else {
                $("body").removeClass("expand-menu");
                $(".subdrop + ul").slideUp();
            }
            return false;
        }
    });

    $(document).on("click", ".top-nav-search .responsive-search", function() {
        $(".top-nav-search").toggleClass("active");
    });

    $(document).on("click", "#file_sidebar_toggle", function() {
        $(".file-wrap").toggleClass("file-sidebar-toggle");
    });

    $(document).on("click", ".file-side-close", function() {
        $(".file-wrap").removeClass("file-sidebar-toggle");
    });

    if ($(".kanban-wrap").length > 0) {
        $(".kanban-wrap").sortable({
            connectWith: ".kanban-wrap",
            handle: ".kanban-box",
            placeholder: "drag-placeholder",
        });
    }
});

// Loader

$(window).on("load", function() {
    $("#loader").delay(100).fadeOut("slow");
    $("#loader-wrapper").delay(500).fadeOut("slow");
});

const toastrOptions = () => {
        let options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        return options;
    }
    //Add_variants
$(".add_variants").on("click", function() {
    var attri_id = $(".route").data("id");
    var url = $(this).data("url");
    var name = $(".name").val();
    var slug = $(".slug").val();
    $.ajax({
        url: url,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: { name: name, slug: slug, attri_id: attri_id },
        success: function(data) {
            toastr.success('Th??m bi???n th??? th??nh c??ng', 'success', toastrOptions());
            list_variants();
            $(".form-control").reset();
        },
    });
});

function ChangeToSlug() {
    var slug;
    slug = document.getElementById("slug").value;
    slug = slug.toLowerCase();
    slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, "a");
    slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, "e");
    slug = slug.replace(/i|??|??|???|??|???/gi, "i");
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, "o");
    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, "u");
    slug = slug.replace(/??|???|???|???|???/gi, "y");
    slug = slug.replace(/??/gi, "d");

    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );

    slug = slug.replace(/ /gi, "-");

    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");

    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");

    document.getElementById("convert_slug").value = slug;
}

//List variants
function list_variants() {
    var url = $(".route").data("url");
    var id = $(".route").data("id");
    $.ajax({
        url: url,
        method: "GET",
        data: { id: id },
        success: function(data) {
            data = JSON.parse(data);
            var html = "";
            for (var item in data) {
                html += ` <tr>
				<td>${data[item]["name"]}</td>
				<td>${data[item]["slug"]}</td>
				<td class="text-center">
				 <button type="button" onclick="delete_variants(${data[item]["id"]})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
				</td>
			</tr>`;
            }
            $("#list_variants").html(html);
        },
    });
}

function delete_variants(id) {
    var url = $(".route").data("delete");
    $.ajax({
        url: url,
        method: "GET",
        data: { id: id },
        success: function(data) {
            toastr.success('X??a bi???n th??? th??nh c??ng', 'success');
            list_variants();
        },
    });
}



function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    let preview = $(`#${field_id}`).attr('data-preview');
    let dir = $('#__dir').val()
    let upload = $(`#${field_id}`).attr('data-upload')
    try {
        let args = $.parseJSON(url);
        let output = '';
        $(`input[name="${upload}"]`).val(args.join(','))
        for (let i = 0; i < args.length; i++) {
            output += `<img src="${dir}/${args[i]}" width="80" hetght="80">`
        }
        $(`#${preview}`).html(output)
    } catch (e) {
        $(`#${preview}`).html(`<img src="${dir}/${url}" width="80" hetght="80">`)
        $(`input[name="${upload}"]`).val(url)
    }
    // console.log(dir)
}


$("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("bx-hide");
        $('#show_hide_password i').removeClass("bx-show");
    } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("bx-hide");
        $('#show_hide_password i').addClass("bx-show");
    }
});

$("#show_hide_password2 a").on('click', function(event) {
    event.preventDefault();
    if ($('#show_hide_password2 input').attr("type") == "text") {
        $('#show_hide_password2 input').attr('type', 'password');
        $('#show_hide_password2 i').addClass("bx-hide");
        $('#show_hide_password2 i').removeClass("bx-show");
    } else if ($('#show_hide_password2 input').attr("type") == "password") {
        $('#show_hide_password2 input').attr('type', 'text');
        $('#show_hide_password2 i').removeClass("bx-hide");
        $('#show_hide_password2 i').addClass("bx-show");
    }
});
