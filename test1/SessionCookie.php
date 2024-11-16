<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
// // Bắt đầu một session
// session_start();

// // Lưu dữ liệu vào session
// $_SESSION['name'] = 'Bui Quoc Bao';

// // Lấy dữ liệu từ session
// echo $_SESSION['name']; 

// // Xóa một biến session cụ thể
// unset($_SESSION['name']);

// // Hủy toàn bộ session
// session_destroy();
?>

<?php
// // Tạo cookie có thời hạn 1 phut
// setcookie("username", "Buiquocbao", time() + 600);

// // Lấy giá trị cookie
// if (isset($_COOKIE['username'])) {
//     echo $_COOKIE['username']; 
// }

// // Xóa cookie bằng cách đặt thời gian hết hạn trong quá khứ
// setcookie("username", "", time() - 600);
?>

<?php
session_start();

// Xử lý yêu cầu tạo và xóa session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['createSession'])) {
        $_SESSION['name'] = 'Bui Quoc Bao';
    } elseif (isset($_POST['deleteSession'])) {
        unset($_SESSION['name']);
    }

    if (isset($_POST['createCookie'])) {
        // Tạo cookie với thời gian sống là 30 giây
        setcookie("user", "Bui Quoc Bao", time() + 30);
    } elseif (isset($_POST['deleteCookie'])) {
        // Xóa cookie bằng cách đặt thời gian sống về quá khứ
        setcookie("user", "", time() - 3600);
    }
}
?>

<body>
  <?php include_once('./header.php'); ?>

  <div class="container p-5">
  <h1>Session</h1>
    
    <!-- Hiển thị thông tin session nếu tồn tại -->
    <?php if (isset($_SESSION['name'])): ?>
        <p>Session 'name' is set to: <?php echo htmlspecialchars($_SESSION['name']); ?></p>
    <?php else: ?>
        <p>Session 'name' is not set.</p>
    <?php endif; ?>

    <!-- Form để tạo và xóa session -->
    <form method="post">
        <button type="submit" name="createSession">Create Session</button>
        <button type="submit" name="deleteSession">Delete Session</button>
    </form>

    <h1>Cookie Manager</h1>

    <!-- Hiển thị thông tin cookie nếu tồn tại -->
    <?php if (isset($_COOKIE['user'])): ?>
        <p>Cookie 'user' is set to: <?php echo htmlspecialchars($_COOKIE['user']); ?></p>
    <?php else: ?>
        <p>Cookie 'user' is not set or has expired.</p>
    <?php endif; ?>

    <!-- Form để thêm và xóa cookie -->
    <form method="post">
        <button type="submit" name="createCookie">Create Cookie (30 seconds)</button>
        <button type="submit" name="deleteCookie">Delete Cookie</button>
        <button type="submit" name="reloadPage">Reload Page</button>
    </form>
  </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>