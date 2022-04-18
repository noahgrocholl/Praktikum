<?php
include 'models/post.php';

if (!empty($_POST) && isset($_POST["buttonPostNew"]) && isset($_POST['textFieldPost']) && isset($_POST["post_category"]) && $_POST["post_category"] != "none") {
    $post = new Post($_POST["post_id"], $_POST["post_text_old"], $_POST["post_date"], $_POST["post_user"], $_POST["post_category"]);
    $post->edit($_POST["textFieldPost"]);
    header('location:index.php');
} else {
    header('location:index.php');
}