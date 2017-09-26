<?php

    $max = 500 * 1024;
    if(isset($_POST['upload'])){

        $destination = __DIR__ . '/uploaded/';
        if($_FILES['filename']['error'] === 0){
            $result = move_uploaded_file($_FILES['filename']['tmp_name'], $destination . $_FILES['filename']['name']);
            if($result){
                $msg = "OK";
            }
            else{
                $msg = "Sorry there was a problem";
            }
        }
        else{
            switch($_FILES['filename']['error']){
                case 2:
                    $msg = "File is too big";
                    break;
                case 4:
                    $msg = "No file selected";
                    break;
                default:
                    $msg = "Sorry there was a problem";
                    break;
            }
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Uploading files</h1>
<?php
if($msg){ ?>
    <p><?= $msg; ?></p>
<?php } ?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
        <label for="filename">Select File:</label>
        <input type="file" name="filename" id="filename">
    </p>
    <p>
        <input type="submit" name="upload" value="Upload File">
    </p>
</form>

</body>
</html>

<!--

1. Проверка сообщения об ошибке
http://php.net/manual/ru/features.file-upload.errors.php

2. Проверка максимального размера файла
<input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">

3. Права на папку 755 или 775, загрузка файлов вне server root

4. Конфигурация php
file_uploads = on
upload_tmp_dir = system default
max_file_uploads = 20 //количестко файлов за раз
upload_max_filesize = 2 MB //размер каждого файла
post_max_size = 8 MB //максимальный размер всего post
max_input_timr = 60 sec
max_execution_time = 30 sec
memory_limit = 128 MB


-->