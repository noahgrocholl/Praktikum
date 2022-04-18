<?php
include 'models/user.php';
include 'models/post.php';
include_once 'category.php';
$id = $_POST["post_id"];
$text_old = $_POST["post_text"];
$date = $_POST["post_date"];
$user = $_POST["post_user"];
$categories = $_POST["post_categories"];
?>
<?php include_once 'header.php'; ?>

<?php include_once "navbar.php";


?>

<div class="m-3 mt-5">
    <form method="POST" action="handle_post.php">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="textFieldPost">Hier den neuen Text eintragen</label><br>
                    <textarea name="textFieldPost" cols="30" rows="10"> <?php echo $_POST["post_text"]; ?> </textarea><br>
                </div>
            </div>
        </div>

        <div class="mb-2">
            <input type="hidden" name="post_id" value="<?= $id; ?>">
            <input type="hidden" name="post_text_old" value="<?= $text_old; ?>">
            <input type="hidden" name="post_date" value="<?= $date; ?>">
            <input type="hidden" name="post_user" value="<?= $user; ?>">
            <input type="hidden" name="post_categories" value="<? $categories; ?>">
            <button type="submit" class="btn btn-primary" name="buttonPostNew">verändert Posten</button>
        </div>
    </form>
</div>

<?php include_once 'footer.php'; ?>