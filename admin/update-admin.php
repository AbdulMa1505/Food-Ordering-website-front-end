<?php
require 'includes/header.php';
require 'includes/connect.php';

// Checking if ID is passed in URL for the first-time load
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //  statement to fetch the current data for the specified ID
    $stmt = $conn->prepare("SELECT fname, username FROM tbl_admin WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the current values for fname and username
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $name = $row['fname'];
        $email = $row['username'];
    } else {
        echo "No record found for this ID.";
        exit;
    }
} elseif (isset($_POST['update'])) {
   // form submission
    $id = $_POST['id'];
    $name = $_POST['fname'];
    $email = $_POST['username'];

    //  update statement
    $stmt = $conn->prepare("UPDATE tbl_admin SET fname = :fname, username = :username WHERE id = :id");
    $stmt->bindParam(':fname', $name, PDO::PARAM_STR);
    $stmt->bindParam(':username', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the update statement
    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully.');</script>";
        header('Location: manage-admin.php');
        exit();
    } else {
        echo "<script>alert('Error updating record.');</script>";
    }
} else {
    echo "No specified ID.";
    exit;
}
?>

<!-- Update Form -->
<form method="POST" action="update-admin.php?id=<?php echo $id; ?>" style="max-width: 400px; margin: auto; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden ID -->

    <label for="fullName" style="display: block; font-weight: bold; margin-bottom: 5px;">Full Name</label>
    <input type="text" name="fullName" id="fullName" value="<?php echo htmlspecialchars($name); ?>" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
    <input type="email" name="username" id="email" value="<?php echo htmlspecialchars($email); ?>" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

    <button type="submit" name="update" style="width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Update</button>
</form>

<?php require 'includes/footer.php'; ?>
