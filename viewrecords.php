<?php
  $title = "View Records";
  require_once './includes/header.php';
  require_once './db/conn.php';

  // Fetch all client records ordered by client_id
  $sql = "SELECT client_id, email, address, city, province, postalcode FROM client_info ORDER BY client_id ASC";
  $result = mysqli_query($conn, $sql);
?>

<h1 class="page-title">All Client Records</h1>

<div class="card shadow-sm received-card">
  <div class="card-body text-center">
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] === 'deleted') {
      echo "<div class='alert alert-success'>Record deleted successfully!</div>";
    }

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='table table-dark table-striped table-bordered align-middle'>
                <thead>
                  <tr>
                    <th>Client ID</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['client_id']}</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['city']) . "</td>
                    <td>" . htmlspecialchars($row['province']) . "</td>
                    <td>" . htmlspecialchars($row['postalcode']) . "</td>
                    <td>
                      <a href='delete.php?id={$row['client_id']}'
                         class='btn btn-danger btn-sm'
                         onclick='return confirm(\"Are you sure you want to delete this record?\")'>
                         Delete
                      </a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No records found.</p>";
    }
    ?>

    
    <a href="index.php" class="btn btn-primary mt-3">Back to Form</a>
  </div>
</div>

<?php require_once './includes/footer.php'; ?>
