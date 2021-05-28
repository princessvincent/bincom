<?php
require_once"connection.php";
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
<h1>Supply Result Here </h1>
<?php
if(isset($_POST['submit']) && $_POST['submit']){
    $get_score = $_POST['get_score'];
    $sql = "SELECT party_abbreviation,polling_unit_name FROM announced_lga_results,polling_unit WHERE polling_unit_id and result_id";
    $res2 = mysqli_query($conn, $sql);
    if(!$res2){
         print_r(mysqli_error_list($conn));die;
    }
 $row2 = mysqli_fetch_assoc($res2);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    
   supply score: <input type="text" name="get_score" value="">

   <input type="submit" name="submit" value="score">
    </form>

</body>
</html>