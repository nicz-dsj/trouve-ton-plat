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
if(isset($_POST['noteNew']) && isset($_SESSION['logged'])){
    $note = htmlspecialchars($_POST['noteNew']);
    $id = htmlspecialchars($_POST['id']);
    if($note >= 0 && $note <= 5){
        $dejaAttrib = checkNote($_SESSION['id'], $id);
        if($dejaAttrib == true){
            updateNotePlat($_SESSION['id'], $id, $note);
        }
        else{
            addNotePlat($_SESSION['id'], $id, $note);
        }
    }
}

if(isset($_POST['fav']) && isset($_SESSION['logged'])){
    if($_POST['fav'] == 'ajout'){
        addFavoris($_SESSION['id'], $id);
    }
    else if ($_POST['fav'] == 'suppr'){
        removeFavoris($_SESSION['id'], $id);
    }
    else if($_POST['fav'] == 'check'){
        if(checkFavoris($_SESSION['id'], $id) == true){
            echo '<p style="display: none;">favoris : oui</p>';
        }
        else{
            echo '<p style="display: none;">favoris : non</p>';
        }
    }
}

require_once(PATH_VIEWS.$page.'.php');

