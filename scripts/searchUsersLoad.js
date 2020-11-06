(()=>{
    $.ajax({
        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
        url:"http://localhost/IMY220_Project_Git/API.php",
        type:'GET',
        cache:false,
        data:{
            'getAllUsers':0
        },
        success:(res)=>{
            console.log(res);
            let objCount = Object.keys(res).length;
            for(let i=0;i<objCount;i++){
                $('.loadContainer').append(`
                    <div class="loadCapImgContainer col-3">
                        <label class="loadedLabels col offset-1">${res[i]['email']}</label><br>
                        <img class="loadedImages col" src="${res[i]['profilePictures']}" alt="user image must appear here \_(-.-)_/"/>
                    </div>
                `);
            }

            $('.loadedImages').on('click',function(){
                let userEmail = $(this).siblings('.loadedLabels').text();

                $.ajax({
                    //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
                    url:"http://localhost/IMY220_Project_Git/API.php",
                    type:'GET',
                    cache:false,
                    data:{
                        'userEmail': userEmail
                    },
                    success:(res)=>{
                        $('.loadContainer').empty();
                        $('.userInfoContainer').append(`
                        <h2 style="font-weight: bold" class="userNameLabel col-5">${res[0]['userEmail']}</h2>
                        <img class="userProfileImage" src="${res[0]['pfpImage']}"/>
                        <br>
                        <input type="hidden" id="userID" value="${res[0]['userID']}">
                `);

                        $.ajax({
                            //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
                            url:"http://localhost/IMY220_Project_Git/API.php",
                            type:'GET',
                            cache:false,
                            data:{
                                'imageGetUserID': $('#userID').val()
                            },
                            success:(res)=>{
                                $('#userID').remove();
                                let objCount = Object.keys(res).length;

                                for(let i=0;i<objCount;i++){
                                    $('.userPostHistoryContainer').append(`
                            <div class="postContainers col-3 offset-1">
                                <img class="postImage" src="${res[i]['fileName']}" alt="user image must appear here \\_(-.-)_/"/><br>
                                <label class="postCaption">${res[i]['caption']}</label><br>
                                <label class="postCaption">${res[i]['hashtags']}</label>
                            </div>
                            `);
                                }
                                $('.userPostHistoryContainer').css('border','2px solid rgba(255,255,255,0.3)');
                                $('#userSearchBar').val('');
                            },
                            error:(e)=>{
                                alert('no user with that email found');
                            }
                        });
                    },
                    error:(e)=>{
                        alert('no user with that email found');
                    }
                });

            });

        },
        error:(e)=>{
            console.log(e);
        }
    });

    $('#userSearchButton').on('click',()=>{
        $('.userInfoContainer').empty();
        $('.userPostHistoryContainer').empty();

        if($('#userSearchBar').val()===''){
            alert('please enter user email');
        }else{
            let userEmail = $('#userSearchBar').val();
            $.ajax({
                //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
                url:"http://localhost/IMY220_Project_Git/API.php",
                type:'GET',
                cache:false,
                data:{
                    'userEmail': userEmail
                },
                success:(res)=>{
                    $('.loadContainer').empty();
                    $('.userInfoContainer').append(`
                        <h2 style="font-weight: bold" class="userNameLabel col-5">${res[0]['userEmail']}</h2>
                        <img class="userProfileImage" src="${res[0]['pfpImage']}"/>
                        <br>
                        <input type="hidden" id="userID" value="${res[0]['userID']}">
                `);

                    $.ajax({
                        //url:'http://imy.up.ac.za/IMY220/u17074292/API.php',
                        url:"http://localhost/IMY220_Project_Git/API.php",
                        type:'GET',
                        cache:false,
                        data:{
                            'imageGetUserID': $('#userID').val()
                        },
                        success:(res)=>{
                            $('#userID').remove();
                            let objCount = Object.keys(res).length;

                            for(let i=0;i<objCount;i++){
                                $('.userPostHistoryContainer').append(`
                            <div class="postContainers col-3 offset-1">
                                <img class="postImage" src="${res[i]['fileName']}" alt="user image must appear here \\_(-.-)_/"/><br>
                                <label class="postCaption">${res[i]['caption']}</label><br>
                                <label class="postCaption">${res[i]['hashtags']}</label>
                            </div>
                            `);
                            }
                            $('.userPostHistoryContainer').css('border','2px solid rgba(255,255,255,0.3)');
                            $('#userSearchBar').val('');
                        },
                        error:(e)=>{
                            alert('no user with that email found');
                        }
                    });
                },
                error:(e)=>{
                    alert('no user with that email found');
                }
            });
        }
    })


})()