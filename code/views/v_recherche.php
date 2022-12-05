
<head>
<link rel="stylesheet" href="<?= PATH_CSS?>recherche.css">
</head>

<!--  Fin de la page -->

<body>
    <div id="exemple">
        <p> - Nom - </p>
        <img>
        <p> - Description - </p>
    </div>
    <form action="index.php?page=recherche" method="get" name="recherche">
        <label> Rentrez le nom de votre plat : </label>
        <input type="text" id="frecherche" name="frecherche" placeholder="Quiche, Gateau, Cookie, ..."><br>
        <input type="submit">
    </form>
    <div class="elements">
        
    </div>
    <script href="./assets/scripts/script_recherche.js"></script>
</body>