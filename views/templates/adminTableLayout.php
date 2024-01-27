<?php 
    /** 
     * Layout de la page admin avec un tableau
     * 
     * Les variables à définir:
     *     $title string (obligatoire) : le titre de la page
     *     $tableContent string (obligatoire): le contenu du tableau
     */
?>

<h2><?= $title ?></h2>

<div class="adminArticle">
    <?= $tableContent ?>
</div>