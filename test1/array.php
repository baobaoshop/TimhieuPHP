<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARRAY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        h5{
            color: blue;
            margin-top: 20px;
        }
    </style>
</head>
<?php
session_start();

if (!isset($_SESSION['fruits'])) {
    $_SESSION['fruits'] = ["Orange", "Apple", "Banana", "Watermelon"];
}
if (!isset($_SESSION['person'])) {
    $_SESSION['person'] = [
        "name" => "Bùi Quốc Bảo",
        "age" => 21,
        "dateOfBirth" => "31/01/2003"
    ];
}
$fruits = $_SESSION['fruits'];
$person = $_SESSION['person'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $newFruit = $_POST['newFruit'];
        if (!empty($newFruit)) {
            $fruits[] = $newFruit;
        }
    } elseif (isset($_POST['delete'])) {
        $index = $_POST['index'];
        if (is_numeric($index) && isset($fruits[$index])) {
            unset($fruits[$index]);
            $fruits = array_values($fruits); // Reset chỉ số sau khi xóa
        }
    } elseif (isset($_POST['update'])) {
        $index = $_POST['index'];
        $updatedFruit = $_POST['updatedFruit'];
        if (is_numeric($index) && isset($fruits[$index]) && !empty($updatedFruit)) {
            $fruits[$index] = $updatedFruit;
        }
    }
    $_SESSION['fruits'] = $fruits;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['updatePerson'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $dateOfBirth = $_POST['dateOfBirth'];
        if (!empty($name) && is_numeric($age) && !empty($dateOfBirth)) {
            $person['name'] = $name;
            $person['age'] = (int)$age;
            $person['dateOfBirth'] = $dateOfBirth;
        }
    } elseif (isset($_POST['addField'])) {
        $newKey = $_POST['newKey'];
        $newValue = $_POST['newValue'];
        if (!empty($newKey) && !empty($newValue)) {
            $person[$newKey] = $newValue;
        }
    } elseif (isset($_POST['deleteField'])) {
        $keyToDelete = $_POST['keyToDelete'];
        if (isset($person[$keyToDelete])) {
            unset($person[$keyToDelete]);
        }
    }
    $_SESSION['person'] = $person;
}
?>
<body>
  <?php include_once('./header.php'); ?>

  <div class="container p-5">
  <?php 
    // $fruits = ["Orange", "Apple", "Banana", "Watermelon"];
  ?>

  <h1>Indexed Array</h1>
  <p><?php echo implode(", ", $fruits); ?></p>
  <h5>Add New Fruit</h5>
    <form method="post">
        <input type="text" name="newFruit" placeholder="Enter new fruit">
        <input type="submit" name="add" value="Add">
    </form>
  <h5>Fruit List</h5>
    <table>
        <?php for ($i=0; $i<count($fruits); $i++){ ?>
            <tr>
                <td>
                    <form style="display:inline;" method="post">
                        <input type="hidden" name="index" value="<?php echo $i; ?>">
                        <input type="text" name="updatedFruit" value="<?php echo htmlspecialchars($fruits[$i]); ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                </td>
                <td>
                    <form style="display:inline;" method="post">
                        <input type="hidden" name="index" value="<?php echo $i; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <hr>

    <?php 
        // $person = array(
        //     "name" => "Bùi Quốc Bảo",
        //     "age" => 21,
        //     "dateOfBrith" => "31/01/2003"
        // );
    ?>
    <h1>Associative Array</h1>
    <ul>
        <?php echo '<li><p>Name: '.$person["name"].'</p></li>'; ?>
        <?php echo '<li><p>Age: '.$person["age"].'</p></li>'; ?>
        <?php echo '<li><p>Date of birth: '.$person["dateOfBirth"].'</p></li>'; ?>
    </ul>

    <h5>Add New Field</h5>
    <form method="post">
        <label for="newKey">Field Name:</label>
        <input type="text" name="newKey" placeholder="Enter field name"><br><br>

        <label for="newValue">Field Value:</label>
        <input type="text" name="newValue" placeholder="Enter field value"><br><br>

        <input type="submit" name="addField" value="Add Field">
    </form>
    <h5>Update Person Information</h5>
    <form method="post">
        <table>
            <tr>
                <td><p>Name:</p></td>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($person['name']); ?>"><br><br></td>
            </tr>
            <tr>
                <td><p>Age:</p></td>
                <td><input type="number" name="age" value="<?php echo htmlspecialchars($person['age']); ?>"><br><br></td>
            </tr>
            <tr>
                <td><p>Date of Birth:</p></td>
                <td><input type="text" name="dateOfBirth" value="<?php echo htmlspecialchars($person['dateOfBirth']); ?>"><br><br></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatePerson" value="Update Person"></td>
            </tr>
        </table>
        
        

        
        

        
        

        
    </form>
  </div>

  <?php 
    // // 1. Khởi tạo mảng.
    // $fruits = ["Orange", "Apple", "Banana", "Watermelon"];          // Tạo mảng chỉ số
    // $numbsers = array(1, 2, 3, 4, 5, 6);                            // Tạo mảng chỉ số
    // $person = ["name" => "Bùi Quốc Bảo", "age" => 21];              // Tạo mảng băm
    // $employee = array("name" => "Bùi Quốc Bảo", "age" => 21);       // Tạo mảng băm

    // // 2. Thêm phần tử vào mảng
    // $fruits[] = "Mango";                            // Thêm phần tử vào cuối mảng chỉ số
    // $person["gender"] = "male";                     // Thêm phần tử vào mảng băm
    // array_push($fruits, "Peach", "Pineapple");      // Thêm danh sách phần tử

    // // 3. Xóa phẩn tử khỏi mảng
    // unset($fruits[1]);      // Xóa phần tử vị trí 1
    // array_pop($fruits);     // Xóa phần tử cuối
    // array_shift($fruits);   // Xóa phần tử đầu

    // // 4. Cập nhật phần tử
    // $fruits[0] = "Strawberry";          // Cập nhật phần tử của mảng chỉ số
    // $person["city"] = "Los Angeles";    // Cập nhật phần tử của mảng băm

    // // 5. Sắp xếp mảng
    // sort($fruits);      // Sắp xếp tăng dần mảng chỉ số
    // rsort($fruits);     // Sắp xếp giảm dần mảng chỉ số
    // asort($person);     // Sắp xếp mảng băm theo giá trị tăng dần
    // ksort($person);     // Sắp xếp mảng băm theo khóa tăng dần

    // // 6. Tìm kiếm phần tử
    // in_array("Banana", $fruits);            // Trả về true/false 
    // $key = array_search("John", $person);   // Trả về $key hoặc false 
  ?>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>