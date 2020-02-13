<?php
  //LA____________________FUNCTION_________________COPIER___________FICHIER
function copierFile($source,$destination){
  copy($source,$destination);
}
 //LA____________________FUNCTION_________________Creer___________DOSSIER

function CreateDossier($nomDossier){ 
  $mypath='C:\Users\YABSA\document\\ '.$nomDossier;
  mkdir($mypath);
}
//LA____________________FUNCTION_________________SUPPRIMER___________DOSSIER
function DeleteDossier($nomDossier){
$mypath='C:\Users\YABSA\document\\ '.$nomDossier;
   rmdir($mypath);
}
//LA____________________FUNCTION_________________RENOMMER___________DOSSIER
function renameDossier($nomDossier1,$nomDossier2){
  $mypath1='C:\Users\YABSA\document\\ '.$nomDossier1;
  $mypath2='C:\Users\YABSA\document\\ '.$nomDossier2;
  // 'C:\Users\YABSA\document\\'.$nomDossier1,'C:\Users\YABSA\document\\'.$nomDossier2
   rename($mypath1,$mypath2);
}
//LA____________________FUNCTION_________________CREATION___________FILE
function CreateFile($nomFichier){
  fopen('C:\Users\YABSA\fichier\\'.$nomFichier,'a+');
}
//LA____________________FUNCTION_________________RENOMMER___________FILE
function CreateFichier($nomAncien,$NouveauFile){
  rename('C:\Users\YABSA\fichier\\'.$nomAncien,'C:\Users\YABSA\fichier\\'.$NouveauFile);
}
//LA____________________FUNCTION_________________SUPPRIMER___________FILE
function SupprimerFile($nomFichier){
  unlink('C:\Users\YABSA\fichier\\'.$nomFichier);
}
//LA____________________FUNCTION_________________RENOMMER___________FILE
function renamefile($nomDossier1,$nomDossier2){
  rename('C:\Users\YABSA\fichier\\'.$nomDossier1,'C:\Users\YABSA\fichier\\'.$nomDossier2);
}
// TRAITEMENT_____________AJOUT______________DOSSIER & FILE__________
if(isset($_POST['envoyerAjout'])){
  if($_POST['choixCreation']=='dossier'){
    CreateDossier($_POST['valeur']);
  }else{
    CreateFile($_POST['valeur']);
  }
}
// TRAITEMENT_____________SUPPRIMER______________DOSSIER & FILE__________
if(isset($_POST['envoyerSupprimer'])){
  if($_POST['choixCreation']=='dossier'){
     DeleteDossier($_POST['valeur']);
  }else{
    SupprimerFile($_POST['valeur']);
  }
}
// TRAITEMENT_____________RENOMMER______________DOSSIER & FILE__________
if(isset($_POST['envoyerRenommer'])){
  if($_POST['choixCreation']=='dossier'){
    renameDossier($_POST['valeurAncien'],$_POST['valeurNouveau']);
  }else{
    renamefile($_POST['valeurAncien'],$_POST['valeurNouveau']);
  }
}



// if(isset($_GET['delfolder'])){
// echo '<form action="" method="post">
// <div>
//   Dossier: <input type="text" value="" name="valeur">
//   <input type="submit"  name="Supprimer" value="Supprimer">
//   <input type="reset" name="annuller" value=" Anuller">
// </div>
// </form>';

// }

    
       if(isset($_GET['ajout'])){
        echo '  ';
       
echo '
';     
       }
       require 'function.php';
       if(isset($_POST['Creer'])){
        CreateDossier($_POST['valeur']);
       
       }
       


 // PARTIE____________________AFFICHER______________________UNE______________________________________IMAGE
//  <!-- Button trigger modal -->
//  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
//    Launch demo modal
//  </button>
 

require 'View/Exploirateur.php';
?> 
