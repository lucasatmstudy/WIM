<?php
namespace View;

//Class ViewHeader
class ViewHeader{
    //ATTRIBUTS
    private ?string $title;
    private ?string $linkScript;
    private ?string $buffer;

    //CONSTRUCTOR
    public function __construct(?string $title = "WIM", ?string $linkScript = ''){
        $this->title = $title;
        $this->linkScript = $linkScript;
    }

    //GETTER ET SETTER

    //METHOD
    //Méthode pour mettre en mémoire tampon un template HTML
    public function launchBuffer():self{
        ob_start();
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>WORLD IS MINE - WIM</title>
                <link rel="stylesheet" href="./css/styles.css">
            </head>
            <body>
                <header>
                    <nav aria-label="navigation principale">
                        <ul class="navigationPrincipale">
                            <li id="logoImage"><a class="navBarLogo" href="<?= $_ENV['accueil'] ?>"><img id="logo" src="./assets/pico-logo-wim/Logo.svg" alt="LogoImage"></a></li>
                            <li id="logoText"><a class="navBarText" href="<?= $_ENV['accueil'] ?>">WORLD IS MINE</a></li>
                            <li id="elAccueil"><a class="navBar" href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                            <li id="elCreer"><a class="navBar" href="<?= $_ENV['creer'] ?>">Créer</a></li>
                            <li id="elAlbum"><a class="navBar" href="<?= $_ENV['albums'] ?>">Albums</a></li>
                            <li id="elAmis"><a class="navBar" href="<?= $_ENV['amis'] ?>">Amis</a></li>
                            <li id="elExplorer"><a class="navBar" href="<?= $_ENV['explorer'] ?>">Explorer</a></li>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
                            <li id="elCompte"><a class="navBar" href="<?= $_ENV['compte'] ?>">Compte</a></li>
<?php else: ?>
                            <li id="elCompte"><a class="navBar" href="<?= $_ENV['connexion'] ?>">Connexion</a></li>
<?php endif; ?>
                            <li id="logoBurger"><button class="navBarBurger" aria-label="Ouvrir le menu burger" aria-expanded="false"><img id="imageBurger" src="./assets/pico-logo-wim/burgerV1.svg" alt="Menu burger"></button></li>
                        </ul>
                    </nav>
                    <nav aria-label="navigation burger">
                        <ul class="navigationBurger">
                            <li id="elFermer"><img src="./assets/pico-logo-wim/croixLarge.svg" alt="Fermeture menu burger"></li>
                            <li id="elAccueilBurger"><a class="navBurger" href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                            <li id="elCreerBurger"><a class="navBurger" href="<?= $_ENV['creer'] ?>">Créer</a></li>
                            <li id="elAlbumBurger"><a class="navBurger" href="<?= $_ENV['albums'] ?>">Album</a></li>
                            <li id="elExplorerBurger"><a class="navBurger" href="<?= $_ENV['amis'] ?>">Amis</a></li>
                            <li id="elAmisBurger"><a class="navBurger" href="<?= $_ENV['explorer'] ?>">Explorer</a></li>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
                            <li id="elCompteBurger"><a class="navBurger" href="<?= $_ENV['compte'] ?>">Compte</a></li>
<?php else: ?>
                            <li id="elCompteBurger"><a class="navBurger" href="<?= $_ENV['connexion'] ?>">Connexion</a></li>
<?php endif; ?>
                        </ul>
                    </nav>
                </header>
<?php
        $this->buffer = ob_get_clean();
        return $this;
    }

    //Method pour afficher le contenu de la mémoire tampon
    public function display():void{
        echo $this->buffer;
    }
}