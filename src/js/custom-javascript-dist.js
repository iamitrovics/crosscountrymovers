!function(e){jQuery(document).ready((function(){e(window).scroll((function(){e(this).scrollTop()>180?e("#navigation").addClass("sticky"):e("#navigation").removeClass("sticky")})),e(window).scroll((function(){e(this).scrollTop()>71?e(".moving-steps").addClass("sticky"):e(".moving-steps").removeClass("sticky")})),e(".reviewBox .review__main .title h4").matchHeight(),e(".text-reviews .reviewBox").matchHeight(),e(".various").fancybox({maxWidth:800,maxHeight:600,fitToView:!1,width:"90%",height:"90%",autoSize:!1,closeClick:!1,openEffect:"none",closeEffect:"none"}),e(".testimonials .review-slider").slick({infinite:!0,dots:!0,arrows:!1,slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:5500,pauseOnFocus:!1,pauseOnHover:!1,pauseOnDotsHover:!1,centerMode:!0,centerPadding:"550px",responsive:[{breakpoint:1600,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"350px"}},{breakpoint:1170,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"100px"}},{breakpoint:900,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"60px"}},{breakpoint:450,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"15px"}}]}),e(".number-control").bootstrapNumber(),jQuery(".selectpicker").selectpicker({size:9}),e(".datepicker-wrapper input").datepicker({dateFormat:"dd M yy",minDate:"0"}),e("#moving-forms .nav-tabs li a").on("click",(function(){e("#moving-forms .tab-content").addClass("show"),e("html,body").animate({scrollTop:e("#moving-forms .tab-content").offset().top-87},"slow")})),e("#menu").slidingMenu(),jQuery("#top__mobile .menu-btn").click((function(){jQuery(".menu-overlay").toggleClass("active-overlay"),jQuery("html,body").toggleClass("fixed"),jQuery(".main-menu-sidebar").toggleClass("menu-active")})),e("#top__mobile a").click((function(){e(this).toggleClass("open")}))}))}(jQuery);