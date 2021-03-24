var url = 'http://proyecto-laravel.test';

window.addEventListener("load", function(){

    $('.LikeHeart').css('cursor', 'pointer');
    $('.DislikeHeart').css('cursor', 'pointer');

    //Boton de Like
    function like(){
        $('.LikeHeart').unbind('click').click(function(){
            
            $(this).addClass('DislikeHeart').removeClass('LikeHeart');
            $(this).addClass('text-danger')

            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('has dado like');
                    }else{
                        console.log('error al darl like');
                    }
                    
                }
            });

            dislike();
        });
    }
    like();


    //Boton de Dislike
    function dislike(){
        $('.DislikeHeart').unbind('click').click(function(){
            $(this).addClass('LikeHeart').removeClass('DislikeHeart');
            $(this).removeClass('text-danger')

            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        console.log('has dado dislike');
                    }else{
                        console.log('error al dar dislike');
                    }
                    
                }
            });

            like();

        });
        
    }
    dislike();


    //Buscador


        $('#SearchForm').submit(function(){

            $(this).attr('action',url+'/gente/'+$('#SearchForm #search').val());
            $(this).submit();
        })



})