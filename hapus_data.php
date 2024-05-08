<?php
// Mengosongkan isi file data.txt
file_put_contents("data.txt", "");
header("Location: klasemen.php"); // Redirect kembali ke halaman klasemen.php setelah data dihapus
exit();
?>
