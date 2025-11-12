<?php
  $title = "Received";
  require_once './includes/header.php';
  require_once './db/conn.php';

  
  $email = $address = $city = $province = $postal_code = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $email       = $_POST['email']        ?? '';
    $address     = $_POST['address']      ?? '';
    $city        = $_POST['city']         ?? '';
    $province    = $_POST['province']     ?? ($_POST['state'] ?? '');  
    $postal_code = $_POST['postal_code']  ?? ($_POST['zip']   ?? '');  

    
    $email       = mysqli_real_escape_string($conn, $email);
    $address     = mysqli_real_escape_string($conn, $address);
    $city        = mysqli_real_escape_string($conn, $city);
    $province    = mysqli_real_escape_string($conn, $province);
    $postal_code = mysqli_real_escape_string($conn, $postal_code);

    
    $sql = "INSERT INTO client_info (email, address, city, province, postalcode)
            VALUES ('$email', '$address', '$city', '$province', '$postal_code')";

    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success my-3 text-center'>Record added successfully!</div>";
    } else {
      echo "<div class='alert alert-danger my-3 text-center'>Error: " . mysqli_error($conn) . "</div>";
    }
  }
?>

<div class="card shadow-sm received-card">
  <div class="card-body text-center">
    

    
    <p class="mb-4">
      <strong>Email:</strong> <?= htmlspecialchars($email) ?><br>
      <strong>Address:</strong> <?= htmlspecialchars($address) ?><br>
      <strong>City:</strong> <?= htmlspecialchars($city) ?><br>
      <strong>Province:</strong> <?= htmlspecialchars($province) ?><br>
      <strong>Postal Code:</strong> <?= htmlspecialchars($postal_code) ?><br>
    </p>

    <a href="index.php" class="btn btn-primary">Back to Form</a>
  </div>
</div>

<?php require_once './includes/footer.php'; ?>
