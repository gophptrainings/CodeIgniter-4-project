<?= $this->extend("layouts/base");?>

<?= $this->section("content");?>
    
<!--Slider section-->
<section>
    <?= $this->include("partials/slider")?>
</section>

<section id="features">
    <?= $this->include("partials/features");?>
</section>
            
<section id="about">
    <?= $this->include("partials/about");?>
</section>

<section>
    <?= $this->include("partials/articles");?>
</section>

<?= $this->endSection();?>


       
        
        
        