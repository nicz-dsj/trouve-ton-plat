<?php
/*
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
				<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
					<a href="index.php">
						<?= MENU_ACCUEIL ?>
					</a>
				</li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
					<li <?php echo ($page=='login' ? 'class="active"':'')?>>
						<a href="index.php?page=deconnexion" >
							<?= MENU_DECONNEXION ?>
						</a>
					</li>

				<?php
				}
				else{ ?>
					
				<li <?php echo ($page=='login' ? 'class="active"':'')?>>
					<a href="index.php?page=login">
						<?= MENU_CONNEXION ?>
					</a>
				</li>

				<?php
			} ?>
	</ul>
	<?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
		<ul class="nav navbar-nav">
		<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
			<a href="index.php">
				<?= MENU_AJOUT ?>
			</a>
		</li>
		<?php
	}
	?>
  </div>
</nav>


