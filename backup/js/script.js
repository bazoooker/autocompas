
$(window).scroll(function() {
    $('.js-fancy-heading').each(function() {
        if( $(this).visible(true) ) {  
            $(this).addClass('lines-added')
        }        
    });
});



$(document).ready(function(){

        var swiper = new Swiper('.swiper-hero', {
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
            autoplay: {
                delay: 4000,
            },

        });



        var feedbackSwiper = new Swiper('.swiper-feedback', {
          speed: 800,
            navigation: {
                nextEl: '.swiper-feedback__btn-next',
                prevEl: '.swiper-feedback__btn-prev',
            },
        });



        var teachingSwiper = new Swiper('.swiper-teaching', {
          speed: 300,
          pagination: {
            clickable: true,
            el: '.teaching-pagination',
          },
        });




    // �����
    // ==============

    $('.js-floating-label').blur();

    $('.js-floating-label').on('focus', function() {
        $(this).parent().find('.signup-form__floating-placeholder').addClass('float');
        $(this).parent().addClass('active');
    });

    $('.js-floating-label').on('blur', function() {
        if($(this).val()!=""){} else {
            $(this).parent().find('.signup-form__floating-placeholder').removeClass('float');
            $(this).parent().removeClass('active');
        };
    });



        // range slider in filters
        // ���� �������: 
        // ionden.com/a/plugins/ion.rangeSlider/api.html
// if(typeof(catalog) == undefined){
//     var min_price = 0;
//     var max_price = 0;
//     var price_from = 0;
//     var price_to = 0;
// }
// console.log(min_price);
// console.log(max_price);
// console.log(price_from);
// console.log(price_to);

//         $(".js-range-slider").ionRangeSlider({
//             skin: "round",
//             type: "double",
//             min: min_price,
//             max: max_price,
//             from: price_from,
//             to: price_to,
//             hide_min_max: true,
//             onChange: function(data) {
//                 $('.filter-price__min').val(data.from);
//                 $('.filter-price__max').val(data.to);
//             },
//             onStart: function(data) {
//                 $('.filter-price__min').val(data.from);
//                 $('.filter-price__max').val(data.to);
//             }
//         });





        $('select').niceSelect();





        // �������� ������� � �������� ������
        $('.product-controls__arrow-up, .product-controls__arrow-down').on('mousedown', function() {
            $(this).addClass('pressed');
        });
        $('.product-controls__arrow-up, .product-controls__arrow-down').on('mouseup', function() {
            $(this).removeClass('pressed');
        });







        // ��� ������ - ������ �� ������
        $("#scrollToFeatures").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#scrollToFeatures").offset().top
            }, 600);
        });






        // ���������� ������ ���� ��������

        $('.js-show-product-category-list').on('click', function() {

            if ($( window ).width() > 768) { // ���� �������, ���������� ��������������� ������������ ������
                var categoryID = $(this).attr('id');
                var categoryProdList = $('.product-category-list[data-id="'+categoryID+'"]');

                $('.product-category-list').removeClass('active');
                $(categoryProdList).addClass('active');

                $('.catalog-link__label').removeClass('active');
                $(this).addClass('active');
            } else { // ���� �������, ���������� ���������

                if( !$(this).hasClass('active') ) {
                    $('.catalog-link__label').removeClass('active');
                    $(this).addClass('active');

                    $('.catalog-link .catalog-link__accordeon').slideUp(300);
                    $(this).parent().find('.catalog-link__accordeon').slideDown(300);
                }
            }

        });






        // �������� �������� - ������ ��������

        $('.js-catalog-menu').on('click', function() {
            
            // if ($( window ).width() > 768) {
                var catalogBtnType = $(this).attr('id');


                if(catalogBtnType == 'catalog-menu-in-promo') { // ���� ������ �����-�����
                    if( $('#catalog-menu').hasClass('active') ) {
                        $('#catalog-menu').removeClass('menu_catalog menu_sticky active');
                        $('.overlay_catalog-menu').hide();
                    }else {
                        $('#catalog-menu').addClass('menu_catalog active');
                        $('.overlay_catalog-menu').show();
                    }
                }

                if(catalogBtnType == 'catalog-menu-in-sticky-header') { // ���� � ����������� �����
                    if( $('#catalog-menu').hasClass('active') ) {
                        $('#catalog-menu').removeClass('menu_catalog menu_sticky active');
                        $('.page-wrapper').removeClass('no-scroll');
                    }else {
                        $('#catalog-menu').addClass('menu_sticky active');
                        $('.page-wrapper').addClass('no-scroll');
                    }
                }
            // } else { 
            //     if( $('.menu_full-screen').hasClass('active') ) {
            //         $('.menu_full-screen').removeClass('menu_catalog menu_sticky menu_mobile active');
            //         $('.page-wrapper').removeClass('no-scroll');
            //     }else {
            //         $('.menu_full-screen').addClass('menu_mobile active');
            //         $('.page-wrapper').addClass('no-scroll');
            //     }
            // }


            $('.overlay_catalog-menu').on('click', function() {
                $('.menu_full-screen').removeClass('menu_catalog menu_sticky active');
                $('.overlay_catalog-menu').hide();
            });
        });







        // �������� � �������� �������

        $('.js-basket-controls').on('click', function() {
            if( !$('.basket').hasClass('active') ) {
                $('.basket').addClass('active');
                $('.overlay_basket').fadeIn(300);
                $('.page-wrapper').addClass('no-scroll');
            } else {
                /* ��������� ����� ����� �� ������  */ 
                document.getElementById('basket_frame').src = "";
                $('.basket').removeClass('active');
                $('.overlay_basket').fadeOut(300);
                $('.page-wrapper').removeClass('no-scroll');
            }
        });





        // ��������� ����
        $('.js-open-mobile-menu').on('click', function() {

            if( !$('#mobile-menu').hasClass('active') ) {
                $('#mobile-menu').addClass('active');
                $('.page-wrapper').addClass('no-scroll');
            } else {
                $('#mobile-menu').removeClass('active');
                $('.page-wrapper').removeClass('no-scroll');
            }
        });






        // �������� ��������� �� ���������

        $('.partners').on('mouseenter', function() {
            $('.partners .partner-thumb').addClass('blurred');
        });
        $('.partners').on('mouseleave', function() {
            $('.partners .partner-thumb ').removeClass('blurred');
        });

        $('.partners .partner-thumb').on('mouseenter', function() {
            $(this).addClass('active');
        });
        $('.partners .partner-thumb').on('mouseleave', function() {
            $(this).removeClass('active');
        });






        // ���������� �������
        // $('.js-prod-sort').on('click', function() {
        //     $('.js-prod-sort').removeClass('active');
        //     $(this).addClass('active');
        // });


        // ��� ������ �������
        $('.js-prod-view').on('click', function() {
            $('.js-prod-view').removeClass('active');
            $(this).addClass('active');
        });

        $('.js-show-filters').on('click', function() {
            if(!$('.filters').hasClass('active')) {
                $('.filters').addClass('active');
                $('.overlay_filters').fadeIn(300);
            } else {
                $('.filters').removeClass('active');
                $('.overlay_filters').fadeOut(300);
            }
        });
});















// 2. ���������
// ==============

    // �������, ������� "��������" ������ �����. ����������� ����� ����������. ��. ���������



    // function lookMa() {
    //     $('.hero').removeClass('up');
    //     $('.swiper-slide').find('.hero__slide-number, .hero__info h1, .hero__info p, .hero__info a, .hero__img').removeClass('up');
    // }

    // // ������
    // $(window).scroll(function() {
    //     $('.trigger').each(function() {
    //         if( $(this).visible(true) ) {  
    //             $(this).find('.hideme').addClass('hideme_visible');
    //             $(this).find('.zero').removeClass('zero_hidden');
    //             $(this).find('.bg-square').removeClass('bg-square_anim');
    //         }        
    //     });
    // });












        // function openMenu() {
        //     if ( !$('.menu').hasClass('menu_active') ) {
        //         $('.menu').addClass('menu_active');
        //         $('.menu .col-4').addClass('visible'); //�������� ��������� �������
        //         $('body').addClass('no-scroll');
        //     } else {
        //         $('.menu').removeClass('menu_active');
        //         $('.menu .col-4').removeClass('visible');
        //         $('body').removeClass('no-scroll');
        //     }
        // }

        // $('.js-menu-controls').click(openMenu);


        // $(document).on( 'keydown', function ( e ) {
        //     if ( e.keyCode === 27 ) {
        //         if ( $('.menu').hasClass('menu_active') ) {
        //          openMenu();
        //         }
        //     }
        // });



















    function showStickyHeader() {
        if ( window.pageYOffset > 293 ) {
           $('.sticky-header').addClass('visible');
        }
        else {
            $('.sticky-header').removeClass('visible');
        }
    };

    $(window).scroll(showStickyHeader); 


    function favMsge() {
        var thisProd = $(this).parent();
        var timer;
        $('#fav-message-del, #fav-message-add').removeClass('visible');
        clearTimeout(timer);

        if ( !$(thisProd).hasClass('product-thumb_in-fav') ) {
            $(thisProd).addClass('product-thumb_in-fav');
            $('#fav-message-add').addClass('visible');

            timer = setTimeout( function() {
                $('#fav-message-add').removeClass('visible');
            }, 900);
        }else {
            clearTimeout(timer);
            $(thisProd).removeClass('product-thumb_in-fav');
            $('#fav-message-del').addClass('visible');

            timer = setTimeout( function() {
                $('#fav-message-del').removeClass('visible');
            }, 900);
        }
    }

    function cartMsge() {
        var thisProd2 = $(this).parent().parent().parent().parent();
        var timer2;

        $('#cart-message-add, #cart-message-del').removeClass('visible');
        clearTimeout(timer2);

        // ��� ������� ��� �������� � ������� ����� ��� ���
        // ���� ����� ��������, ��. if-statement ����

        $(thisProd2).addClass('product-thumb_in-cart');
        $('#cart-message-add').addClass('visible');

        timer2 = setTimeout( function() {
            $('#cart-message-add').removeClass('visible');
        }, 900);



        // if ( !$(thisProd2).hasClass('product-thumb_in-cart') ) {

        //     $(thisProd2).addClass('product-thumb_in-cart');
        //     $('#cart-message-add').addClass('visible');

        //     timer2 = setTimeout( function() {
        //         $('#cart-message-add').removeClass('visible');
        //     }, 900);
        // }else {
            // �� �������� ��� �����������

            // clearTimeout(timer2);
            // $(thisProd2).removeClass('product-thumb_in-cart');
            // $('#cart-message-del').addClass('visible');

            // timer2 = setTimeout( function() {
            //     $('#cart-message-del').removeClass('visible');    
            // }, 900);
        }

    // }



    $(document).ready(function(){

        $('.js-show-pop-up-message').click(favMsge);
        $('.js-show-cart-msge').click(cartMsge);


        $(".js-open-modal").on('click', function(){

            $('.modal').removeClass('modal_active');
            $('.overlay_modal').fadeOut(400);                          

            var modalName = $(this).data('target');                        
            var modal = $('#' + modalName);

            if( !$(modal).hasClass('modal_active') ) {
                $(modal).addClass('modal_active');
                $('.overlay_modal').fadeIn(400);                          
            } else {
                $(modal).removeClass('modal_active');                          
                $('.overlay_modal').fadeOut(400);                          
            }
        });

        $(".js-close-modal").on('click', function(){
            $('.modal').removeClass('modal_active');
            $('.overlay_modal').fadeOut(400);                          
        });

    });


    // �������� �������
    /*$(".modal form").on('submit', function(e){
            e.preventDefault();
            var modal = $(this).parents('.modal');
            var form = $(this);         
            $(this).ajaxSubmit({  
                url: "/ajax.php?file="+$(form).data('file'),
                data: $(form).serialize(),
                dataType: "JSON",
                type: "POST",
                success: function(data){
                    if(data.done) {
          $(modal).find('.modal-result').html(data.message);
          $(modal).find('.modal-result').show('fast')
          setTimeout("$('.modal-result').hide('fast')",1500);

          setTimeout("$('.modal').hide()",2000);
                      setTimeout("$('#overlay').hide()",2000);
          var f=$(modal).find('.modal-content-copy');
          var t=$(modal).find('.modal-content');
                      setTimeout("$('.modal').find('input, textarea').val('')",3000);
          
                    } else {
                        $(modal).find('.modal-errors').html(data.message);
        $(modal).find('.modal-errors').show('fast')
        setTimeout("$('.modal-errors').hide('fast')",1000);
                        $(modal).children(".spinner").hide();
                    }
                },
                complete: function(){
                    $(modal).children(".spinner").hide();                     
                }
            });
            return false;
        });*/



    function showToTopButton() {
        if ( window.pageYOffset > 500 ) {
           $('.to-top').addClass('to-top_visible')
        }
        else {
            $('.to-top').removeClass('to-top_visible')
        }
    }; 

    function scrollToTop() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    }; 
    $('.js-scroll-to-top').click(scrollToTop);
    $(window).scroll(showToTopButton);    



