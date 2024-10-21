<!DOCTYPE html>
<html>
    <head>
        <title>Unggah File Dokumen</title>
    </head>
    <body>
        <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" id="files" multiple="multiple" accept = ".jpg, .jpeg, .png, .gif">
            <input type="submit" name="submit" value="Unggah">
        </form>
        <div id="status"></div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="upload.js"></script>
    </body>
</html>