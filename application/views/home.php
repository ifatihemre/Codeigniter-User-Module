
<h1>Giriş Yap</h1>
<?php 
	echo form_open('home/login'); 
	echo form_input('email', '', 'placeholder="Email Adresiniz"');
	echo form_password('password', '', 'placeholder="Parolanız"');
	echo form_submit('submit', 'Login!');
	echo form_close();
?>
<?php if(!is_null($login_error)):?>
<div class="alert alert-warning">
	<?php echo $login_error; ?>
</div>
<?php endif; ?>
