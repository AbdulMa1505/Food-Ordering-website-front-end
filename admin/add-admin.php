<?php 
require 'includes/header.php';
require 'includes/connect.php';

if (isset($_POST['submit'])) {
    if(empty($_POST[$name]) ||empty($_POST[$email])||empty($_POST[$password])){
        echo"<script>alert('all inputs must be filled')</script>";
    }
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO tbl_admin (fname, username, password) VALUES (:name, :email, :password)");
    // Bind the parameters to prevent SQL injection
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Store name and email in session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header('Location:manage-admin.php');
        echo "User registered successfully!";  
    }
     else {
        echo "Error: Could not register the user.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add admin</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <div class="form-container-1">
                <div class="form-container-2">
                <h2 class="form-title text-center">ADD ADMIN</h2>
                        <form action="add-admin.php" method="POST">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" id="fullName" name="fullName" class="form-input" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" name="submit" class="form-button">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php require'includes/footer.php';?>