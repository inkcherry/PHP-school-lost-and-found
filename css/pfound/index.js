var box=$('#type>.box')
box.click(function(){
   $(this).next().slideToggle(200,function(){ $(this).parent().siblings().children('ul').hide()});
})
var li=$('#slide>li')
li.click(function(){
    $('#slide').css('display','none');
    $('#type>input').val($(this).html());
})
var place=$('#place>.box')
place.click(function(){
   $(this).next().slideToggle(200,function(){ $(this).parent().siblings().children('ul').hide()});
})
var lili=$('#slide1>li')
lili.click(function(){
    $('#slide1').css('display','none');
    $('#place>input').val($(this).html());
})