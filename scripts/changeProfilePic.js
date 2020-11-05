(()=>{
    let email = $('#hiddenEmail').val();
    let fileName = $('#newFilename').val();
    console.log(email + " " + fileName);
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'userEmail':email,
            'filename':fileName
        },
        success:(res)=>{
            $('img').attr('src',fileName);
            $('#hiddenEmail').remove();
            $('#newFilename').remove();
        },
        error:(e)=>{
            console.log(e);
        }
    })
})()