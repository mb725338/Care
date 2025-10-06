<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $specialization = $conn->real_escape_string($_GET['specialization']);
    $city = $conn->real_escape_string($_GET['city']);

    $sql = "SELECT d.*, u.name, u.email 
            FROM doctors d
            JOIN users u ON d.user_id = u.id
            WHERE d.specialization LIKE '%$specialization%'
            AND d.city LIKE '%$city%'";

    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Search Results</h2>
  <?php if (isset($result) && $result->num_rows > 0): ?>
    <div class="list-group">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="list-group-item">
          <h5><?php echo htmlspecialchars($row['name']); ?></h5>
          <p><strong>Specialization:</strong> <?php echo htmlspecialchars($row['specialization']); ?></p>
          <p><strong>City:</strong> <?php echo htmlspecialchars($row['city']); ?></p>
          <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
          <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p class="text-danger">No doctors found matching your search.</p>
  <?php endif; ?>
</div>
</body>
</html>
