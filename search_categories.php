<?php
include_once "category.php";
include 'models/user.php';
include_once 'db.php';
include_once 'header.php';
include_once "navbar.php";

if (!empty($_POST) && isset($_POST["category_search"]) && $_POST["category_search"] != "Kategorie auswählen") {
    foreach (array_reverse(Category::search($_POST["category_search"])) as $post) {
        ?>
            <center>
                <div class="card mt-2" style="width: 50rem; height: auto">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->user ?>:</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $post->date ?></h6>
                        <p class="card-text"><?= $post->text ?></p>
                        <div class="card-footer">Kategorien:
                            <?php
                            foreach ($post->get_category_name() as $tmp) {
                                echo $tmp[0][0], " ";
                            }
                            ?>
                        </div>
                        <div class="row">
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
            </center>
        <?php } 
} else {
    header('location:index.php');
} 
?>