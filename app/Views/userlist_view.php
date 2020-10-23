<html>
    <head>
        <title>Contacts List</title>
    </head>
    <body>
        <h1>Contacts List</h1>
        <?php if(!empty($users)):?>
            <table border="1">
            <tr>
                <th>UserId</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
            <?php foreach($users as $user):?>
            <tr>
                <td><?= $user->id;?></td>
                <td><?= $user->username;?></td>
                <td><?= $user->email;?></td>
                <td><?= $user->mobile;?></td>
            </tr>
            <?php endforeach;?>
            
        </table>
        <?php else:?>
        <h1>Sorry! No records FOund</h1>
        <?php endif;?>
        
        
    </body>
</html>