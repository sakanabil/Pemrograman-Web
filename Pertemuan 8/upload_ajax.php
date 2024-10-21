<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $uploaded_files = array();
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        @$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed_extensions) === false) {
            $errors[] = "Ekstensi file yang diizinkan hanya JPG, JPEG, PNG, atau GIF. File: $file_name";
            continue;
        }

        if ($file_size > 2097152) {
            $errors[] = "Ukuran file tidak boleh lebih dari 2 MB. File: $file_name";
            continue;
        }

        if (empty($errors)) {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            $uploaded_files[] = $file_name;
        }
    }

    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }

    if (!empty($uploaded_files)) {
        echo "File yang berhasil diunggah: " . implode(", ", $uploaded_files) . ".";
    }
}
?>
