<?php
require_once(PATH_MODELS.'m_fiche.php');

$id = htmlspecialchars($_GET['id']);

?>
<p id=platSel style="display:none;">
<?php
if(isset($_GET['id'])){
    $plat = getPlat($id);
    echo json_encode($plat);
}
?>
</p>

<p id=platUser style="display:none;">
    <?php
    if(isset($_GET['id'])){
        $user = getUtilisateur($plat[0]['IdUtilisateur']);
        echo json_encode($user);
    }
    ?>
</p>

<p id=platCat style="display:none;">
    <?php
    if(isset($_GET['id'])){
        $cat = getCategorie($plat[0]['IdCategorie']);
        echo json_encode($cat);
    }
    ?>
</p>

<?php
require_once(PATH_VIEWS.$page.'.php');
