var $span=$('#land>span');
     var i;
    $span.click(function(){
        $(this).next().slideToggle([1000],[$(this).parent().siblings().children('ul').hide()]);
    })

// var $icon=$('#land>i');
// $icon.click(function(){
//     $('#mengceng').css('display','block');
//     $('#loading').css('display','block'); 
// })
var $close=$('.buttonclose').click(function(){
    $('#mengceng').css('display','none');
    $('#loading').css('display','none');

})
