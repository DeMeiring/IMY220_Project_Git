(()=>{
        let template = $('#galleryContainer').html();
        $.ajax({
            //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
            url:"http://localhost/IMY220_Project/API.php",
            type:'GET',
            cache:false,
            data:{
                'gaImages':0,
            },
            success:(res)=>{
                let objCount = Object.keys(res).length;

                let appendCount = Math.ceil((objCount/3)-1);
                for(let j=0;j<appendCount;j++){
                    $('#galleryContainer').append(template);
                }

                $.getScript("scripts/moreButtonScript.js");

                for(let i=0;i<objCount;i++){
                    getUsername(res[i]['userID'],i);
                    loadComments(res[i]['galleryID'],i);
                }
                loadintoHTML(res);
                $.getScript('scripts/createComment.js');
            },
            error:(e)=>{
                console.log(e);
            }
        })
})()

function loadComments(galleryID,commentIndex){
    $.ajax( {
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
                'galleryIDComments':galleryID
            },
    success:(res)=>{
        let count = Object.keys(res).length;
        for(let i=0;i<count;i++){
            $('.commentContainer').eq(commentIndex).append('<p>'+res[i]['comment']+'</p>');
        }
    },
        error:(e)=>{
        console.log(e);
    }
})
}

function getUsername(uid , index){
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project/API.php",
        type:'GET',
        cache:false,
        data:{
            'userID':uid,
            'userIDdud':0
        },
        success:(res)=>{
            console.log(res);
             addTags(res[0]['username'],index);
        },
        error:(e)=>{
            console.log(e);
        }
    })
}

function addTags(username,index){
    let userTag = '@'+username;
    $('.userName').eq(index).text(userTag);
}

function loadintoHTML(res){
    let objCount = Object.keys(res).length;
    for(let i=0;i<objCount;i++){
        $('img').eq(i).attr('src',res[i]['filename']);
    }
    for(let j=0;j<objCount;j++){
        $('.userCaption').eq(j).text(res[j]['caption'])
    }
    for(let k=0;k<objCount;k++){
        $('.userHashtags').eq(k).text(res[k]['hashtags']);
    }
}
