//@prepros-prepend modernizr.js
//@prepros-prepend bootstrap4\bootstrap.bundle.js
//@prepros-prepend easing.js
//@prepros-prepend jquery-ui.min.js
//@prepros-prepend skip-link-focus-fix.js
//@prepros-prepend slick.js
//@prepros-prepend jquery.matchHeight.js
//@prepros-prepend moment\moment-with-locales.min.js
//@prepros-prepend bootstrap-select.js
//@prepros-prepend jquery.fancybox.min.js//
//@prepros-prepend bootstrap-number-input.js
//@prepros-prepend sliding-menu.js


(function($) {
    jQuery(document).ready(function() {
        $(window).scroll(function () {
          if ($(this).scrollTop() > 180) {
            $('#navigation').addClass("sticky");
          } else {
            $('#navigation').removeClass("sticky");
          }
        });
        $(window).scroll(function () {
          if ($(this).scrollTop() > 71) {
            $('.moving-steps').addClass("sticky");
          } else {
            $('.moving-steps').removeClass("sticky");
          }
        });
        $('.reviewBox .review__main .title h4').matchHeight();
        $('.text-reviews .reviewBox').matchHeight();
        $(".various").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '90%',
            height: '90%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
        
         $('.testimonials .review-slider').slick({
            // normal options...
            infinite: true,
            dots: true,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5500,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false,
            centerMode: true,
            centerPadding: '550px',
            responsive: [{
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '350px',
                    }
                }, {
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '100px',
                    }
                }, {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '60px',
                    }
                }, {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '15px',
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('.number-control').bootstrapNumber();
        jQuery('.selectpicker').selectpicker({
           size: 9,
        });

        // $(".datepicker-wrapper input").datepicker({
        //     dateFormat: 'dd M yy',
        //     minDate: '0'
        // });

        $(function () {
            
                var date1 = new Date('05/05/2021');
                var date2 = new Date('05/20/2021');

                var date3 = new Date('06/05/2021');
                var date4 = new Date('06/20/2021');

                var date5 = new Date('07/05/2021');
                var date6 = new Date('07/20/2021');                
                    
                $(".date-picker-input input").datepicker({
                    minDate: '0',
                    showOtherMonths: true,
                    selectOtherMonths: true, 
                    
                    
                    beforeShowDay: function( date ) {
                        var highlight = date >= date1 && date <= date2
                        var highlight2 = date >= date3 && date <= date4
                        var highlight3 = date >= date5 && date <= date6
                        if( highlight || highlight2 || highlight3 ) {
                             return [true, "event", 'lower rates'];
                        } else {
                             return [true, '', ''];
                        }
                    }
            
                });

        });

        $('.date-picker-input input').on('click', function(e) {
          e.preventDefault();
          $(this).attr("autocomplete", "off");  
       });

       $(".date-picker-input input").attr("autocomplete", "off");        

        $('#moving-forms .nav-tabs li a').on('click', function() {
          $('#moving-forms .tab-content').addClass('show');
          $('html,body').animate({
        scrollTop: $("#moving-forms .tab-content").offset().top - 87},
        'slow');
        });
         $("#menu").slidingMenu();
        jQuery("#top__mobile .menu-btn").click(function(){
            jQuery(".menu-overlay").toggleClass("active-overlay");
            jQuery("html,body").toggleClass("fixed");
            jQuery('.main-menu-sidebar').toggleClass("menu-active"); 
        });

        $(".services-accordion__in").accordion({
          heightStyle: "content",
          autoHeight: false,
          clearStyle: true,
          active: false,
          collapsible: true,
          header: '> div.faq-wrap >h3'
      });        

        $('#top__mobile a').click(function(){
          $(this).toggleClass('open');
        });
    });
})(jQuery);