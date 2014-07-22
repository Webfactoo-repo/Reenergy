(function($)
{
	
   
	$.fn.big_portfolio = function(variables) 
	{
		return this.each(function()
		{

			var container = $(this);
			if(container.length != 1) return;
			


			var linkButton = $('.big_portfolio', container),
				

				saveData = {
								
								ajaxUrl :		    themeple_global.ajaxurl,
								
							 };

			
			linkButton.live('click', {set: saveData}, methods.mainFunction);
			

			var nextButton = $('.next_big_portfolio'),
				prevButton = $('.prev_big_portfolio'),
				closeButton = $('.close_icon');

			if(container.hasClass('single-portfolio'))
				saveData.curr_id = $('.portfolio_single').data('id');
			nextButton.live('click', {set: saveData}, methods.getNext);
			prevButton.live('click', {set: saveData}, methods.getPrev);
			closeButton.live('click', {set: saveData}, methods.close);
			});
	};
	
	var	methods = {

			mainFunction: function(passed)
			{
			     
				passed.preventDefault();
				var params = passed.data.set,
					clickedLink = $(this);

					$('#page-bg').remove('img');
					$('.close_icon').remove();
					$('.big_portfolio_container').remove();
					$('#copyright').hide();
					$('body').addClass('big_portfolio_page');
					$('.top_nav').addClass('transition_height');
					$('header#header').addClass('fixed_header').css('opacity', '0.95');
					$('.top_wrapper').fadeOut('fast');
					$('footer').css('display', 'none');
					$('<a></a>').prependTo('body').attr({'class':'close_icon', 'href': '#'});
					$('<i class="icon-remove"></i>').prependTo('.close_icon');
					$('<a></a>').prependTo('body').attr({'class':'next_big_portfolio', 'href': '#'});
					$('<i class="icon-chevron-right"></i>').prependTo('.next_big_portfolio');
					$('<a></a>').prependTo('body').attr({'class':'prev_big_portfolio', 'href': '#'});
					$('<i class="icon-chevron-left"></i>').prependTo('.prev_big_portfolio');
					methods.getFirst(params);
					
					
					
			},

			getFirst: function(params)
			{
				
				
				params.action = 'get_big_portfolio_first';
		
                $.ajax({
					type: "POST",
					url: params.ajaxUrl,
					data: params,
					
					success: function(response)
					{
						
					   $('.big_portfolio_container').remove();
					   $('#page-bg img').remove();
					   $(response).insertAfter('.top_nav');
					   
						
					},
					complete: function(response)
					{	

						var link = $('.big_portfolio_container img').attr('src');
						$('#page-bg').css({'opacity': 0, 'background-image': 'url('+link+')'}).animate({opacity: 1}, 400);
						$('.big_portfolio_container img').remove();
						$('.big_portfolio_container').css('display', 'block').fadeIn();
						$('#page-bg img').css('display', 'block').fadeIn();
						
						
						
						methods.havePrev(params);
						methods.haveNext(params);	
						
					}
				});
			},

			getNext: function(passed)
			{
				$('.prev_big_portfolio').fadeOut();
				$('.next_big_portfolio').fadeOut();

				passed.preventDefault();
				var params = passed.data.set;
				params.action = 'get_big_portfolio_next';
				params.curr_id = $('.big_portfolio_container').data('id');
				
				$.ajax({
					type: "POST",
					url: params.ajaxUrl,
					data: params,
					
					success: function(response)
					{
						
					   $('.big_portfolio_container').fadeOut().remove();
					   $('#page-bg img').fadeOut().remove();
					   $(response).insertAfter('.top_nav');
					   
						
					},
					complete: function(response)
					{	

						var link = $('.big_portfolio_container img').attr('src');
						$('#page-bg').css({'opacity': 0, 'background-image': 'url('+link+')'}).animate({opacity: 1}, 400);
						$('.big_portfolio_container img').remove();
						$('.big_portfolio_container').css('display', 'block').fadeIn();
						$('#page-bg img').css('display', 'block').fadeIn();
						methods.havePrev(params);
						methods.haveNext(params);
					}
				});

			},

			getPrev: function(passed)
			{
				$('.prev_big_portfolio').fadeOut();
				$('.next_big_portfolio').fadeOut();

				passed.preventDefault();
				var params = passed.data.set;
				params.action = 'get_big_portfolio_prev';
				params.curr_id = $('.big_portfolio_container').data('id');
				
				$.ajax({
					type: "POST",
					url: params.ajaxUrl,
					data: params,
					
					success: function(response)
					{
					 
					   $('.big_portfolio_container').fadeOut().remove();
					   $('#page-bg img').fadeOut().remove();
					   $(response).insertAfter('.top_nav');
					   
						
					},
					complete: function(response)
					{	

						var link = $('.big_portfolio_container img').attr('src');
						$('#page-bg').css({'opacity': 0, 'background-image': 'url('+link+')'}).animate({opacity: 1}, 400);
						$('.big_portfolio_container img').remove();
						$('.big_portfolio_container').css('display', 'block').fadeIn();
						$('#page-bg img').css('display', 'block').fadeIn();
						methods.havePrev(params);
						methods.haveNext(params);
					}
				});

			},

			haveNext: function(params)
			{
				
				
				params.action = 'check_next';
				params.curr_id = $('.big_portfolio_container').data('id');
				
				$.ajax({
					type: "POST",
					url: params.ajaxUrl,
					data: params,
					
					success: function(response)
					{
						

					   if(response.trim() == 'yes'){

					   		$('.next_big_portfolio').fadeIn();
					   		
						}else
							$('.next_big_portfolio').fadeOut();
					   
						
					},
					complete: function(response)
					{	

						
		
					}
				});

				return false;
			},

			havePrev: function(params)
			{
				
				params.action = 'check_prev';
				params.curr_id = $('.big_portfolio_container').data('id');
				var rt = false;
				$.ajax({
					type: "POST",
					url: params.ajaxUrl,
					data: params,
					
					success: function(response)
					{
					   
					   if(response.trim() == 'yes'){

					   		$('.prev_big_portfolio').fadeIn();
						}else
							$('.prev_big_portfolio').fadeOut();
						
					},
					complete: function(response)
					{	
						
					   	
						
		
					}

					
				});
				return rt;
				
			},

			close: function(passed) 
			{
				passed.preventDefault();
				$('#page-bg img').fadeOut('fast').remove();
				$('#page-bg').css('background-image', 'none');
				$('.big_portfolio_container').fadeOut('fast').remove();
				$('.top_nav').removeClass('transition_height');
				$('header#header').removeClass('fixed_header ').css('opacity', '1');
				$('.close_icon').remove();
				$('.prev_big_portfolio').remove();
				$('.next_big_portfolio').remove();
				$('.top_wrapper').css('z-index', '0').show();
				$('footer').show();
				$('#copyright').show();
				$('body').removeClass('big_portfolio_page');
			}
            
            
				
		};
	
	
})(jQuery);	 