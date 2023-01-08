<?php
require_once(PATH_MODELS.'m_fiche.php');

$id = htmlspecialchars($_GET['id']);
$ingredients = getIngredients($id);

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

<p id=platNote style="display:none;">
    <?php
    if(isset($_GET['id'])){
        $note = getNote($id);
        echo json_encode($note);
    }
    ?>
</p>

<?php

if(isset($_GET['fav']) && isset($_SESSION['logged'])){
    if($_GET['fav'] == 'ajout'){
        addFavoris($_SESSION['id'], $id);
    }
    else if ($_GET['fav'] == 'suppr'){
        removeFavoris($_SESSION['id'], $id);
    }
    else if($_GET['fav'] == 'check'){
        if(checkFavoris($_SESSION['id'], $id) == true){
            echo '<p style="display: none;">favoris : oui</p>';
        }
        else{
            echo '<p style="display: none;">favoris : non</p>';
        }
    }
}

require_once(PATH_VIEWS.$page.'.php');

