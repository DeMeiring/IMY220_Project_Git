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
    <link rel="stylesheet" href="styles/searchStyles.css">
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
                        <li class="nav-item">
                            <a style="color: rgb(240, 234, 214);" class="nav-link" href="profile.php">profile</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <input id="userSearchBar" class="form-control mr-sm-2" type="search" placeholder="user email" aria-label="Search">
                        <button id="userSearchButton" style="color: rgb(240, 234, 214); font-weight: bold " class="btn bg-transparent my-2 my-sm-0">Search</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div id="profileEditContainer">
        <div class="searchedUserContainer">
            <div class="userInfoContainer row">

            </div>
            <br>
            <div class="userPostHistory offset-1">
                <div class="userPostHistoryContainer row">

                </div>
            </div>
        </div>
    </div>
    <div class="loadPage">
        <div class="row loadContainer">

        </div>
    </div>
</div>
<script src="scripts/searchUsersLoad.js"></script>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
</body>
</html>
<?php
echo "<input type='hidden' id='hiddenEmail' value='".$_COOKIE['email']."'>";
?>
