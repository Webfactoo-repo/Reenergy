jQuery(function($) {
		"use strict";
		$('[rel=tooltip]').tooltip();
              $('input, textarea').placeholder();
        $('#mc_mv_EMAIL').attr('placeholder', 'Type your email address');
		if($('#testimonials').length){
			$('#testimonials').cycle();
        }
		
		$('.latest_blog_effect .blog-article').mouseover(function(){
			var $parent = $(this).parent();
			$parent.find('.blog-article').removeClass('active');
			$(this).addClass('active');
		});


		$('.section-style').each(function(){
			if($(this).prev().hasClass('section-style')){
				$(this).css('margin-top', '0px');
			}

			if($(this).is(':last-child') && $(this).parent().hasClass('composer_content')){
				$(this).parent().css('padding-bottom', '0px');
			}
			if($(this).is(':first-child') && $(this).parent().hasClass('composer_content')){
				var style = $(this).parent().attr('style');
				if(typeof style == "undefined")
					style = ''; 
				$(this).parent().attr('style', style+'padding-top:0px !important');
			}
		});

		$('.transparency_section').each(function(){
			var height = $(this).outerHeight();
			$(this).css('margin-top', '-'+height+'px');
		});
        
        var check_active = $('.nav-tabs').children('li:nth-child(1)').hasClass('active');
			if( check_active == true ){
			$('.tab-content').children('div:nth-child(1)').addClass('active');
			}
		/*$(function() {
  			$('a[href*=#]:not([href=#], [href*=#tab] )').click(function() {
   			 if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
     		 var target = $(this.hash);
      		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
       	 $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
}); */

		/*$("html").niceScroll({
					scrollspeed: 60,
					mousescrollstep: 40,
					cursorwidth: 5,
					cursorborder: 0,
					cursorcolor: '#2D3032',
					cursorborderradius: 6,
					autohidemode: false,
					horizrailenabled: false,


		zindex:"100000"});
		*/

		

		$('.header_1 nav .menu li .sub-menu').each(function(){
				$(this).parent().first().addClass('hasSubMenu');
		});


		$(window).scroll(function(){ 
			var st = $(this).scrollTop();
			var el = $('header#header');
			var offset = el.offset();
			var bottom = $(window).height() - el.height();
			bottom = bottom - offset.top;
			
			
			if(st > 240){
				

				$('.sticky_menu').css({'opacity' : 0.95, 'visibility': 'visible'});
			}else
				$('.sticky_menu').css({'opacity' : 0,  'visibility': 'hidden' });

		});

         //var $height = $('.creative_tabs .content').height();
         $('.creative_tabs .content').css('height', ($('.creative_tabs .content').height()) + 'px');

		$('.creative_tabs li').live('click', function(){
			var $item = $(this);
			var id = $item.data('id');
			var $parent = $item.parents('.creative_tabs').first();
			var $all_medias = $parent.find('.content');
			var $this_media = $all_medias.find('[data-id="'+id+'"]');
			var $selected_media = $all_medias.find('.active');
			$selected_media.addClass('end_animation');
			$all_medias.find('.pane').removeClass('active').removeClass('start_animation');
			setTimeout(function(){
				var height = $this_media.height();
				$all_medias.css('height', (height+80)+'px');
				$this_media.addClass('start_animation').addClass('active');
				$selected_media.removeClass('end_animation');
				$parent.find('li').removeClass('active')
				$item.addClass('active');
			}, 400);
			

		});

		if($(document).height() == $(window).height()){
            $('.footer_wrapper').css('position', 'relative');
		} else {

			var ft_height = $('.footer_wrapper').height();
			$('.top_wrapper').css('margin-bottom', ft_height+'px');

	 	}

		

		$('nav .menu, .sticky_menu .menu').mouseleave(function(event) {
			
			
			$(this).find('.sub-menu').not('.themeple_custom_menu_mega_menu .sub-menu').stop().fadeOut(400).css('display', 'none');

			$(this).find('.themeple_custom_menu_mega_menu').stop().fadeOut(400).css('display', 'none');
		});


		$('nav .menu > li, .sticky_menu .menu > li').mouseenter(function() {
			$(this).parent().find('.sub-menu').not('.themeple_custom_menu_mega_menu .sub-menu').stop().fadeOut(400).css('display', 'none');
			$(this).find('.sub-menu').not('.themeple_custom_menu_mega_menu .sub-menu').first().stop().fadeIn(400).css('display', 'block');

			$(this).parent().find('.themeple_custom_menu_mega_menu').stop().fadeOut(400).css('display', 'none');
			$(this).find('.themeple_custom_menu_mega_menu').first().stop().fadeIn(400).css('display', 'block');
		});

		$('nav .menu > li ul > li, .sticky_menu .menu > li ul > li').mouseenter(function() {
			$(this).parent().find('.sub-menu').not('.themeple_custom_menu_mega_menu .sub-menu').stop().fadeOut(400).css('display', 'none');
			$(this).find('.sub-menu').not('.themeple_custom_menu_mega_menu .sub-menu').first().stop().fadeIn(400).css('display', 'block');

			$(this).parent().find('.themeple_custom_menu_mega_menu').stop().fadeOut(400).css('display', 'none');
			$(this).find('.themeple_custom_menu_mega_menu').first().stop().fadeIn(400).css('display', 'block');
		});

		$('.header_7 nav .menu').each(function(){
				var width = $(this).width();
				var half = width/2;
				$(this).css('margin-left', -half+'px');
				$(this).css('left', '50%');
		});

		$('.googlemap.fullwidth_map').each(function(){
			var $parent = $(this).parents('.row-dynamic-el').first();
			if($parent.next().hasClass('section-style'))
				$parent.css('margin-bottom', '0px');
		}); 
        
		$('.blog-article.grid .media img').first().imagesLoaded(function(){
			var first_height = $('.blog-article.grid .media img').first().height();
			
			$('.blog-article.grid iframe').each(function(){
				$(this).css('height', first_height+'px');
				$(this).parent('.media').css('height', first_height+'px');
			});
		});

		$(".section-style.parallax_section .parallax_bg").parallax("50%", 0.2);

		$('.open_search').click(function(){

			var $parent = $(this).parent();
			var $search = $parent.find('#search-form');
			$search.fadeIn(400);

		});

		$('.close_').click(function(){

			var $parent = $(this).parent().parent();
			
			$parent.fadeOut(400);

		});


		$('.row-google-map').each(function(){
			if($('.fullwidth_map', $(this)).length > 0){
				var $parent = $(this).parents('.row-dynamic-el').first();
				$parent.css('margin-top', '0px');
			}
			
		});
		

		if($('body.header_3').length > 0){
			var head = $('header#header');
			$(window).scroll(function(){ 
				var st = $(this).scrollTop();
				if(st > 150){
					$('.opacity_header').slideUp('slow');
				}else{
					$('.opacity_header').slideDown('slow');
				}


			});
		}

		if($('.header_page.centered').length > 0){
			var $bread = $('.header_page.centered .breadcrumbss');
			var margin = ($bread.width() / 2)-5;
		
			$bread.css('marginLeft', '-'+margin+'px');
		}

		if($('.header_page.animated_header .page_parents').length > 0){
			$('.header_page.animated_header .page_parents').each(function(){
				var width = $(this).width();
				$(this).css('marginLeft', '-'+(width/2)+'px');
			});
			
		}

		$('.services_large .btn-system').hover(function(){
			$(this).addClass('all_');
		}, function(){
			$(this).removeClass('all_');
		});

		$(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
		
		$('.dynamic_page_header .btns').each(function(){
			var width = $(this).width();
			$(this).css('width', (width+10)+'px');
			$(this).css('float', 'none');
		});

 
       $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
				$('.row-dynamic-el').each(function(){
			var $row = $(this);
			var $services = $row.find('.services_table');
			if($services.length){

				var $next = $row.next('.row-dynamic-el');

				if($row.length && $next.find('.services_table').length){

					$row.addClass('first_row_table');
					var $next_2 = $next.next('.row-dynamic-el');
					if($next_2.find('.services_table').length){
						$next.addClass('another_row_table');
						$next_2.addClass('last_row_table');
					}else{
						$next.addClass('last_row_table');
					}
				}
			}
		});

		$('.blog_categories').each(function(){
	    	var $container = $(this);
	    	var $ac = $(this).find('ul .active a');
	    	var cat = $ac.data('id');
              
	    	var $first = $(this).find('.blog_cat_[data-cat*="'+cat+'"]:first');
	    	
	    	$(this).find('.blog_cat_').fadeOut();
	    	setTimeout(function(){
	    		$first.fadeIn();
	    		$container.find('.blog_cat_[data-cat*="'+cat+'"]').not($first).fadeIn();
	    	}, 500);
	    	

	    	$container.find('li a').live('click', function(e){
		    	e.preventDefault();
		    	$(this).parent().parent().find('li').removeClass('active');
		    	$(this).parent().addClass('active');
		    	var cat = $(this).data('id');
		    	var $first = $container.find('.blog_cat_[data-cat*="'+cat+'"]:first');
		    	$container.find('.blog_cat_').fadeOut();
		    	setTimeout(function(){
		    		$first.fadeIn(); 
		    		$container.find('.blog_cat_[data-cat*="'+cat+'"]').not($first).fadeIn();
		    	}, 500);
	    	});
	    });

	 
          
	



		$(".accordion-group .accordion-toggle").live('click', function(){
			var $self = $(this).parent().parent();
			if($self.find('.accordion-heading').hasClass('in_head')){
				$self.parent().find('.accordion-heading').removeClass('in_head');
			}else{  
				$self.parent().find('.accordion-heading').removeClass('in_head');
				$self.find('.accordion-heading').addClass('in_head');
			}
		});
		
		if($('.recent_sc_portfolio').length){
			$('.recent_sc_portfolio').imagesLoaded(function(){

				$(this).carouFredSel( 
					{
					
						items:6,
						responsive:true,
						scroll : { items : 6 },
						prev : {
						button : $(this).parent().parent().find('.prev')
					},

					next : {
						button : $(this).parent().parent().find('.next')
					}
						

					});
					
			});
		}

		if($('.carousel_testimonial').length){
			
				$('.carousel_testimonial').each(function(){
						$(this).carouFredSel( 
					{
						

						
						auto: true,
						scroll: { items : 1, fx: 'fade' },
						

						

					});
					
			
		
				});
		}		


	$('.small_widget a').not('.aaaa a').toggle(function(e){
		$('.small_widget').removeClass('active'); 
              e.preventDefault();
		var box = $(this).data('box');
		$('.top_nav_sub').hide();
		$('.top_nav_sub.'+box).fadeIn("400");
              $(this).parent().addClass('active'); 

	}, function(e){
		e.preventDefault();
		var box = $(this).data('box');
              $('.small_widget').removeClass('active');  
		$('.top_nav_sub').fadeOut('400');
		$('.top_nav_sub.'+box).fadeOut('slow');
            
              
	});
	

    /*$("audio,video").mediaelementplayer();  */             



    /* Great Gallery */
    $(".great_gallery").each(function(){

    	var $container = $(this);
    	var $first = $('.item:first', $container);
    	var first_id = $first.data('id');
	$first.addClass('active');
    	$('.single_slide_gallery[data-id="'+first_id+'"]', $container).fadeIn('slow');
    	 

    	
    	$('.item', $container).live('click', function(e){
    		e.preventDefault();
		$container.find('.item').removeClass('active');
		$(this).addClass('active');
    		var $item = $(this);
    		var id = $item.data('id'); 
    		
    				$('.single_slide_gallery', $container).stop(true, true).fadeOut(700);
    				
    				
    				
    				setTimeout( function(){$('.single_slide_gallery[data-id="'+id+'"]', $container).stop(true, true).fadeIn(800)}, 1500);
    				

    		
    				
    			
    		
    	});

    });


    /* End Great Gallery */




	$(".lightbox-gallery").fancybox();
	$('.show_review_form').fancybox();
	$('.lightbox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
	
	

    
	
	$("#tweet_footer").each(function(){
		var $self = $(this);
			$self.carouFredSel( 
				{
					circular : true,
					infinite : true,
					auto : false,
					scroll : {
						items : 1,
						fx : "fade"
					},
					prev : {
						button : $self.parent().parent().find('.back')
					},

					next : {
						button : $self.parent().parent().find('.next')
					}

					

					
				});
       
          
		});


	

	$(".carousel_staff").each(function(){
		var $self = $(this);
		$self.imagesLoaded(function(){
			$self.carouFredSel( 
					{
						circular : true,
						infinite : true,
						auto : false,

						scroll : {
							items : 1
						},
						prev : {
							button : $self.parents('.team_carousel').first().find('.prev')
						},
						next : {
							button : $self.parents('.team_carousel').first().find('.next')
						}

							
					});
			});
	});
     $(".carousel_blog").each(function(){
	        var $self = $(this);
	        
	        
	       			if( $('li img', $self).size() ) {
	  					$('li img', $self).one("load", function(){
		       				$self.carouFredSel( 
							{
								
								circular: true,
								infinite: true,
								auto 	: false,

								scroll  : {

			        				items           : 1
			        			},

								prev : {

							        button : $self.parents('.latest_blog').find('.prev')

							    },

							    next : {

							        button : $self.parents('.latest_blog').find('.next')

							    }
							    

								
							}, {debug:true});
						}).each(function() {
	  		    			if(this.complete) $(this).trigger("load");
	  					});
					}else{
						$self.carouFredSel( 
							{
								
								circular: true,
								infinite: true,
								auto 	: false,

								scroll  : {

			        				items           : 1 
			        			},

								prev : {

							        button : $self.parents('.latest_blog').find('.prev')

							    },

							    next : {

							        button : $self.parents('.latest_blog').find('.next')

							    }

								
							});
					}
						
	       		
	       			
			
	       	
	          
		});		

$(".carousel_blog_single").each(function(){
	        var $self = $(this);
	        
	        
	       			if( $('li img', $self).size() ) {
	  					$('li img', $self).one("load", function(){
		       				$self.carouFredSel( 
							{
								
								circular: true,
								infinite: true,
								auto 	: false,
								items: 1,
								scroll  : {

			        				items           : 1
			        			},

								prev : {

							        button : $self.parents('.latest_blog_carousel').find('.prev')

							    },

							    next : {

							        button : $self.parents('.latest_blog_carousel').find('.next')

							    }

								
							}, {debug:true});
						}).each(function() {
	  		    			if(this.complete) $(this).trigger("load");
	  					});
					}else{
						$self.carouFredSel( 
							{
								
								circular: true,
								infinite: true,
								auto 	: false,
								items: 1,
								scroll  : {

			        				items           : 1 
			        			},

								prev : {

							        button : $self.parents('.latest_blog_carousel').find('.prev')

							    },

							    next : {

							        button : $self.parents('.latest_blog_carousel').find('.next')

							    }

								
							});
					}
						
	       		
	       			
			
	       	
	          
		});	
			
		$('.latest_blog_effect .blog-article').mouseover(function(){
				var $parent = $(this).parent();
				$parent.find('.blog-article').removeClass('active');
				$(this).addClass('active');
		});


    	if($('.clients_caro').length){
    	$('.clients_caro').imagesLoaded(function(){
    		var $self = $(this);
			
			$(this).carouFredSel( 
				{
					items:4,
					auto: true,
					scroll: { items : 1 },
					prev : {

							        button : $self.parent('.clients_el').find('.prev')
							    },

							    next : {

							        button : $self.parent('.clients_el').find('.next')

							    }
					

				});
			});
    }

    if($('.great_gallery .carousel').length){
    	$('.great_gallery .carousel').imagesLoaded(function(){
			$(this).carouFredSel( 
				{
					items:5, 
					auto: false,
					scroll: { items : 1 },
					prev : {
							button : $('.prev', $(this).parent())
					},

					next : {
							button : $('.next', $(this).parent())
					}
					

				});
			});
    }
	
	function carousel_port_init(){
		$(".carousel_portfolio").each(function(){
			var $self = $(this);
			var cl = 3;
            if($self.parent().hasClass('three-cols')){
				cl = 3;
            }
            if($self.parent().hasClass('four-cols')){
				cl = 4;
            }
            if($self.parent().hasClass('two-cols')){
                cl = 2;
            }
            if($self.parent().hasClass('one-cols')){
				cl = 1;
			}

			$self.imagesLoaded(function(){
				$self.carouFredSel( 
					{
						
						circular: false,
						infinite: false,
						auto: false,

						scroll: {
							items: 1
						},

						prev : {

							        button : $self.parents('.recent_portfolio').find('.prev')

							    },

							    next : {

							        button : $self.parents('.recent_portfolio').find('.next')

							    }
					});
				var height = $self.height();
				
				$self.css('height', height+5+'px');
				$self.parent().css('height', height+5+'px');
			});

			
		});
	}

    carousel_port_init();
    
    if($('.carousel_shortcode ul').length){
    	$('.carousel_shortcode ul').each(function(){
    		var $self = $(this);
    		var prev_b = $self.parents('.row-dynamic-el').first().prev().find('.prev');
    		if(prev_b.length == 0)
    			prev_b = $self.parents('.carousel_shortcode').first().prev().find('.prev');

    		var next_b = $self.parents('.row-dynamic-el').first().prev().find('.next');
    		if(next_b.length == 0)
    			next_b = $self.parents('.carousel_shortcode').first().prev().find('.next');

    		$self.imagesLoaded(function(){
    		
				
				$self.carouFredSel( 
					{
						items:4,
						auto: false,
						scroll: { items : 1 },
						prev : {

								        button : prev_b
								    },

								    next : {

								        button : next_b

								    }
						

					});
    		});
			
    	});
    }



    $('.testimonials .content li:first-child').addClass('active');   
	$('.testimonials .list li:first-child').addClass('active');
	$('.testimonials .list li').live('click', function(){
		var id = $(this).data('id');
		$(this).parent().find('li').removeClass('active');
		$(this).parent().parent().find('.content').find('li').removeClass('active');
		$(this).parent().parent().find('.content').find('li[data-id="'+id+'"]').addClass('active');
		$(this).addClass('active');
	});
   
	
		
    if($('.widget_top_rated_products .product_list_widget').length > 0){
		$('.widget_top_rated_products .product_list_widget').each(function(){
			var $self = $(this);
			$self.imagesLoaded(function(){
    		
				
				$self.carouFredSel( 
					{
						items:4,

						auto: true,
						scroll: { items : 1, fx: 'fade' }
					});
    		});
		});
	}
	
	/*$('.big_portfolio').live('click', function(e){
		e.preventDefault();
		
		$.ajax({
					type: "POST",
					url: themeple_global.ajaxurl,
					data: 
					{
						action: 'get_big_portfolio',
						
						
					},
                   
					success: function(response)
					{
						
                        	$('.page').prepend(response);
                        
                        
					},
                    complete: function(response){
                        
                    }
                    
                    
				});
			
		$('<a></a>').prependTo('.page').attr({'class':'close_icon', 'href': '#'});
		$('<i class="icon-remove"></i>').prependTo('.close_icon');
		var curr = get_first_big_item();
		active_big_item(get_first_big_item());
		
			curr = next_big_item(curr)
			active_big_item(curr);
		
		
		
	});
	
	function active_big_item(id){

		$('.big_portfolio_container').fadeOut();
		$('#page-bg img').fadeOut();
		$('.big_portfolio_container').livequery(function(){			
			$('.big_portfolio_container[data-id='+id+'] img').prependTo('#page-bg').css('display', 'none').fadeIn();
			$('.big_portfolio_container[data-id='+id+'] img').remove();
			$('.big_portfolio_container[data-id='+id+']').css('display', 'block').fadeIn();
			$('#page-bg img[data-id='+id+']').css('display', 'block').fadeIn();
		}, function(){});
	}
		
	function get_first_big_item(){
		var id = $('.portfolio-item:first').data('id');
		
		return id;
	}

	function next_big_item(curr){
		var id = $('.portfolio-item[data-id='+curr+']').next().data('id');
		if(!id)
			id = get_first_big_item();
		return id;
	}

	$('.close_icon').live('click',function(e){
		e.preventDefault();
		$('#page-bg img').fadeOut('fast');
		$('.big_portfolio_container').fadeOut('fast');
		$('.top_nav').removeClass('transition_height');
		$('header#header').removeClass('fixed_header ').css('opacity', '0.90');
		$('.top_wrapper').show();
		$('footer').show();
		$('#copyright').show();
	});
	
	*/
	
	
	
	if($().mobileMenu) {
		$('#navigation nav').each(function(){
			$(this).mobileMenu();
			$('.select-menu').customSelect();
		});
		
	}
	
	if($('.project_slider').length > 0){
		
		
		setTimeout(function(){
			var slider = $(".project_slider").sliderTabs();
			$('.project_slider').fadeIn(400);
		}, 400);
	}

	$('.flexslider').not('.with_text_thumbnail, .with_thumbnails, .with_thumbnails_carousel, .vertical_slider').each(function(){ 
		var $s = $(this);
		$s.flexslider({
			slideshowSpeed: 6000,
			animationSpeed: 800,
                     
			controlNav: true,
			pauseOnAction: true,
			pauseOnHover: false,
			start: function(slider) {

				$s.find(" .slides > li .flex-caption").each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");
					$(this).addClass("animated " + effect_in);
					

				});
			},
			before: function(slider) {
				var current_slide = $s.find(".slides > li").eq(slider.currentSlide);
				$s.find(".slides > li .flex-caption").removeClass('animated');				
				$(".flex-caption", current_slide).each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");

					$(this).removeClass("animated "+effect_in).addClass("animated " + effect_out);
				});
			},
			after: function(slider) {
				var current_slide = $s.find(".slides > li").eq(slider.currentSlide);
				$s.find(".slides > li .flex-caption").removeClass('animated');				
				$(".flex-caption", current_slide).each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");

					$(this).removeClass("animated "+effect_out).addClass("animated " + effect_in);
				});
			}		
		});
	});
 	$('.with_thumbnails_container').each(function(){
 		var slider = $(this);
 		var slider_content = $('.with_thumbnails', slider);
 		var slider_carousel = $('.with_thumbnails_carousel', slider);
 		
 		slider_carousel.flexslider({
			animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 146,
		    itemMargin: 5,
		    asNavFor: slider_content,

		});

 		slider_content.flexslider({
			animationSpeed: 400,
			animation: "fade",
			pauseOnHover: false,
			controlNav: false,
			sync: slider_carousel,
			start: function(slider) {

				slider_content.find(" .slides > li .flex-caption").each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");
					$(this).addClass("animated " + effect_in);
					

				});
			},
			before: function(slider) {
				var current_slide = slider_content.find(".slides > li").eq(slider.currentSlide);
				slider_content.find(".slides > li .flex-caption").removeClass('animated');				
				$(".flex-caption", current_slide).each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");

					$(this).removeClass("animated "+effect_in).addClass("animated " + effect_out);
				});
			},
			after: function(slider) {
				var current_slide = slider_content.find(".slides > li").eq(slider.currentSlide);
				slider_content.find(".slides > li .flex-caption").removeClass('animated');				
				$(".flex-caption", current_slide).each(function(){
					var effect_in = $(this).attr("data-effect-in");
					var effect_out = $(this).attr("data-effect-out");

					$(this).removeClass("animated "+effect_out).addClass("animated " + effect_in);
				});
			}
		});

		

 	});
	
	$("#attention button.close_button").click(function(){
		$("#attention").height(4);
		$(this).parent().parent().parent().find('.open_button').css('top', 3);
	});
	$("#attention span.open_button").mouseenter(function(){
		$("#attention").height(60);
		$(this).css('top', 59);
	});
	$(".menu a").live('click', function(e){
		var button = $(this);
		
		if(typeof $(button).attr('title') != 'undefined' && $(button).attr('title').length > 0){
			e.preventDefault();
			var title = button.attr('title').split("-");
			
			var blog  = title[0].split("_");
			var third = [0];
			var fourth = [0];
			if(title[1]) 
			var sidebar = title[1].split("_");
		    if(title[2])
		    	third = title[2].split("_");
		    if(title[3])
		    	fourth = title[3].split("_");
			var sidebar_pos = '';
			var blog_type = '';
			if(blog[0] === 'blog'){
				sidebar_pos = sidebar[1];
				blog_type = blog[1];
				document.cookie = 'themeple_blog='+blog_type ;
				document.cookie = 'themeple_sidebar='+sidebar_pos;
				setTimeout(function(){
					window.location.hash = "#wpwrap";
					window.location.href = $(button).attr("href");
								
				}, 1000);
			} 
 			

			if(blog[0] === 'skin'){
				var skin = title[1];
				document.cookie = 'themeple_skin='+skin;
				setTimeout(function(){
					window.location.hash = "#wpwrap";
					window.location.href = $(button).attr("href");
								
				}, 1000);
			} 


			if(blog[0] === 'header'){
				
				blog_type = blog[1];
				if(blog_type == 'header_10'){
					blog_type = 'header_5';
					$('.top_nav .widget.icl_languages_selector').css({display:'none'});
					$('.top_nav #nav_menu-4').css({display:'block'});
				}
				document.cookie = 'themeple_header='+blog_type ;

				setTimeout(function(){
					window.location.hash = "#wpwrap";
					window.location.reload(true);
								 
				}, 1000);
			}

			if(third[0].length > 0){
				if( third[0] == 'columns' || third[0] == 'authimg' ){
					if(third[0] == 'columns')
						document.cookie = 'masonry_cols='+third[1] ;
					if(third[0] == 'authimg')
						document.cookie = 'authimg='+third[1] ;
					setTimeout(function(){
						
						window.location.href = $(button).attr("href");
									 
					}, 1000);
				}
			}
			

			if(fourth[0].length){
				if( fourth[0] == 'columns' || fourth[0] == 'authimg' ){
					if(fourth[0] == 'columns')
						document.cookie = 'masonry_cols='+fourth[1] ;
					if(fourth[0] == 'authimg')
						document.cookie = 'authimg='+fourth[1] ;
					setTimeout(function(){
						
						window.location.href = $(button).attr("href");
									 
					}, 1000);
				}
			}
			
                     
			if(title[0] === 'portfolio_single'){
				 
				
                            
				document.cookie = 'portfolio_single='+title[1] ;
				
			}
        }else{
        	document.cookie = 'themeple_skin=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			setTimeout(function(){
					
					window.location.href = $(button).attr("href");
								 
			}, 1000);

        }
	});
    
	var $container = $('.filterable');
    
      
    if( $('.tpl2 img', $container).size() ) {
		$('.tpl2 img', $container).one("load", function(){
			

				$container.isotope({
					filter: '*',
					resizeble: true,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});
			
		});

		setTimeout(function(){
			$container.isotope({
				filter: '*',
				resizeble: true,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
		}, 100);
   
}
  
 $('nav#portfolio-filter ul li').each(function(){
 	var selector = $(this).find('a').attr('data-filter');

 	if($(selector, $container).length == 0)
 		$(this).hide();
 });
 $('nav#portfolio-filter ul li').click(function(){
    var selector = $(this).find('a').attr('data-filter');
    $(this).parent().find('.active').removeClass('active');
    $(this).addClass('active');
    $container.isotope({ 
    filter: selector,
    
	resizeble: true,
    animationOptions: {
		duration: 750,
		easing: 'linear',
		queue: false    
     }
    });
    return false;
  });
	 
 	

 	$('#blog-filter li').click(function() {
 				
				$('#blog-filter li').each(function() { 
						$(this).removeClass("active")
				});
				var $li = $(this);
				api.megafilter($(this).data('category'));
				$li.addClass("active");
	});

	
	$('nav#faq-filter li a').click(function(e){
		e.preventDefault();

		var selector = $(this).attr('data-filter');

		$('.faq .accordion-group').fadeOut();
		$('.faq .accordion-group'+selector).fadeIn();

		$(this).parents('ul').find('li').removeClass('active');
		$(this).parent().addClass('active');
	});

	$("#switcher-head .button").toggle(function(){
		$("#style-switcher").animate({
			left: 0
		}, 500);
	}, function(){
		$("#style-switcher").animate({
			left: -263
		}, 500);
	});

	
	if($('.header_page.animated_header .animated_part').length > 0){
	    var a = 20;

	    var b = [];
	    var i;
	    for (i = 0; i < a; i++) {
	        b[i] = new Spark()
	    }
	 
	}

	if($('.swiper_slider').length > 0){
	  var slide_per_view = $('.swiper_slider').data('slidenr');

		if ($(".container").css("max-width") == "940px" ){
			slide_per_view = 4;
		}else if ($(".container").css("max-width") == "420px" ){
			slide_per_view = 1;
		}else if ($(".container").css("width") == "724px" ){
			slide_per_view = 2;
		}else if ($(".container").css("max-width") == "300px" ){
			slide_per_view = 1;
		}
	  var swiperParent = new Swiper('.swiper_slider',{
	    slidesPerView: slide_per_view
	  });
	  var nested = [];
	  $('.swiper_slider').find('.swiper-container').each(function(){
	  		var id = $(this).data('nested-id');
	  		var nes = new Swiper('.swiper-nested-'+id ,{
			    mode: 'vertical',
			    paginationClickable: true,
			    slidesPerView: 1
			});
			nested.push(nes);
	  });
	}

	


	

	/* Woocommerce */
	if($('.add_to_cart_button').length > 0){
		
		$('body').on('adding_to_cart', function(event, param1, param2){
			var $thisbutton = param1;
			var $product = $thisbutton.parents('.product').first();
			var $load = $product.find('.loading_ef');
			$load.css('opacity', 1);
			$('body').on('added_to_cart', function(event, param1, param2){
				
				$load.css('opacity', 0);
				
				setTimeout(function(){$load.html('<i class="moon-checkmark"></i>'); $load.css('opacity', 1);}, 500);
				setTimeout(function(){$load.css('opacity', 1);}, 400);
				setTimeout(function(){$load.css('opacity', 0);}, 2000);
				$product.addClass('product_added_to_cart');
			});
		});

		
	}
	

	/* End Woocommerce */


	/* For Online  */

	if($('.menu li a[href="http://novus.moutheme.com/?page_id=581"]').length > 0){
		$('.menu li a[href="http://novus.moutheme.com/?page_id=581"]').each(function(){
			$(this).parent().removeClass('current-menu-item');
			$(this).parent().removeClass('current-menu-parent');
			$(this).parent().removeClass('current-menu-ancestor');
		});
		if(document.URL == 'http://novus.moutheme.com/?page_id=581')
			$('.menu > li > a[href="http://novus.moutheme.com/?page_id=581"]').parent().addClass('current-menu-item');
	}


	/* End For Online */

	/* Resize */

	$(window).resize(function(){	
		var width = 1100;
		if ($(".kwicks").css("width") == "940px" ){
			width = 940;
		}else if ($(".kwicks").css("width") == "420px" ){
			width = 420;
		}else if ($(".kwicks").css("width") == "724px" ){
			width = 724;
		}else if ($(".kwicks").css("width") == "300px" ){
			width = 300;
		}else if ($(".kwicks").css("width") == "1100px" ){
			width = 1100;
		}
		if($('.kwicks').length > 0){
				$('.kwicks').css({opacity:0});
				
					$(this).accordion({
						width:width, 	
						height:400, 		
						barSize:45,  	
						cover:false,		
						coverAlpha:0.1,
						shadow:false,	
						shadowAlpha:1,			
						border:true,	
						borderSize:2,		
						borderColor:"#ffffff",	
						transitionTime:0.3,	
						autoplay:true,	
						autoplayTime:5,	
						changeType:"over"
					});
					$(this).animate({opacity:1}, 400);
			


		}
		

		if($('.swiper_slider').length > 0){
		  var slide_per_view = $('.swiper_slider').data('slidenr');

			if ($(".container").css("max-width") == "940px" ){
				slide_per_view = 4;
			}else if ($(".container").css("max-width") == "420px" ){
				slide_per_view = 1;
			}else if ($(".container").css("width") == "724px" ){
				slide_per_view = 2;
			}else if ($(".container").css("max-width") == "300px" ){
				slide_per_view = 1;
			}
		  var swiperParent = new Swiper('.swiper_slider',{
		    slidesPerView: slide_per_view
		  });
		  var nested = [];
		  $('.swiper_slider').find('.swiper-container').each(function(){
		  		var id = $(this).data('nested-id');
		  		var nes = new Swiper('.swiper-nested-'+id ,{
				    mode: 'vertical',
				    slidesPerView: 1
				});
				nested.push(nes);
		  });
		}
		
	});
    
    $(".page_item_has_children").each(function(){
   
    $(this).click(function(){
   

        $(this).find('.children').toggle(400);
        $(this).toggleClass('open-child');
       
    });

  });

   $('.right_search').click(function(event){

   	  $('.right_search_container').toggle();
   	    event.stopPropagation();

   });
   $('html').click(function(e) {
       if((e.target.id != 's')) {
        $('.right_search_container').hide();
    }
   });
 

   $('li.current_page_item').parents('.children').css({ display: 'block' });
   $('.current_page_ancestor').addClass('open-child');

    
	/* Resize */

	$('.mobile_small_menu').click(function(){
		if($(this).hasClass('open')){
			$('.menu-small').slideDown(400);
			$('.tparrows').hide();
			$('.top_wrapper').hide();
			$(this).removeClass('open').addClass('close');
		}else if($(this).hasClass('close')){
			$('.menu-small').slideUp(400);
			$('.tparrows').show();
			$('.top_wrapper').show();
			$(this).removeClass('close').addClass('open');
		}
	});

	
});


var Spark = function () {
    var a = this;;
    this.n = document.createElement("div");
    this.caculateStyle().newSpeed().newPoint().
		display().newPoint().fly()
	};

	Spark.prototype.display = function () {
	    jQuery(this.n).attr("style", this.style).
			css("position", "absolute").css("z-index", -1).
				css("top", this.pointY).
					css("left", this.pointX);
	    jQuery('.header_page.animated_header .animated_part').append(this.n);
	    return this
	};
	Spark.prototype.caculateStyle= function(){
		var size = this.random(18) + 2;
		var alpha = 0.2 + 0.8 * 2/size;
		var shadowAlpha = alpha*2;
		this.style = "border-radius: 50%;";
		this.style = this.style	+ "width:" + size + 
			"px;height:" + size + "px;";
		this.style = this.style + "box-shadow:0 0 " + 
			size+"px rgba(255,255,255,"+ shadowAlpha +");";
		this.style = this.style + "background-color:" + 
			"rgba(255,255,255,"+ alpha +");";
		return this;
	}
	Spark.prototype.fly = function () {
	    var a = this;
	    jQuery(this.n).animate({
	        top: this.pointY,
	        left: this.pointX
	    }, this.speed, "linear", function () {
	        a.newSpeed().newPoint().fly()
	    })
	};
	Spark.prototype.newSpeed = function () {
	    this.speed = (this.random(10) + 5) * 1100;
	    return this
	};
	Spark.prototype.newPoint = function () {

	    this.pointX = this.random(jQuery('.header_page.animated_header .animated_part').width());
	    this.pointY = this.random(jQuery('.header_page.animated_header .animated_part').height());
	    return this
	};
	Spark.prototype.random = function (a) {
	    return Math.ceil(Math.random() * a) - 1
	};



