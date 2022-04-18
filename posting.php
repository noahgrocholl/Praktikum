<?php
include_once 'category.php';

if (!empty($_POST) && isset($_POST['textFieldPost']) && isset($_POST['buttonPost']) && $_POST['textFieldPost'] != "" && $_POST['usernameSelect'] != "Nutzer auswählen") {
    Post::create_post($_POST["textFieldPost"], $_POST["usernameSelect"], $_POST["categorySelect"]);
    header('location:index.php');
}
?>

<?php include_once 'header.php'; ?>
<?php include_once "navbar.php"; ?>
<form method="post" name="form_post">

    <div class="m-3 mt-5">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="textFieldPost">Hier den Text eintragen</label><br>
                    <textarea name="textFieldPost" cols="30" rows="10"></textarea><br>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary" name="buttonPost">posten</button>
                </div>
            </div>
            <div class="col-6">
                <select name="usernameSelect" class="form-select mb-2" aria-label="Default select example">
                    <option selected>Nutzer auswählen</option>
                    <?php
                    foreach (User::get_all_users() as $info) {
                    ?><option value="<?= $info[0] ?>"><?= $info[1] ?></option>
                    <?php } ?>
                </select>
                <select name="categorySelect[]" class="form-select mb-2" aria-label="Default select example" multiple style="height: 10rem;">
                    <option selected>Kategorie auswählen</option>
                    <?php
                    foreach (Category::get_all() as $category) {
                    ?><option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
</form>


<?php include_once 'footer.php'; ?>