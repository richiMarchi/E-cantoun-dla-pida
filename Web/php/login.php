<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<?php
if(isset($_POST['error'])) {
   echo 'Error Logging In!';
}
?>
<form action="process_login.php" method="post" name="login_form">
   Email: <input type="text" name="email" /><br />
   Password: <input type="password" name="password" id="password"/><br />
   <input type="submit" value="Login" onclick="formhash(this.form, this.form.password);" />
</form>
