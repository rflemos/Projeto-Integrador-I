<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php


include('libs/_account-form.php')


?>

<?php

include('func/footer.php');
?>

<!-- validate script -->
<script src="./validator.js"></script>
<script>
    var addMemForm = new Validator('#add-member');
    addMemForm.onSubmit = function (data) {
        alert(JSON.stringify());
    }
</script>