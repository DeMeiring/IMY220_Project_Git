<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/generalStyle.css">
    <link rel="stylesheet" href="styles/homeStyle.css">
    <link rel="icon" href="Images/1000.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>A Thousand Words</title>
</head>
<body>
<div class="fluid-container">
    <div class=" navbar_container row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <a style="color: rgb(240, 234, 214);border-bottom: 1px solid rgba(240, 234, 214,0.8)" class="navbar-brand" href="home.php">a thousand words</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <button id="createPostButton" style="font-weight: bold;color: rgb(240, 234, 214);" class="btn bg-transparent" type="submit" name="createPost">create post</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="home.php">home</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="albums.php">albums</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="profile.php">profile</a>
                        </li>
                    </ul>
                    <form action="home.php" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button style="color: rgb(240, 234, 214); font-weight: bold " class="btn bg-transparent my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div id="postContainer" class="col-12">

            </div>
        </div>
    </div>
</div>
<br>
<div class="fluid-container" id="galleryContainer">
    <div class="row">
        <div class="imgPost col-3 ml-auto">
            <div class="userName col">

            </div>
            <br>
            <div class="moreDisplay">
                <a class="viewImage col" href="displayImages/d1.jpg">View Image</a>
                <br>
                <button class="optionBtn col">Inappropriate Post: Report</button>
                <br>
                <button class="optionBtn col">Guideline Violation Report</button>
                <br>
                <button class="optionBtn col">Hate speech Report</button>
                <br>
                <h2>Comments</h2>
                <br>
                <div class="commentContainer col overflow-auto">

                </div>
                    <div class="row">
                        <input class="col-8 overflow-auto" type="text" name="newComment" placeholder="120 character limit">
                        <button type="submit" class="commentButton col">comment</button>
                    </div>
            </div>
            <img src="" alt="There should be a picture here">
            <br>
            <div class="userCaption col">

            </div>
            <div class="userHashtags col-1">

            </div>
            <button class="more col">More...</button>
        </div>

        <div class="imgPost col-3 ml-auto mr-auto ">
            <div class="userName">

            </div>
            <br>
            <div class="moreDisplay">
                <a class="viewImage col" href="Images/d2.jpg">View Image</a>
                <br>
                <button class="optionBtn col">Inappropriate Post: Report</button>
                <br>
                <button class="optionBtn col">Guideline Violation Report</button>
                <br>
                <button class="optionBtn col">Hate speech Report</button>
                <br>
                <h2>Comments</h2>
                <br>
                <div class="commentContainer col overflow-auto">

                </div>
                    <div class="row">
                        <input class="col-8 overflow-auto" type="text" name="newComment" placeholder="120 character limit">
                        <button type="submit" class="commentButton col">comment</button>
                    </div>
            </div>
            <img src="" alt="There should be a picture here"><br>
            <div class="userCaption">

            </div>
            <div class="userHashtags">

            </div>
            <button class="more col">More...</button>
        </div>

        <div class="imgPost col-3 mr-auto ">
            <div class="userName">

            </div>
            <br>
            <div class="moreDisplay">
                <a class="viewImage col" href="displayImages/d3.jpg">View Image</a>
                <br>
                <button class="optionBtn col">Inappropriate Post: Report</button>
                <br>
                <button class="optionBtn col">Guideline Violation Report</button>
                <br>
                <button class="optionBtn col">Hate speech Report</button>
                <br>
                <h2>Comments</h2>
                <br>
                <div class="commentContainer col overflow-auto">

                </div>
                    <div class="row">
                        <input class="col-8 overflow-auto" type="text" name="newComment" placeholder="120 character limit">
                        <button type="submit" class="commentButton col">comment</button>
                    </div>
            </div>
            <img src="" alt="There should be a picture here"><br>
            <div class="userCaption">

            </div>
            <div class="userHashtags">

            </div>
            <button class="more col">More...</button>
        </div>

    </div>

</div>

<script src="scripts/createPost.js"></script>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
</body>
</html>

<?php
include 'myConnect.php';
echo "<script type='module' src='scripts/loadHomeScript.js'></script>";
//code for uregistered users to not be allowed to homepage
if(isset($_COOKIE["email"])){
    $email = $_COOKIE["email"];
    echo "<input type='hidden' id='hiddenEmail' value='".$email."'>";
    if(isset($_POST["post"])){
        $caption = $_POST["uploadCaption"];
        $hashtag = $_POST["uploadHashtag"];
        //following is code to upload the file to local server storage
        $targetDir = "Images/";
        echo "<input type='hidden' id='hiddencaption' value='".$caption."'>";
        echo "<input type='hidden' id='hiddenhashtag' value='".$hashtag."'>";
        $uploadFile = $_FILES["uploadImage"];
        echo "<input type='hidden' id='hiddenfilename' value='".$uploadFile['name']."'>";
        if(($uploadFile["type"] == "image/gif"
                || $uploadFile["type"] == "image/jpeg"
                || $uploadFile["type"] == "image/pjpeg" || $uploadFile["type"]=="image/jpg")){
            if($uploadFile["error"]>0){
                echo "an error occurred.";
            }else{
                $targetFile = $targetDir.basename($uploadFile["name"]);
                $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
                if(file_exists($targetFile)){
                    echo "<script type='module' src='scripts/uploadPost.js'></script>";
                }else{
                    move_uploaded_file($uploadFile["tmp_name"],$targetFile);
                    echo "<script type='module' src='scripts/uploadPost.js'></script>";
                }
            }
        }
    }
}else{
    echo "an error occurred, please try again later";
}

function testData($data){   //function for trimming and making sure data is safe
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>