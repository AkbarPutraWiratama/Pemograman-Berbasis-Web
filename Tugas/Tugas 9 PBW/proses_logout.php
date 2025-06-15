<?php
session_start();
session_unset();
session_destroy();

// Redirect ke login dengan pesan
header("Location: login.php?message=" . urlencode("Anda berhasil logout."));
exit;
?>
