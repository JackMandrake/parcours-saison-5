<?php

require __DIR__.'/../Models/Character.php';

// class controller, elle est unique... pour 2 pages
class MainController {

    // en cas d'erreur, la traditionnelle 404
    public function page404() {
        $this->show('404');
    }

    // Fonction qui affiche les vues 
    public function show($viewName, $viewVars = []) {

        $viewVars['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 'home';

        $characterModel = new Character();

        $resultForCharacter = $characterModel->findCharacter();

        $viewVars['resultForCharacter'] = $resultForCharacter;

        extract($viewVars);

        require_once __DIR__.'/../Views/header.tpl.php';
        require_once __DIR__.'/../Views/'. $viewName . 'tpl.php';
        require_once __DIR__.'/../Views/footer.tpl.php';

    }

    // Méthode correspondant à la page d'acceuil 
    public function home () {
       
        $characterModel = new Character();
        $characterToDisplay = $characterModel->findCharacter();

        $results = $characterToDisplay;

        $this->show('home', $results);
    }
}