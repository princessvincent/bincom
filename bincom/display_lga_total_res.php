<?php

require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Local Government Total Resut</h1>

    <?php
        if(isset($_POST['get_total']) && $_POST['get_total']){
            $lga_id = $_POST['lga'];
            $lgsql = "select polling_unit.lga_id, lga_name, sum(party_score) as total from announced_pu_results, polling_unit, lga  where polling_unit.lga_id ='$lga_id' and  polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid and polling_unit.lga_id =lga.lga_id";
            $res2 = mysqli_query($conn, $lgsql);
            if(!$res2){
                 print_r(mysqli_error_list($conn));die;
            }
         $row2 = mysqli_fetch_assoc($res2);
            if(($row2['total'])){
         ?> 

            <h2>Total Vote count in <b><?php echo $row2['lga_name']?></b> is: <b><?php echo $row2['total']?></b></h2>
         <?php
            }else{
                echo "<h2>Vote Not Found! </h2>";
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    
    <label for="lga">Choose LGA</label><br>
    <select name="lga" id="lga">
        <?php
            $lgsql = "select * from lga";
            $res = mysqli_query($conn, $lgsql);
            while($row = mysqli_fetch_assoc($res)){
        ?>
        <option value="<?php echo $row['lga_id']?>"><?php echo strtoupper($row['lga_name'])?></option>
        <?php
            }
        ?>
    </select>
    <input type="submit" name="get_total" value="Get Total Result">
    </form>
    <?php

    ?>
</body>
</html>