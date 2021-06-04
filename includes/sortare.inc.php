<?php
    $option = $_GET['sortBy'];  
    if  ($option == 'asc') {
        header("location: ../index.php?info=asc");
    } else if ($option == 'desc'){
        header("location: ../index.php?info=desc");
    }