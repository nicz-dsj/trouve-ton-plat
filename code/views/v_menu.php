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
<div class ="bar">
      <div class="menu_deroulant">
        <div class="container_hamburger">
            <div class = "menuLogo"></div>
            <div class = "menuLogo"></div>
            <div class = "menuLogo"></div>
        </div>

        <div class="logo_ttp">
          <img src="assets/img/logo_ttp.png" alt="logo" />
          <p>Trouve ton plat</p>
        </div>

<?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
		<ul class="nav navbar-nav">
		
		<?php
	}?>

        <div class="con">
          <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){ ?>
				<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
					<a href="index.php?page=profil&nom=<?= $_SESSION['user'] ?>">
						<?= MENU_PROFIL ?>
					</a>
				</li>
					<li <?php echo ($page=='login' ? 'class="active"':'')?>>
						<a href="index.php?page=deconnexion" onclick="return confirm('Souhaitez-vous vraiment vous déconnecter ?');">
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
        </div>
      </div>
      <ul class = "menu">

        <li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
			<a href="index.php">
				<?= MENU_ACCUEIL ?>
			</a>
		</li>
        <li <?php echo ($page=='recherche' ? 'class="active"':'')?>>
			<a href="?page=recherche">
				<?= MENU_PLAT ?>
			</a>
		</li>
        <li><a href="#"> Proposer une recette</a></li>
        <li><a href="#"> Evènements</a></li>
        <li><a href="index.php?page=decouvrir"> Découvrir</a></li>
      </ul>

  </div>
</nav>


