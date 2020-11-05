$('.commentButton').on('click',function(){
    let comment = $(this).siblings('input').val();
    let username = $(this).parent().parent().siblings('.userName').text();
    let imageHashtag = $(this).parent().parent().siblings('.userHashtags').text();
    console.log(imageHashtag);
    username = username.substring(1);

    console.log(username);
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userEmail':username
        },
        success:(res)=>{
            let userID = res[0]['userID'];
            console.log(userID);
            getGalleryID(userID,imageHashtag,comment);

        },
        error:(e)=>{
            console.log(e);
        }
    })
});

function getGalleryID(userID,hashtag,comment){
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userID':userID,
            'userHashtag':hashtag
        },
        success:(res)=>{
            let galleryID = res[0]['galleryID'];
            console.log(galleryID);
            console.log(comment);
            makeComment(userID,galleryID,comment);
        },
        error:(e)=>{
            console.log(e);
        }
    })
}

function makeComment(userID,galleryID,comment){
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userID':userID,
            'galleryID':galleryID,
            'comment':comment
        },
        success:(res)=>{
            location.reload();
        },
        error:(e)=>{
            console.log(e);
        }
    })
}
