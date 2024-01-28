<?php 

class ArticleController 
{
    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles();

        $view = new View("Accueil");
        $view->render("home", ['articles' => $articles]);
    }

    /**
     * Affiche le détail d'un article.
     * @return void
     */
    public function showArticle() : void
    {
        // Récupération de l'id de l'article demandé.
        $id = Utils::request("id", -1);

        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($id);
        
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On met à jour le nombre de vues de l'article si l'utilisateur n'a pas déjà vu la page.
        if (!isset($_SESSION['articlesViewed']) || !in_array($id, $_SESSION['articlesViewed'])) {
            $articleManager->updateNbViews($id);
            $_SESSION['articlesViewed'][] = $id;
        }

        $commentManager = new CommentManager();
        $comments = $commentManager->getAllCommentsByArticleId($id);

        //On vérifie si l'utilisateur est connecté pour afficher le bouton de suppression de commentaire
        $isConnected = $this->checkIfUserIsConnected();

        $view = new View($article->getTitle());
        $view->render("detailArticle", [
            'article' => $article, 
            'comments' => $comments,
            'isConnected' => $isConnected
        ]);
    }

    /**
     * Affiche le formulaire d'ajout d'un article.
     * @return void
     */
    public function addArticle() : void
    {
        $view = new View("Ajouter un article");
        $view->render("addArticle");
    }

    /**
     * Affiche la page "à propos".
     * @return void
     */
    public function showApropos() {
        $view = new View("A propos");
        $view->render("apropos");
    }

    /**
     * Vérifie si l'utilisateur est connecté.
     */
    public function checkIfUserIsConnected() : bool
    {
        if (!isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }
}