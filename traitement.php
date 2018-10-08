<?php
require_once 'index.php';
creer_dossier($_GET['racine']. "" . $_POST['dossier']);
supprimer($_GET['racine']. "" . $_POST['dossier1']);
header('Location: index.php');
 ?>