<?php
$racine="../" ;//chemin du dossier
if(isset($_GET['dossier'])){
    $dossier = ($_GET['dossier']);
    $racine=$racine.$dossier; 
}

$dirs = scandir($racine);  

foreach ($dirs as $dir) {
    # code...
    if (is_dir($racine.$dir)) {
        # code...
        if ($dir == "..") {
            # code...
        } else {
            # code...
            if (isset($_GET['dossier'])) {
                # code...
                ?>
                <a href="Liste_dir.php?dossier=<?php echo $dossier.$dir; ?>">
                <img src='images/dossier.png' alt=''width='30'><?php echo $dir; ?>
                </a>
                <br>
                <?php
            } else {
                # code...
                ?>
                <a href="Liste_dir.php?dossier=<?php echo $dir; ?>">
                <img src='images/dossier.png' alt=''width='30'><?php echo $dir; ?>
                </a><br>
                <?php
            }
        }
    } else {
        # code...
        echo "
                <a>
                <img src='images/fichier.png' alt=''width='30'></a>".$dir."
                </a><br>
            ";
    }
}
?>