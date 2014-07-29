

<div class="container">

    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Listing grid with filter</h1>
                <?php require_once 'helpers/widgets/property-filter-sort.php'?>
                <?php require_once 'helpers/properties-grid.php'; ?>
                <?php require_once 'helpers/pagination.php'; ?>
            </div>
            <div class="sidebar span3">
                <?php require_once 'helpers/widgets/property-filter.php'; ?>
                <?php require_once 'helpers/widgets/our-agents.php'; ?>
            </div>
        </div>
    </div>
</div>

