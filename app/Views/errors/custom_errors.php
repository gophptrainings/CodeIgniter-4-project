<?= $this->extend("layouts/base")?>

<?= $this->section("content")?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="jumbotron mt-4">
                    <h1>Sorry! Unable to process your request</h1>
                    <p>Sorry!</p>
                </div>
            </div>
            
            <div class="col-md-3">
                <?= $this->include("widgets/categories"); ?>
                <?= $this->include("widgets/quicklinks"); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>