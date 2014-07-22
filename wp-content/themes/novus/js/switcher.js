jQuery(function($){

	$('.el .head').click(function(){
		var $header = $(this);
		var $el = $header.parent();
		var $opt = $el.find('.options');
		if($el.hasClass('open')){
			$opt.slideUp(400);
			$el.removeClass('open');
		}else{
			$opt.slideDown(400);
			$el.addClass('open');
		}
	});


	checkCookie();

	$("#reset").live('click', function(e){
			e.preventDefault();
			del_cookie("themeple_layout");
			del_cookie("themeple_color_skin");
			del_cookie("themeple_shadow");
			del_cookie("themeple_skin");
			del_cookie("themeple_footer_skin");
			del_cookie("themeple_background");
			del_cookie("themeple_pattern");
			setTimeout(function(){
									    window.location.hash = "#wpwrap";
							 			window.location.reload(true);
									
	        }, 500);
	}); 

	$('.el .options a').live('click', function(){
		var value = $(this).data('value');
		var $el = $(this).parents('.el').first();
		var name = $el.data('name');
		if(name == 'color_skin'){
			document.cookie = 'themeple_footer_skin=skin_color';
		}
		if($(this).hasClass('default')){
			del_cookie('themeple_'+name);
			if(name == 'layout' && value == 'fullwidth'){
				del_cookie('themeple_background');
				del_cookie('themeple_pattern');
			}
		}else{
			if(name == 'background'){
				var type = $(this).data('type');
				name = type;
				document.cookie = 'themeple_layout=boxed';
				if(type == 'pattern')
					del_cookie('themeple_background');
				if(type == 'background')
					del_cookie('themeple_pattern');
			}
			if(name == 'layout' && value == 'boxed'){
				var test = getCookie("themeple_pattern");
				var test2 = getCookie('themeple_background');

		  		if ( (test==null || test=="") && (test2 == null || test2 == "")){
		  			document.cookie = 'themeple_background=background_7';
		  		}
			}else{
				del_cookie('themeple_background');
				del_cookie('themeple_pattern');
			}
			document.cookie = 'themeple_'+name+'='+value;
		}
		setTimeout(function(){
			
			window.location.hash = "#wpwrap";
			window.location.reload(true);
									
	    }, 1000);
	});

	function getCookie(c_name)
	{
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++)
		{
		  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		  x=x.replace(/^\s+|\s+$/g,"");
		  if (x==c_name)
		    {
		    return unescape(y);
		    }
		  }
	}

	function checkCookie()
	{
		
		var layout=getCookie("themeple_layout");
		
		  if (layout!=null && layout=="boxed")
		  {
			  $("#layout a.switch_button").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == layout){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  var color_skin=getCookie("themeple_color_skin");
		
		  if (color_skin!=null && color_skin=="dark")
		  {
			  $("#color_skin a.switch_button").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == color_skin){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  var shadow=getCookie("themeple_shadow");
		
		  if (shadow != null && shadow != '')
		  {
			  $("#shadow a.button_text").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == shadow){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  var color_scheme=getCookie("themeple_skin");
		
		  if (color_scheme!=null && color_scheme != '')
		  {
			  $("#color_scheme a.button_img").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == color_scheme){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  var footer=getCookie("themeple_footer_skin");
		
		  if (footer!=null && footer != '')
		  {
			  $("#footer a.button_img").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == footer){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  var background=getCookie("themeple_background");
		  var pattern = getCookie('themeple_pattern');
		  if (background!=null && background != '')
		  {
			  $("#background a.button_img").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == background){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

		  if (pattern!=null && pattern != '')
		  {
			  $("#background a.button_img").each(function(){
		        	var sel = $(this).data('value');
		        	if(sel == pattern){
		        		$(this).addClass('active');
		        	}else{
		        		$(this).removeClass('active')
		        	}
	    	   });
		  }

	}

	function del_cookie(name)
	{
	    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}


});