<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div id="global">
    <div class="container-fluid">
       <div class="card">
       <div class="card-heading card-primary" style="background: #2b4ab6">
       <div id="icones" style="margin-left: 1450px;">
       <img src="style/tiret.png" width="20" height="20"  alt="">
          <img src="style/grandir.png" width="20" height="20"  alt="">
          <img src="style/close.png" width="20" height="20"  alt="">
       </div> 
        </div>
          <div class="card-heading card-primary">Mes Fichiers 
       <div id="crud" style="margin-left: 1200px;margin-top:-20px;">
      <a href="?ajout" data-toggle="modal" data-target="#exampleModalCenter5"><img src="images/addfolder.png" width="40" height="40"  alt="" ></a>
      <a href="?delete" data-toggle="modal" data-target="#exampleModalCenter7"><img src="images/dossier.png" width="40" height="40"  alt=""></a>
       <a href="?delfolder"data-toggle="modal" data-target="#exampleModalCenter6"><img src="images/delfolder.png" width="40" height="40"  alt=""></a>
       </div>
           
        </div>
       </div>
       <div class="card-body">
            <div class="row">
                <div class="col-3">
                <div class="card-body" style="width: 15rem;" id="carInterne1">
                    <ul>
                    <li> <a href="?document"><img src="images/fich.png" width="30" height="30"  alt="">Document</a> </li><br>
                    <li> <a href="?fichier"><img src="images/fichier.png" width="30" height="30"  alt="">Fichier</a></li> <br>  
                     <li> <a href="?image"><img src="images/image.png" width="30" height="30"  alt="">Images</li></a>   <br>
                       <li> <a href="?video"><img src="images/video.png" width="30" height="30"  alt="">Video</li></a> <br>
                       <!-- <li> <img src="images/dossier.png" width="30" height="30"  alt="">DOssier</li> <br> -->
                       <li> <a href="?musique"><img src="images/musique.png" width="30" height="30"  alt="">Music</a></li>  <br>
                       <li> <img src="images/nav.png" width="30" height="30"  alt="">Driver</li>  <br>
                       <li> <img src="images/tele.png" width="30" height="30"  alt="">Telechargement</li>  <br>
                  </ul>
                </div>
                </div>
                <div class="col-9" >
                 <?php
                //  Partie___________________________Aficher & Lecture________________________Video
                  if(isset($_GET['video'])){
                    $utilisateur=shell_exec("echo %username%");
                   $docs= scandir('C:\Users\YABSA\Videos');
                   echo "<div class='row'>";
                   foreach($docs as $doc){
                   
                        echo  "  <div class='col-2'>
                        <a href='?urlVideo=C:\Users\YABSA\Videos\\$doc' ><img src='images/video.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                   }
                   echo "</div>";
                }
                if(isset($_GET['urlVideo'])){
                  $url=$_GET['urlVideo'];  
                  $tableau= explode('\\',$url);
                 $fichierACopie= array_pop($tableau);
                $urlDecopie="videoCopie/$fichierACopie";
                copierFile( $url,$urlDecopie); 
                echo ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter4">
                 Voir Video
               </button>
               <a  href="?image" type="button" class="btn btn-primary">
               retour
             </a>';
                 echo '<div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">'.$fichierACopie.'</h5>  
                 </div>
                     <div class="modal-body">
                     
                     <video controls src=" '.$urlDecopie.'"  height="500" width="470"></video>
                     <div class="modal-footer">
                       <a   href="?video" type="button" class="btn btn-secondary" >Close</a>
                       <button type="button" class="btn btn-primary">Save changes</button>
                     </div>
                   </div>
                 </div>
                </div>';
                }
               //  Partie___________________________Aficher & Lecture________________________Images
                if(isset($_GET['image'])){
                  $utilisateur=shell_exec("echo %username%");
                 $docs= scandir('C:\Users\YABSA\Pictures\2018-05');
                 echo "<div class='row'>";
                 foreach($docs as $doc){
                  $tab= explode('.',$doc);
                  $ext=array_pop($tab);
                  if($ext=='jpg'){
                    echo  '  <div class="col-2">
                    <a  href= "?images=C:\Users\YABSA\Pictures\\2018-05\\'.$doc.'" >
                    <img src="images/lejpgk.png" height="40" width="40" alt="">'.$doc.'</a>
                   </div>';
                  }else if($ext=='png'){
                    echo  '  <div class="col-2">
                    <a  href= "?images=C:\Users\YABSA\Pictures\\2018-05\\'.$doc.'" >
                    <img src="images/lepng.jfif" height="40" width="40" alt="">'.$doc.'</a>
                   </div>';
                  }
                 
                    
                  }
                 echo "</div>";
                  }
                  if(isset($_GET['images'])){
                    $url=$_GET['images'];  
                    $tableau= explode('\\',$url);
                   $fichierACopie= array_pop($tableau);
                  $urlDecopie="imageCopies/$fichierACopie";
                  copierFile( $url,$urlDecopie); 
                  // <!-- Button trigger modal -->
                 
                 echo ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                 Voir Image
               </button>
               <a  href="?image" type="button" class="btn btn-primary">
               retour
             </a>';
                 echo '<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">'.$fichierACopie.'</h5>  
                 </div>
                     <div class="modal-body">
                     <img src=" '.$urlDecopie.'" height="500" width="470" class="img-fluid" class="img-thumbnail">
                     </div>
                     <div class="modal-footer">
                       <a   href="?image" type="button" class="btn btn-secondary" >Close</a>
                       <button type="button" class="btn btn-primary">Save changes</button>
                     </div>
                   </div>
                 </div>
                </div>';
                   }
                     //  Partie___________________________Aficher & Lecture________________________Musique
                if(isset($_GET['musique'])){
                  $utilisateur=shell_exec("echo %username%");
                 $docs= scandir('C:\Users\YABSA\Music');
                 echo "<div class='row'>";
                 foreach($docs as $doc){
                      echo  "  <div class='col-2'>
                      <a href='?urlMusic=C:\Users\YABSA\Music\\$doc'><img src='images/musique.png' height='40' width='40' alt=''>$doc</a>
                      </div>";
                 }
                 echo "</div>";
                }
                if(isset($_GET['urlMusic'])){
                  $url=$_GET['urlMusic'];  
                  $tableau= explode('\\',$url);
                 $fichierACopie= array_pop($tableau);
                $urlDecopie="musiqueCopie/$fichierACopie";
                copierFile( $url,$urlDecopie); 
                 echo ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter3">
                 Play Audio
               </button>
               <a  href="?musique" type="button" class="btn btn-primary">
               retour
             </a>';
                 echo '<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">'.$fichierACopie.'</h5>  
                 </div>
                     <div class="modal-body">
                     <audio controls="controls">
                     <source src=" '.$urlDecopie.'" type="audio/MP3" />
                   </audio>
                     <div class="modal-footer">
                       <a href="?musique" type="button" class="btn btn-secondary" >Close</a>
                     </div>
                   </div>
                 </div>
                </div>';
                }
                  //  Partie___________________________Aficher & Lecture________________________DOCUMENT
                  if(isset($_GET['document'])){
                    $utilisateur=shell_exec("echo %username%");
                    $docs= scandir('C:\Users\YABSA\document');
                    echo "<div class='row'>";
                    foreach($docs as $doc){
                         echo  "  <div class='col-2'>
                         <a href=''><img src='images/dossier.png' height='40' width='40' alt=''>$doc</a>
                         </div>";
                    }
                    echo "</div>";
                  
                  }
                  //  Partie___________________________Aficher & Lecture________________________FILE
                  if(isset($_GET['fichier'])){
                    $utilisateur=shell_exec("echo %username%");
                    $docs= scandir('C:\Users\YABSA\fichier');
                    echo "<div class='row'>";
                    foreach($docs as $doc){
                      $tab= explode('.',$doc);
                      $ext=array_pop($tab);
                      if($ext=='html'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/html.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='css'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/css.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='js'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/javascript.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='txt'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/txt.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='zip'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/zip.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='php'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/php.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }else if($ext=='pdf'){
                        echo  "  <div class='col-2'>
                        <a href=''><img src='images/pdf.png' height='40' width='40' alt=''>$doc</a>
                        </div>";
                      }
                        
                    }
                    echo "</div>";
                  
                  }
                  ?>
                   <!-- ---------------Formulaire-------Ajout--------Dossier & FILE-->
                  <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">AJOUT FICHIERS/DOSSIERS</h5>  
                 </div>
                     <div class="modal-body">
                     <form action="" method="post">
                            <div>
                                 Nom: <input type="text" value="" name="valeur"><br><br>
                                <div>
                                <label class="form-check-label" for="inlineCheckbox1">Dossier </label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1" name="choixCreation" value="dossier" style="margin-left:10px; ">
                               </div> <br>
                               <div>
                               <label class="form-check-label" for="inlineCheckbox1">FICHIER</label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1"  name="choixCreation" value="fichier" style="margin-left:10px; ">
                              
                               </div> <br>
                                 <input type="submit"  name="envoyerAjout" value="CREER">
                                <input type="reset" name="annuller" value=" Anuller">
                             </div>
                      </form>
                     <div class="modal-footer">
                       <a href="" type="button" class="btn btn-secondary"  style="background: blue;">Close</a>
                     </div>
                   </div>
                 </div>
                </div>
                    </div>
                    <!-- ---------------Formulaire-------SUPPRIMER--------Dossier & FILE-->
                    <div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">SUPPRIMER FICHIERS/DOSSIERS</h5>  
                 </div>
                     <div class="modal-body">
                     <form action="" method="post">
                            <div>
                                 Nom: <input type="text" value="" name="valeur"><br><br>
                                <div>
                                <label class="form-check-label" for="inlineCheckbox1">Dossier </label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1" name="choixCreation" value="dossier" style="margin-left:10px; ">
                               </div> <br>
                               <div>
                               <label class="form-check-label" for="inlineCheckbox1">FICHIER</label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1"  name="choixCreation" value="fichier" style="margin-left:10px; ">
                              
                               </div> <br>
                                 <input type="submit"  name="envoyerSupprimer" value="SUPPRIMER">
                                <input type="reset" name="annuller" value=" Anuller">
                             </div>
                      </form>
                     <div class="modal-footer">
                       <a href="" type="button" class="btn btn-secondary"  style="background: blue;">Close</a>
                     </div>
                   </div>
                 </div>
                </div>
                    </div>
                     <!-- ---------------Formulaire-------RENOMMER--------Dossier & FILE-->
                     <div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                 <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalCenterTitle">RENOMMER FICHIERS/DOSSIERS</h5>  
                 </div>
                     <div class="modal-body">
                     <form action="" method="post">
                            <div>
                                 ANCIEN: <input type="text" value="" name="valeurAncien"><br><br>
                                 NOUVEAU: <input type="text" value="" name="valeurNouveau"><br><br>
                                <div>
                                <label class="form-check-label" for="inlineCheckbox1">Dossier </label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1" name="choixCreation" value="dossier" style="margin-left:10px; ">
                               </div> <br>
                               <div>
                               <label class="form-check-label" for="inlineCheckbox1">FICHIER</label>
                               <input class="form-check-input" type="radio" id="inlineCheckbox1"  name="choixCreation" value="fichier" style="margin-left:10px; ">
                              
                               </div> <br>
                                 <input type="submit"  name="envoyerRenommer" value="RENOMMER">
                                <input type="reset" name="annuller" value=" Anuller">
                             </div>
                      </form>
                     <div class="modal-footer">
                       <a href="" type="button" class="btn btn-secondary"  style="background: blue;">Close</a>
                     </div>
                   </div>
                 </div>
                </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
    </div>                
</script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

</body>
</html>


<!-- if(isset($_GET['document'])){
            echo "ok";
         if(isset($_GET['dossier'])) {
    $Dossier= ($_GET['dossier']);
    $url= $url.$dossier;
         }
         $dirs=scandir($url);
         echo "<div class='row'>";
         foreach  ($dirs as  $dir){
             if(is_dir($url.$dir)){
                 if($dir==".."){
                     if(isset($_GET['dossier'])){
                         ?>
                         <?php 
                        //  echo  "<div class='col-2'>"
                         
                         ?>
                         <a href='function.php?dossier=<?php 
                         
                        //  echo $dossier .$dir;
                         
                         ?>'> 
                                
                         </a>
                       <?php 
                       
                    //    echo "</div>"; 
                       
                       ?>
                         <?php
        //              }
        //          }
        //      }
        //  }
        //  echo "</div>";
        // } -->