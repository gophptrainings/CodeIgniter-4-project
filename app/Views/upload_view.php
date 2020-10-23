<html>
    <head>
        <title>File Uploading</title>
    </head>
    <body>
        <h1>File Uploading</h1>
        <?php if(isset($validation)):?>
        <?= $validation->listErrors(); ?>
        <?php endif;?>
        <?= form_open_multipart(); ?>
        Upload Avatar: <input type='file' name='avatar'>
        <input type="submit" value="Upload"> 
        <?= form_close(); ?>
    </body>
</html>