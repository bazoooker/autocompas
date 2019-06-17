$(document).ready(function(){
/*
    $( ".zoompage .btn_add-to-cart, .zoompage .product-detail .btn_add-to-cart" ).bind( "click", function(){
        var id=$(this).attr('id');
        var count=1;
        var cart_id=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").attr('ids'));
        var input=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").val());

        if (input>0) {
            count=input;
        }
            $.ajax({
                type: 'POST',
                url: '/include/addCart.php?id='+id+'&count='+count,
                data: 'id='+id,
                success: function(data){                         
                  $('.basket__inner').empty();
                  $('.basket__inner').append(data);
                  $('#basket-added-window').show();
                     $(".overlay").fadeIn(100, function(){});
                }
            });
        return false;

    });
*/

})

// ресайз саджест поиска
function resizesuggest() {
	$('.title-search-result').width($('#title-search').width());
	p=$('#title-search').offset();
//	console.log(p);
	$('.title-search-result').css('left',p.left);
	$('.title-search-result').css('top',p.top+20);
}

$(document).ready(function(){
	setTimeout("resizesuggest()",200);
});

// прилипающий хедер
function showStickyHeader() {
    if ( window.pageYOffset > 200 ) {
       $('.sticky-header').fadeIn(200);
    }
    else {
        $('.sticky-header').fadeOut(200);
    }
};


$('.page-header .phone').mouseenter(function() {
  if ($(window).width() >= 768) {
    $('.phone__accordeon').show();
  }
});
$('.page-header .phone').mouseleave(function() {
  if ($(window).width() >= 768) {
    $('.phone__accordeon').hide();
  }
});

$('.page-header .phone').click(function() {
  if ($(window).width() < 768) {
    $('.phone__accordeon').toggleClass('active');
  }
});






$(document).ready(function() {
  $('.brand-select select').niceSelect();
});




// главное меню дропдаун
$(document).ready(function(){
    $('.js-show-main-dropdown-menu, .catalog-list_dropdown-menu').hover(function() {
        var dropdownIsClosed = ( !$('.catalog-list_dropdown-menu').hasClass('catalog-list_active') );    
        if(dropdownIsClosed) {
            $('.catalog-list_dropdown-menu').addClass('catalog-list_active');
            $('.js-show-main-dropdown-menu').addClass('btn-burger_active');
        } else {
            $('.catalog-list_dropdown-menu').removeClass('catalog-list_active');
            $('.js-show-main-dropdown-menu').removeClass('btn-burger_active');
        }
    });
});








$(window).scroll(showStickyHeader);
 







 // считалка
     function Quantity(id, ratio, sign, bUseFloatQuantity)
{ 
     var input=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").val());
     var sum=0;
     if (sign=='up') {
         sum=input+ratio;
     }else{
         sum=input-ratio;
        if (sum<=0) {
            sum=1;
        }
     }
     $("input[name=QUANTITY_PRODUCT_"+id+"]").val(sum);
}



    // корзина и добовляка
    $(".btn_add-to-cart, .product-detail .btn_add-to-cart").click( function (e) {
        e.preventDefault();
        var id=$(this).attr('id');
        var count=1;
    var cart_id=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").attr('ids'));
      var input=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").val());
        if (input>0) {
            count=input;
        }
        if (cart_id>0) {

          $.ajax({
      type: 'POST',
      url: '/updateCart.php?id='+cart_id+'&qty='+count,
      data: '',
      success: function(data){                         
          $('.basket__inner').empty();
            $('.basket__inner').append(data);
            $('#basket-added-window').show();
            $(".overlay").fadeIn(100, function(){}); //overlay_
         }
    });

        }else{
    
            $.ajax({
                type: 'POST',
                url: '/include/addCart.php?id='+id+'&count='+count,
                data: 'id='+id,
                success: function(data){                         
                    $('.basket__inner').empty();
                    $('.basket__inner').append(data);
                    $('#basket-added-window').show();
                    //$('#overlay').show();
                    $(".overlay").fadeIn(100, function(){}); 
        
                    setTimeout(function(){
                      $('.modal-close').click();
                    },3000)
                                  
                }
            });
    }

    });
 // 
 // end





//новости с ленивой загрузкой

$(document).ready(function(){ 


	if($('#newscontainer').length>0){
	var $nextPageToLoad = 1;
	var $pagesCnt = parseInt(Math.ceil(totalcount/5));
	var $canAddItems = ($pagesCnt > 1);
	var $url = '/news/__news_ajax.php?tag='+tag+'&gurl='+gurl+'&gid='+gid+'&pageno=';

	$(window).bind('scroll', function() {
                if (!$canAddItems) { return; }
                if ($(document).height() - $(document).scrollTop() - $(window).height() < $(window).height()*5) {
			$('#ajaxLoader').show();
			$canAddItems = false;
			$.post($url + $nextPageToLoad, function(data) {
				var $data = $( data);
				$('#newscontainer').append($data);
				$canAddItems = ($pagesCnt > $nextPageToLoad);
				$nextPageToLoad++;
				$('#ajaxLoader').hide();
			});
		}

	});

                if (!$canAddItems) { return; }
                if ($(document).height() - $(document).scrollTop() - $(window).height() < $(window).height()*5) {
			$('#ajaxLoader').show();
			$canAddItems = false;
			$.post($url + $nextPageToLoad, function(data) {
				var $data = $( data);
				$('#newscontainer').append($data);
				$canAddItems = ($pagesCnt > $nextPageToLoad);
				$nextPageToLoad++;
				$('#ajaxLoader').hide();
			});
		}


        }
});




// $(document).ready(function(){
// 	$('.formgroup input,.formgroup textarea').blur();

// 	$('.formgroup label').click(function(){
// 		$(this).parent().find('input, textarea').focus();
// 		$(this).addClass("up");
// 	});

// 	$('.formgroup input,.formgroup textarea').blur(function(){
// 		if($(this).val()!=""){} else {
// 			$(this).parent().find("label").removeClass("up");
// 		};
// 	});
// 	$('.formgroup input,.formgroup textarea').focus(function(){
// 		if($(this).val()!=""){} else {
// 			$(this).parent().find("label").addClass("up");
// 		};
// 	});
// });


$(document).ready(function(){ 


    var swiperCatalog = new Swiper('.swiper-container-catalog', {
      navigation: {
        nextEl: '.catalog-slider-btn-next',
        prevEl: '.catalog-slider-btn-prev',
      },
      slidesPerView: 4,
      spaceBetween: 19,
      // loop: true,
       breakpoints: {
            1250: {
              slidesPerView: 3,
              spaceBetween: 30
            },
            1023: {
              slidesPerView: 2,
              spaceBetween: 30
            },
            667: {
              slidesPerView: 1,
              spaceBetween: 20
            }
        }
    });

    var swiperBrands = new Swiper('.swiper-container-brands', {
      navigation: {
        nextEl: '.brands-slider-btn-next',
        prevEl: '.brands-slider-btn-prev',
      },
      slidesPerView: 6,
       loop: true,
  autoplay: {
    delay: 3000,
  },	

      breakpoints: {
            1250: {
              slidesPerView: 5,
              spaceBetween: 30
            },
            1023: {
              slidesPerView: 4,
              spaceBetween: 30
            },
            667: {
              slidesPerView: 3,
              spaceBetween: 20
            },
            413: {
              slidesPerView: 2,
              spaceBetween: 20
            }
        }
    });

    var swiperNews = new Swiper('.swiper-container-news', {
      navigation: {
        nextEl: '.news-slider-btn-next',
        prevEl: '.news-slider-btn-prev',
      },
      slidesPerView: 4,
      spaceBetween: 19,
      // loop: true,
       breakpoints: {
            1250: {
              slidesPerView: 3,
              spaceBetween: 30
            },
            1023: {
              slidesPerView: 2,
              spaceBetween: 30
            },
            667: {
              slidesPerView: 1,
              spaceBetween: 20
            }
        }
    });

    // slider on object page
    var swiperObjects = new Swiper('.swiper-container-objects');

    // slide on thumbnails



    // $('.js-object-slide').first().addClass('hero-object-thumbnail_active');

    // $('.js-object-slide').click(function() {
    //     var thumbIndex = $(this).index(),
    //         curThumb = $('.hero-object-thumbnail').get(thumbIndex);

    //     $('.hero-object-thumbnail').removeClass('hero-object-thumbnail_active');
    //     $(curThumb).addClass('hero-object-thumbnail_active');

    //     swiperObjects.slideTo(thumbIndex, 300);
    // });



    // slider on main screen
    var swiperHero = new Swiper('.swiper-container-hero', {
        effect: 'slide',
        slidesPerView: 1,
        autoplay: {
            delay: 4000,
        },

    });

    var swiperFeedback = new Swiper('.swiper-container-feedback', {
        // autoplay: {
        //     delay: 3000,
        // },
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },    
        breakpoints: {
            569: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            960: {
              slidesPerView: 2,
              spaceBetween: 30
            }
        }
    });





    });


    /* МОДАЛЬНЫЕ ОКНА */
$(document).ready(function(){        

    // обратный звонок
    $(".callback-link").on('click', function(){

      if( $('.main-menu').hasClass('main-menu_active') ) {
        $('.main-menu').removeClass('main-menu_active');
        $('.overlay-menu').fadeOut(200);
        $('.page-wrapper').removeClass('h-no-scroll');
      };
        var btn = $(this);                        
        $(".overlay-modal").fadeIn(100, function(){
          $($(btn).data('window')).show();                        
        }); 
        $('#callback-window').show();
          return false;
    });

    // купить в один клик
    $(".btn.btn_one-click").on('click', function(){ 
        var btn = $(this);      
        $(".overlay-modal").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 
        $('#oneclickorder-window input.reason').val($(this).attr('name'));
        $('#oneclickorder-window').show();
          return false;
    });

    
    $(".modal-close").on('click', function(){
        $(".overlay, .modal, .product-detail").fadeOut();
    $('.modal').find('input, textarea').val('');
        return false;
    });    

    $('.modal').each(function(){
        var f=$(this).find('.modal-content');
        var t=$(this).find('.modal-content-copy');
        t.html(f.html());
        t.hide();

    });
});





// отправка колбека
$(".modal form").on('submit', function(e){
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
                  setTimeout("$('#overlay, .overlay').hide()",2000);
      var f=$(modal).find('.modal-content-copy');
      var t=$(modal).find('.modal-content');
                  setTimeout("$('.modal').find('input, textarea').val('')",3000);
      
                } else {
                    $(modal).find('.modal-errors').html(data.message);
    $(modal).find('.modal-errors').show('fast')
    setTimeout("$('.modal-errors').hide('fast')",1000);
                    $(modal).children(".spinner").hide();
                }
		      setTimeout("$('.modal').hide()",2000);
                  setTimeout("$('#overlay').hide()",2000);
            },
            complete: function(){
                $(modal).children(".spinner").hide();                     
            }
        });
        return false;
    });








$(document).ready(function(){  


    $(".js-product-modal a.show_tovar").on('click', function(e){
	e.preventDefault();
        var btn = $(this);                        
        $(".overlay").fadeIn(100, function(){}); 


        // serega script 
        // 


        var id=$(this).attr('rel');
        $.ajax({
                    type: 'POST',
                    url: '/include/DetailElement.php?id='+id,
                    data: 'id='+id,

                    success: function(data){                         
                        $('.product-detail').empty();
                        $('.product-detail').append(data);
                        $('.product-detail').show(); 
                        $( " .product-detail a.quantity-counter__minus" ).unbind( "click" );
                        $( ".product-detail a.quantity-counter__minus" ).bind( "click", function(){Quantity($(this).attr('rel')+"s",1 , 'down', 1) });   
                        $( " .product-detail a.quantity-counter__plus" ).unbind( "click" );
                        $( ".product-detail a.quantity-counter__plus" ).bind( "click", function(){Quantity($(this).attr('rel')+"s",1 , 'up', 1) });   
                        $(".btn_add-to-cart, .product-detail .btn_add-to-cart").unbind( "click" );

    $( ".btn_add-to-cart, .product-detail .btn_add-to-cart" ).bind( "click", function(){
        var id=$(this).attr('id');
        var count=1;
        var cart_id=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").attr('ids'));
        var input=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").val());

        if (input>0) {
            count=input;
        }

        if (cart_id>0) {
          $.ajax({
            type: 'POST',
            url: '/updateCart.php?id='+cart_id+'&qty='+count,
            data: '',
            success: function(data){                         
              $('.basket__inner').empty();
              $('.basket__inner').append(data);
              $('#basket-added-window').show();
		$('.product-detail').hide();

              //$('#overlay').show();
              $(".overlay").fadeIn(100, function(){}); 

            }
          });

        }else{
    
            $.ajax({
                type: 'POST',
                url: '/include/addCart.php?id='+id+'&count='+count,
                data: 'id='+id,
                success: function(data){                         
		$('.product-detail').hide();
                  $('.basket__inner').empty();
                  $('.basket__inner').append(data);
                  $('#basket-added-window').show();
                     $(".overlay").fadeIn(100, function(){});
                }
            });
        };
        return false;

    });

    /*** чтобы работал модалка Вопрос менеждеру ***/

    $(".callback-link").on('click', function(){
        var btn = $(this);                        
        $(".overlay").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 
        var str = $.trim($('#nameprod').html());
        $('#callback-window textarea').val('Вопрос по: ('+str+')');

       $('#callback-window').show();
       $('.product-detail').hide();
        return false;
    });
    



    //$("#overlay, .modal, .modal-close").on('click', function(){
    $(".overlay, .modal-close").on('click', function(){
        $(".overlay, .modal, .product-detail").fadeOut();
    $('.modal').find('input, textarea').val('');
        return false;
    });    


    $('.modal').each(function(){
        var f=$(this).find('.modal-content');
        var t=$(this).find('.modal-content-copy');
        t.html(f.html());
        t.hide();

    });

















    /*** Отдельно вынесено чтобы работал крестик Просмотр деталей товара ***/
    $(".product-detail__close").on('click', function(){
        $(".overlay, .product-detail").fadeOut();
    });
    /*****/




    $(".btn.btn_one-click").unbind( "click" );
    $( ".btn.btn_one-click" ).bind( "click", function(){
        //alert('zzz');
        var btn = $(this);                        
        $(".overlay,#overlay").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 

       $('.product-detail').hide();
       var str = $.trim($('#nameprod').html());
    $('#oneclickorder-window input.reason').val(str);
       $('#oneclickorder-window').show();
        return false;
    });



                      }
                    });
});

    
    $(".overlay, .product-detail__close").on('click', function(){
        $(".overlay, .product-detail, #callback-window, #basket-added-window").fadeOut();
    });   
});

/* МОДАЛЬНЫЕ ОКНА END */






// отправка колбека
$(".modal form").on('submit', function(e){
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
    });




// TABS
// =================================

    $('.section-tabs .section-tabs__tabs ul li').click(function() {
        $(this).parent().children('li.active').removeClass('active');

        $(this).addClass('active');



        var sectionTabs = $(this).parent().parent().parent().children('.section-tabs__content');

        var index = $(this).index();

        var sectionContent = $(this).parent().parent().parent().children('.section-tabs__content');
        console.log(sectionContent);

        // $(this).parent().parent().parent().find('.slide').each(function(i, elem) {
        sectionContent.children('.slide').each(function(i, elem) {
            if (i == index) {
                $(elem).show();
            } else {
                $(elem).hide();
            }
        });
    });



 var li_name = [];
    $(document).ready(function() {
       
        
        $('.section-tabs .section-tabs__tabs').each(function(i, elem) {
            elem.setAttribute('rel', i);
            $('.section-tabs .section-tabs__tabs[rel=' + i + ']').parent().find('.section-tabs__content').attr('rel', i);
            super_sbor(i);
           
        })

            $('#mini_tab ul.cd-accordion-menu .has-children').click(function(e) {
    	
        if ($(this).attr('class') == 'has-children active') {
            $(this).find('.slide_children').slideUp(200);
            $(this).removeClass('active');
        } else {
            $('.slide_children').hide(200);
            console.log("hide me");
            $('#mini_tab ul.cd-accordion-menu .has-children.active').removeClass('active');
            $(this).addClass('active');
            $(this).find('.slide_children').slideDown(200);
        }
   	 });
    });

    function super_sbor(number) {
        $('.section-tabs .section-tabs__tabs[rel=' + number + '] ul li').each(function(i, elem) {
            li_name[i] = elem.innerHTML;
        });

        var content = [];

        $('.section-tabs__content[rel=' + number + '] .slide').each(function(i, elem) {
            content[i] = elem.innerHTML;
        }); 

        paint_dom(content, li_name, number);

        content = new Array();
        li_name = new Array();
    }




function paint_dom(content, li_name, number, name_home_dom) {
    name_home_dom = name_home_dom == undefined ? 'section-tabs__tabs' : name_home_dom;
    
    var structur_dom = '<ul class="cd-accordion-menu">';
    for (var i = 0; i < li_name.length; i++) {
        
        if (content[i] === undefined) {
            content[i] = ' ';
        } 
        structur_dom = structur_dom + '<li rel=' + i + ' class="has-children"><label class="group-1">' + li_name[i] + '</label><div style="display:none;" class="slide_children">' + content[i] + '</div></li>';
    }
    structur_dom = structur_dom + '</ul>';

    if (name_home_dom=='section-tabs__tabs') {
     $('.section-tabs__tabs[rel=' + number + '] ').append("<div id='mini_tab'>" + structur_dom + "</div>");
    }else{

      $('.'+name_home_dom+'').append("<div id='mini_tab'>" + structur_dom + "</div>");
    }
}






$(document).ready(function () {

    // ACCORDEON

    // $('.js-accordeon .js-accordeon__content').slideUp(0);    
    $('.js-accordeon .js-accordeon__label').click(function() {

        // подсвечиваем открытый аккордеон
        if ( $(this).parent().hasClass('opened') ) {
            $(this).parent().removeClass('opened');
            $(this).parent().children('.js-accordeon__content').slideUp(300);
        }
        else {
            $(this).parent().addClass('opened');
            $(this).parent().children('.js-accordeon__content').slideDown(300);
        }
    });



    // DROPDOWN
    $('.nav-main__links > li').hover(function() {
        // console.log('hover');
        $(this).find('.dropdown-nav').fadeIn(200);
    });

    $('.nav-main__links > li').mouseleave(function() {
        $('.dropdown-nav').fadeOut(200);
    });

    // WOW
    new WOW().init();

    // MENU ACCORDEONS
    $('.nav-full > li .nav-full__rubrika').click(function() {


        var curAccord = $(this).parent().find( $('.nav-full__list'));

        if (curAccord.hasClass('nav-full__list_opened')) {
            curAccord.slideUp(300);
            curAccord.removeClass('nav-full__list_opened');
            console.log('hide acc');
        }
        else {
            curAccord.slideDown(300);
            curAccord.addClass('nav-full__list_opened');
            console.log('show acc');
        }

        // подсвечиваем открытый аккордеон
        // if ( $(this).parent().hasClass('opened') ) {
        //     $(this).parent().removeClass('opened');
        //     $(this).parent().children('.js-accordeon__content').slideUp(300);
        // }
        // else {
        //     $(this).parent().addClass('opened');
        //     $(this).parent().children('.js-accordeon__content').slideDown(300);
        // }
    });

});


function moveProgress() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("progress").style.width = scrolled + "%";
};


// STICKY HEADER

// $(document).ready(function() {
//     if ($(window).width() <= 667) {
//         $('.page-header').addClass('page-header_sticky');
//     }
// })
// function showStickyHeader() {
//     if ( window.pageYOffset > 0 ) {
//        $('.page-header').addClass('page-header_sticky');
//     }
//     else {
//         console.log('less than 700')
//         $('.page-header').removeClass('page-header_sticky');
//     }
// };

function showToTopButton() {
    // var heroHeight = $('.hero').height();
    // console.log(heroHeight);

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
    




// MAIN-MENU
// =================================

var menuIsOpen; //for closing menu on "esc"
function openMenu() {
    if( !$('.main-menu').hasClass('main-menu_active') ) {
        $('.main-menu').addClass('main-menu_active');
        $('.overlay-menu').fadeIn(200);
        $('.page-wrapper').addClass('h-no-scroll');
    }else {
        $('.main-menu').removeClass('main-menu_active');
        $('.overlay-menu').fadeOut(200);
        $('.page-wrapper').removeClass('h-no-scroll');
    }
}








// triggers
$(document).ready(function() {   
    $('.js-open-menu').click(openMenu);
    $('.js-menu-close').click(openMenu);
    $('.js-scroll-to-top').click(scrollToTop);

    // $(window).scroll(showStickyHeader);  
    $(window).scroll(showToTopButton);    
    $(window).scroll(moveProgress);    
});

// close on "esc"
$(document).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        if ( menuIsOpen == true ) {
         openMenu();
         console.log('esc menu close');
        }
    }
});


// BTN-GROUP

// function showMap() {
//     var isActive = $('.showtype').hasClass('showtype_active-map');
//     var btnGroup = $('.showtype');

//     if (isActive) {
//         console.log('break')
//         return false;
//     }
//     else {
//         btnGroup.removeClass('showtype_active-list');
//         btnGroup.addClass('showtype_active-map');
//         $('.show-list').slideUp(300);
//         $('.map').slideDown(300);
//         console.log('show map');
//     } 
// }
// function showList() {    
//     var isActive = $('.showtype').hasClass('showtype_active-list');
//     var btnGroup = $('.showtype');

//     if (isActive) {
//         console.log('break')
//         return false;
//     }
//     else {
//         btnGroup.removeClass('showtype_active-map');
//         btnGroup.addClass('showtype_active-list');
//         $('.map').slideUp(300);
//         $('.show-list').slideDown(300);
//         console.log('show list');
//     } 
// }
// $(document).ready(function() {   
//     $('.showtype_map').click(showMap);    
//     $('.showtype_list').click(showList);    
// });

$(document).ready(function(){
	r=($('.inner-catalog-list').find('.catalog-link').length);
	if(r>8) {
		$('.catalog-list.inner-catalog-list').addClass('minified-catalog');
		$('.minified-catalog-button').show();
	} else {
		$('.minified-catalog-button').hide();
	}
	$('.minified-catalog-button').click(function(){
		$(this).hide();
		$('.minified-catalog').removeClass('minified-catalog');
	});

});