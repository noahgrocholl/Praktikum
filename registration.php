<?php

?>

<?php include_once 'header.php'; ?>
<?php include_once "navbar.php"; ?>

<form name="form_new_user" method="post" class="m-3">
    <div class="row">
        <div class="col-6">
            <label for="newUserName">Hier mit neuem Nutzernamen registrieren:</label>
            <input type="text" name="newUserName" class="mb-2">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="buttonRegistration">registrieren</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST["newUserName"]) && $_POST["newUserName"] != "") {
    $newUser = User::create_user(strip_tags($_POST["newUserName"]));
    header('location:index.php');
}
?>

<?php include_once 'footer.php'; ?>