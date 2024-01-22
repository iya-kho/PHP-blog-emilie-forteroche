<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<?php $title = 'Edition des articles'; ?>

<?php 
ob_start(); ?>
<?php foreach ($articles as $article) { ?>
    <div class="articleLine">
        <div class="title"><?= $article->getTitle() ?></div>
        <div class="content"><?= $article->getContent(200) ?></div>
        <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
        <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
    </div>
<?php } ?>

<?php $lines = ob_get_clean(); ?>

<?php require_once('adminTableLayout.php'); ?>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>