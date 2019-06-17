// Olga script

  $(document).ready(function(){

        $('#panel1, #panel2, #panel3, #panel4').on('click', function() {

            document.getElementById('basket_frame').src = "";
            document.getElementById('basket_frame').src = "/include/updateCart.php";

        });

    });



// обновить высоту фрейма (_корзина_)
function func_height(){

  var hei = document.getElementById('basket_frame').contentWindow.document.body.scrollHeight;
  document.getElementById('basket_frame').height = hei+"px";

}

function search(q){
    if($('.search-form').find('input[name=q]').val().length >= 3){
      $.ajax({
        type : 'post',
        url : '/local/ajax/search.php',
        data : {
          q : q
        },
        success : function(data){

          // в другое место
          BX.ready(function(){
            var searc = new JCTitleSearch({
              'AJAX_PAGE' : '/local/ajax/search.php',
              'CONTAINER_ID': 'title-search',
              'INPUT_ID': 'title-search-input',
              'MIN_QUERY_LEN': 2
            });
          });
          // *********
          $(".title-search-result").css("z-index", "9999");
        },
        error : function(){
          console.log('error');
        }
      })

  }
  return false;
}

 // считалка
function Quantity(id, ratio, sign, bUseFloatQuantity)
{ 
	
      var input = parseInt($('#QUANTITY_PRODUCT_'+id).text());
      var sum=0;
      if (sign=='up') {
          sum=input+ratio;
      }else{
          sum=input-ratio;
         if (sum<=0) {
             sum=1;
         }
      }

      $("div[id=QUANTITY_PRODUCT_"+id).each(function(index,data) {

        $(data).text(sum);
      });
     // $("#QUANTITY_PRODUCT_"+id).text(sum);
}


// добавить в избранное
function add2wish(p_id, pp_id, p, name, dpu, th){
  $.ajax({
    type: "POST",
    url: "/local/ajax/wishlist.php",
    data: "p_id=" + p_id + "&pp_id=" + pp_id + "&p=" + p + "&name=" + name + "&dpu=" + dpu,
    success: function(html){
      $(th).addClass('in_wishlist');
      $('#wishcount').html(html);
      $('#wishcount2').html(html);

      $('#favorites').html('<a href="javascript:void(0)" class="clean_wishlist btn btn_outline btn_size-m" onclick="del_in_wish(\''+p_id+'\',\''+pp_id+'\',\''+p+'\',\''+name+'\',\''+dpu+'\',this)"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Удалить из избранного</a>');
      $("#wish_"+p_id).attr('onclick','del_in_wish(\''+p_id+'\',\''+pp_id+'\',\''+p+'\',\''+name+'\',\''+dpu+'\',this)');
    }
  });
}; 

// удалить из избранного
function del_in_wish(p_id, pp_id, p, name, dpu, th){
  $.ajax({
    type: "POST",
    url: "/local/ajax/delwish.php",
    data: "id_prod=" + p_id,
    success: function(html){
      $('#one_'+p_id).remove();
      var count = parseInt($('#wishcount').html());
      count = count - 1;
      $('#wishcount').html(count);
      $('#wishcount2').html(count);
      
      $('#favorites').html('<a href="javascript:void(0)"  class="wishbtn btn btn_outline btn_size-m" onclick="add2wish(\''+p_id+'\',\''+pp_id+'\',\''+p+'\',\''+name+'\',\''+dpu+'\',this)"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;Добавить в избранное</a>');
      $("#wish_"+p_id).attr('onclick','add2wish(\''+p_id+'\',\''+pp_id+'\',\''+p+'\',\''+name+'\',\''+dpu+'\',this)');
    }
  });
}

// удалить из корзины товар
function delInCart(id){

 $('#basket-item-'+id).remove(); 

  $.ajax({
    type: 'POST',
    url: '/include/delCart.php',
    data: {id: id},
    success: function(data){

      console.log($('#basket-item-table').children().length);
      
      if( $('#basket-item-table').children().length == 0 ){
        
        //$('[data-entity="basket-total-block"]').css("display", "none");
        $('[data-entity="basket-total-block"]').remove();
        $('#basket-items-list-container').remove();
        
        if ($('.basket__message').length == 0) {
          
          $('#basket-root').append('<div class="basket__message text-center"><p class="mb-40"> <b>Выберите товары, чтобы оформить заказ.</b></p><p><a href="/catalog/" target="_parent" class="btn btn_main btn_size-l"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;В магазин</a></p></div>');
          $('.i-cart__num').html(0); 
        }
        
      }else{
        var con = parseInt($('.i-cart__num').html())-1;
        $('.i-cart__num').html(con);
        $('.basket__note').html('Итого товаров '+con+' на сумму');
        // обновить корзину в модалке
        setTimeout(function(){ $('.basket__note').html('Итого товаров '+con+' на сумму');},2000);

      }  
      updatePanels();

    },
    error: function(){
      alert("Ошибка выполнения скрипта!");
    }
  });
}


function updatePanels(){
  $.ajax({
        url: '/include/basket.php',
        success: function(data){
            console.log(data);
              var msg = $.parseJSON(data);

              $('#panel1').empty();
              $('#panel1').append(msg[0]);
              $('#panel2').empty();
              $('#panel2').append(msg[1]); 
              $('#panel3').empty();
              $('#panel3').append(msg[2]); 

              $('#panel4').empty();
              $('#panel4').append(msg[1]);
        },
        error: function(){
          console.log('Ошибка выполнения скрипта!');
        }

      });
}
  // закрыли корзину
  $(".basket__btn-close, .overlay_basket").click(function (e){

    updatePanels();
      
      
  });


// корзина и добовляка
    $(".btn_add-to-cart").click( function (e) {

        e.preventDefault();

        /* почистить фрейм чтобы не мигало  */ 
        document.getElementById('basket_frame').src = "";


        var id=$(this).attr('id');
        var count=parseInt($('#QUANTITY_PRODUCT_'+id).text());

            $.ajax({
                type: 'POST',
                url: '/include/addCart.php?id='+id+'&count='+count,
                data: 'id='+id,
                success: function(data){  
                		var msg = $.parseJSON(data);           
                    	$('#panel1').empty();
                    	$('#panel1').append(msg[0]);
                    	$('#panel2').empty();
                    	$('#panel2').append(msg[1]); 
                      $('#panel3').empty();
                      $('#panel3').append(msg[2]); 

                      $('#panel4').empty();
                      $('#panel4').append(msg[1]);
                     
                }
            });
    });


function JCTitleSearch(arParams)
{
  var _this = this;

  this.arParams = {
    'AJAX_PAGE': arParams.AJAX_PAGE,
    'CONTAINER_ID': arParams.CONTAINER_ID,
    'INPUT_ID': arParams.INPUT_ID,
    'MIN_QUERY_LEN': parseInt(arParams.MIN_QUERY_LEN)
  };
  if(arParams.WAIT_IMAGE)
    this.arParams.WAIT_IMAGE = arParams.WAIT_IMAGE;
  if(arParams.MIN_QUERY_LEN <= 0)
    arParams.MIN_QUERY_LEN = 1;

  this.cache = [];
  this.cache_key = null;

  this.startText = '';
  this.running = false;
  this.runningCall = false;
  this.currentRow = -1;
  this.RESULT = null;
  this.CONTAINER = null;
  this.INPUT = null;
  this.WAIT = null;

  this.ShowResult = function(result)
  {
    if(BX.type.isString(result))
    {
      _this.RESULT.innerHTML = result;
    }

    _this.RESULT.style.display = _this.RESULT.innerHTML !== '' ? 'block' : 'none';
    var pos = _this.adjustResultNode();

    //adjust left column to be an outline
    var res_pos;
    var th;
    var tbl = BX.findChild(_this.RESULT, {'tag':'table','class':'title-search-result'}, true);
    if(tbl)
    {
      th = BX.findChild(tbl, {'tag':'th'}, true);
    }

    if(th)
    {
      var tbl_pos = BX.pos(tbl);
      tbl_pos.width = tbl_pos.right - tbl_pos.left;

      var th_pos = BX.pos(th);
      th_pos.width = th_pos.right - th_pos.left;
      th.style.width = th_pos.width + 'px';

      _this.RESULT.style.width = (pos.width + th_pos.width) + 'px';

      //Move table to left by width of the first column
      _this.RESULT.style.left = (pos.left - th_pos.width - 1)+ 'px';

      //Shrink table when it's too wide
      if((tbl_pos.width - th_pos.width) > pos.width)
        _this.RESULT.style.width = (pos.width + th_pos.width -1) + 'px';

      //Check if table is too wide and shrink result div to it's width
      tbl_pos = BX.pos(tbl);
      res_pos = BX.pos(_this.RESULT);
      if(res_pos.right > tbl_pos.right)
      {
        _this.RESULT.style.width = (tbl_pos.right - tbl_pos.left) + 'px';
      }
    }

    var fade;
    if(tbl) fade = BX.findChild(_this.RESULT, {'class':'title-search-fader'}, true);
    if(fade && th)
    {
      res_pos = BX.pos(_this.RESULT);
      fade.style.left = (res_pos.right - res_pos.left - 18) + 'px';
      fade.style.width = 18 + 'px';
      fade.style.top = 0 + 'px';
      fade.style.height = (res_pos.bottom - res_pos.top) + 'px';
      fade.style.display = 'block';
    }
  };

  this.onKeyPress = function(keyCode)
  {
    var tbl = BX.findChild(_this.RESULT, {'tag':'table','class':'title-search-result'}, true);
    if(!tbl)
      return false;

    var i;
    var cnt = tbl.rows.length;

    switch (keyCode)
    {
    case 27: // escape key - close search div
      _this.RESULT.style.display = 'none';
      _this.currentRow = -1;
      _this.UnSelectAll();
    return true;

    case 40: // down key - navigate down on search results
      if(_this.RESULT.style.display == 'none')
        _this.RESULT.style.display = 'block';

      var first = -1;
      for(i = 0; i < cnt; i++)
      {
        if(!BX.findChild(tbl.rows[i], {'class':'title-search-separator'}, true))
        {
          if(first == -1)
            first = i;

          if(_this.currentRow < i)
          {
            _this.currentRow = i;
            break;
          }
          else if(tbl.rows[i].className == 'title-search-selected')
          {
            tbl.rows[i].className = '';
          }
        }
      }

      if(i == cnt && _this.currentRow != i)
        _this.currentRow = first;

      tbl.rows[_this.currentRow].className = 'title-search-selected';
    return true;

    case 38: // up key - navigate up on search results
      if(_this.RESULT.style.display == 'none')
        _this.RESULT.style.display = 'block';

      var last = -1;
      for(i = cnt-1; i >= 0; i--)
      {
        if(!BX.findChild(tbl.rows[i], {'class':'title-search-separator'}, true))
        {
          if(last == -1)
            last = i;

          if(_this.currentRow > i)
          {
            _this.currentRow = i;
            break;
          }
          else if(tbl.rows[i].className == 'title-search-selected')
          {
            tbl.rows[i].className = '';
          }
        }
      }

      if(i < 0 && _this.currentRow != i)
        _this.currentRow = last;

      tbl.rows[_this.currentRow].className = 'title-search-selected';
    return true;

    case 13: // enter key - choose current search result
      if(_this.RESULT.style.display == 'block')
      {
        for(i = 0; i < cnt; i++)
        {
          if(_this.currentRow == i)
          {
            if(!BX.findChild(tbl.rows[i], {'class':'title-search-separator'}, true))
            {
              var a = BX.findChild(tbl.rows[i], {'tag':'a'}, true);
              if(a)
              {
                window.location = a.href;
                return true;
              }
            }
          }
        }
      }
    return false;
    }

    return false;
  };

  this.onTimeout = function()
  {
    _this.onChange(function(){
      setTimeout(_this.onTimeout, 500);
    });
  };

  this.onChange = function(callback)
  {
    if (_this.running)
    {
      _this.runningCall = true;
      return;
    }
    _this.running = true;

    if(_this.INPUT.value != _this.oldValue && _this.INPUT.value != _this.startText)
    {
      _this.oldValue = _this.INPUT.value;
      if(_this.INPUT.value.length >= _this.arParams.MIN_QUERY_LEN)
      {
        _this.cache_key = _this.arParams.INPUT_ID + '|' + _this.INPUT.value;
        if(_this.cache[_this.cache_key] == null)
        {
          if(_this.WAIT)
          {
            var pos = BX.pos(_this.INPUT);
            var height = (pos.bottom - pos.top)-2;
            _this.WAIT.style.top = (pos.top+1) + 'px';
            _this.WAIT.style.height = height + 'px';
            _this.WAIT.style.width = height + 'px';
            _this.WAIT.style.left = (pos.right - height + 2) + 'px';
            _this.WAIT.style.display = 'block';
          }

          BX.ajax.post(
            _this.arParams.AJAX_PAGE,
            {
              'ajax_call':'y',
              'INPUT_ID':_this.arParams.INPUT_ID,
              'q':_this.INPUT.value,
              'l':_this.arParams.MIN_QUERY_LEN
            },
            function(result)
            {
              _this.cache[_this.cache_key] = result;
              _this.ShowResult(result);
              _this.currentRow = -1;
              _this.EnableMouseEvents();
              if(_this.WAIT)
                _this.WAIT.style.display = 'none';
              if (!!callback)
                callback();
              _this.running = false;
              if (_this.runningCall)
              {
                _this.runningCall = false;
                _this.onChange();
              }
            }
          );
          return;
        }
        else
        {
          _this.ShowResult(_this.cache[_this.cache_key]);
          _this.currentRow = -1;
          _this.EnableMouseEvents();
        }
      }
      else
      {
        _this.RESULT.style.display = 'none';
        _this.currentRow = -1;
        _this.UnSelectAll();
      }
    }
    if (!!callback)
      callback();
    _this.running = false;
  };

  this.onScroll = function ()
  {
    if(BX.type.isElementNode(_this.RESULT)
      && _this.RESULT.style.display !== "none"
      && _this.RESULT.innerHTML !== ''
    )
    {
      _this.adjustResultNode();
    }
  };

  this.UnSelectAll = function()
  {
    var tbl = BX.findChild(_this.RESULT, {'tag':'table','class':'title-search-result'}, true);
    if(tbl)
    {
      var cnt = tbl.rows.length;
      for(var i = 0; i < cnt; i++)
        tbl.rows[i].className = '';
    }
  };

  this.EnableMouseEvents = function()
  {
    var tbl = BX.findChild(_this.RESULT, {'tag':'table','class':'title-search-result'}, true);
    if(tbl)
    {
      var cnt = tbl.rows.length;
      for(var i = 0; i < cnt; i++)
        if(!BX.findChild(tbl.rows[i], {'class':'title-search-separator'}, true))
        {
          tbl.rows[i].id = 'row_' + i;
          tbl.rows[i].onmouseover = function (e) {
            if(_this.currentRow != this.id.substr(4))
            {
              _this.UnSelectAll();
              this.className = 'title-search-selected';
              _this.currentRow = this.id.substr(4);
            }
          };
          tbl.rows[i].onmouseout = function (e) {
            this.className = '';
            _this.currentRow = -1;
          };
        }
    }
  };

  this.onFocusLost = function(hide)
  {
    setTimeout(function(){_this.RESULT.style.display = 'none';}, 250);
  };

  this.onFocusGain = function()
  {
    if(_this.RESULT.innerHTML.length)
      _this.ShowResult();
  };

  this.onKeyDown = function(e)
  {
    if(!e)
      e = window.event;

    if (_this.RESULT.style.display == 'block')
    {
      if(_this.onKeyPress(e.keyCode))
        return BX.PreventDefault(e);
    }
  };

  this.adjustResultNode = function()
  {
    if(!(BX.type.isElementNode(_this.RESULT)
      && BX.type.isElementNode(_this.CONTAINER))
    )
    {
      return { top: 0, right: 0, bottom: 0, left: 0, width: 0, height: 0 };
    }

    var pos = BX.pos(_this.CONTAINER);

    _this.RESULT.style.position = 'absolute';
    _this.RESULT.style.top = (pos.bottom + 2) + 'px';
    _this.RESULT.style.left = pos.left + 'px';
    _this.RESULT.style.width = pos.width + 'px';

    return pos;
  };

  this._onContainerLayoutChange = function()
  {
    if(BX.type.isElementNode(_this.RESULT)
      && _this.RESULT.style.display !== "none"
      && _this.RESULT.innerHTML !== ''
    )
    {
      _this.adjustResultNode();
    }
  };
  this.Init = function()
  {
    this.CONTAINER = document.getElementById(this.arParams.CONTAINER_ID);
    BX.addCustomEvent(this.CONTAINER, "OnNodeLayoutChange", this._onContainerLayoutChange);

    this.RESULT = document.body.appendChild(document.createElement("DIV"));
    this.RESULT.className = 'title-search-result';
    this.INPUT = document.getElementById(this.arParams.INPUT_ID);
    this.startText = this.oldValue = this.INPUT.value;
    BX.bind(this.INPUT, 'focus', function() {_this.onFocusGain()});
    BX.bind(this.INPUT, 'blur', function() {_this.onFocusLost()});
    this.INPUT.onkeydown = this.onKeyDown;

    if(this.arParams.WAIT_IMAGE)
    {
      this.WAIT = document.body.appendChild(document.createElement("DIV"));
      this.WAIT.style.backgroundImage = "url('" + this.arParams.WAIT_IMAGE + "')";
      if(!BX.browser.IsIE())
        this.WAIT.style.backgroundRepeat = 'none';
      this.WAIT.style.display = 'none';
      this.WAIT.style.position = 'absolute';
      this.WAIT.style.zIndex = '1100';
    }

    BX.bind(this.INPUT, 'bxchange', function() {_this.onChange()});

    var fixedParent = BX.findParent(this.CONTAINER, BX.is_fixed);
    if(BX.type.isElementNode(fixedParent))
    {
      BX.bind(window, 'scroll', BX.throttle(this.onScroll, 100, this));
    }
  };
  BX.ready(function (){_this.Init(arParams)});
}



