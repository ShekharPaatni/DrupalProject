/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {
  Drupal.behaviors.navbar = {
    attach: function (context) {
    $('#block-nav > ul > li:last-child > a').once().after('<i class="fa fa-caret-down"></i>');
//    Arrow key for Search
  //  $('#search-block-form .form-search').once().after('<i class="fa fa-angle-right"></i>');    
    $('#search-block-form .form-search').attr('placeholder','Search');
    $('#block-nav > ul > li:last-child').on('click',function(e){
    $(this).find('ul').toggle();
    e.preventDefault();
    });
    $('#block-mainmenu > ul').once().after('<i class="fa fa-search"></i>');
    $('#block-mainmenu > ul > li').has('ul').find('> a').once().after('<i class="fa fa-caret-down"></i>');
    $('#block-mainmenu > ul > li').on('click',function(e){
        if($(this).has('ul')){
            if($(this).find('ul').css('display')=='block')
            $(this).find('ul').hide();
            else{
            $('#block-mainmenu > ul > li').find('ul').hide();
            $(this).find('ul').show();    
        }
            
            e.preventDefault();
        }
    });
    
    $('.fa-search').on('click',function(){
     $('#block-searchform').toggle();   
    });
    }
  };
})(jQuery);
