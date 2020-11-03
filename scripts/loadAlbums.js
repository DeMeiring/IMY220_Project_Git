(()=>{
    let userEmail = $('#hiddenEmail').val();
    let origin = window.location.origin;
    function getUID(){
        $.ajax({
            url:'http://imy.up.ac.za/IMY220/u17074292//API.php',
            type:'GET',
            cache:false,
            data:{
                'userEmail':userEmail,
            },
            success:(res)=>{
                console.log(res);
                getFromAPI(res[0]['userID']);
            },
            error:(e)=>{
                console.log(e);
            }
        })
    }

    function getFromAPI(userID){
        $.ajax({
            url:'http://imy.up.ac.za/IMY220/u17074292//API.php',
            type:'GET',
            cache:false,
            data:{
                'userIDAlbums':userID,
                'albumIDAlbums':0
            },
            success:(res)=>{
                console.log(res);
                let count=0;
                res.forEach(function(){
                   $('img').eq(count).attr('src',res[count]['albumImage']);
                   $('h3').eq(count).text(res[count]['albumName']);
                });

            },
            error:(e)=>{
                console.log(e);
            }
        })
    }

    getUID();
})()