(function($){



  /*  Cart Tooltips  */
  /*
  $(".cart_num").qtip({
             content: {
                 text: $(".cart_num").next('.tooltiptext')
             },
             position: {
                     my: 'top   left',  // Position my top left...
                     at: 'top right', // at the bottom right of...
                     // target: $('.selector') // my target
                 }
         });
*/







  Tipped.create('#mycart',
    $('#tooltiptext'),
    {
      position: 'righttop',
      // close: true,
    //  hideOn: false,
            onShow: function(content, element) {



            $.post(wp_ajax, {
               action: 'get_cart_content_action',
             },function(data) {
                $("#tooltiptext ul").html('');
                var obj = JSON.parse(data);
                console.log(obj);
                var $html = "";
                for(var key in obj){
                    if(key !=='total'){
                      $html +='<li class="cart-item"><div class="img">'+
                          '<img src="'+obj[key].img+'" alt="">'+
                                '</div><div class="myprice">'+
                                    '<h4><a href="'+obj[key].link+'">'+obj[key].title+'</a></h4>'+
                                    '<div class="detail">'+
                                      '<span class="price">$'+obj[key].price+'</span> x <span class="qty">'+obj[key].qty+'</span>'+
                                    '</div>'+
                                  '</div>'+
                                  '<a href="'+obj[key].remove+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                                '</li>';
                    }
                }
                $html = "<ul>"+$html+"</ul><div class='total'>總計 $<span>"+obj.total+"</span></div>";



                $("#tooltiptext .cart-inner").html($html);
                Tipped.refresh();
            });

      }
    }
 );



  $("#ice_login .fb_login button").on("click",function(){
    $(".fb-login-button  iframe").trigger("click");
    alert("xxx");
  });






  /*  Visiable Password  input ###  */
    if($(".check_passwd").length>0){

      $(".check_passwd").each(function(){
        var $password =  $(this).find('input[type="password"]'),
            $passwordInput = $('<input type="text"    class="' + $password.attr('class') + '"  name="' + $password.attr('name') + '" class="' + $password.attr('className') + '" />');
            $(this).find(".chex").on("click",function(e){
                e.preventDefault();
                if($(this).hasClass("sh")){  /*  close */
                   $passwordInput.replaceWith($password.val($passwordInput.val()));
                  $(this).removeClass("sh");
                }else{ /* open */
                    $password.replaceWith($passwordInput.val($password.val()));
                  $(this).addClass("sh");
                }
            });
      });
    }





  var attr = $("#main").attr('mbname');
  if (typeof attr !== typeof undefined && attr !== false) {
    $(".mobile-nav h2").text($("#main").attr("mbname"));
  }else{
    $(".mobile-nav h2").text($("header.entry-header h1").text());
  }



  $(".selectpicker  select").selectpicker();

  var preload = new createjs.LoadQueue();
  preload.on("complete", handleComplete, this);
  preload.on('progress',     onProgress);

  var source = [];
  $("body img").each(function(){
    source.push($(this).attr('src'));
  });

  // console.log(source);

  for(var k in source){
    preload.loadFile(source[k]);
  }


  function handleComplete(event){
    if($("#loading").hasClass("home")){
      setTimeout(function(){
        $("#loading").addClass("done");
      },100);

    }else{
      setTimeout(function(){
        $("#loading").addClass("done");
      },700);

      setTimeout(function(){
         $("#loading").hide();

         $('.grid').masonry({
           // options
           itemSelector: '.grid-item',
          //  columnWidth: 200
         });

      },1200);
    }
  }



  if($("body.home").length>0){
    $(window).bind("scroll",function(){
      console.log("sss");
      if($("#loading.home.done").length>0){
        $("#loading.home.done").addClass("home_exit");

          setTimeout(function(){
            $("#loading").hide();
            $(window).unbind("scroll");
          },500);
      }
    });

    $(".scrollx").on("click",function(){
      $("#loading.home.done").addClass("home_exit");
      setTimeout(function(){
        $("#loading").hide();
        $(window).unbind("scroll");
      },500);
    });
  }



  function onProgress(event) {
      var progress = Math.round(event.loaded * 100);

      //if(progress > 10){
          $(".maskw .container").addClass("do");
    //  }


      //console.log('General progress', Math.round(event.loaded) * 100, event);
  }





  $(document).ready(function(){


        if($(".category_slk").length>0){
          $(".category_slk  select").on("change",function(){
            var url = $(this).val();
            window.location = url;
          });
        }


        if($(".buynote_slk").length>0){
          $(".buynote_slk  select").on("change",function(){
              var id = "#"+$(this).val();
              $("html, body").animate({ scrollTop: $(id).offset().top-100 }, 400);
          });
        }


        /*  最多 Loading 三秒 */
          setTimeout(function(){
            //if($("#loading.done").length==0){
              $("#loading").addClass("home_exit");

              setTimeout(function(){
                $("#loading").hide();
              },700);
            // }
          },3000);



          /*  NMobile Footer  */
          var ww = $(window).width();
          $(".footer_outter").on("click",function(){
            if(ww<768){
                  $(".footer_outter").toggleClass("mopen");
                  setTimeout(function(){
                    if($(".footer_outter").hasClass("mopen")){
                      $("html, body").animate({ scrollTop: $('#colophon').offset().top-100 }, 400);
                    }
                  },300);

            }
          });



          if($("#product-wdr-single").length>0){

            if(ww > 600){
              var show_item = 3;
              if(ww<1024){
                show_item = 4;
              }

              $('#product-wdr-single  ol.flex-control-nav').slick({
                  dots: false,
                  vertical: true,
                  slidesToShow: show_item,
                  slidesToScroll: show_item,
                  verticalSwiping: true,
                });
            }

          }








          if(ww<768){
            var vh = $(window).height();
            vh = Number(vh) - 120;
            $("#wdr-menu .menu-box .mobile_scroll").css("height",vh);
          }


            inView('#wdr-inview').on('enter', function(){
              $(".btn_img").addClass("ani");
            });



            $(".back_top").on("click",function(e){
              e.preventDefault();
              $("html, body").stop().animate({scrollTop:0}, 500, 'swing', function(){});
            });




            if($("#ice_login").length>0){
                $("#ice_login .tab li a").on("click",function(e){
                  e.preventDefault();

                    $(this).parent().addClass("active");
                    $(this).parent().siblings().removeClass("active");
                    var idx = $(this).parent().index();
                    if(idx==0){
                      $("#customer_login .col-1").removeClass("active");
                      $("#customer_login .col-2").addClass("active");
                    }else{

                      $("#customer_login .col-1").addClass("active");
                      $("#customer_login .col-2").removeClass("active");
                    }
                });
            }




            if($("#home_slider").length>0){

              $('.flexslider').slick({
                "arrows":false,
                "dots":true,
                "autoplay": true,
                "autoplaySpeed": 5000,
              });
              

              $('#home_slider .right_nav').on("click",function(){
              //   $('.flexslider').flexslider('next');
                    $('.flexslider').slick('slickNext');
              });
            }

            if($('.news_slier').length>0){


                $('.flexslider2').slick({
                  "arrows":false,
                  "dots":true
                });

                $('.news_slier .right_nav').on("click",function(){
                  $('.flexslider2').slick('slickNext');
                });
            }


            if($("#ice_archive_product").length>0){
              $('ul.products').masonry({
                itemSelector: '.product',
              });
            }


            $("#stickList .grid-item").on("click",function(e){
                e.preventDefault();
                var ct = $(this).find(".content").html();
                var img = $(this).find("img").attr("src");
                var tl = $(this).find(".entry-title").text();
                var dt = $(this).find(".date").text();
                var st = $(this).find(".sale_status").text();

                $("#stickModal").find("#sale_status").text(st);

                $("#stickModal").find("h3").text(tl);
                $("#stickModal").find(".date").text(dt);
                $("#stickModal").find(".desc").html(ct);
                $("#stickModal  img").attr("src",img);
                setTimeout(function(){
                  $('#stickModal').modal("show");
                },300);
            });
            /*  文化冰棒棍 */

            $('#event_grid').masonry({
              // options
              itemSelector: '.grid-item',
             //  columnWidth: 200
            });




              /*   Checkout Page  #地址＃地址＃  */
              if($("#add1").length>0){
                var copyp = function(){
                      var add1 = $("#add1").val();
                      var add2 = $("#add2").val();
                      var add3 = $("#add3").val();
                      var myadd = add1 + add2 +add3;
                      $("#billing_address_1").val(myadd);
                }
                $("#add3").keyup(function(){
                  copyp();
                });
                $("#add3").on('change', function(){
                  copyp();
                });

                $("#add1,#add2").change(function(){
                  copyp();
                });

                $("#add1").change(function(){
                  var slk1 =  $(this).val();
                  if(slk1!=""){
                    var thtml='';
                    for(var key in towndata[slk1]){
                      if(key == slk1){
                        thtml += '<option value="'+key+'"  selected >'+key+'</option>';
                      }else{
                        thtml += '<option value="'+key+'">'+key+'</option>';
                      }
                    }
                    $("#add2").html(thtml);
                    $("#add2").selectpicker('refresh');
                  }else{
                    $("#add2").html('<option value="">區鄉鎮</option>');
                    $("#add2").selectpicker('refresh');
                  }
                });

              }


              /*   Checkout Page  #地址＃地址＃  */
              if($("#sadd1").length>0){
                var copyp2 = function(){
                      var add1 = $("#sadd1").val();
                      var add2 = $("#sadd2").val();
                      var add3 = $("#sadd3").val();
                      var myadd = add1 + add2 +add3;
                      $("#shipping_address_1").val(myadd);
                }
                $("#sadd3").keyup(function(){
                  copyp2();
                });
                $("#sadd3").on('change', function(){
                  copyp2();
                });

                $("#sadd1,#sadd2").change(function(){
                  copyp2();
                });


                $("#sadd1").change(function(){
                  var slk1 =  $(this).val();
                  if(slk1!=''){
                    var thtml='';
                    for(var key in towndata[slk1]){
                      if(key == slk1){
                        thtml += '<option value="'+key+'"  selected >'+key+'</option>';
                      }else{
                        thtml += '<option value="'+key+'">'+key+'</option>';
                      }
                    }
                    $("#sadd2").html(thtml);
                    $("#sadd2").selectpicker('refresh');
                  }else{
                    $("#sadd2").html('<option value="">區鄉鎮</option>');
                    $("#sadd2").selectpicker('refresh');
                  }

                });
                $("#add1").trigger("change");
                $("#sadd1").trigger("change");

              }



              /*  門市據點 */
              if($("#storeList").length>0){


                var xfilter = [];
                var xlocation = [];
                var xitem = [];

                $("#lc1").change(function(){
                  var slk1 =  $(this).val();
                  var thtml='<option value="all">請選擇區鄉鎮</option>';
                  if(slk1 != "all"){
                    for(var key in towndata[slk1]){
                      if(key == slk1){
                        thtml += '<option value="'+towndata[slk1][key]+'"  selected >'+key+'</option>';
                      }else{
                        thtml += '<option value="'+towndata[slk1][key]+'">'+key+'</option>';
                      }
                    }
                  }else{
                    thtml = '<option value="all">請選擇區鄉鎮</option>';
                  }

                  $("#lc2").html(thtml);
                  $("#lc2").selectpicker('refresh');

                  var pos1 = $(this).val();
                  if(pos1!='all'){
                    xlocation[0]= "."+pos1;
                    xlocation[1]="";
                  }else{
                      xlocation[0]= "";
                  }
                  console.log(xlocation.join(''));
                  isote.isotope({ filter: xlocation.join('') });

                  $('#storefilter input:not(:checked)').each(function(){
                      $(this).parent().find("label").trigger("click");
                  });
                });

                $("#lc2").change(function(){
                  var pos2 = $(this).val();
                  if(pos2!='all'){
                    xlocation[1]= "."+pos2;
                  }else{
                      xlocation[1]= "";
                  }
                  console.log(xlocation.join(''));
                  isote.isotope({ filter: xlocation.join('') });

                  $('#storefilter input:not(:checked)').each(function(){
                      $(this).parent().find("label").trigger("click");
                  });
                });

                setTimeout(function(){
                    $("#lc1").trigger("change");
                },200);



                /* 門市據點  filter */
                  var isote =  $('.xgrid').isotope({
               // set itemSelector so .grid-sizer is not used in layout
                       itemSelector: '.xgrid-item',
                     });


                  isote.on( 'arrangeComplete', function(event, filteredItems){
                    if(filteredItems.length==0){
                      $("#empty_cart").removeClass("hide");
                    }else{
                      $("#empty_cart").addClass("hide");
                    };
                  });


                   $("#storefilter .tag label").trigger("click");
                   $("#storefilter .tag  label").on("click",function(){
                     var me = $(this);
                     xitem =[];
                     setTimeout(function(){

                       $('#storefilter input:checked').each(function(){
                           xitem.push(xlocation.join('')+"."+$(this).val());
                       });

                       var filterx = xitem.join();

                       console.log(filterx);

                       if(xitem.length>0){
                         isote.isotope({ filter: filterx });
                       }else{
                         isote.isotope({ filter: '.no_one'});
                       }
                     },200);
                   });



              } /*  #storeList  門市據點 - 結束  */



              $('.quantity').each(function() {
                   var spinner = $(this),
                     input = spinner.find('input[type="number"]'),
                     btnUp = spinner.find('.quantity-up'),
                     btnDown = spinner.find('.quantity-down'),
                     min = input.attr('min'),
                     max = input.attr('max') | 99;

                   btnUp.click(function() {

                     var oldValue = parseFloat(input.val());
                     if (oldValue >= max) {
                       var newVal = oldValue;
                     } else {
                       var newVal = oldValue + 1;
                     }


                     input.attr("value",newVal);
                     spinner.find("input").val(newVal);
                     spinner.find("input").trigger("change");
                   });

                   btnDown.click(function() {


                     var oldValue = parseFloat(input.val());
                     if (oldValue <= min) {
                       var newVal = oldValue;
                     } else {
                       var newVal = oldValue - 1;
                     }
                     spinner.find("input").val(newVal);
                     spinner.find("input").trigger("change");
                   });
                 });


                 if($(".buy_control2").length>0){

                      var spinner = $(".buy_control2"),
                          input = spinner.find('input[type="number"]'),
                          btnUp = spinner.find('.quantity-up'),
                          btnDown = spinner.find('.quantity-down'),
                          min = input.attr('min'),
                          max = input.attr('max') | 99;

                        btnUp.click(function() {

                          var oldValue = parseFloat(input.val());
                          if (oldValue >= max) {
                            var newVal = oldValue;
                          } else {
                            var newVal = oldValue + 1;
                          }


                          spinner.find("input").val(newVal);
                          spinner.find("input").trigger("change");
                        });

                        btnDown.click(function() {


                          var oldValue = parseFloat(input.val());
                          if (oldValue <= min) {
                            var newVal = oldValue;
                          } else {
                            var newVal = oldValue - 1;
                          }
                          spinner.find("input").val(newVal);
                          spinner.find("input").trigger("change");
                        });
                 }




                      if($("#handmade").length>0){
                         inView('.step .text').on('enter', function(el){
                              $(el).addClass("shx");
                           });
                      }



                      /*   #####################   Cart  ########################### */
                      if($("#ice_cart").length>0){
                        $(".woocommerce-cart-form__cart-item").each(function(){
                          var num_input = $(this).find('input[type="number"]');
                            num_input.on("keyup mouseup",function(){
                                var temp = $(this).val();
                                num_input.each(function(){
                                  console.log( temp);
                                    $(this).val(parseInt(temp));
                                });
                            });
                        });
                      }


                      if($(".taxonomy_link").length>0){
                        var ww = $(window).width();
                        if(ww<768){
                          var idx = $(".taxonomy_link ul li.cur").index() | 0;
                          $(".taxonomy_link ul").slick({
                             initialSlide:idx,
                             infinite: false,
                             slidesToShow: 1,
                             slidesToScroll: 1,
                             arrows:false,
                             centerMode: true,
                           });
                       }
                      }



                      if($(".product_taxonomy_link").length>0){
                        var ww = $(window).width();
                        if(ww<768){
                          var idx = $(".product_taxonomy_link ul li.cur").index();
                          if(idx==-1){
                            idx = 0;
                          }
                          $(".product_taxonomy_link ul").slick({
                             initialSlide:idx,
                             infinite: false,
                             slidesToShow: 1,
                             slidesToScroll: 1,
                             arrows:false,
                              centerMode: true,
                           });
                       }
                      }



                      if($(".buy_menu").length>0){
                        var ww = $(window).width();
                        if(ww<768){
                          $(".buy_menu ul").slick({
                            initialSlide:0,
                             infinite: false,
                             slidesToShow: 1,
                             slidesToScroll: 1,
                             arrows:false,
                             centerMode: true,
                           });
                       }
                      }




  });  /*  #########################    Dom Ready ##########################  */



  /*  Archive  Product Page  */
  // $('<div class="quantity-nav"><div class="quantity-button quantity-up"><span>+</span></div><div class="quantity-button quantity-down"><span>-</span></div></div>').insertAfter('.quantity input');

      var extra_date = 4;
      /*
      var deliverdate = moment().add(extra_date, 'day').format('YYYY/M/D');
      console.log(deliverdate);

       var workday = moment().add(extra_date, 'day').format('d');
       if( workday==6 ||  workday==0){
          extra_date = Number(extra_date) +3;
          deliverdate = moment().add(extra_date, 'day').format('YYYY/M/D');
       };

       console.log(deliverdate);
       */
       var extra_date = $("#deliver_date").attr("starttime");

       for(var i=0;i<=extra_date;i++){
        var workday = moment().add(i, 'day').format('d');
      //  console.log(workday);
         if( workday==6 ||  workday==0){
            extra_date = Number(extra_date) +1;
         };
       }

       //console.log("+>"+extra_date);
       var work_extra_rdate = moment().add(extra_date, 'day').format('YYYY/M/D');
      // console.log(work_extra_rdate);


     $('#deliver_date').datetimepicker({
       minDate:work_extra_rdate,
       dayViewHeaderFormat:"YYYY / MM",
       format:"YYYY-MM-DD",
       daysOfWeekDisabled: [0,1],
       icons:{
              previous: 'ion-chevron-left',
            next: 'ion-chevron-right'
       },
       ignoreReadonly: true,
       allowInputToggle: true,

     });


     $('input[name="deliver_date"]').on("click",function(e){
       // alert("xxx2");
        // $('#deliver_date').data("DateTimePicker").show();
      //  e.preventDefault();
     });


     $("#billing_birthday").mask('0000 / 00 / 00');
     $("#birthday").mask('0000 / 00 / 00');

     var ww = $(window).width();
     if(ww<768){
       $(".slick_slider").slick({
          infinite: true,
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows:false,
          centerMode: true,
          autoplay:true
        });
     }else{
       $(".slick_slider").slick({
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 4,
          arrows:false,
          centerMode: true,
          autoplay:true
        });
     }



      $("#traffic_slick").slick({
         infinite: false,
         slidesToShow: 3,
         slidesToScroll: 3,
         arrows:false,
         centerMode: true,
         responsive: [
             {
               breakpoint: 768,
               settings: {
                 arrows: false,
                 centerMode: true,
                 centerPadding: '40px',
                 slidesToShow: 1
               }
             }
           ]
       });

     /*
     $('.owl-carousel').owlCarousel({
         loop:true,
         margin:0,
         nav:false,
         center:true,
         responsive:{
             0:{
                 items:3
             },
             600:{
                 items:3
             },
             1000:{
                 items:3
             }
         }
     })
     */




     /*   Billing  copy to Shipping  */
     $("#copy_to_address  label").on("click",function(){

       setTimeout(function(){

         var chk = $("#copy_to_address #styled-checkbox-1").prop("checked");
          console.log(chk);
          if(chk){
            $("#shipping_first_name").val($("#billing_first_name").val());
            $("#shipping_phone").val($("#billing_phone").val());
            $("#sadd3").val($("#add3").val());
            $("#sadd1").selectpicker('val', $("#add1").val());
            $("#sadd1").trigger("change");
            setTimeout(function(){
              $("#sadd2").selectpicker('val', $("#add2").val());
              $("#sadd2").trigger("change");
            },500);
          }else{
            $("#shipping_first_name").val('');
            $("#shipping_phone").val('');
            $("#sadd3").val('');
          }
       },150);
     });


     /*  購物須知 */
     $(".buy_menu ul li a").on("click",function(e){
       var t  = $(this).attr("href");
       $("html, body").animate({ scrollTop: $(t).offset().top-80 }, 1000);
       e.preventDefault();
     });


     $(".mobile-nav  .menu-trigger,#wdr-menu .mask").on("click",function(e){
        $("#masthead").toggleClass("side-open");
        e.preventDefault();
     });









})(jQuery);
