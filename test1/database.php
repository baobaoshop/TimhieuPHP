<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QL SAN PHAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php
// Thông tin kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QLSanPham";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý thêm, xóa, sửa dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        // Thêm dữ liệu
        $name = $_POST['name'];
        $image = $_POST['image'];
        $sql = "INSERT INTO Phone (name, image) VALUES ('$name', '$image')";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        // Xóa dữ liệu
        $id = $_POST['id'];
        $sql = "DELETE FROM Phone WHERE id = $id";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        // Sửa dữ liệu
        $id = $_POST['id'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $sql = "UPDATE Phone SET name = '$name', image = '$image' WHERE id = $id";
        $conn->query($sql);
    }
}

// Lấy tất cả dữ liệu từ bảng Phone
$result = $conn->query("SELECT * FROM Phone");
?>
<body>
  <?php include_once('./header.php'); ?>

  <div class="container p-5">
  <h1>QL San Pham</h1>

<!-- Form thêm dữ liệu -->
<h2>Add New Phone</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>

    <label for="image">Image URL:</label>
    <input type="text" name="image" required><br><br>

    <input type="submit" name="add" value="Add Phone">
</form>

<hr>

<!-- Danh sách các sản phẩm trong bảng Phone -->
<h2>Phone List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
                <form method="post" style="display:inline;">
                    
                    <td>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                    </td>
                    <td>
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Phone Image" width="50">
                        <input type="text" name="image" value="<?php echo htmlspecialchars($row['image']); ?>" required>
                    </td>
                    <td>
                        <input type="submit" name="update" value="Update">
                    </td>
                    <td>
                        <input type="submit" name="delete" value="Delete">
                    </td>
                </form>
        </tr>
    <?php endwhile; ?>
</table>
  </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>