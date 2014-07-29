
<?php require_once 'helpers/carousel-large.php'; ?>

<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Featured properties</h1>
                <?php require_once 'helpers/properties-grid.php'; ?>
            </div>
            <div class="sidebar span3">
                <?php require_once 'helpers/widgets/our-agents.php'; ?>
                <div class="hidden-tablet">
                    <?php require_once 'helpers/widgets/properties.php'; ?>
                </div>
            </div>
        </div>
        <?php require_once 'helpers/carousel.php'?>
        <?php require_once 'helpers/features.php'?>
    </div>
</div>

<?php require_once 'helpers/bottom.php'; ?>
