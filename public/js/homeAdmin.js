$(document).ready(function(){
    var paraTitlePost = $('.post_status');
    console.log(paraTitlePost);
    for(var i=0; i<paraTitlePost.length; i++){
      console.log($(paraTitlePost[i]).html());
        if ($(paraTitlePost[i]).html() === 'en ligne'){
            $(paraTitlePost[i]).css({
                'background' : '#09a509',
                'color' : '#fea'
            });
            console.log('okay');
        }
        else{
            $(paraTitlePost[i]).css({
                'background' : '#b10606',
                'color' : 'white'
            });
            console.log('dacc');

        };
    }
})