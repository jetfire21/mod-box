$(document).ready(function() {



   /* ======= resize background image ======= */
   	function heightDetect() {
		$("header.resized").css("height", $(window).height());
	};
	heightDetect();

	

	    // $("#3d").interactive_3d({
	    //   frames: 35,
	    //   entrance:true,
	    //   preloadImages:true,
	    //   speed:0,
	    //   loading:"",
	    //   autoPlay:false,
	    //   touchSupport: true
	    // });


 // вся мaгия пoсле зaгрузки стрaницы
	$('.h-menu-but > a').click( function(event){ // лoвим клик пo ссылки с id="go"
		window.location.href = "#";
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.animate({opacity: 1, top: '30px'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
				$('body').css('overflow-x', 'hidden');
				$('.modal_close').css('display','block');
				if($(window).width()>=1201) {
					$('body').css('overflow', 'hidden');
				}
		});
		
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('.modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
		$('body').css('overflow', 'auto');
		$('.modal_close').css('display','none');
	});
	
	// $('.h-phone-but > a').click( function(event){ // лoвим клик пo ссылки с id="go"
	// 	window.location.href = "#";
	// 	event.preventDefault(); // выключaем стaндaртную рoль элементa
	// 	$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
	// 	 	function(){ // пoсле выпoлнения предъидущей aнимaции
	// 			$('#modal_form2') 
	// 				.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
	// 				.animate({opacity: 1, top: '45%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
	// 			$('body').css('overflow-x', 'hidden');
	// 			$('.modal_close').css('display','block');
	// 			if($(window).width()>=1201) {
	// 				$('body').css('overflow', 'hidden');
	// 			}
	// 	});
	// });


	
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('.modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form2')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
		$('body').css('overflow', 'auto');
		$('.modal_close').css('display','none');
	});
	
	$('.write-but').click( function(event){ // лoвим клик пo ссылки с id="go"
		window.location.href = "#";
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form_write') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.css('margin-top', '-192px')
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
				$('body').css('overflow-x', 'hidden');
				$('.modal_close').css('display','block');
				if($(window).width()>=1201) {
					$('body').css('overflow', 'hidden');
				}
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('.modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form_write')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
		$('body').css('overflow', 'auto');
		$('.modal_close').css('display','none');
		
	});
	
	$('.content-right-info').on('click', '.cr-but.mail-form2',function(event){ // лoвим клик пo ссылки с id="go"
		// $(this).css("width","250px");
		// $(this).css("line-height","50px");
		// $(this).css("height","60px");

		var title_prod = $(" .cl-active .titile-for-send-mail").text();
		$("#modal_form_write2 .form-title").text(title_prod);

		var price_prod = $(".cl-active .price-for-send-mail").text();
		$("#modal_form_write2 .price-js-form").text(price_prod);


		window.location.href = "#";
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form_write2') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.css('margin-top', '-192px')
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
				$('body').css('overflow-x', 'hidden');
				$('.modal_close').css('display','block');
				if($(window).width()>=1201) {
					$('body').css('overflow', 'hidden');
				}
		});
	});	

	$('.content-right-info').on('click', '.cr-but',function(event){ // лoвим клик пo ссылки с id="go"
		// $(this).css("width","250px");
		// $(this).css("line-height","50px");
		// $(this).css("height","60px");

		// if( $("a.cr-but").hasClass("mail-form2") ){
			var title_prod = $(" .cl-active .titile-for-send-mail").text();
			$("#modal_form_write2 .form-title").text(title_prod);

			var price_prod = $(".cl-active .price-for-send-mail").text();
			$("#modal_form_write2 .price-js-form").text(price_prod);
		// }

		window.location.href = "#";
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form_write2') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.css('margin-top', '-192px')
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
				$('body').css('overflow-x', 'hidden');
				$('.modal_close').css('display','block');
				if($(window).width()>=1201) {
					$('body').css('overflow', 'hidden');
				}
		});
	});	


	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('.modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form_write2')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
		$('body').css('overflow', 'auto');
		$('.modal_close').css('display','none');
		
	});
	
	$('.cr-but3').click( function(event){ // лoвим клик пo ссылки с id="go"
		window.location.href = "#";
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form_write3') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.css('margin-top', '-192px')
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
				$('body').css('overflow-x', 'hidden');	
				$('.modal_close').css('display','block');
				if($(window).width()>=1201) {
					$('body').css('overflow', 'hidden');
				}
				
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('.modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form_write3')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
		$('body').css('overflow', 'auto');
		$('.modal_close').css('display','none');
	});
	
	
	/*карусель*/
	

	$(".carusel").owlCarousel({
		loop:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				loop:true
			},
			1024:{
				items:4,
				nav:true,
				loop:true
			},
			1201:{
				items: 5,
				nav:true,
				loop:true
			},
			1366:{
				items:5,
				nav:true,
				loop:true
			}
		}
		
    });
	
	$(".pic-carusel").owlCarousel({
		loop:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				loop:true
			},
			1024:{
				items:2,
				nav:true,
				loop:true
			}
		}
    });
	

	$(function(){
		$('.header-bg-img').plaxmove({ratioH:0.05,ratioV:0.05});
	});
	
	$('.content-right-info').on('click','.but360',function(event){
		$('.but360').hide();		
	});
	
	$('#chat').hide();
	$('input.for-ul-select[type="text"]').css("border","0px");
	$('.for-ul-select').click( function(){
		if($('#chat').css('display')=='none') {
			$('input.for-ul-select[type="text"]').css("background-image","url('/wp-content/themes/modulbox/images/content/caret-up.png')");
			$('#chat').show();
			$('.ul-scroll').show();
			$('#chat').jScrollPane();
			$('#chat').css('overflow','auto');
			$('input.for-ul-select[type="text"]').css("border-bottom","1px solid #124182");
		}
		else {
			$('#chat').hide();
			$('input.for-ul-select[type="text"]').css("background-image","url('/wp-content/themes/modulbox/images/content/caret-down.png')");
			$('input.for-ul-select[type="text"]').css("border","0px");
		}
	});
	
	//$('#chat2').hide();
	/*$('input.for-ul-select2[type="text"]').css("border","0px");
	$('.for-ul-select2').click( function(){
		$('input.for-ul-select2[type="text"]').css("background-image","url('images/content/caret-up.png')");
		$('#chat2').show();
		$('.ul-scroll2').show();
		$('#chat2').jScrollPane();
		$('#chat2').css('overflow','auto');
		$('input.for-ul-select2[type="text"]').css("border-bottom","1px solid #124182");
	});*/
	
	//$('#chat').jScrollPane();
	//$('#chat').css('overflow','auto');


	/*$(function()
	{
		$('#chat').jScrollPane();
		$('#chat').css('overflow','auto');
	});*/
	
	
	$('.ul-scroll > li').click(function() {
		var text = $(this).text();
		$('.for-ul-select').val(text); 	  
		$('#chat').hide();
		
		$('input.for-ul-select[type="text"]').css("border","0px");
		$('input.for-ul-select[type="text"]').css("background-image","url('/wp-content/themes/modulbox/images/content/caret-down.png')");
	});
	
	$('.ul-scroll2 > li').click(function() {
		var text = $(this).text();
		$('.for-ul-select2').val(text); 	  
		$('#chat2').hide();
		
		$('input.for-ul-select2[type="text"]').css("border","0px");
		$('input.for-ul-select2[type="text"]').css("background-image","url('/wp-content/themes/modulbox/images/content/caret-down.png')");
	});
	

/*var srceenWidth = $('body').width();

if(srceenWidth>=1900) {
	(function(){
		var divs = $('.for-scroll');
		function CachePositions(){
			divs.each(function(){
				if ($(this).css('position')!='fixed')
					$(this).data({initialTop:$(this).position().top});
			});
		}

		var scrollable = $(window);
		scrollable.scroll(function(){
			divs.each(function(){
				var top = $(this).data('initialTop');
				if(top<scrollable.scrollTop()){
					$(this).css({position:'fixed',top:0});
				} else {
					$(this).css({position:'absolute',top:top+'px'});
				}
			})
		});
	
		var resizeTimeout;
		$(window).resize(function(){
			if (resizeTimeout)
				clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(function(){
				resizeTimeout = null;
				CachePositions();
			},100);
		});
    
		CachePositions();
	})();
}*/



		// var arr =[ "images/content/K2_2/K2_2_0000.png", "images/content/K2_2/K2_2_0001.png", "images/content/K2_2/K2_2_0002.png", "images/content/K2_2/K2_2_0003.png", "images/content/K2_2/K2_2_0004.png", "images/content/K2_2/K2_2_0005.png", "images/content/K2_2/K2_2_0006.png", "images/content/K2_2/K2_2_0007.png", "images/content/K2_2/K2_2_0008.png", "images/content/K2_2/K2_2_0009.png", "images/content/K2_2/K2_2_0010.png", "images/content/K2_2/K2_2_0011.png", "images/content/K2_2/K2_2_0012.png", "images/content/K2_2/K2_2_0013.png", "images/content/K2_2/K2_2_0014.png", "images/content/K2_2/K2_2_0015.png", "images/content/K2_2/K2_2_0016.png", "images/content/K2_2/K2_2_0017.png", "images/content/K2_2/K2_2_0018.png", "images/content/K2_2/K2_2_0019.png", "images/content/K2_2/K2_2_0020.png", "images/content/K2_2/K2_2_0021.png", "images/content/K2_2/K2_2_0022.png", "images/content/K2_2/K2_2_0023.png", "images/content/K2_2/K2_2_0024.png", "images/content/K2_2/K2_2_0025.png", "images/content/K2_2/K2_2_0026.png", "images/content/K2_2/K2_2_0027.png", "images/content/K2_2/K2_2_0028.png", "images/content/K2_2/K2_2_0029.png", "images/content/K2_2/K2_2_0030.png", "images/content/K2_2/K2_2_0031.png", "images/content/K2_2/K2_2_0032.png", "images/content/K2_2/K2_2_0033.png", "images/content/K2_2/K2_2_0034.png", "images/content/K2_2/K2_2_0035.png" ];
		
		// if($("div").is("#3d-img-url")){
		// 	var arr = $("#3d-img-url").attr('data-src').split(",");
		// 	$("#product1, #product2, #product3").attr("src", arr[0]);

		// 	$("#product1").threesixty({ images: arr,
		// 		method: 'click',
		// 		sensibility: 2
		// 	});
		// }	

		$('.content-right-info').on('click', '.pic-left img',function(event){
			
		// if($("div").is("#3d-img-url")){
			var arr = $("#3d-img-url").attr('data-src').split(",");
			$("#product1, #product2, #product3").attr("src", arr[0]);

			$("#product1").threesixty({ images: arr,
				method: 'click',
				sensibility: 2
			});
		// }
	   });



	
	
	$('input[type="text"]').focus(function() {
		$(this).parent().css("border", "2px solid #ff6d00");
		$(this).css("color", "#ff6d00");
		$(this).parent().children("legend").css("color", "#ff6d00");
	});

	$('input[type="text"]').focusout(function() {
		$(this).parent().css("border", "2px solid #fff");
		$(this).css("color", "#fff");
		$(this).parent().children("legend").css("color", "#fff");
	});
	
	$('.simp-text').focus(function() {
		$(this).parent().css("border", "2px solid #ff6d00");
		$(this).css("color", "#ff6d00");
		$(this).parent().children("legend").css("color", "#ff6d00");
		
	});

	$('.simp-text').focusout(function() {
		$(this).parent().css("border", "2px solid #fff");
		$(this).css("color", "#fff");
		$(this).parent().children("legend").css("color", "#fff");
	});

	$('.feed').focus(function() {
		$(this).parent().parent().css("border", "2px solid #ff6d00");
		$(this).css("color", "#ff6d00");
		$(this).parent().parent().children("legend").css("color", "#ff6d00");
		
	});

	$('.feed').focusout(function() {
		$(this).parent().parent().css("border", "2px solid #fff");
		$(this).css("color", "#fff");
		$(this).parent().parent().children("legend").css("color", "#fff");
	});
	
	
	// 	$('.form-container > ul > li').click(function(e) {
	//   if($(this).children('.drop-menu-m').css('display')=='none') {
	//     $(this).children('.drop-menu-m').show(400);
	//   }
	//   else {
	//     $(this).children('.drop-menu-m').hide(400);
	//   }
	  
	// });	

	// 	$('.form-container > ul > li').mouseenter(function() {
	//   if($(this).children('.drop-menu-m').css('display')=='none') {
	//     $(this).children('.drop-menu-m').show(400);
	// }
	//   });

	//   $('.form-container > ul > li').mouseleave(function() {
	//     $(this).children('.drop-menu-m').hide(400);
	  
	// });


});





$('header.resized').css("min-height", $(window).height() + 'px');
/*$(window).resize(function() {
	$('header.resized').css("height", $(window).height() + 'px');
});*/
	
	


$(document).ready(function() {

	// удаление у ячейки таблицы класса
	if( $(".row-type td").hasClass("t2-out") ){
		$(".row-type td").removeClass("t2-out");
	};

	if( $(".row-size td").hasClass("t2-out") ){
		$(".row-size td").removeClass("t2-out");
	};
	// удаление у ячейки таблицы класса

	$('.content-right-info').on('click','.cr-tabs .tab-2',function (){
		$("#flip-scroll .modif").hide();
		$("#flip-scroll .cr-table1.harakter").css("display","table");
		$("#flip-scroll .cr-table4.harakter").css("display","block");
		$(".cr-tabs .tab-1").removeClass("tab-current");
		$(this).addClass("tab-current");
	});

	$('.content-right-info').on('click','.cr-tabs .tab-1',function (){
		$("#flip-scroll .modif").show();
		$("#flip-scroll .harakter").hide();
		$(".cr-tabs .tab-2").removeClass("tab-current");
		$(this).addClass("tab-current");
	});

	$('a#but-order-product').click(function(){

		var form_data = $('#order_product').serialize();
		form_data = form_data + "&form-title=" + $(".form-title").text(); 
		form_data = form_data + "&form-price=" +  $(".price-js-form").text(); 
		// form_data = $.trim(form_data);
		// console.log(form_data);	
		var domen = "http://" + window.location.hostname + "/wp-content/themes/modulbox/mail.php";
		 $.ajax({
			  type: 'post',
			  url: domen,
			  data: form_data,
			  success: function(data){
				 var data = JSON.parse(data);
				  // console.log(data.res);
				  // return false;
				if(data.res == 'success') { 
					$("#order_product .error").remove(); alert("Спасибо! Ваше сообщение успешно отправлено"); 
					$(".modal_close").trigger("click");
					return false;
				}
				if(data.res) {
					if($("#order_product div").hasClass("error")){
						$("#order_product .error").remove();
					}
					$("#order_product").prepend("<div class='error'>"+data.res+"</div");
				 // console.log(data.res);
				}

			  },
			  error:function(){
				alert("error");
			}
		});	
	});	


	$('a#order_plitka').click(function(){

		var form_data = $('#enter_data_plitka').serialize();
		// form_data = form_data + "&form-title=" + $(".form-title").text(); 
		// form_data = form_data + "&form-price=" +  $(".price-js-form").text(); 
		// form_data = $.trim(form_data);

		// alert( $('#enter_data_plitka #chat li').text() );


		// console.log(form_data);	
		// return false;
		var domen = "http://" + window.location.hostname + "/wp-content/themes/modulbox/plitka.php";
		 $.ajax({
			  type: 'post',
			  url: domen,
			  data: form_data,
			  success: function(data){
				 var data = JSON.parse(data);
				  // console.log(data.res);
				  // return false;
				if(data.res == 'success') { 
					$("#enter_data_plitka .error").remove(); alert("Спасибо! Ваше сообщение успешно отправлено"); 
					$(".modal_close").trigger("click");
					return false;
				}
				if(data.res) {
					if($("#enter_data_plitka div").hasClass("error")){
						$("#enter_data_plitka .error").remove();
					}
					$("#enter_data_plitka").prepend("<div class='error'>"+data.res+"</div");
				 // console.log(data.res);
				}

			  },
			  error:function(){
				alert("error");
			}
		});	
	});	




	$('a#send_back_call').click(function(){

		var form_data = $('#back_call').serialize();
		// form_data = $.trim(form_data);
		// console.log(form_data);	
		var domen = "http://" + window.location.hostname + "/wp-content/themes/modulbox/back_call.php";
		 $.ajax({
			  type: 'post',
			  url: domen,
			  data: form_data,
			  success: function(data){
				 var data = JSON.parse(data);
				  // console.log(data.res);
				  // return false;
				if(data.res == 'success') { 
					$("#back_call .error").remove(); alert("Спасибо! Ваше сообщение успешно отправлено"); 
					$(".modal_close").trigger("click");
					return false;
				}
				if(data.res) {
					if($("#back_call div").hasClass("error")){
						$("#back_call .error").remove();
					}
					$("#back_call").prepend("<div class='error'>"+data.res+"</div");
				 // console.log(data.res);
				}

			  },
			  error:function(){
				alert("error");
			}
		});	
	});	

	$(".ploshad span").click(function(){
		$(".hc-left-full iframe").attr("src","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6705.719448727952!2d30.643587620650337!3d60.021336188878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4697d32844208487%3A0x5eb72ae964d8c7a4!2z0JrQvtC70YLRg9GI0YHQutC-0LUg0YguLCDQktGB0LXQstC-0LvQvtC20YHQuiwg0JvQtdC90LjQvdCz0YDQsNC00YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1449608103742");
		$(".ofis").removeClass("cur");
		$(".ploshad").addClass("cur");
	});

	$(".ofis span").click(function(){
		$(".hc-left-full iframe").attr("src","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.5127477892263!2d30.390999269660902!3d59.940227027275434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696319252cdb867%3A0xc7d0d56aee92bcd6!2z0J3QvtCy0LPQvtGA0L7QtNGB0LrQsNGPINGD0LsuLCAyMywgMTAzLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTExMjQ!5e0!3m2!1sru!2s!4v1448188037849");
		$(".ofis").addClass("cur");
		$(".ploshad").removeClass("cur");

	});

	
	// $('.content-right-info').on('click', '.interactive_3d',function(event){

	// // 3d вращение изображений
	//     $("#3d").interactive_3d({
	//       frames: 34,
	//       entrance: true,
	//       preloadImages:true,
	//       speed:0,
	//       loading:"<h1>Загрузка...</h1>",
	//       autoPlay:false,
	//       touchSupport: true
	//     });

	  // });

	
});


	