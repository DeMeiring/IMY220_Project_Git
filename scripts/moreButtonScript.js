$('.more').on('click',function(){
    let img = $(this).siblings('img');
    let imgZ = img.css('z-index');
    let displayMore = $(this).siblings('.moreDisplay');
    let displayMoreZ = displayMore.css('z-index');
    if(imgZ>displayMoreZ){
        img.css('z-index',1);
        img.css('opacity',0);
        displayMore.css('z-index',2);
        displayMore.css('opacity',1);
    }else{
        img.css('z-index',2);
        img.css('opacity',1);
        displayMore.css('z-index',1);
        displayMore.css('opacity',0);
    }
});