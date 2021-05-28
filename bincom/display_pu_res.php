<?php

require_once "connection.php";
?>
<!DOCTYPE html>
<html>
<head>

<body>
<h1>announced polling unit results</h1>
<table border="1">
<thead>
<th>S/N</th>
<th>Polling unit Name</th>
<th>Party Abbrevation</th>
<th>Score</th>
<th>Poling unit Number</th>
</thead>
<tbody>
    <?php
        $sql = "SELECT polling_unit_name, polling_unit_number, party_abbreviation, party_score FROM polling_unit, announced_pu_results WHERE polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid";
        $res = mysqli_query($conn, $sql);

        $i=1;
   
        while($row = mysqli_fetch_assoc($res)){
       
    ?>
    <tr>    
            <td><?php echo $i?></td>
            <td><?php echo $row['polling_unit_name']?></td>
            <td><?php echo $row['party_abbreviation']?></td>
            <td><?php echo $row['party_score']?></td>
            <td><?php echo $row['polling_unit_number']?></td>
    </tr>
    <?php
    $i++;
     }
    ?>
</tbody>

</table>
</body>
</head>

</html>