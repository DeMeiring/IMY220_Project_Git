(()=>{
    let userEmail = $('#hiddenEmail').val();
    function getUID(){
        $.ajax({
            //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
            url:"http://localhost/IMY220_Project_Git/API.php",
            type:'GET',
            cache:false,
            data:{
                'userEmail':userEmail,
            },
            success:(res)=>{
                getAlbumID(res[0]['userID']);
            },
            error:(e)=>{
                console.log(e);
            }
        })
    }

     function getAlbumID(userID){
        console.log(userID);
        $.ajax({
            //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
            url:"http://localhost/IMY220_Project_Git/API.php",
            type:'GET',
            cache:false,
            data:{
                'userIDAlbums':userID,
                'albumIDAlbums':0
            },
            success:(res)=>{
                getFromAPI(userID);
            },
            error:(e)=>{
                console.log(e);
            }
        });
    }

    function getFromAPI(userID){
        $.ajax({
            //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
            url:"http://localhost/IMY220_Project_Git/API.php",
            type:'GET',
            cache:false,
            data:{
                'userIDAlbums':userID,
                'albumIDAlbums':0
            },
            success:(res)=>{
                let objCount = Object.keys(res).length;
                for(let j=0;j<objCount;j++){
                    $('.albumCont').append(`
                        <div class="col-6 albumExpand">
                            <img src="${res[j]['albumImage']}" class="albumCover" alt="" onclick="event">
                            <h3 class="albumName col">${res[j]['albumName']}</h3>
                            <input type="hidden" value="${res[j]['albumID']}"/>
                        </div>
                    `);
                }

                $('.albumCover').on('click',function (){
                    if($(this).siblings('.albumExpandCont')){
                        $(this).siblings('.albumExpandCont').remove();
                    }
                    eventApply($(this).siblings('input').val());
                });

            },
            error:(e)=>{
                console.log(e);
            }
        });
    }

    function eventApply(albumID){
            $.ajax({
                //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
                url:"http://localhost/IMY220_Project_Git/API.php",
                type:'GET',
                cache:false,
                data:{
                    'albumID':albumID,
                    'getUserAlbums':0
                },
                success:(res)=>{
                    console.log(albumID);
                    console.log(res);
                    let objCount = Object.keys(res).length;

                    $('.albumExpand').append(`<div class="row albumExpandCont"></div>`)

                    for(let i=0;i<objCount;i++){
                        $('.albumExpandCont').append(`
                                    <div class="imgExpand col-4">
                                          <img src="${res[i]['fileName']}" alt=""/><br>
                                    </div>
                                `);
                    }
                },
                error:(e)=>{
                    console.log(e);
                }
            });
    }
    getUID();
})()