<?php
include("dbconect.php");
foreach($_POST as $rownumber_name => $val) {

//remember to clean post values
        $rownumber = $rownumber_name;
        $val = $val;

        //from the fieldname:rownumber_id we need to get rownumber_id
        $split_data = explode(':', $rownumber);
        $rownumber_id = $split_data[1];
        $rownumber_name = $split_data[0];

$sql_1 = "UPDATE mainlogin SET $rownumber_name = '$val' WHERE Id = $rownumber_id";
if ($con->query($sql_1)) {
$last_id = $con->insert_id;
//echo $sql_1;
echo "Registro Editado Correctamente: <img src='images/loader.gif' height='15px'>";
} else {
printf("Errormessage: %s\n", $con->error);
}

}
?>