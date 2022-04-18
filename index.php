<?php
include_once 'models/user.php';
include_once 'models/post.php';
include_once 'category.php';

include_once 'header.php';

include_once "navbar.php";

if(isset($_GET['url']) && $_GET['url'] == 'posting') {
    include_once "posting.php";

} elseif(isset($_GET['url']) && $_GET['url'] == 'registration') {
    include_once "registration.php";

} elseif(isset($_GET['url']) && $_GET['url'] == 'login') {
    include_once "log_in.php";

} else {
    include_once "show_posts.php";
}

include_once 'footer.php';



