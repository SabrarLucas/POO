<?php
    include("classes/Personnage.class.php");
    
    $p = new Personnage("Lebowski", "Jeff", 24, "M");

    $p->presentation();
?>