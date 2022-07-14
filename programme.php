<!-- 546=5*4*6=120 -->
<?php
    $n=546;
    $pro=1;
    while($n>1){
        $rem=$n%10;
        $pro=$pro*$rem;
        $n=$n/10;
    }
    echo "Ans.= $pro";
?>