$(function () {
	"use strict";
	// search bar
	$(".search-btn-mobile").on("click", function () {
		$(".search-bar").addClass("full-search-bar");
	});
	$(".search-arrow-back").on("click", function () {
		$(".search-bar").removeClass("full-search-bar");
	});
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 300) {
				$('.top-header').addClass('sticky-top-header');
			} else {
				$('.top-header').removeClass('sticky-top-header');
			}
		});
		$('.back-to-top').on("click", function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	$(function () {
		$('.metismenu-card').metisMenu({
			toggle: false,
			triggerElement: '.card-header',
			parentTrigger: '.card',
			subMenu: '.card-body'
		});
	});
	// Tooltips 
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	// Metishmenu card collapse
	$(function () {
		$('.card-collapse').metisMenu({
			toggle: false,
			triggerElement: '.card-header',
			parentTrigger: '.card',
			subMenu: '.card-body'
		});
	});
	// toggle menu button
	$(".toggle-btn").click(function () {
		if ($(".wrapper").hasClass("toggled")) {
			// unpin sidebar when hovered
			$(".wrapper").removeClass("toggled");
			$(".sidebar-wrapper").unbind("hover");
		} else {
			$(".wrapper").addClass("toggled");
			$(".sidebar-wrapper").hover(function () {
				$(".wrapper").addClass("sidebar-hovered");
			}, function () {
				$(".wrapper").removeClass("sidebar-hovered");
			})
		}
	});
	$(".toggle-btn-mobile").on("click", function () {
		$(".wrapper").removeClass("toggled");
	});
	// chat toggle
	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled");
	});
	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled");
	});
	// email toggle
	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled");
	});
	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled");
	});
	// compose mail
	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show();
	});
	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide();
	});
	// === sidebar menu activation js
	$(function () {
		for (var i = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == i;
		}).addClass("").parent().addClass("mm-active");;) {
			if (!o.is("li")) break;
			o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
		}
	}),
	// metismenu
	$(function () {
		$('#menu').metisMenu();
	});
	/* Back To Top */
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 300) {
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});
		$('.back-to-top').on("click", function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	/*switcher*/
	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});
	$("#darkmode").on("click", function () {
		$("html").addClass("dark-theme");
	});
	$("#lightmode").on("click", function () {
		$("html").removeClass("dark-theme");
	});
	$("#DarkSidebar").on("click", function () {
		$("html").toggleClass("dark-sidebar");
	});
	$("#ColorLessIcons").on("click", function () {
		$("html").toggleClass("ColorLessIcons");
	});


	//Add_variants
	$('.add_variants').on('click', function () {
		var attri_id = $('.route').data('id');
		var url = $(this).data("url");
		var name = $('.name').val();
		var slug = $('.slug').val();
		$.ajax({
			url: url,
            method: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {name:name, slug:slug, attri_id:attri_id},
			success: function (data){
				list_variants();
				$('.form-control').reset();
			}
		})
		
	})
});
/* perfect scrol bar */
new PerfectScrollbar('.header-message-list');
new PerfectScrollbar('.header-notifications-list');

    function ChangeToSlug(){
	var slug;  
	slug = document.getElementById("slug").value;
	slug = slug.toLowerCase();
	slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
	
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	   
		slug = slug.replace(/ /gi, "-");
	
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
	 
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');

	document.getElementById('convert_slug').value = slug;
}


//List variants
function list_variants(){
	var url = $('.route').data('url');
	var id = $('.route').data('id');
	$.ajax({
        url: url,
		method: 'GET',
		data: {id:id},
        success: function(data){
			data = JSON.parse(data);
			var html = '';
			for(var item in data){		
			html += ` <tr>
				<td>${data[item]['name']}</td>
				<td>${data[item]['slug']}</td>
				<td class="text-center">            
				 <button type="button" onclick="delete_variants(${data[item]['id']})" class="btn btn-danger">X</button>                                                                                 
				</td>
			</tr>`
			}
	    $('#list_variants').html(html);
		}
	});
}

function delete_variants(id){
	var url = $('.route').data('delete');
	$.ajax({
		url: url,
		method: 'GET',
		data: {id:id},
		success: function (data){
			list_variants();
		}
	})
}
