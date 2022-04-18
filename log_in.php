<?php
include_once 'category.php';
include_once 'header.php';
include_once "navbar.php";
?>


<form method="post">
    <div class="row mx-2 mt-3 mb-2">
        <div class="col-4">
            <label for="username">Hier Nutzername eintragen</label>
            <input type="text" class="input-group" name="username">
        </div>
    </div>
    <div class="row mx-2 mt-3 mb-2">
        <div class="col-4">
            <label for="password">Hier Passwort eintragen</label>
            <input type="text" class="input-group" name="passwort">
        </div>
    </div>
    <div class="row mx-2 mt-3 mb-2">
        <div class="col-2">
            <button class="btn btn-primary" type="submit">Anmelden</button>
        </div>
    </div>
</form>

<?php include_once 'footer.php'; ?>s