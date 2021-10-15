<?php
    function getDB($s){
        $con = new mysqli('localhost','root','','testing1');
        $query_category = $con->query($s);
        $xau ='';
        while ($index = $query_category -> fetch_array()) {
            $xau .= $index['category_name'].'<br>';
            $q1 = $con->query("select * from product where category_id ='".$index['category_id']."'");
            while ($r = $q1->fetch_array()) {
                $xau .= "----------------".$r['product_name'].'
                <img src = "image/'.$r['product_image'].'"width="20px" height="20px">'.'<br>';
            }
        }
        return $xau;
    }
    function loadDatatoTable($s){
        $con = new mysqli('localhost','root','','testing1');
        $q = $con-> query($s);
        $xau = '<table class="table table-striped" style="width: 350px;"><tr><th>Ord</th><th>Category Name</th></tr>';
        $i = 1;
        while ($r = $q->fetch_array()) {
            $xau .='<tr><td>'.$i++.'</td><td>'.$r['category_name'].'</td></tr>';
        }
        $xau .= '</table>';
        return $xau;
    }

    function readOneRecord($s){
        $con = new mysqli('localhost','root','','testing1');
        $q = $con -> query($s);
        $xau ='';
        if ($r = $q ->fetch_aray()) {
            $xau = $r['category_name'];
        }
        return $xau;
    }
    function doSQL($s){
        $con = new mysqli('localhost','root','','testing1');
        $q = $con-> query($s);
    }
?>