(()=>{
    let userEmail=$('#hiddenEmail').val();
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userEmail':userEmail,
        },
        success:(res)=>{
            let userID = res[0]['userID'];
            getImages(userID);
        },
        error:(e)=>{
            console.log(e);
        }
    })
})()

function getImages(userID){
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'imageGetUserID':userID
        },
        success:(res)=>{
            let objCount = Object.keys(res).length;

            for(let i=0;i<objCount;i++){
                let album="no Album Connected";
                if(res[i]['albumID']!==null){
                    album=res[i]['albumID'];
                }
                $('.postHistoryContainer').append(`
                     <div class="col-4 historyImgCap">
                        <label>albumNumber: ${album}</label>
                        <img src="${res[i]['fileName']}" alt="" class="imgHistory"/><br>
                        <label>${res[i]['caption']}</label>
                    </div>
                `);
            }
        },
        error:(e)=>{
            console.log(e);
        }
    })
}