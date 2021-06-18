<?php
include("includes/galerie.inc.php");
$pdo = pdo_connect_mysql();

if(isset($_POST['but_upload'])){
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($imageFileType,$extensions_arr) ){
    // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        // Insert record
        $insert = $pdo->query("INSERT INTO images(path) values('$target_dir.$name')");
            if(!$insert)
            {
                echo "Error";
            }
            else
            {
                echo "Records added successfully.";
            }
        }
    }

 }

//   // Check extension base 64
//   if(in_array($imageFileType,$extensions_arr) ){
//     // Upload file
//     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
//        // Convert to base64 
//        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
//        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
//        // Insert record
//        $insert = $pdo->query("INSERT INTO images(card) values('$image')");
// 	   if(!$insert)
//         {
//             echo "Error";
//         }
//         else
//         {
//             echo "Records added successfully.";
//         }
//     }
//   }
//}
?>