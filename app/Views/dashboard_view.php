<?= $this->extend("layouts/base");?>



<?= $this->section('page_title');?>
 <?php if(session()->has('google_user')): 
    $uinfo = session()->get('google_user');
    ?>
<span>Welcome to <?= $uinfo['first_name'];?> <?= $uinfo['last_name']; ?></span>
<?php else:?>
<span>Welcome to <?= ucfirst($userdata->username);?></span>
<?php endif;?>
<?= $this->endSection();?>


<?= $this->section('content');?>

<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <?php if(session()->has('google_user')): 
                $uinfo = session()->get('google_user');
                ?>
            <div class='jumbotron'>
                <img src="<?= $uinfo['profile_pic'];?>" height="100" width="100">
                <p>Name: <?= $uinfo['first_name'];?> <?= $uinfo['last_name']; ?></p>
                <p>Email: <?= $uinfo['email'];?></p>
                <a href="<?= base_url()?>/dashboard/logout">Logout</a>
            </div>
            <?php else: ?>
            <div class='jumbotron'>
                <?php if($userdata->profile_pic != ''):?>
                <img src='<?= $userdata->profile_pic;?>' height='60'>
                <?php else:?>
                <img src='<?= base_url()?>/public/assets/images/avatar.png' height='60'>
                <?php endif;?>
                
             <h1>Welcome to <?= ucfirst($userdata->username);?></h1>
             <h4>Mobile: <?= $userdata->mobile; ?></h4>
             <h4>Email: <?= $userdata->email; ?></h4>
            <a href="<?= base_url()?>/dashboard/logout">Logout</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>


<?= $this->endSection();?>