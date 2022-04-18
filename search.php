<?php


include_once 'db.php';
include_once 'header.php';
include_once "navbar.php";

function search($query)
{
    $all_posts_objects = Post::return_all_posts();
    $matching_posts = [];

    foreach ($all_posts_objects as $post) {
        if (strpos($post->text, $query) !== false) {
            $matching_posts[] = $post;
        }
    }

    if (!empty($matching_posts)) {
        return $matching_posts;
    } else {
        echo "Es wurden keine passenden Einträge gefunden";
    }
}

if (!empty($_POST) && isset($_POST["btnDelete"]) && isset($_POST['postID'])) {
    Post::delete_post($_POST["postID"]);
    header('location:index.php');
}

?>

<?php
include_once 'db.php';

foreach (array_reverse(search($_POST["search"])) as $post) {
?>

    <div class="card mt-2" style="width: 50rem; height: auto">
        <div class="card-body">
            <h5 class="card-title"><?= $post->user ?>:</h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $post->date ?></h6>
            <p class="card-text"><?= $post->text ?></p>
            <div class="card-footer">Kategorien:
                <?php
                foreach ($post->get_category() as $tmp) {
                    echo $tmp->name, " ";
                }
                ?>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <form method="post">
                        <input type="hidden" name="postID" value="<?= $post->id ?>">
                        <button class="btn btn-danger" type="submit" name="btnDelete" value="<?= $post->id ?>">Löschen</button>
                    </form>
                </div>
                <div class="col-2">
                    <form method="post" action="edit.php">
                        <input type="hidden" name="post_id" value="<?= $post->get_information()[0]; ?>">
                        <input type="hidden" name="post_text" value="<?= $post->get_information()[1]; ?>">
                        <input type="hidden" name="post_date" value="<?= $post->get_information()[2]; ?>">
                        <input type="hidden" name="post_user" value="<?= $post->get_information()[3]; ?>">
                        <input type="hidden" name="post_category" value="<?= $post->get_information()[4]; ?>">
                        <button class="btn btn-warning" type="submit" name="btnEdit">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php include_once 'footer.php'; ?>