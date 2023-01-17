<?php
?>

<link href="<?= PATH_CSS ?>alert.css" rel="stylesheet">
<link rel="icon" type="image/png" href="assets/img/logo_ttp.png" />

<?php
if(isset($alert))
{
?>
	<div class="alert alert-<?= isset($alert['classAlert']) ? $alert['classAlert'] : 'danger' ?>">
		<strong><?= $alert['messageAlert'] ?></strong>
	</div>

	<div class="alert alert-<?= isset($alert['classAlert']) ? $alert['classAlert'] : 'success' ?>">
		<strong><?= $alert['messageAlert'] ?></strong>
	</div>
<?php
}
