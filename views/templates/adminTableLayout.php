<?php 
    /** 
     * Layout de la page admin :
     * tableau des articles avec le titre d'un article dans la première colonne.
     * 
     * Les variables à définir:
     *     $title string (obligatoire) : le titre de la page
     *     $lines string (obligatoire): les lignes du tableau
     *     $colTitles array (optionnel) : les titres des colonnes
     */
?>

<h2><?= $title ?></h2>

<div class="adminArticle">
    <?php if (isset($colTitles)) { ?>
        <div class="articleLine">
            <?php foreach ($colTitles as $colTitle) { ?>
            <div class='<?="colTitle . $titleClassName"?>'><?= $colTitle ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    <?= $lines ?>
</div>