<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <?php include_once('./header.php'); ?>

  <div class="container">

    <?php 
    $fruits = ["Orange", "Apple", "Banana", "Watermelon", "Peach", "Mango"];
    ?>

    <h3>Vòng lặp for:</h3>
    <table class="table table-bordered">
        <tr>
        <?php for($i=0; $i< sizeof($fruits); $i++) { 
            echo "<td>$i: $fruits[$i]</td>";
        } ?>
        </tr>
    </table>

    <h3>Vòng lặp while:</h3>
    <table class="table table-bordered">
        <tr>
        <?php
            $i=0;
            while($i<3) { 
                echo "<td>$i: $fruits[$i]</td>";
                $i++;
            }
        ?>
        </tr>
    </table>

    <h3>Vòng lặp do...while:</h3>
    <table class="table table-bordered">
        <tr>
        <?php
            $i=0;
            do {
                echo "<td>$i: $fruits[$i]</td>";
                $i++;
            } while ($i < 4);
        ?>
        </tr>
    </table>

    <h3>Vòng lặp foreach:</h3>
    <table class="table table-bordered">
        <tr>
        <?php
        foreach($fruits as $key => $fruit) {
            echo "<td>Key $key: $fruit</td>";
        }
        ?>
        </tr>
    </table>

  </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>