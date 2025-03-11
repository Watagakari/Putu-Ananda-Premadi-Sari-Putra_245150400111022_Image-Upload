<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hasError = false;
    setcookie('name', $_POST['name'], time() + 3600, '/');
    setcookie('birthplace', $_POST['birthplace'], time() + 3600, '/');
    setcookie('birthdate', $_POST['birthdate'], time() + 3600, '/');
    setcookie('education', $_POST['education'], time() + 3600, '/');

    //pengecekan tipe file upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["file"]["tmp_name"];
        $fileName = $_FILES["file"]["name"];
        $fileType = mime_content_type($fileTmpPath);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ["image/png", "image/jpeg"];
        $allowedExtensions = ["png", "jpg", "jpeg"];

        if (in_array($fileType, $allowedTypes) && in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['uploaded_image'] = "data:" . $fileType . ";base64," . base64_encode(file_get_contents($fileTmpPath));
        } else {
            $_SESSION['upload_error'] = "Hanya file PNG dan JPG yang diperbolehkan.";
            $hasError = true;
        }
    }

    //mencegah form tersubmit ketika file yang terupload eror
    if ($hasError) {
        header("Location: dashboard.php");
        exit();
    }

    header("Location: CV.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Email: <?php echo htmlspecialchars($_COOKIE['user'] ?? ''); ?></p>

    <?php
    if (isset($_SESSION['upload_error'])) {
        echo "<p style='color:red;'>" . $_SESSION['upload_error'] . "</p>";
        unset($_SESSION['upload_error']); 
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="name" value="<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : ''; ?>" required><br>
        
        <label>Tempat Lahir:</label>
        <input type="text" name="birthplace" value="<?php echo isset($_COOKIE['birthplace']) ? htmlspecialchars($_COOKIE['birthplace']) : ''; ?>" required><br>
        
        <label>Tanggal Lahir:</label>
        <input type="date" name="birthdate" value="<?php echo isset($_COOKIE['birthdate']) ? htmlspecialchars($_COOKIE['birthdate']) : ''; ?>" required><br>
        
        <label>Riwayat Pendidikan:</label>
        <textarea name="education" required><?php echo isset($_COOKIE['education']) ? htmlspecialchars($_COOKIE['education']) : ''; ?></textarea><br>

        <label for="file">Pilih Gambar (PNG/JPG):</label>
        <input type="file" name="file" id="file" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
