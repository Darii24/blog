<?php
    require_once('header.php');
    require_once('configDB.php');
    if ($_SERVER['REQUEST_METHOD']=='GET'){
        $conn=mysqli_connect(servername, username, password, dbname);
        if(!$conn){
            die('error connecting to DB '.mysqli_connect_error());
        }
        $sql="SELECT record.Id as Id, record.Date as `Date`, record.Text as `Text`, record.Like as `Like`, record.DisLike as `DisLike`,
            user.Login as `Login` FROM record 
            LEFT JOIN `user`
            ON record.Id_autor=user.Id
            WHERE record.Id='".$_GET['Id']."'";
        $result=mysqli_query($conn, $sql);
        $record=mysqli_fetch_assoc($result);
        $recordId=$record['Id'];
?>

    <div class="m-5 p-2" style="border: solid black 2px">
        <span>Autor:</span> <?=$record['Login']?>
        <br>
        <span>Date:</span> <?=$record['Date']?>
        <br>
        <p align=justify><?=$record['Text']?></p>
        <div> 
            <p style="display: inline">
                <img src="image/like.png" alt="" style="width: 10px; height:auto">
                <span id="count<?=$record['Id']?>"><?=$record['Like']?></span>
            </p>
            <p style="display: inline">
                <img src="image/dislike.png" alt="" style="width: 10px; height:auto">
                <span id="count<?=$record['Id']?>"><?=$record['DisLike']?></span>
            </p>
        </div>
        <a href="#" type="button" class="w-100 btn btn-success" data-toggle="modal" data-target="#CommentModal">add comment</a>
    </div>

<?php
    }
?>

    <div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" style="visibility:hidden" id="Id_record" value="<?=$record['Id']?>">
                    <input type="text" style="visibility:hidden" id="Id_autor" value="<?=$_SESSION['Login']?>">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">type your comment</label>
                        <textarea class="form-control" id="textComment" rows="5" name="Text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveComment">Save</button>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once('footer.php');
?>

    <script src="JS/addComment.js"></script>