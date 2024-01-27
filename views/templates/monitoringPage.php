<?php 
    /** 
     * Affichage de la partie monitoring : 
     * liste des articles avec leur titre, nombre de vues, nombre de commentaires et date de création
     * avec la possibilité de trier par ces critères.
     */
?>

<?php 
ob_start();?>
<div class="articleLine">
    <?php for ($i = 0; $i < count($columns); $i++) {    
        //On affiche une flèche en haut ou en bas si la colonne est celle qui est triée
        //ou deux flèches par défaut     
        if ($columns[$i] == $sortColumn) {
            $iconClass = $sortOrderQuery == 'ASC' ? 'fa-sort-up' : 'fa-sort-down';
        } else {
            $iconClass = 'fa-sort';
        } ?>
        <div class="colTitle monitoringInfo">
            <a href="index.php?action=monitoringPage&column=<?= $columns[$i] ?>&order=<?= $sortOrderUrl?>">
                <span><?= $columnTitles[$i] ?></span>
                <i class="fa-solid <?= $iconClass ?>"></i>
            </a>
        </div>
    <?php } ?>
</div>
<?php foreach ($articlesSorted as $article) { ?>
    <div class="articleLine">
        <div class="title monitoringInfo"><?= $article->getTitle() ?></div>
        <div class="monitoringInfo"><?= $article->getNbViews() ?></div>
        <div class="monitoringInfo"><?= $article->getNbComments() ?></div> 
        <div class="monitoringInfo"><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></div>
    </div>
<?php } ?>

<?php $tableContent = ob_get_clean(); ?>

<?php require_once('adminTableLayout.php'); ?>