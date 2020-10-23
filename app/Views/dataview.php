<html>
    <head>
        <title>Subjects List</title>
    </head>
    <body>
        <h1>Subjects List</h1>
        <ul>
       <?php foreach($subjects as $sub):?>
            <li><?= $sub['subject']?>-<?= $sub['abbr']?></li>
        <?php endforeach; ?>
        </ul>
    </body>
</html>