<?php 

/* var_dump($_FILES); */

    /* if (isset($_FILES['cer']['name']  and isset($_FILES['key']['name'])) {

        var_dump($_FILES['cer']['name']);

        move_uploaded_file($_FILES["cer"]["tmp_name"], 'fiel/'.$_FILES["cer"]["name"]);
        move_uploaded_file($_FILES["key"]["tmp_name"], 'fiel/'.$_FILES["key"]["name"]);
        echo "CORRECTO"; 
    }else{
        echo "ERROR"; 
    }  */

    if (strlen($_FILES['cer']['name']) >1){

       /*  echo "CER correcto";  */
       $patron='/[^a-zA-Z0-9\s!?.,_\'\"]/';

        if (strlen($_FILES['key']['name']) >1) {
          /*   echo " KEY correcto"; */
            move_uploaded_file($_FILES["cer"]["tmp_name"], 'fiel/'.preg_replace($patron,"",$_FILES["cer"]["name"]));
            move_uploaded_file($_FILES["key"]["tmp_name"], 'fiel/'.preg_replace($patron,"",$_FILES["key"]["name"]));

/*          move_uploaded_file(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',$_FILES["cer"]["tmp_name"]), 'fiel/'.iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',$_FILES["cer"]["name"]));
            move_uploaded_file(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',$_FILES["key"]["tmp_name"]), 'fiel/'.iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',$_FILES["key"]["name"]));
 */
            $cername=preg_replace($patron,"",$_FILES["cer"]["name"]);
            $keyname=preg_replace($patron,"",$_FILES["key"]["name"]);
         /*    $cername=preg_replace($patron,"",$_FILES["cer"]["name"]);
            $keyname=preg_replace($patron,"",$_FILES["key"]["name"]); */

            header("location:a.php?keyname=$keyname&cername=$cername");
            echo "SUBIDA DE ARCHIVOS CORRECTA"; 
        } else {
            echo "<b style='color:red'>Error:INGRESA TU ARCHIVO .KEY</b> ";
        }
    }else{
        echo "<b style='color:red'>Error:INGRESA TU ARCHIVO DE .CER</b> ";
    }
