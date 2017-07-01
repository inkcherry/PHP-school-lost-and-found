var $span=$('#land>span');
     var i;
    $span.click(function(){
        $(this).next().slideToggle([1000],[$(this).parent().siblings().children('ul').hide()]);
    })