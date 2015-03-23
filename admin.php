<?php
	include ("config.php");
	$conf = new Config();
	$conf->Init();
?>
<html>
<head>
<?php
	echo $conf->get_meta();
?>
</head>
<body>
	<?php
	if (isset($_POST['adminLogin']))
	{
		$conf->admin_auth($_POST['adminLogin'],$_POST['adminPassword']);
	}
if ($conf->is_admin_auth())
{
	echo "<div id='siteManagment'>
		Управление сайтом
	</div>
	<div id='fileStructure'>
		<div id='elfinder'>
		</div>
	</div>
	</body>
	</html>";
}
else
{
	echo "<div class='container'>
	<form id='adminLoginForm' action='/radio/Derpman/admin.php' class='form-horizontal form-small' method='POST'>
						<p><input type='text' class='span3 adminInput' name='adminLogin' id='admin_input' placeholder='Введите логин'></p>
						<p><input type='password' class='span3 adminInput' id='password_input' name='adminPassword' placeholder='Введите пароль'></p>
						<p><button type='submit' class='btn btn-success'>Войти</button></p>					
					</form></div></div></div>";
}
?>
<?php

?>