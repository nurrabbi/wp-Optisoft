;(function ($) {


'use strict';

	$('a[href=\\#]').on('click', function (e) {
		e.preventDefault();
	})

    var Techly = {
		
        _init: function () {
			
            var offCanvas = {
                menuBar: $('.trigger-off-canvas'),
                drawer: $('.techly-offcanvas-drawer'),
                drawerClass: '.techly-offcanvas-drawer',
                menuDropdown: $('.dropdown-menu.depth_0'),
            };
			// Techly.rtCustomEase();

            Techly.menuDrawerOpen(offCanvas);
            Techly.offcanvasMenuToggle(offCanvas);
            Techly.headerSearchOpen();
            Techly.backToTop();
            Techly.counterUp();
            Techly.pricingTab();
            Techly.preLoader();
            Techly.menuOffset();
            Techly.AjaxSearch();
            Techly.headRoom();
            Techly.wow();
            Techly.rtElementorParallax();
            Techly.magnificPopup();
            Techly.imageFunction();
            Techly.hasAnimation();
            Techly.rtMasonary();
			Techly.rtIsotope();
            Techly.swiperSlider($);
            Techly.horizontalSwiperSlider();
            Techly.heroSlider();
			Techly.ProgressBar();
			Techly.rtOpenTabs();
			Techly.rtgsap();
			Techly.rtScrollTrigger();
			Techly.rtparallaxie();
			Techly.mousemove_project_hover_effect();
			Techly.ImgcolumnList();
			Techly.CustomCursor();

			Techly.rtImageAnim1();
			Techly.rtImageAnim2();
			Techly.rtImageAnim3();
			Techly.rtImageAnim4();
			Techly.rtImageRotate();
			Techly.rtShapeMove();
			Techly.HoverReval();
			Techly.rtAccordion();
			
        },

		HoverReval: function(){
			const hoverItem = document.querySelectorAll(".hover-reveal-item");
			function moveImage(e, hoverItem) {
				const item = hoverItem.getBoundingClientRect();
				const x = e.clientX - item.x;
				const y = e.clientY - item.y;
				if (hoverItem.children[1]) {
					hoverItem.children[1].style.transform = `translate(${x}px, ${y}px)`;
				}
			}
			hoverItem.forEach((item, i) => {
				item.addEventListener("mousemove", (e) => {
					setInterval(moveImage(e, item), 100);
				});
			});
		},
		rtgsap: function() {
			gsap.config({
				nullTargetWarn: false,
			});
			
			if($('.text-animation-style-1').length) {
				var txtheading = $(".text-animation-style-1");
				if(txtheading.length == 0) return; gsap.registerPlugin(SplitText); txtheading.each(function(index, el) {
				el.split = new SplitText(el, {
					type: "lines,words,chars",
					linesClass: "split-line"
				});

				if( $(el).hasClass('techly-title-anim') ){
					gsap.set(el.split.chars, {
						opacity: .3,
							x: "-7",
						});
					}
					el.anim = gsap.to(el.split.chars, {
						scrollTrigger: {
							trigger: el,
							start: "top 92%",
							end: "top 60%",
							markers: false,
							scrub: 1,
						},

						x: "0",
						y: "0",
						opacity: 1,
						duration: .7,
						stagger: 0.2,
					});

				});
			}
			if (window.innerWidth > 1199) {
				gsap.utils.toArray('.rt_left_anim').forEach((el, index) => {
					let tlcta = gsap.timeline({
						scrollTrigger: {
							trigger: el,
							scrub: 1,
							end: "top 40%",
							start: "top 100%",
							ease: "Back.easeOut",
							toggleActions: "play none none reverse",
							markers: false
						}
					})

					tlcta
					.set(el, {transformOrigin: 'center center'})
					.from(el, { opacity: 1, scale: .8, xPercent: "100"}, {opacity: 1, scale: 1, xPercent: 0, duration: 1, immediateRender: false})
				});
			}

			if (window.innerWidth > 1199) {
			
				gsap.utils.toArray('.rt_right_anim').forEach((el, index) => {
					let tlcta = gsap.timeline({
						scrollTrigger: {
							trigger: el,
							scrub: 1,
							end: "top 40%",
							start: "top 100%",
							ease: "Back.easeOut",
							toggleActions: "play none none reverse",
							markers: false
						}
					})

					tlcta
					.set(el, {transformOrigin: 'center center'})
					.from(el, { opacity: 1, scale: .8, xPercent: "-100"}, {opacity: 1, scale: 1, xPercent: 0, duration: 1, immediateRender: false})
				});
			}
			gsap.utils.toArray('.right_view').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top 30%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'center center'})
				.from(el, { opacity: 1, scale: .5,  xPercent: "-100"}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
			});
			gsap.utils.toArray('.right_view_2').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top 30%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'center center'})
				.from(el, { opacity: 1, scale: .5,  x: "200"}, {opacity: 1, x: 0, duration: 1, immediateRender: false})
			});

			gsap.utils.toArray('.up_view').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top 40%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'center center'})
				.from(el, { opacity: 1, scale: 1, yPercent: "50"}, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
			});

		

			gsap.utils.toArray('.up_view_2').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top 30%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'center center'})
				.from(el, { opacity: 1, scale: 1, yPercent: "50"}, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
			});
			
			gsap.utils.toArray(".bottom_view").forEach(element => {
				const animTime = parseFloat(element.getAttribute("ty-anim-time")) || 1;

				gsap.fromTo(
				element,
				{
					clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)"
				},
				{
					clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
					ease: "power2.out",
					duration: animTime,
					scrollTrigger: {
					trigger: element,
					start: "top 70%",
					toggleActions: "play none none reverse",
					markers: false,
					},
				}
				);
			});
			
			gsap.utils.toArray('.left_view').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top 30%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'center center'})
				.from(el, { opacity: 1, scale: .5, x: "200"}, {opacity: 1, x: 0, duration: 1, immediateRender: false})
			});

			gsap.utils.toArray('.bg-reveal-section').forEach((el) => {
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 2,
						start: "top 50%",
						end: "top 70%",
						toggleActions: "play none none reverse",
						markers: false,
					}
				});

			tl
			.set(el, { transformOrigin: "center center" })
			.from(
				el,
				{ opacity: 1, width: "500", borderRadius: 400 },
				{
					opacity: 1,
					width: 1920,
					borderRadius: 0,
					duration: 2,
					stagger: 1,
					immediateRender: false,
				}
			);
		});

		// ScrollTrigger.getAll().forEach(trigger => trigger.kill());	
			if(window.innerWidth> 1199){
				let tl = gsap.timeline();
				let projectpanels = document.querySelectorAll('.tech-service-panel');
				let baseOffset = 50;
				let offsetIncrement = 24;
				projectpanels.forEach((section, index) => {
					let topOffset = baseOffset + (index * offsetIncrement);
					tl.to(section, {
						scrollTrigger: {
							trigger: section,
							pin: section,
							scrub: 1,
							start: `top ${topOffset}px`,
							end: "bottom 60%",
							endTrigger: '.tech-service-pin',
							pinSpacing: false,
							markers: false,
						},
					});
				});
			};
			
			if(window.innerWidth> 1199){
				let proSroll = gsap.timeline();
				let otherSections_2 = document.querySelectorAll('.tech-sticky-item')
				otherSections_2.forEach((section, index) => {
					gsap.set(otherSections_2, {
						scale: 1
					});
					proSroll.to(section, {
						scale: index === otherSections_2.length - 1 ? 1 : 0.9,
						scrollTrigger: {
							trigger: section,
							pin: section,
							scrub: 1,
							start: 'top 0%',
							end: "bottom 60%",
							ease: "none",
							endTrigger: '.blog-list-2',
							pinSpacing: false,
							markers: false,
						},
					})
				});
			};
			
			gsap.utils.toArray('.right_side_view_1').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: ".techly-banner-sec",
						scrub: 1,
						end: "top -40%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'bottom bottom'})
				.from(el, { opacity: 1, scale: 1,  xPercent: -100}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
			});

			gsap.utils.toArray('.right_side_view_2').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: ".techly-banner-sec",
						scrub: 2,
						end: "top -50%",
						start: "top 90%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'bottom bottom'})
				.from(el, { opacity: 1, scale: 1, xPercent: -100}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
			});

			gsap.utils.toArray('.slider_view_1').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top -80%",
						start: "top 0%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'top'})
				.from(el, { opacity: 1, scale: 1,  y: "-=300"}, {opacity: 1, y: 0, duration: 1, immediateRender: false})
			});

			gsap.utils.toArray('.slider_view_2').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 1.5,
						end: "top -40%",
						start: "top 100%",
						toggleActions: "play none none reverse",
						markers: false
					}
				})

				tlcta
				.set(el, {transformOrigin: 'bottom bottom'})
				.from(el, { opacity: 1, scale: 1, y: "+=300"}, {opacity: 1, y: 0, duration: 1, immediateRender: false})
			});


			var Techbox = gsap.timeline({
				scrollTrigger: {
					trigger: ".tech-box-section",
					start: "top 70%",
					toggleActions: "play reverse play reverse",
					markers: false,
				},
			})
			Techbox
			.from(".tech-box-item", {
				yPercent: 100,
				opacity: 0,
				ease: "back.out(1.5)",
				duration: 1,
				stagger: -.3,
			})

		},

		rtScrollTrigger: function(){
			ScrollTrigger.refresh();
		},
		rtImageAnim1: function() {
			gsap.utils.toArray(".rt-image-anim").forEach(element => {
			const animTime = parseFloat(element.getAttribute("ty-anim-time")) || 1;
				gsap.fromTo(
					element,
					{ clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)" },
					{
						clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
						ease: "ease1",
						duration: animTime,
						scrollTrigger: {
							trigger: element,
							start: "top 50%",
							toggleActions: "play none none reverse",
							markers: false,
						},
					}
				);
			});
		},
		rtImageAnim2: function() {
			gsap.utils.toArray('.ty-shape-circle').forEach((el, index) => {
				let tlcta = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 3,
						start: "top 0%",
						end: "top -100%",
						toggleActions: "play reverse none reverse",
						markers: false,
					}
				})

				tlcta
				.set(el, {transformOrigin: 'top top'})
				.fromTo(el, { y: -300}, { y: 300, duration: 1})
			});
		},
		rtImageAnim3: function() {
			gsap.utils.toArray(".rt-image-zoom").forEach(function (container) {
				let image = container.querySelector("img");
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: container,
						scrub: true,
						pin: false,
					},
				});
				tl.from(image, {
					scale: 1.5,
					filter: "grayscale(1)",
					ease: "none",
				}).to(image, {
					scale: 1,
					filter: "grayscale(0)",
					ease: "none",
				});
			});
		},
		rtImageAnim4: function() {
			gsap.utils.toArray(".rt-image-anim4").forEach(element => {
				const animTime = parseFloat(element.getAttribute("ty-anim-time")) || 1;
				gsap.fromTo(
				element,
				{
					clipPath: "polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)"
				},
				{
					clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
					ease: "power2.out", // 'ease1' is not a GSAP default ease
					duration: animTime,
					scrollTrigger: {
					trigger: element,
					start: "right 50%",
					toggleActions: "play none none reverse",
					markers: false,
					},
				}
				);
			});
		},
		rtImageRotate: function () {
			gsap.utils.toArray(".rt-image-rotate").forEach(element => {
				const animTime = parseFloat(element.getAttribute("ty-anim-time")) || 1;

				gsap.to(element, {
				rotation: 360,
				ease: "none",
				duration: animTime,
				scrollTrigger: {
					trigger: element,
					start: "top 90%",
					end: "bottom top",
					scrub: true,
					toggleActions: "play none none reverse",
					markers: false,
				},
				});
			});
		},


		rtShapeMove: function () {
			const revealSection = document.getElementById("revealSection");
			const items = document.querySelectorAll(".shape-item");
			let activated = false;
			
			if(!revealSection) {
				return false;
			}
			

			window.addEventListener("scroll", () => {
				const sectionTop = revealSection.getBoundingClientRect().top;
				const triggerPoint = window.innerHeight / 1.2;

				if (sectionTop < triggerPoint && !activated) {
					activated = true; 
					items.forEach((item, index) => {
						setTimeout(() => {
							item.classList.add("active");
						}, index * 200);
					});
				}
			});
		},
		rtAccordion: function () {
			const items = document.querySelectorAll('.rt-working-accordion-item .working-accordion-box');

			function activateItem(item) {
			items.forEach(i => {
				if(i === item){
				gsap.to(i, {flexGrow: 2, duration: 0.6, ease: "power2.out"});
				gsap.to(i.querySelector('.working-thumb'), {opacity:1, scale:1.05, duration:0.6});
				gsap.to(i.querySelector('.working-content p'), {opacity:1, y:-10, duration:0.6});
				} else {
				gsap.to(i, {flexGrow: 1, duration: 0.6, ease: "power2.out"});
				gsap.to(i.querySelector('.working-thumb'), {opacity:0, scale:1, duration:0.6});
				gsap.to(i.querySelector('.working-content p'), {opacity:0, y:0, duration:0.6});
				
				}
			});
			}

			// Initial active item
			const initial = document.querySelector('.working-accordion-box.active');
			if(initial) activateItem(initial);

			// Hover events
			items.forEach(item => {
			item.addEventListener('mouseenter', () => activateItem(item));
			});
		},
		

		// Project Hover
		mousemove_project_hover_effect: function () {
			if (jQuery( window ).width() > 0 ) {
				if ( (".project-mousemove").length > 0 ) {
					jQuery(".project-mousemove .project-item").each(function() {
						let $Purpose = jQuery(this);
						let $PurposeInner = $Purpose.find('.project-hover-effect');
						$Purpose.mousemove(function(event){
							let y = event.pageY - $Purpose.offset().top + 10;
							let x = event.pageX - $Purpose.offset().left + 10;
							$PurposeInner.css({'top': y,'left': x,'bottom': "auto",'right': "auto",'opacity': 1});
						})
							.mouseleave(function() {
								$PurposeInner.css({'top': 'auto','left': 10,'bottom': 10,'right': "auto",'opacity': 0});
							});
					});
				}
			}
		},
		
		ImgcolumnList: function(){
			$(document).ready(function(){
			// Default first image + first title active
				$(".image-column [data-list-img]:first").addClass("active");
				$(".list-item:first .list-title").addClass("active");

				// Hover trigger
				$(".list-item").hover(function () {
					var t = $(this).attr("data-list-hover");

					// Remove previous active classes
					$(".image-column [data-list-img]").removeClass("active");
					$(".list-item .list-title").removeClass("active");

					// Add active to current
					$('.image-column [data-list-img="' + t + '"]').addClass("active");
					$(this).find(".list-title").addClass("active");
				});
			});
		},

		
		// Custom cursor
		CustomCursor: function() {
			let clientX = -100;
			let clientY = -100;
			let lastX = -100;
			let lastY = -100;
			const cursor = document.querySelector('.cursor')

			const sections = document.querySelectorAll('.custom-cursor-swiper .swiper-wrapper'); // Common class for all Swiper sections

			if (!cursor || sections.length === 0) return;

			sections.forEach(section => {
				const links = section.querySelectorAll('.swiper-slide a');

				section.addEventListener('mouseenter', () => {
					cursor.classList.add('visible')
				})

				section.addEventListener('mouseleave', () => {
					cursor.classList.remove('visible')
				})

			});

			// function for linear interpolation of values
			const lerp = (a, b, n) => {
				return (1 - n) * a + n * b;
			};

			const initCursor = () => {
				if (!cursor) return

				// add listener to track the current mouse position
				document.addEventListener('mousemove', e => {
					clientX = e.clientX;
					clientY = e.clientY;
				});

				// transform the cursor to the current mouse position
				// use requestAnimationFrame() for smooth performance
				const render = () => {
					// lesser delta, greater the delay that the custom cursor follows the real cursor
					const delta = 0.1;
					lastX = lerp(lastX, clientX, delta);
					lastY = lerp(lastY, clientY, delta);

					cursor.style.transform = `translate(${lastX}px, ${lastY}px)`;

					requestAnimationFrame(render);
				};
				requestAnimationFrame(render);
			};

			initCursor();
		},

		rtElementorParallax: function () {
			if ($(".rt-parallax-bg-yes").length) {
				$(".rt-parallax-bg-yes").each(function () {
					var speed = $(this).data('speed');
					$(this).parallaxie({
						speed: speed ? speed : 0.5,
						offset: 0,
					});
				})
			}
		},

		rtparallaxie: function() {
			var $parallaxie = $('.parallaxie');
			var $window = $(window);
			if($parallaxie.length && ($window.width() > 991))
			{
				if ($window.width() > 768) {
					$parallaxie.parallaxie({
						speed: 0.55,
						offset: 0,
					});
				}
			}
		},


		magnificPopup: function (){
			var yPopup = $(".popup-youtube");
			if (yPopup.length) {
				yPopup.magnificPopup({
					disableOn: 700,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});
			}
		},

		imageFunction: function () {
			$("[data-bg-image]").each(function () {
				let img = $(this).data("bg-image");
				$(this).css({
					backgroundImage: "url(" + img + ")",
				});
			});
		},

		// headRoom js
		headRoom: function () {
			if ($('body').hasClass('has-sticky-header')) {
				var myElement = document.querySelector(".headroom");
				var headroom = new Headroom(myElement);
				headroom.init();

				$(window).on('scroll', function () {
					var height = $(window).scrollTop();
					if (height < 86) {
						$('.site-header').removeClass('scrolling');
					} else {
						$('.site-header').addClass('scrolling');
					}
				});

				var intHeight = $('.headroom')[0].getBoundingClientRect().height;
				$('.fixed-header-space').height(intHeight);
			}
		},

		wow: function () {
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 0,
				mobile: false,
				live: true,
				scrollContainer: null,
			});
			wow.init();
		},

		// Ajax search 1
		AjaxSearch: function () {
			if ($(".rt-hero-section-search").length) {
				$(".rt-hero-section-search").focusin(function () {
					$('body').addClass('rt-search-active');
					$(this).css('z-index', '100')
				});
				$(".rt-hero-section-search").focusout(function () {
					$('body').removeClass('rt-search-active');
					$(this).attr('style', '')
				});
			}
			//nice-select
			if ($(".rt-search-box-form").length) {
				$('select').niceSelect();
			}
			// Search ajax
			if ($("#rt_datafetch").length) {
				$('#searchInput').on('keyup', function () {
					fetchResults();
				});
				$(document).on('techly_search_input_change', function () {
					fetchResults();
					$('#searchInput').focus();
				});
				function fetchResults() {
					var keyword = $('#searchInput').val();
					var meta = $('#categories').val();
					var searchkey = $('.rt-addon-search .keyword a').val();
					var searchTerm = $('#searchInput').val();
					$('#cleanText').on('click', function () {
						$('#searchInput').val('');
						$('.rt-search-box-container').removeClass('rt-search-container');
					});
					if (searchTerm.length > 0) {
						$('.rt-search-box-container').addClass('rt-search-container');

					} else {
						$('.rt-search-box-container').removeClass('rt-search-container');
					}

					if (keyword.length < 3) {
						$('#rt_datafetch').html("<span class='letters'>Minimum 3 Latters</span>");
						return;
					}
					$.ajax({
						url: techlyObj.ajaxURL,
						type: 'post',
						data: {
							action: 'rt_data_fetch',
							security: techlyObj.techlyNonce,
							keyword: keyword,
							meta: meta,
							searchkey: searchkey,
						},
						success: function (data) {
							$('#rt_datafetch').html(data);
						}
					});
				}
				//Search Keyword
				$(".rt-addon-search .keyword").on("click", function () {
					var keyword = $(this).text();
					$('.rt-input-wrap #searchInput').val(keyword);
					$(document).trigger('techly_search_input_change');
				});

			}

			$('form.rt-search-box-form').on('submit', function (e){
				e.preventDefault();
				var $form = $(this);
				var catLink = $form.find('select[name=categories]').val();
				var searchValue = $form.find('input.search-box-input').val();
				if(catLink) {
					var newUrl = new URL(catLink);
					if(searchValue){
						newUrl.searchParams.set('s', searchValue);
					}
					window.location = newUrl.toString();
				}else{
					if(searchValue){
						$form[0].submit();
					}
				}
			})
		},

		menuOffset: function () {
			$(".dropdown-menu > li").each(function () {
				var $this = $(this),
					$win = $(window);

				if ($this.offset().left + ($this.width() + 30) > $win.width() + $win.scrollLeft() - $this.width()) {
					$this.addClass("dropdown-inverse");
				} else if ($this.offset().left < ($this.width() + 30)) {
					$this.addClass("dropdown-inverse-left");
				} else {
					$this.removeClass("dropdown-inverse");
				}
			});
		},

		/* Masonary */
		rtMasonary: function () {
			var gridIsoContainer = $(".rt-masonry-grid");
			if (gridIsoContainer.length) {
				var imageGallerIso = gridIsoContainer.imagesLoaded(function () {
					imageGallerIso.isotope({
						itemSelector: ".rt-grid-item",
						percentPosition: true,
						isAnimated: true,
						masonry: {
							columnWidth: ".rt-grid-item",
							horizontalOrder: true
						},
						animationOptions: {
							duration: 700,
							easing: 'linear',
							queue: false
						}
					});
				});
			}
		},

		rtIsotope: function () {
			if (typeof $.fn.isotope == 'function') {
				var $parent = $('.rt-isotope-wrapper'),
					$isotope;
				var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
					$isotope = $(".rt-isotope-content", $parent).isotope({
						filter: "*",
						transitionDuration: "1s",
						hiddenStyle: {
							opacity: 0,
							transform: "scale(0.001)"
						},
						visibleStyle: {
							transform: "scale(1)",
							opacity: 1
						}
					});
					$('.rt-isotope-tab a').on('click', function () {
						var $parent = $(this).closest('.rt-isotope-wrapper'),
							selector = $(this).attr('data-filter');
						$parent.find('.rt-isotope-tab .current').removeClass('current');
						$(this).addClass('current');
						$isotope.isotope({
							filter: selector
						});

						return false;
					});

					$(".hide-all .rt-isotope-tab a").first().trigger('click');
				});
			}
		},

		menuDrawerOpen: function (offCanvas) {
			offCanvas.menuBar.on('click', e => {
				e.preventDefault();
				offCanvas.menuBar.toggleClass('is-open')
				offCanvas.drawer.toggleClass('is-open');
				e.stopPropagation()
			});

			$(document).on('click', e => {
				if (!$(e.target).closest(offCanvas.drawerClass).length) {
					offCanvas.drawer.removeClass('is-open');
					offCanvas.menuBar.removeClass('is-open')
				}
			});
		},

		offcanvasMenuToggle: function (offCanvas) {
			offCanvas.drawer.each(function () {
				const caret = $(this).find('.caret');
				caret.on('click', function (e) {
					e.preventDefault();
					$(this).closest('li').toggleClass('is-open');
					$(this).parent().next().slideToggle(300);
				})
			})
		},

		headerSearchOpen: function () {
			$('a[href="#header-search"]').on("click", function (event) {
				event.preventDefault();
				$("#header-search").addClass("open");
				$('#header-search > form > input[type="search"]').focus();
			});

			$("#header-search, #header-search button.close").on("click keyup", function (event) {
				if (
					event.target === this ||
					event.target.className === "close" ||
					event.keyCode === 27
				) {
					$(this).removeClass("open");
				}
			});
		},

		backToTop: function () {
			/* Scroll to top */
			$('.scrollToTop').on('click', function () {
				$('html, body').animate({scrollTop: 0}, 800);
				return false;
			});
		},

		/* windrow back to top scroll */
		backTopTopScroll: function () {
			if ($(window).scrollTop() > 100) {
				$('.scrollToTop').addClass('show');
			} else {
				$('.scrollToTop').removeClass('show');
			}
		},

		/* Counter */
		counterUp: function () {
			const counterContainer = $('.counter');
			if (counterContainer.length) {
				counterContainer.counterUp({
					delay: counterContainer.data('rtsteps'),
					time: counterContainer.data('rtspeed')
				});
			}
		},

		/* Pricing Switch */
		pricingTab: function () {
			$(".pricing-switch-container").on("click", function () {
				let $this = $(this);
				let $wrapper = $this.closest('.rt-pricing-tab');
				$wrapper.find(".pricing-switch")
					.parents(".price-switch-box")
					.toggleClass("price-switch-box--active");
				$wrapper.find(".pricing-switch").toggleClass("pricing-switch-active");
				$wrapper.find(".price-box").toggleClass("price-box-show price-box-hide");
			});
		},

		/* preloader */

		preLoader: function () {
			$('#preloader').fadeOut('slow', function () {
				$(this).remove();
			});
		},


		// with progress bar
		ProgressBar: function () {
			if ( $(".progress-appear").length === 0 ) {
				return false;
			}
			let counter = true;
			$(".progress-appear").appear();
			$(".progress-appear").on("appear", function () {
				if (counter) {
					// with skill bar
					$(".skill-per").each(function () {
						let $this = $(this);
						let per = $this.attr("data-per");
						$this.css("width", per + "%");
						$({ animatedValue: 0 }).animate(
							{
								Hover: per,
								animatedValue: per
							},
							{
								duration: 500,
								step: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
								complete: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
							},
						);
					});
					counter = false;
				}
			});
		},

		/* Tab action */
		rtOpenTabs: function () {
			var TabBlock = {
				s: {
					animLen: 300
				},

				init: function() {
					TabBlock.bindUIActions();
					TabBlock.hideInactive();
				},

				bindUIActions: function() {
					$('.tab-block-tabs').on('click', '.tab-block-tab', function(){
						TabBlock.switchTab($(this));
					});
				},

				hideInactive: function() {
					var $tabBlocks = $('.tab-block');
					$tabBlocks.each(function(i) {
					var
						$tabBlock = $($tabBlocks[i]),
						$panes = $tabBlock.find('.tab-block-pane'),
						$activeTab = $tabBlock.find('.tab-block-tab.is-active');
						$panes.hide();
						$($panes[$activeTab.index()]).show();
					});
				},

				switchTab: function($tab) {
					var $context = $tab.closest('.tab-block');
					if (!$tab.hasClass('is-active')) {
						$tab.siblings().removeClass('is-active');
						$tab.addClass('is-active');
						TabBlock.showPane($tab.index(), $context);
					}
				},

				showPane: function(i, $context) {
					var $panes = $context.find('.tab-block-pane');
					$panes.slideUp(TabBlock.s.animLen);
					$($panes[i]).slideDown(TabBlock.s.animLen);
				}
			};

			$(function() {
				TabBlock.init();
			});
		},

		/* windrow scroll animation */
		hasAnimation: function () {
			if (!!window.IntersectionObserver) {
				let observer = new IntersectionObserver((entries, observer) => {
					entries.forEach(entry => {
						if (entry.isIntersecting) {
							entry.target.classList.add("active-animation");
							observer.unobserve(entry.target);
						}
					});
				}, {
					rootMargin: "0px 0px -100px 0px"
				});
				document.querySelectorAll('.has-animation').forEach(block => {
					observer.observe(block)
				});
			} else {
				document.querySelectorAll('.has-animation').forEach(block => {
					block.classList.remove('has-animation')
				});
			}
		},

		/* Swiper slider */
		swiperSlider: function () {
			$('.rt-swiper-slider').each(function () {
				var $this = $(this);
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					pagination: {
						el: $pagination,
						clickable: true,
						type: 'bullets',
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: settings['breakpoints']['0']['slidesPerView'],
						},
						425: {
							slidesPerView: settings['breakpoints']['425']['slidesPerView'],
						},
						576: {
							slidesPerView: settings['breakpoints']['576']['slidesPerView'],
						},
						768: {
							slidesPerView: settings['breakpoints']['768']['slidesPerView'],
						},
						992: {
							slidesPerView: settings['breakpoints']['992']['slidesPerView'],
						},
						1200: {
							slidesPerView: settings['breakpoints']['1200']['slidesPerView'],
						},
						1600: {
							slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
						},
					},
				});
				swiper.init();
			});
		},


		/* Horizontal Thumbnail slider */
		horizontalSwiperSlider: function () {
			$('.rt-horizontal-slider').each(function () {
				var slider_wrap = $(this);
				var $pagination = slider_wrap.find('.swiper-pagination')[0];
				var $next = slider_wrap.find('.swiper-button-next')[0];
				var $prev = slider_wrap.find('.swiper-button-prev')[0];
				var target_thumb_slider = slider_wrap.find('.horizontal-thumb-slider');
				var thumb_slider = null;
				if (target_thumb_slider.length) {
					var settings = target_thumb_slider.data('xld');
					var autoplayconditon = settings['auto'];
					thumb_slider = new Swiper(target_thumb_slider[0],
						{
							autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
							speed: settings['speed'],
							loop: settings['loop'],
							pauseOnMouseEnter: true,
							slidesPerView: settings['slidesPerView'],
							spaceBetween: settings['spaceBetween'],
							centeredSlides: settings['centeredSlides'],
							slidesPerGroup: settings['slidesPerGroup'],
							pagination: {
								el: $pagination,
								clickable: true,
								type: 'bullets',
							},
							navigation: {
								nextEl: $next,
								prevEl: $prev,
							},
							breakpoints: {
								0: {
									slidesPerView: settings['breakpoints']['0']['slidesPerView'],
								},
								425: {
									slidesPerView: settings['breakpoints']['425']['slidesPerView'],
								},
								576: {
									slidesPerView: settings['breakpoints']['576']['slidesPerView'],
								},
								768: {
									slidesPerView: settings['breakpoints']['768']['slidesPerView'],
								},
								992: {
									slidesPerView: settings['breakpoints']['992']['slidesPerView'],
								},
								1200: {
									slidesPerView: settings['breakpoints']['1200']['slidesPerView'],
								},
								1600: {
									slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
								},
							},

						});
				}

				var target_slider = slider_wrap.find('.horizontal-slider');
				if (target_slider.length) {
					var settings = target_slider.data('xld');
					new Swiper(target_slider[0], {
						autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
						speed: settings['speed'],
						loop: settings['loop'],
						effect: settings && settings['effect'],
						thumbs: {
							swiper: thumb_slider,
						},
						navigation: {
							nextEl: $next,
							prevEl: $prev,
						},
					});
				}
			});
		},

		/* Swiper slider */
		heroSlider: function () {
			$('.rt-swiper-hero-slider').each(function () {
				var $this = $(this);
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					pagination: {
						el: $pagination,
						clickable: true,
						renderBullet: function (index, className) {
							return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
						},
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},

					breakpoints: {
						0: {
							slidesPerView: 1,
						},
						768: {
							slidesPerView: 1,
						},
						1200: {
							slidesPerView: 1,
						},
					},
				});
				swiper.init();
			});
		},

	};

	$(document).ready(function (e) {
		Techly._init();
	});

	$(document).on('load', () => {
		Techly.menuOffset();
	})

	$(window).on('scroll', (event) => {
		Techly.backTopTopScroll(event);
	});

	$(window).on('resize', () => {
		Techly.menuOffset($);
	});

	$(window).on('elementor/frontend/init', () => {
		if (elementorFrontend.isEditMode()) {
			//For all widgets
			elementorFrontend.hooks.addAction('frontend/element_ready/widget', () => {
				Techly.AjaxSearch();
				Techly.rtElementorParallax();
				Techly.magnificPopup();
				Techly.hasAnimation();
				Techly.counterUp();
				Techly.pricingTab();
				Techly.imageFunction();
				Techly.rtMasonary();
				Techly.rtIsotope();
				Techly.swiperSlider($);
				Techly.horizontalSwiperSlider();
				Techly.heroSlider();
				Techly.ProgressBar();
				Techly.rtOpenTabs();
				Techly.rtparallaxie();
				Techly.mousemove_project_hover_effect();
				Techly.ImgcolumnList();
				Techly.CustomCursor();
				// Techly.rtgsap();
				// Techly.rtScrollTrigger();
				// Techly.rtImageAnim1();
				// Techly.rtImageAnim2();
				// Techly.rtImageAnim3();
				// Techly.rtImageAnim4();
				// Techly.rtImageRotate();
				Techly.HoverReval();
				Techly.rtAccordion();
			});

		}
	});

    window.Techly = Techly;

})(jQuery);
