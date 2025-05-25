<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);

    $fileName = uniqid() . '_' . basename($_FILES["file"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "File uploaded: <a href='$targetFile'>$targetFile</a>";
    } else {
        echo "Upload failed. Error: " . $_FILES["file"]["error"];
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload Test</button>
  </form>
</body>
</html>