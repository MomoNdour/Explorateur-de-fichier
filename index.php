<?php
// Affichage des dossiers et des fichiers
function lister_dossier(){
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
                <a style="color:black;" href="index.php?dossier=<?php echo $dossier.$dir; ?>">
                <img src='images/dossier.png' alt=''width='30'><?php echo $dir; ?>
                </a>
                <br>
                <?php
            } else {
                # code...
                ?>
                <a style="color:black;" href="index.php?dossier=<?php echo $dir; ?>">
                <img src='images/dossier.png' alt='' width='30'><?php echo $dir; ?>
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
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Explorateur de fichier</title>
    <link rel="stylesheet" type="text/css" href="css/moncss.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>
<body>
    <!-- Container fluid -->
<div class="container-fluid">
                <!-- Contenu -->
    <div class="container contenu">
        <!-- row -->
        <div class="row section-titre">
                <!-- Titre -->
            <div class="col-md-12">
                <p class="titre">
                    Explorateur de fichier en PHP
                </p>
            </div><!-- Fin titre -->
        </div><!-- Fin row -->
        <!-- row -->
            <div class="row">
                <!-- Section explorateur dossier -->
                    <div class="section-explorateur">
                        <!-- Dossier -->
                        <div class="col-md-9 dossier">
                            <?php lister_dossier() ?>
                        </div><!-- Fin dossier -->

                        <!-- Les fonctionnalites -->
                        <div class="col-md-3 fonctionnalite">
                            <form action="traitement.php?racine=<?= "../"?>" method="POST">
                                <br><div>
                                <input type='text' style="color:black;" name='dossier'/>
                                <button type="submit" data-toggle="tooltip" title="Ajouter un dossier">
                                    <img src="images/nouveau_dossier.png" alt="" width="20px" height="20px">
                                </button>
                                </div><br>

                                <div>
                                <input type='text' style="color:black;" name='dossier1'/>
                                <button type="submit" data-toggle="tooltip" title="Supprimer un dossier">
                                    <img src="images/supprimer.png" alt="" width="20px" height="20px">
                                </button>
                                </div><br>

                                <div>
                                <input type='text'style="color:black;" name='exname'/><input type='text' name='newname'/><br>
                                <button type="submit" data-toggle="tooltip" title="Ajouter un fichier">
                                    <img src="images/renommer.png" alt="" width="20px" height="20px">
                                </button>
                                </div><br>


                            </form>
                        </div><!-- Fin des fonctionnalites -->
                    </div><!-- Fin section explorateur dossier -->
            </div><!-- Fin row -->
    </div><!-- Fin contenu -->
</div><!-- Fin container fluid -->


<!-- fonction creation de dossier--->
<?php
function creer_dossier($dossier){
    if(!is_dir($dossier)){
        mkdir($dossier ,0777 , true);
        //echo "le dossier existe";
    }
    else{
       // echo "le dossier n'exixte pas";
    }
}
if(!empty($_POST['dossier'])){
    creer_dossier($_POST['dossier']);
}
?>
 <!-- fonction suppression de dossier--->
<?php
function supprimer($dossier) {
     if(is_dir($dossier)) { // si le paramètre est un dossier
         $objects = scandir($dossier); // on scan le dossier pour récupérer ses objets
         foreach ($objects as $object) { // pour chaque objet
              if ($object != "." && $object != "..") { // si l'objet n'est pas . ou ..
                   if (filetype($dossier."/".$object) == "dossier") rmdir($dossier."/".$object);
                   //else unlink($dossier."/".$object); // on supprime l'objet
                  }
         }
         reset($objects); // on remet à 0 les objets
         supprimer($dossier); // on supprime le dossier
        }
 }
?>
</body>
</html>