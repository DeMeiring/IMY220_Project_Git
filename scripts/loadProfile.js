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
            $('#useremail').text(userEmail);
            $('#username').text(res[0]['username']);
            $('img').attr('src',res[0]['pfpImage']);
        },
        error:(e)=>{
            console.log(e);
        }
    })
})()