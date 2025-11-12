<?php
  $title = "Received";
  require_once './includes/header.php';
  require_once './db/conn.php';

  // Defaults so the template can render even on a GET
  $email = $address = $city = $province = $postal_code = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1) Read inputs (support BOTH naming styles)
    $email       = $_POST['email']        ?? '';
    $address     = $_POST['address']      ?? '';
    $city        = $_POST['city']         ?? '';
    $province    = $_POST['province']     ?? ($_POST['state'] ?? '');  // 👈 fallback
    $postal_code = $_POST['postal_code']  ?? ($_POST['zip']   ?? '');  // 👈 fallback

    // 2) Escape for SQL
    $email       = mysqli_real_escape_string($conn, $email);
    $address     = mysqli_real_escape_string($conn, $address);
    $city        = mysqli_real_escape_string($conn, $city);
    $province    = mysqli_real_escape_string($conn, $province);
    $postal_code = mysqli_real_escape_string($conn, $postal_code);

    // 3) Insert (column is postalcode in DB)
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
    <h1 class="page-title">Testing!!</h1>

    <!-- ✅ Display the variables (with htmlspecialchars), not $_POST[...] -->
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
