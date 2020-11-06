(()=>{
    let email = $('#hiddenEmail').val();
    let fileName = $('#newFilename').val();
    console.log(email + " " + fileName);
    $.ajax({
        url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        //url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userEmail':email,
            'filename':fileName
        },
        success:(res)=>{
            $('img').eq(0).attr('src',fileName);
            $('#newFilename').remove();
        },
        error:(e)=>{
            console.log(e);
        }
    })
})()