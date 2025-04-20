<?php
$nama_database = "backupdb_pos";
$user = "root";
$password = ""; // kosongkan kalau root tidak pakai password
$host = "localhost";
$path_mysqldump = "C:\\xampp\\mysql\\bin\\mysqldump.exe";
$nama_file = "backup_" . date("Ymd_His") . ".sql";

$command = "\"$path_mysqldump\" -u $user " .
           ($password !== "" ? "-p$password " : "") .
           "$nama_database > $nama_file";

// Jalankan perintah
exec($command, $output, $result);

if ($result === 0) {
    echo "✅ Backup berhasil: $nama_file";
} else {
    echo "❌ Gagal melakukan backup. Kode error: $result";
}
