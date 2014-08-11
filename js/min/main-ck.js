;(function($) {

	window.main = {
		init: function(){

			$('a[href^=#].scroll-to-btn').click(function(){
				var target = $($(this).attr('href'));
				var offsetTop = (target.length != 0) ? target.offset().top : 0;
				$('html,body').animate({scrollTop: offsetTop},'slow');
				return false;
			});

			
			$("#footer .carousel" ).clone().appendTo( "#menu-secondary-header-nav .news .sub-menu");
			$( "#menu-secondary-header-nav .news .sub-menu li" ).wrapAll( "<div class='nav' />");

	        if($.fn.expander){
	        	$('.expander').expander({
	        		expandText: 'More <i class="icon icon-down-chevron"></i>',
	        		userCollapseText: 'Less <i class="icon icon-up-chevron"></i>',
	        		slicePoint: 500,
	        		expandSpeed: 0,
	        		collapseSpeed: 0
	        	});
	        }			

			$.fn.simpleSlider = function(options) {
						
				var defaults = {
					navigation: true,
					prevText: "Prev",
					nextText: "Next",
					pagination: true,
					autoplay: false,
					delay: 8000,
					speed: 500,
					numItems: 1
				};
				var options = $.extend(defaults, options);

				var animateSlider = function(elem, compteur, opts) {
					elem.animate({
						marginLeft: -compteur + "%",
						marginTop: 0
					},  { 
						queue:false, 
						duration:options.speed 
					});
				}
				
				return this.each(function() {
				
					var opts 		= options;
					var $this 		= $(this);              
					var elements 	= $this.children("div");
					var element		= elements.eq(0);
					var compteur 	= 0;
					var tmp_width = elements.width();
					var parentWidth = elements.parent().width();
					var percent = (100*tmp_width/parentWidth)/elements.length;
					var numItems = (opts.numItems > elements.length || opts.numItems < 1) ? parseInt(elements.length) : parseInt(opts.numItems);
					var largeur = ((100/numItems)*tmp_width/parentWidth);

					elements.addClass("slide").css({"width": percent + "%"});
					
					$this.css({"width": (100/numItems)*elements.length+"%"});
		
					if (opts.navigation) {
						if (elements.length > 1) {
							
							var prev_link = $("<a/>", {
								href: "#",
								html: opts.prevText
							}).addClass("prev nav icons-arrow-left");
							
							var next_link = $("<a/>", {
								href: "#",
								html: opts.nextText
							}).addClass("next nav icons-arrow-right");
							$this.parent().parent().prepend(prev_link);
							$this.parent().parent().append(next_link);
						
							prev_link.bind("click", function(e){
								if (compteur <= 0) compteur = largeur*(elements.length-numItems);
								else compteur -= largeur;
								animateSlider($this, compteur, opts);
								e.preventDefault();
							});
					
							next_link.bind("click", function(e){
								if (compteur >= largeur*(elements.length-numItems)) compteur = 0;
								else compteur += largeur;
								animateSlider($this, compteur, opts);
								e.preventDefault();
							});
						}
					}

					if (opts.pagination) {
						if (elements.length > 1) {
							var pagination_slider = $(document.createElement('div'));
							pagination_slider.attr("class", "carousel-index");
							
							elements.each(function(i) {
								var lien = $("<a/>", {
									href: "#",
									html: i+1
								}).addClass("slide-index slide-"+(i+1));
								pagination_slider.append(lien);
							});
							
							$this.parent().after(pagination_slider);

							pagination_slider.find("a").bind("click", function(e){
								var index_lien = $(this).index()+1;
								var parite_divs = elements.length % 2 == 0 ? 1 : 0;
								var parite_items = numItems % 2 == 0 ? 0 : 0.5;
								
								if (numItems > 1) {
									if (index_lien == 1 || index_lien <= (numItems/2)-parite_divs-parite_items) {
											compteur = 0;
									} else if (index_lien > (numItems/2)-parite_items && index_lien < (elements.length-((numItems/2)-1-parite_items)) ) {
										compteur = largeur*(index_lien-(numItems/2)-parite_items);
									} else if (index_lien >= elements.length) {
										compteur = largeur*(index_lien-numItems);
									} 
								} else {
									if (index_lien == 1) {	
										compteur = 0;
									} else {
										compteur = largeur*(index_lien-numItems);
									}
								}

								pagination_slider.find("a").not($(this)).removeClass("clic");
								$(this).addClass("clic");
								animateSlider($this, compteur, opts);
								e.preventDefault();
							});
						}
					}
			
					if (opts.autoplay) {
						if (elements.length > 1) {
							window.setInterval(function(){
								if (compteur >= largeur*(elements.length-numItems)) compteur = 0;
								else compteur += largeur;
								animateSlider($this, compteur, opts);
							}, opts.delay);
						}
					}
				});
			};
			$(window).resize(this.resize);

		},


		loaded: function(){
			this.setBoxSizing();
			if($.fn.simpleSlider){
				$(".news-slider").simpleSlider({
					navigation: true,
					prevText: "",
					nextText: "",
					pagination: false,
					autoplay: false,
					speed: 500,
					numItems: 2
				});
			}				
		},

		equalHeight: function(){
			if($('.equal-height').length !== 0){
		
				var currTallest = 0,
				currRowStart = 0,
				rowDivs = new Array(),
				topPos = 0;

				$('.equal-height').each(function() {

					var element = $(this);
					topPos = element.offset().top;
					element.height('auto');
					if (currRowStart != topPos) {

						for (i = 0 ; i < rowDivs.length ; i++) {
							rowDivs[i].height(currTallest);
						}

						rowDivs.length = 0;
						currRowStart = topPos;
						currTallest = element.height();
						rowDivs.push(element);
					} else {
						rowDivs.push(element);
						currTallest = (currTallest < element.height()) ? (element.height()) : (currTallest);
					}

					for (i = 0 ; i < rowDivs.length ; i++) {
						rowDivs[i].height(currTallest);
					}
				});
			}
		},

		containerHeight: function() {
			var highestCol = Math.max($('#sidebar').outerHeight(true), $('#content').outerHeight(true));
			$('#page, #sidebar, #content').height(highestCol);
		},

		productNav: function() {
			var container = $('#sidebar ul.product-categories'),
				parent = $('.cat-parent', container),
				current = $('.current-cat, .current-cat-parent', container);

			$.each(parent, function() {
				 $(this).prepend('<span></span>');
			});

			var chevron = $('span', parent);

			chevron.click(function() {
				$(this).toggleClass('open');
				$(this).nextAll('ul.children').first().slideToggle(200);
			});

			if ( parent.is('.current-cat, .current-cat-parent')) {
				$.each(current, function() {
					$('span', this).first().addClass('open');
					$('.children', this).first().show();
				});
			}

		},

		setBoxSizing: function(){
			if( $('html').hasClass('no-boxsizing') ){
		        $('.span:visible').each(function(){
		        	console.log($(this).attr('class'));
		        	var span = $(this);
		            var fullW = span.outerWidth(),
		                actualW = span.width(),
		                wDiff = fullW - actualW,
		                newW = actualW - wDiff;
		 			
		            span.css('width',newW);
		        });
		    }
		},		
		
		resize: function(){
			main.equalHeight();

			if ($(window).width() < 900) {

			}			
		}
	}

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
		main.equalHeight();	
		main.productNav();
		main.containerHeight();

        $('.popup-youtube').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false
        });	

	        $('a.img').magnificPopup({
	          type: 'image',
	          closeOnContentClick: true,
	          image: {
	            verticalFit: true
	          }	          
	        });        	

		if ($(window).width() < 900) {
			//responsive stuff here
		}
		
	});

})(jQuery);
