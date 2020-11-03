(()=>{
    let userEmail = $('#hiddenEmail').val();
    let fileDirName = 'Images/'+$('#hiddenfilename').val();
    let caption = $('#hiddencaption').val();
    let hashtag = $('#hiddenhashtag').val();
     function getUID(){
            $.ajax({
                url:'http://localhost/IMY220_Project/API.php',
                type:'GET',
                cache:false,
                data:{
                    'userEmail':userEmail,
                },
                success:(res)=>{
                    postToAPI(res[0]['userID']);
                },
                error:(e)=>{
                    console.log(e);
                }
        })
    }

     function postToAPI(userID){
            $.ajax({
                url:'http://localhost/IMY220_Project/API.php',
                type:'POST',
                cache:false,
                data:{
                    'filename':fileDirName,
                    'captions':caption,
                    'hashtags':hashtag,
                    'userID':userID
                },
                success:(res)=>{
                    console.log(fileDirName);
                    console.log(caption);
                    console.log(hashtag);
                    console.log(userID);
                },
                error:(e)=>{
                    console.log(e);
                }
            })
    }
   getUID();
})()
