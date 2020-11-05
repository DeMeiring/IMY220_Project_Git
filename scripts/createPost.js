var createPost = document.getElementById("createPostButton");
createPost.onclick=function(){
    $('#hiddencaption').remove();
    $('#hiddenhashtag').remove();
    $('#hiddenfilename').remove();
    var postForm = document.getElementById("postContainer");
    postForm.innerHTML=`<div id="createPostWrapper">
        <form id="createPostForm" action="home.php" method="post" enctype="multipart/form-data">
        <label>Choose Image:</label><br>
        <input class="btn bg-transparent col-6" style="opacity: 0.5;color: rgb(240, 234, 214);" type="file" name="uploadImage" id="fileUploadName" placeholder="Choose"><br>
        <label>Caption</label><br>
        <input style="color:rgb(240, 234, 214);" class="bg-transparent col-6" type="text" id="uploadCation" name="uploadCaption"><br>
        <label>Hashtags</label><br>
        <input style="color:rgb(240, 234, 214);" class="bg-transparent col-6" type="text" id="uploadHashtag" name="uploadHashtag"><br>
        <button style="color: rgb(240, 234, 214); margin-top: 12px;" type="submit" class="btn" id="post" name="post" >Post</button>
        <button id="cancel" style="color:rgb(240, 234, 214); margin-top: 12px;" class="btn">Cancel</button>
        </form>
        </div>`;
    document.getElementById("createPostWrapper").style.padding='10px';
    document.getElementById("createPostWrapper").style.border='4px solid rgb(240, 234, 214)';
    document.getElementById("createPostWrapper").style.borderRadius="14px";
    document.getElementById("cancel").onclick=function(){
        postForm.innerHTML = "";
    }

}