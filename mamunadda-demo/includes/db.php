<?php
// includes/db.php
$mysqli = null;

try {
  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
  if ($mysqli->connect_error) {
    throw new Exception('Connect Error: ' . $mysqli->connect_error);
  }
  $mysqli->set_charset('utf8mb4');
} catch (Throwable $e) {
  // For production, you may want to log the error instead of echo
  echo "<div style='background:#fee;border:1px solid #f99;padding:10px;margin:10px 0'>Database connection failed. Please configure includes/config.php properly.<br>" . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
