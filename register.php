<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include register form  */
include('libs/_register-form.php')
/*  include register form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="./validator.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


<script>
    var signUpForm = new Validator('#sign-up');
    signUpForm.onSubmit = function (data) {
        alert(JSON.stringify(data));
    }

    $(document).ready(function(){

  $('#phone').mask('(00) 00000-0000');
});
</script>