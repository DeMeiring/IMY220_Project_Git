<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/generalStyle.css">
    <link rel="icon" href="Images/1000.png">
    <link rel="stylesheet" href="styles/profileStyle.css">
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="home.php">home</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="albums.php">albums</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="searchPage.php">search user</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div id="profileEditContainer">
        <div class="profilePicture col">
            <div>
                <label id="useremail" class="profileValueLbl col"></label>
            </div>
            <br>
            <img id="pfpImage" src="" alt="">
            <div class="row">
                <div class="col editPfpContainer">
                    <form id="profilePicForm" action="profile.php" method="post" enctype="multipart/form-data">
                        <input name="pfpImage" class="pfpFileUpload profileValueLbl offset-1" type="file"/>
                        <input name="post" type="submit" id="submitNewPfp" value="Upload new profile picture">
                    </form>
                </div>
            </div>
            <div class="postHistoryContainer row">

            </div>
        </div>
    </div>
</div>
<script src="scripts/editProfileScript.js"></script>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
</body>
</html>
<?php
    echo "<input type='hidden' id='hiddenEmail' value='".$_COOKIE['email']."'>";
    echo "<script src='scripts/loadProfile.js'></script>";
    echo "<script src='scripts/getPostHistory.js'></script>";
    if(isset($_POST["post"])){
        $targetDir = "Images/";
        $uploadFile = $_FILES["pfpImage"];
        if(($uploadFile["type"] == "image/gif"
            || $uploadFile["type"] == "image/jpeg"
            || $uploadFile["type"] == "image/pjpeg" || $uploadFile["type"]=="image/jpg")){
            if($uploadFile["error"]>0){
                echo "an error occurred.";
            }else{
                $targetFile = $targetDir.basename($uploadFile["name"]);
                $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
                if(file_exists($targetFile)){
                    echo "<input type='hidden' id='newFilename' value='Images/".$uploadFile["name"]."'/>";
                    echo "<input type='hidden' id='hiddenEmail' value='".$_COOKIE["email"]."'/>";
                    echo "<script src='scripts/changeProfilePic.js'></script>";
                }else{
                    move_uploaded_file($uploadFile["tmp_name"],$targetFile);
                    echo "<input type='hidden' id='newFilename' value='Images/".$uploadFile["name"]."'/>";
                    echo "<input type='hidden' id='hiddenEmail' value='".$_COOKIE["email"]."'/>";

                    echo "<script src='scripts/changeProfilePic.js'></script>";
                }
            }
        }
    }
?>