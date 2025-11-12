<?php
  
  require_once __DIR__ . '/includes/header.php';
?>

<h1 class="page-title">Lab 8 - delete a record</h1>

<div class="card shadow-sm">
  <div class="card-body">
    <form class="row g-3" method="post" action="receive.php" novalidate>
      
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      
      <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>

      
      <div class="col-md-6">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" required>
      </div>

     
      <div class="col-md-4">
        <label for="state" class="form-label">Province</label>
        <select id="state" name="state" class="form-select" required>
          <option value="" disabled selected>Choose...</option>
          <option>Alberta</option>
          <option>British Columbia</option>
          <option>Manitoba</option>
          <option>New Brunswick</option>
          <option>Newfoundland and Labrador</option>
          <option>Nova Scotia</option>
          <option>Northwest Territories</option>
          <option>Nunavut</option>
          <option>Ontario</option>
          <option>Prince Edward Island</option>
          <option>Quebec</option>
          <option>Saskatchewan</option>
          <option>Yukon</option>
        </select>
      </div>

      
      <div class="col-md-2">
        <label for="zip" class="form-label">Postal Code</label>
        <input type="text" class="form-control" id="zip" name="zip" required>
      </div>
            
      <div class="col-12">
        <button type="submit" class="btn btn-submit">Submit</button>
      </div>
    </form>
  </div>
</div>


<div class="container actions-wrap">
  
  <a href="viewrecords.php" class="cta-view text-decoration-none d-block">View Records</a>

  
  <div class="row g-0 cta-split align-items-stretch">
    <div class="col-3">
      <div class="cta-key h-100 d-flex align-items-center justify-content-center">Primary Key</div>
    </div>
    <div class="col-9">
      <a href="viewrecords.php" class="cta-delete text-decoration-none d-block">
        To delete a record, click this button
      </a>
    </div>
  </div>
</div>

<?php require_once './includes/footer.php'; ?>

