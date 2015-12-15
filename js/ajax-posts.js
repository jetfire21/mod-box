
 
 jQuery(document).ready(function(){
  
  // вывод данных без перезагрузки для модульных зданий,морских контейнеров и похожим по шаблону

	 $('.cl-menu-item').click(function(e){

		e.preventDefault();
		//  $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		// var redirect = "http://"+window.location.hostname+"/?post="+current_post_id;
		//  history.pushState('', '', redirect);


		//-----------------вывод ссылки без перезагрузки в адресной строке-------------------------------------------
        var href = $(this).attr('href');

        // Передаем адрес страницы в функцию
        getContent(href, true);

        // Добавляем обработчик события popstate, происходящего при нажатии на кнопку назад/вперед в браузере  
		window.addEventListener("popstate", function(e) {
		    // Передаем текущий URL
		    getContent(location.pathname, false);
		});

		function getContent(url, addEntry) {
	    $.get(url).done(function(data) {
	        // Обновление только текстового содержимого в сером блоке
	        // Если был выполнен клик в меню - добавляем запись в стек истории сеанса
	        // Если была нажата кнопка назад/вперед, добавлять записи в историю не надо
	        if(addEntry == true) {
	            // Добавляем запись в историю, используя pushState
	            history.pushState(null, null, url); 
	        }
	    });
	   }
	   //-----------------вывод ссылки без перезагрузки в адресной строке-------------------------------------------


		  $(".cl-menu-item").removeClass("cl-active");
		 $(this).addClass("cl-active");
		var current_post_id =  $(this).attr("data-post-id");

		var data = {
			'action': 'loadmore',
			'query': post_id,
			'cur_post_id': cur_post_id
		};



		 $.ajax({
			
			url: "http://"+window.location.hostname+"/wp-admin/admin-ajax.php", // обработчик
			data:data, // данные
			type:'POST', // тип запроса
			success:function(data){
				if( data ) { 

					 // console.log(cur_post_id + "---yes post id-------------------------------");
					 //   console.log(data + "---yes data-------------------------------");

					 //  $(".content-right-info").text(data.res);

					 var pars =  $.parseJSON(data);

					   // console.log(pars + "-----------yes pars");


					  current_post_id = "id" + current_post_id; //id45
					  var html_post;
					  for(var id in pars){
					  	// console.log(id);
					  	if(current_post_id == id)  html_post = pars[id];
					  	// break;
					  }
					  // console.log(html_post + "-------------");
					 if( ! $("div").is(".content-right-info") ){
					 	 $(".content-right-info").prepend(html_post);
					 }else{
					 	  $(".content-right-info").html("");
					 	 $(".content-right-info").prepend(html_post);
					 }


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


					    
	

				} else {

					console.log(data + "no data");
					 $(".content-right-info").html(data.res);
				}
			}
		});

	});


  // вывод данных без перезагрузки для аренда и информации и похожим по шаблону

	 $('.arenda-link').click(function(e){

		e.preventDefault();
		//  $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		// var redirect = "http://"+window.location.hostname+"/?post="+current_post_id;
		//  history.pushState('', '', redirect);


		//-----------------вывод ссылки без перезагрузки в адресной строке-------------------------------------------
        var href = $(this).attr('href');

        // Передаем адрес страницы в функцию
        getContent(href, true);

        // Добавляем обработчик события popstate, происходящего при нажатии на кнопку назад/вперед в браузере  
		window.addEventListener("popstate", function(e) {
		    // Передаем текущий URL
		    getContent(location.pathname, false);
		});

		function getContent(url, addEntry) {
	    $.get(url).done(function(data) {
	        // Обновление только текстового содержимого в сером блоке
	        // Если был выполнен клик в меню - добавляем запись в стек истории сеанса
	        // Если была нажата кнопка назад/вперед, добавлять записи в историю не надо
	        if(addEntry == true) {
	            // Добавляем запись в историю, используя pushState
	            history.pushState(null, null, url); 
	        }
	    });
	   }
	   //-----------------вывод ссылки без перезагрузки в адресной строке-------------------------------------------


		  $(".arenda-link").removeClass("current");
		 $(this).addClass("current");
		var current_post_id =  $(this).attr("data-post-id");

		var data = {
			'action': 'loadmore',
			'query': post_id,
			'cur_post_id': cur_post_id
		};



		 $.ajax({
			
			url: "http://"+window.location.hostname+"/wp-admin/admin-ajax.php", // обработчик
			data:data, // данные
			type:'POST', // тип запроса
			success:function(data){
				if( data ) { 

					 // console.log(cur_post_id + "---yes post id-------------------------------");
					 //   console.log(data + "---end  data-------------------------------");
					 //   console.log(current_post_id + "---end  data-------------------------------");

					 //  $(".content-right-info").text(data.res);

					 var pars =  $.parseJSON(data);

					   // console.log(pars + "-----------yes pars");


					  current_post_id = "id" + current_post_id; //id45
					  var html_post;
					  for(var id in pars){
					  	 console.log(id);
					  	 // console.log("current_post_id -".cur_post_id);
					  	if(current_post_id == id)  html_post = pars[id];
					  	// break;
					  }
					   // console.log("----------html_post---" + html_post );
					 if( ! $("div").is(".content-right-info") ){
					 	 $(".content-right-info").prepend(html_post);
					 }else{
					 	  $(".content-right-info").html("");
					 	 $(".content-right-info").prepend(html_post);
					 }
	

				} else {

					console.log(data + "no data");
					 $(".content-right-info").html(data.res);
				}
			}
		});

	});





});
