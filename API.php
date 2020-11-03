<?php
    include ('myConnect.php');
    class API{
        function createPost($filename, $caption, $hashtags, $userID){
            global $conn;
            $sql = "Insert into tbgallery(filename,caption,hashtags,userID)VALUES('".$filename."','".$caption."','".$hashtags."','".$userID."');";
            if(mysqli_query($conn,$sql)){
                return http_response_code(200);
            }else{
                return http_response_code(404);
            }
        }

        function getComments($galleryID){
            global $conn;
            $query = "SELECT * FROM `tbcomments` WHERE galleryID=".$galleryID." ORDER BY timeStamp";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'comment'=>$row['comment'],
                );
                $count++;
            }
            return json_encode($data);
        }

        function getAlbums($userIDAlbums,$albumIDAlbums){
            global $conn;
            $query = 'Select * from tbalbums Where userID="'.$userIDAlbums.'";';
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'albumID'=>$row['albumID'],
                    'albumName'=>$row['albumName'],
                    'userID'=>$row['userID'],
                    'albumImage'=>$row['albumImage']
                );
                $count++;
            }
            return json_encode($data);
        }

        function SelectPFP($userEmailpfp){  //used to get profile picture from db
            global $conn;
            $query = 'Select profilePictureFile from tbusers Where email="'.$userEmailpfp.'" ORDER BY albumID;';
            $res = mysqli_query($conn,$query);
            if(mysqli_num_rows($res)!==0){
                while($row = mysqli_fetch_assoc($res)){
                    $data = $row['profilePictureFile'];
                }
                return json_encode($data);
            }else{
                echo "there was a problem";
            }
        }

        function selectAllImages(){
            global $conn;
            $query = "SELECT * FROM `tbgallery` ORDER BY timestamp DESC";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'filename'=>$row['filename'],
                    'caption'=>$row['caption'],
                    'hashtags'=>$row['hashtags'],
                    'galleryID'=>$row['galleryID'],
                    'userID'=>$row['userID']
                );
                $count++;
            }
            return json_encode($data);
        }

        function Select($userEmail){
            global $conn;
            $query = "SELECT * FROM `tbusers` WHERE email='".$userEmail."'";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'username'=>$row['username'],
                    'userID'=>$row['userID'],
                    'pfpImage'=>$row['profilePictureFile']
                );
                $count++;
            }
            return json_encode($data);
        }

        function getUserImages($userID){
            global $conn;
            $query = "SELECT * FROM `tbgallery` WHERE userID='".$userID."' ORDER BY timestamp DESC;";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'fileName'=>$row['filename'],
                    'caption'=>$row['caption'],
                    'hashtags'=>$row['hashtags']
                );
                $count++;
            }
            return json_encode($data);
        }

        function getImagesInAlbumsOfUser($userID,$albumID){
            global $conn;
            $query = "SELECT * FROM `tbgallery` WHERE userID='".$userID."' AND albumID='".$albumID."' ORDER BY timestamp DESC;";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'fileName'=>$row['filename'],
                    'caption'=>$row['caption'],
                    'hashtags'=>$row['hashtags'],
                    'reportedFlag'=>$row['reportedFlag'],
                    'reportType'=>$row['reportType']
                );
                $count++;
            }
            return json_encode($data);
        }

        function getCommentsForUser($galleryID,$userID){
            global $conn;
            $query = "SELECT * FROM `tbcomments` WHERE userID='".$userID."' AND galleryID='".$galleryID."' ORDER BY timestamp DESC;";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'fileName'=>$row['filename'],
                    'caption'=>$row['caption'],
                    'hashtags'=>$row['hashtags'],
                    'reportedFlag'=>$row['reportedFlag'],
                    'reportType'=>$row['reportType']
                );
                $count++;
            }
            return json_encode($data);
        }

        function getUserName($userID){
             global $conn;
            $query = "SELECT * FROM `tbusers` WHERE userID='".$userID."';";
            $res = mysqli_query($conn,$query);
            $count =0;
            while ($row=mysqli_fetch_assoc($res)){
                $data[$count]=array(
                    'username'=>$row['username']
                );
                $count++;
            }
            return json_encode($data);
        }

    }

    $API = new API();
    if(isset($_GET['gaImages'])){   //get all images from gallery tb in database
        header('Content-type: application/json');
        echo $API->selectAllImages();
    }

    if(isset($_GET['userpfp'])){
        header('Content-type: application/json');
        echo $API->SelectPFP($_GET['userEmail']);
    }
    if(isset($_GET['userEmail'])){
        header('Content-type: application/json');
        echo $API->Select($_GET['userEmail']);
    }
    if(isset($_GET['imageGetUserID'])){
        header('Content-type: application/json');
        echo $API->getUserImages($_GET['imageGetUserID']);
    }
    if(isset($_GET['userID']) && isset($_GET['albumID'])){
        header('Content-type: application/json');
        echo $API->getImagesInAlbumsOfUser($_GET['userID'],$_GET['albumID']);
    }
    if(isset($_POST['filename']) && isset($_POST['captions']) && isset($_POST['hashtags']) && isset($_POST['userID'])){
        $API->createPost($_POST['filename'],$_POST['captions'],$_POST['hashtags'],$_POST['userID']);
    }
    if(isset($_GET['userIDAlbums']) && isset($_GET['albumIDAlbums'])){
        header('Content-type: application/json');
        echo $API->getAlbums($_GET['userIDAlbums'],$_GET['albumIDAlbums']);
    }
    if(isset($_GET["galleryIDComments"])){
        header('Content-type: application/json');
        echo $API->getComments($_GET['galleryIDComments']);
    }
    if(isset($_GET['userID'])){
        header('Content-type: application/json');
        echo $API->getUserName($_GET['userID']);
    }
?>
