<?php require_once('source.php'); ?>

<!DOCTYPE html>
<html>
     <head>
         <meta charset="utf-8">
     </head>
     <body>
         <form method="post">
             <input type="text" name="termo" placeholder="Pesquisa">
             <input type="submit" value="Pesquisar">
         </form>
         <hr>
         <div>
             <?php
                if(@$_POST['termo']){
                    $search_item = str_replace(" ", "_", $_POST['termo']);
                    if(file_get_html('https://pt.wikipedia.org/wiki/' . $search_item)){
                        $html = file_get_html('https://pt.wikipedia.org/wiki/' . $search_item);
                        $content = $html->find('p');
                        echo str_replace('"/', '"https://pt.wikipedia.org/', $content[0]);
                    } else {
                        echo $search_item . " não encontrado, tente usar o termo no singular e em sua forma primitiva";
                    }
                }
              ?>
         </div>
     </body>
 </html>
