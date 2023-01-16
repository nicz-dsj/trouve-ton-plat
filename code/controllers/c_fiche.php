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

<div id=platsSim style="display:none;">
    <?php
    $test = count(getSimilaires($id));
    $rand1 = rand(0,$test-1);
    if(isset($_GET['id'])){
        if($test > 0){
            $similaires1 = getSimilaires($id);
            echo json_encode($similaires1[$rand1]);
        }
    }
    ?>
</div>

<div id=platsSim2 style="display:none;">
    <?php
    if(isset($_GET['id'])){
        if($test >= 2){
            $rand2 = rand(0,$test-1);
            while($rand1 == $rand2){
                $rand2 = rand(0,$test-1);
            }

            $similaires2 = getSimilaires($id);
            echo json_encode($similaires2[$rand2]);
        }
    }
    ?>
</div>

<div id=platsSim2 style="display:none;">
    <?php
    if(isset($_GET['id'])){
        if($test >= 3){
            $rand3 = rand(0,$test-1);
            while($rand1 == $rand3 || $rand2 == $rand3){
                $rand3 = rand(0,$test-1);
            }

            $similaires2 = getSimilaires($id);
            echo json_encode($similaires2[$rand3]);
        }
    }
    ?>
</div>

<div id=platsSim3 style="display:none;">
    <?php
    if(isset($_GET['id'])){
        if($test >= 4){
            $rand4 = rand(0,$test-1);
            while($rand1 == $rand4 || $rand2 == $rand4 || $rand3 == $rand4){
                $rand4 = rand(0,$test-1);
            }

            $similaires3 = getSimilaires($id);
            echo json_encode($similaires3[$rand4]);
        }
    }
    ?>
</div>

<div id=platsSim4 style="display:none;">
    <?php
    if(isset($_GET['id'])){
        if($test >= 5){
            $rand5 = rand(0,$test-1);
            while($rand1 == $rand5 || $rand2 == $rand5 || $rand3 == $rand5 || $rand4 == $rand5){
                $rand5 = rand(0,$test-1);
            }
            
            $similaires4 = getSimilaires($id);
            echo json_encode($similaires4[$rand5]);
        }
    }
    ?>
</div>

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

