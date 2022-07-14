<?php
    function even($x){
        if($x>20)
        return;
        if($x%2==0)
        echo "$x <br>";
        even($x+1);
    }
    even(1);
?>