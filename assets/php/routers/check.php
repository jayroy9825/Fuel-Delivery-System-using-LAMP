<!doctype html>
<html lang="en">
  <head>
    <title>Check PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <?php

    include '../includes/connect.php';
    include '../includes/wallet.php';
    $total = 0;
    foreach ($_POST as $key => $value)
    {
    if($value == ''){
      echo "Value = NULL";
    break;
    }
    if(is_numeric($key)){
    $result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
    echo "Numeric Key : ".$key."<br>";
    #print_r($result);

    $loopvar = 1;
    while($row = mysqli_fetch_array($result))
    {

    $price = $row['price'];
    $item_name = $row['name'];
    $item_id = $row['id'];
    echo $loopvar.". - ".$price."  =>  ".$item_name."  =>  ".$item_id."<br>";
    $loopvar += 1;
    }

    echo "Loop Completed.<br>";
    $price = $value*$price;
      echo '<li class="collection-item">
    <div class="row">
        <div class="col s7">
            <p class="collections-title">'.$item_name.'</p>
        </div>
        <div class="col s2">
            <span>'.$value.' Litre</span>
        </div>
        <div class="col s3">
            <span>Rs. '.$price.'</span>
        </div>
    </div>';
    $total = $total + $price;
    }
    }
    echo '<li class="collection-item">
    <div class="row">
        <div class="col s7">
            <p class="collections-title"> Total</p>
        </div>
        <div class="col s2">
            <span>&nbsp;</span>
        </div>
        <div class="col s3">
            <span><strong>Rs. '.$total.'</strong></span>
        </div>
    </div>
    </li>';

    ?>

        </body>
      </html>


?>
