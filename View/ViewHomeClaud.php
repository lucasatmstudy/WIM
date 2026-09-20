<?php
namespace View;

use View\View;

class ViewHomeClaude extends View {
    //CONSTANTES
    private const NB_MES_ALBUMS = 10;
    private const NB_ALBUMS_PAR_SLIDE = 5;
    private const SVG_GAUCHE = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z"/></svg>';
    private const SVG_DROITE = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z"/></svg>';

    //ATTRIBUT
    private bool $connected = false;

    //GETTER ET SETTER
    public function isConnected(): bool {
        return $this->connected;
    }

    public function setConnected(bool $connected): self {
        $this->connected = $connected;
        return $this;
    }

    //METHODS
    public function launchBuffer(): self {
        $data      = $this->getData() ?? [];
        $une       = array_values($data['une'] ?? []);
        $mesAlbums = array_slice(array_values($data['mesAlbums'] ?? []), 0, self::NB_MES_ALBUMS);
        $amis      = $data['amis'] ?? [];
        $commu     = $data['commu'] ?? [];

        ob_start();
?>
            <main>
                <nav class="navAriane" aria-label="fil d'ariane">
                    <ol class="ariane">
                        <li><a id="pageActuelle" href="./index.html">Accueil</a></li>
                    </ol>
                </nav>
                <section class="titreAccueil">
                    <h1>Bienvenue dans World Is Mine</h1>
                    <p> Grâce à WIM, créez, stockez et partagez les albums photo de vos plus beaux moments.</p>
                    <p>Commencez par créer un album ou explorer ceux de la communauté.</p>
                    <span class="boutonAccueil"><a href="A definir" aria-label="Créer un Album">Créer</a><a href="A definir" aria-label="Explorer les albums">Explorer</a></span>
                </section>

                <!-- ALBUMS A LA UNE (visible par tous) -->
                <section class="laUne">
                    <div class="laUneFond fond fondBlanc">
                        <div class="laUneTitre titreSection">
                            <h2>Albums à la une</h2>
                            <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                        </div>
                        <div class="laUneUtilisateurUne">
                            <a href="A definir"><img class="avatarUtilisateurUne" src="<?= $this->e($une[0]['avatar'] ?? '') ?>" alt="Avatar de <?= $this->e($une[0]['pseudo'] ?? '') ?>"></a>
                            <p class="nomUtilisateurUne"><?= $this->e($une[0]['pseudo'] ?? '') ?></p>
                            <p class="titreAlbumUne"><?= $this->e($une[0]['titre'] ?? '') ?></p>
                        </div>
                        <div class="carousel">
                            <button class="boutonGaucheUne boutonGauche" aria-label="Album précédent"><?= self::SVG_GAUCHE ?></button>
                            <div class="carouselFenetreUne">
                                <div class="carouselPisteUne">
<?php foreach ($une as $album): ?>
                                    <a class="carouselSlideUne" href="<?= $this->urlAlbum($album) ?>" data-pseudo="<?= $this->e($album['pseudo'] ?? '') ?>" data-avatar="<?= $this->e($album['avatar'] ?? '') ?>" data-titre="<?= $this->e($album['titre'] ?? '') ?>">
                                        <img class="imgPrincipale" src="<?= $this->e($album['image'] ?? '') ?>" alt="<?= $this->e($album['titre'] ?? 'Photo Album') ?>">
                                        <img class="imgSecondaire" src="<?= $this->e($album['image'] ?? '') ?>" alt="">
                                    </a>
<?php endforeach; ?>
                                </div>
                            </div>
                            <button class="boutonDroitUne boutonDroit" aria-label="Album suivant"><?= self::SVG_DROITE ?></button>
                        </div>
                        <div class="carouselPoints">
<?php foreach ($une as $i => $album): ?>
                            <span class="point<?= $i === 0 ? ' actif' : '' ?>"></span>
<?php endforeach; ?>
                        </div>
<?php endif; ?>
                    </div>
                </section>

                <!-- MES ALBUMS (connecté uniquement) -->
                <section class="mesAlbums">
                    <div class="mesAlbumsFond fond">
                        <div class="mesAlbumsTitre titreSection">
                            <h2>Mes Albums</h2>
                            <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                        </div>
<?php if (!$this->connected): ?>
<?php $this->displayInviteConnexion('Connectez-vous pour voir vos albums.'); ?>
<?php elseif (empty($mesAlbums)): ?>
                        <p>Vous n'avez pas encore d'album.</p>
                        <span class="boutonAccueil"><a href="A definir" aria-label="Créer un Album">Créer</a></span>
<?php else: ?>
                        <div class="mesAlbumBoite">
<?php foreach ($mesAlbums as $i => $album): ?>
<?php $this->displayTuile($album, 'monAlbum' . ($i + 1), false); ?>
<?php endforeach; ?>
                        </div>
<?php endif; ?>
                    </div>
                </section>

                <section>
                    <div class="recherche">
                        <input class="elRecherche" type="text" placeholder="Rechercher, album, utilisateur ..." />
                        <button class="btnRecherche" aria-label="Rechercher"><img src="./assets/pico-logo-wim/loupe.svg" alt=""></button>
                    </div>
                </section>

                <!-- ALBUMS DE MES AMIS (connecté uniquement) -->
                <section class="amisAlbums">
                    <div class="amisAlbumsFond fond fondBlanc">
                        <div class="amisAlbumsTitre titreSection">
                            <h2>Les albums de mes amis</h2>
                            <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                        </div>
<?php if (!$this->connected): ?>
<?php $this->displayInviteConnexion('Connectez-vous pour voir les albums de vos amis.'); ?>
<?php elseif (empty($amis)): ?>
                        <p>Vos amis n'ont pas encore d'album à partager.</p>
<?php else: ?>
<?php $this->displayCarousel($amis, 'Amis'); ?>
<?php endif; ?>
                    </div>
                </section>

                <!-- INSPIRE PAR LA COMMUNAUTE (visible par tous) -->
                <section class="commuAlbums">
                    <div class="commuAlbumsFond fond fondBlanc">
                        <div class="commuAlbumsTitre titreSection">
                            <h2>Inspiré par la communauté</h2>
                            <a class="titreVoirPlus" href="Tout visiter">Tout voir</a>
                        </div>
<?php if (empty($commu)): ?>
                        <p>Aucun album de la communauté pour le moment.</p>
<?php else: ?>
<?php $this->displayCarousel($commu, 'Commu'); ?>
<?php endif; ?>
                    </div>
                </section>
            </main>
            <button class="btnUp"><img src="./assets/pico-logo-wim/flecheHaut.svg" alt="Retour haut de page"></button>
<?php
        $this->setBuffer(ob_get_clean());
        return $this;
    }

    //Message + bouton affichés à la place du contenu quand l'utilisateur n'est pas connecté
    private function displayInviteConnexion(string $message): void {
?>
                        <p><?= $this->e($message) ?></p>
                        <span class="boutonAccueil"><a href="/connexion" aria-label="Se connecter">Connexion</a></span>
<?php
    }

    //Carousel d'albums (amis / communauté) : une slide = 5 tuiles. $suffixe = 'Amis' ou 'Commu'
    private function displayCarousel(array $albums, string $suffixe): void {
        $slides = array_chunk(array_values($albums), self::NB_ALBUMS_PAR_SLIDE);
?>
                        <div class="carousel">
                            <button class="boutonGaucheArticle boutonGauche boutonGauche<?= $suffixe ?>" aria-label="Albums précédents"><?= self::SVG_GAUCHE ?></button>
                            <div class="carouselFenetreArticle carouselFenetre<?= $suffixe ?>">
                                <div class="carouselPisteArticle carouselPiste<?= $suffixe ?>">
<?php foreach ($slides as $slide): ?>
                                    <div class="carouselSlideArticle carouselSlide<?= $suffixe ?>">
                                        <div class="albumBoite">
<?php foreach ($slide as $i => $album): ?>
<?php $this->displayTuile($album, 'slideAlbum' . ($i + 1), true); ?>
<?php endforeach; ?>
                                        </div>
                                    </div>
<?php endforeach; ?>
                                </div>
                            </div>
                            <button class="boutonDroitArticle boutonDroit boutonDroit<?= $suffixe ?>" aria-label="Albums suivants"><?= self::SVG_DROITE ?></button>
                        </div>
<?php
    }

    //Tuile d'un album. $classePosition = monAlbumN ou slideAlbumN (utilisées par le CSS responsive)
    private function displayTuile(array $album, string $classePosition, bool $avecAvatar): void {
?>
                            <a class="tuileAlbum <?= $classePosition ?>" href="<?= $this->urlAlbum($album) ?>">
<?php if ($avecAvatar): ?>
                                <div class="avatarUtilisateur">
                                    <img src="<?= $this->e($album['avatar'] ?? '') ?>" alt="Avatar utilisateur">
                                </div>
<?php endif; ?>
                                <img class="imageTuile" src="<?= $this->e($album['image'] ?? '') ?>" alt="Photo Album">
                                <div class="textP">
                                    <p class="titreAlbum"><?= $this->e($album['titre'] ?? '') ?></p>
                                </div>
                            </a>
<?php
    }

    //Échappement HTML de toutes les données affichées (protection XSS)
    private function e(?string $value): string {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }

    //Lien vers un album : à adapter à ton routeur
    private function urlAlbum(array $album): string {
        return '/album?id=' . (int) ($album['id'] ?? 0);
    }
}