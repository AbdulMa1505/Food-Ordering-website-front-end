<?php
require 'includes/header.php';
require 'includes/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT fname, username FROM tbl_admin WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $name = $row['fname'];
        $email = $row['username'];
    } else {
        echo "No record found for this ID.";
        exit;
    }
} else {
    echo "No specified ID.";
    exit;
}
?>

<!-- Update Form -->
 <a href="manage-admin.php" class="btn-danger" style="float:right;">BACK</a>
<form method="POST" action="update-admin.php" style="max-width: 400px; margin: auto; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <p type="hidden" name="id" value="<?php echo $id; ?>"></p> <!-- Hidden ID -->

    <label for="fullName" style="display: block; font-weight: bold; margin-bottom: 5px;">Full Name</label>
    <p type="text" name="fullName" id="fullName" value="" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;"><?php echo $name; ?></p>

    <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
    <p type="email" name="email" id="email" value="" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;"><?php echo $email; ?></p>

</form>

<?php require 'includes/footer.php'; ?>
