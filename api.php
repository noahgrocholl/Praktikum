<?php

include_once 'models/user.php';
include_once 'models/post.php';

if (!empty($_POST) && isset($_POST["btnDelete"]) && isset($_POST['postID'])) {
    Post::delete_post($_POST["postID"]);
    header('location:index.php');
}

$posts = array_map(function (Post $post) {

    $p = ['post' => $post, 'categorys' => $post->get_category_name()];
    return $p;
}, Post::return_all_posts());

$e = json_encode($posts);
var_dump(json_decode(($e)));

?>