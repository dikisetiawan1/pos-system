<?php
$nama_database = "backupdb_pos";
$user = "root";
$password = ""; // kosongkan kalau root tidak pakai password
$host = "localhost";
$path_mysqldump = "C:\\xampp\\mysql\\bin\\mysqldump.exe";
$nama_file = "backups_db/backup_" . date("Ymd_His") . ".sql";

$command = "\"$path_mysqldump\" -u $user " .
           ($password !== "" ? "-p$password " : "") .
           "$nama_database > $nama_file";

// Jalankan perintah
exec($command, $output, $result);

if ($result === 0) {
    // Jika backup berhasil, tampilkan pesan sukses
    echo '<script>window.location.href = "index.php?module=database&action=index&notifbackup=success";</script>';
} else {
    echo '<script>Swal.fire({
                    title: "Database gagal dibackup!",
                    text: "You clicked the button!",
                    icon: "error"
                  });</script>';
}
