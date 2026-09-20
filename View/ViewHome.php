<?php namespace View;

use View\View;

class ViewHome extends View {
    //ATTRIBUT
    // private bool $isConnect = false;
    // private bool $hasFriends = false;

    //CONSTRUCTOR

    //GETTER ET SETTER
    // public function getIsConnect(): bool {
    //     return $this->isConnect;
    // }

    // public function setIsConnect(bool $isConnect): self {
    //     $this->isConnect = $isConnect;
    //     return $this;
    // }

    // public function getHasFriends(): bool {
    //     return $this->hasFriends;
    // }

    // public function setHasFriends(bool $hasFriends): self {
    //     $this->hasFriends = $hasFriends;
    //     return $this;
    // }
    //METHODS
    public function launchBuffer():self {
        ob_start();
?>
        <main>
            <nav class="navAriane" aria-label="fil d'ariane">
                <ol class="ariane">
                    <li><a id="pageActuelle" href="./index.html">Accueil</a></li>
                    <li><p>&nbsp;&#10095&nbsp;</p></li>
                </ol>
            </nav>
            <section class="titreAccueil">
                <h1>Bienvenue dans World Is Mine</h1>
                <p> Grâce à WIM, créez, stockez et partagez les albums photo de vos plus beaux moments.</p>
                <p>Commencez par créer un album ou explorez ce de la communauté.</p>
                <span class="boutonAccueil"><a href="A definir" aria-label="Créer un Album">Créer</a><a href="A definir" aria-label="Explorer les albums">Explorer</a></span>
            </section>
            <section class="laUne">
                <div class="laUneFond fond fondBlanc">
                    <div class="laUneTitre titreSection">
                        <h2>Albums à la une</h2>
                        <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                    </div>                
                    <div class="laUneUtilisateurUne">
                        <a href="A definir"><img class="avatarUtilisateurUne" src=""></a>
                        <p class="nomUtilisateurUne"></p>
                        <p class="titreAlbumUne"></p>
                    </div>
                    <div class="carousel">
                        <button class="boutonGaucheUne boutonGauche"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z"/></svg></button>
                        <div class="carouselFenetreUne">
                            <div class="carouselPisteUne">
                                <a class="carouselSlideUne" href="A définir">
                                    <img class="imgPrincipale" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&h=450&fit=crop">
                                    <img class="imgSecondaire" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&h=450&fit=crop">
                                </a>
                                <a class="carouselSlideUne" href="A définir">
                                    <img class="imgPrincipale" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=450&fit=crop" alt="Photo 2">
                                    <img class="imgSecondaire" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=450&fit=crop" alt="Photo 2">
                                </a>
                                <a class="carouselSlideUne" href="A définir">
                                    <img class="imgPrincipale" src="https://images.unsplash.com/photo-1472396961693-142e6e269027?w=450&h=800&fit=crop" alt="Photo 3">
                                    <img class="imgSecondaire" src="https://images.unsplash.com/photo-1472396961693-142e6e269027?w=450&h=800&fit=crop" alt="Photo 3">
                                </a>
                            </div>
                        </div>
                        <button class="boutonDroitUne boutonDroit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z"/></svg></button>
                    </div>
                    <div class="carouselPoints">
                        <span class="point actif"></span>
                        <span class="point"></span>
                        <span class="point"></span>
                    </div>
                </div>              
            </section>

<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
            <section class="mesAlbums">
            <div class="mesAlbumsFond fond">
                <div class="mesAlbumsTitre titreSection">
                    <h2>Mes Albums</h2>
                    <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                </div>
                <div class="mesAlbumBoite">
                    <a class="tuileAlbum monAlbum1" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1501854140801-50d01698950b?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Irland</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum2" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Zen</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum3" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Route 66</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum4" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1475924156734-496f6cac6ec1?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">J'ai hâte</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum5" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=450&h=800&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">test texte dpasse avec beaucoup de mot</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum6" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Retour au source</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum7" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Camping</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum8" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Le plus beau</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum9" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?w=800&h=450&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Rex</p>
                        </div>
                    </a>
                    <a class="tuileAlbum monAlbum10" href="A defini">
                        <img class="imageTuile" src="https://images.unsplash.com/photo-1507133750040-4a8f57021571?w=450&h=800&fit=crop" alt="Photo Album">
                        <div class="textP">
                            <p class="titreAlbum">Café</p>
                        </div>
                    </a>                    
                </div>
            </div>
        </section>
<?php else: ?>
        <section class="mesAlbums">
            <div class="mesAlbumsFond fond">
                <div class="mesAlbumsTitre titreSection">
                    <h2>Mes Albums</h2>
                    <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                </div>
                <div>
                    <p>Connectez vous pour voir vos albums</p>
                    <span class="boutonAccueil"><a href="A definir" aria-label="Créer un Album">Connexion</a></span>
                </div>
            </div>
        </section>
<?php endif; ?>
        <section>
            <div class="recherche">
                <input class="elRecherche" type="text" placeholder="Rechercher, album, utilisateur ..." />
                <button class="btnRecherche" aria-label="Rechercher"><img src="./assets/pico-logo-wim/loupe.svg" alt=""></button>
            </div>
        </section>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
        <section class="amisAlbums">
            <div class="amisAlbumsFond fond fondBlanc">
                <div class="amisAlbumsTitre titreSection">
                        <h2>Les albums de mes amis</h2>
                        <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                </div>
                <div class="carousel">
                    <button class="boutonGaucheArticle boutonGauche boutonGaucheAmis"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z"/></svg></button>
                    <div class="carouselFenetreArticle carouselFenetreAmis">
                        <div class="carouselPisteArticle carouselPisteAmis">
                            <div class="carouselSlideArticle carouselSlideAmis">
                                <div class="albumBoite">
                                    <a class="tuileAlbum slideAlbum1" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Randonnée en montagne</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum2" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Mon Chat</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum3" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Roadtrip Moto</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum4" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Aquarelle et Dessin</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum5" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=450&h=800&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Street Art</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="carouselSlideArticle carouselSlideAmis">
                                <div class="albumBoite">
                                    <a class="tuileAlbum slideAlbum1" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Mon Chien</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum2" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Setup Gaming</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum3" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Plantes d'intérieur</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum4" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Rénovation Voiture</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum5" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1491349174775-aaafddd81942?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=450&h=800&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Macarons Maison</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="boutonDroitArticle boutonDroit boutonDroitAmis"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z"/></svg></button>
                </div>
            </div>
        </section>
<?php else: ?>
        <section class="amisAlbums">
            <div class="amisAlbumsTitre titreSection">
                <h2>Les albums de mes amis</h2>
            </div>
            <div>
                <p>Connectez vous ou ajoutez des amis pour voir leurs albums</p>
                <span class="boutonAccueil"><a href="A definir" aria-label="Créer un Album">Connexion</a></span>
                <div class="recherche">
                    <input class="elRecherche" type="text" placeholder="Rechercher d'amis" />
                    <button class="btnRecherche" aria-label="Rechercher"><img src="./assets/pico-logo-wim/loupe.svg" alt=""></button>
                </div>
            </div>
        </section>
<?php endif; ?>
        <section class="commuAlbums">
            <div class="commuAlbumsFond fond fondBlanc">
                <div class="commuAlbumsTitre titreSection">
                        <h2>Inspiré par la communauté</h2>
                        <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                </div>
                <div class="carousel">
                    <button class="boutonGaucheArticle boutonGauche boutonGaucheCommu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z"/></svg></button>
                    <div class="carouselFenetreArticle carouselFenetreCommu">
                        <div class="carouselPisteArticle carouselPisteCommu">
                            <div class="carouselSlideArticle carouselSlideCommu">
                                <div class="albumBoite">
                                    <a class="tuileAlbum slideAlbum1" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Architecture</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum2" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1550684848-fac1c5b4e853?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Photos Floues</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum3" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Musculation</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum4" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1506318137071-a8e063b4bec0?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Astrologie</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum5" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1504257404764-52525a411123?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1473968512647-3e447244af8f?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Drone Nature</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="carouselSlideArticle carouselSlideCommu">
                                <div class="albumBoite">
                                    <a class="tuileAlbum slideAlbum1" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1584992231908-a90240d66572?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Tricot</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum2" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1601987177651-8edfe6c20009?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Jeux de Cartes</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum3" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Couture Moderne</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum4" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1507156431300-48027743358c?w=800&h=450&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Bmx tricks</p>
                                        </div>
                                    </a>
                                    <a class="tuileAlbum slideAlbum5" href="A defini">
                                        <div class="avatarUtilisateur">
                                            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=300&h=300&fit=crop" alt="Avatar utilisateur">
                                        </div>
                                        <img class="imageTuile" src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=450&h=800&fit=crop" alt="Photo Album">
                                        <div class="textP">
                                            <p class="titreAlbum">Desserts Licorne</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="boutonDroitArticle boutonDroit boutonDroitCommu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z"/></svg></button>
                </div>
            </div>
        </section>
    </Main>
    <button class="btnUp"><img src="./assets/pico-logo-wim/flecheHaut.svg" alt="Retour haut de page"></button>
<?php
        $this->setBuffer(ob_get_clean());
        return $this;
    }
    
    public function display(): void {
        echo $this->buffer;
    }

}

