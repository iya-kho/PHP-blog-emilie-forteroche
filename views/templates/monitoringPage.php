<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<?php $title = 'Monitoring'; ?>

<?php $colTitles = ['Titre', 'Vues', 'Commentaires', 'Date de publication']; ?>
<?php $titleClassName = 'monitoringInfo'; ?>

<?php 
ob_start(); ?>
<?php foreach ($articles as $article) { ?>
    <div class="articleLine">
        <div class="title monitoringInfo"><?= $article->getTitle() ?></div>
        <div class="monitoringInfo"><?= $article->getNbViews() ?></div>
        <div class="monitoringInfo"><?= $article->getNbComments() ?></div> 
        <div class="monitoringInfo"><?= Utils::convertDateToFrenchFormat($article->getDateUpdate()) ?></div>
    </div>
<?php } ?>

<?php $lines = ob_get_clean(); ?>

<?php require_once('adminTableLayout.php'); ?>