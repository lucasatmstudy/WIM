<?php namespace View;

use View;

class ViewFooter {
    //ATTRIBUTS
    private ?string $buffer = "";
    //CONSTRUCTOR

    //GETTER ET SETTER

    //METHOD
    public function launchBuffer():self {
        ob_start();
?>
            <footer>
                <div class="planDuSite">
                    <h3>Plan du site</h3>
                    <nav aria-label="Plan du site">
                        <ul class="planDuSiteFooter">
                            <li><a class="footerBar" href="/index.html">Accueil</a></li>
                            <li><a class="footerBar" href="A definir">Créer</a></li>
                            <li><a class="footerBar" href="A definir">Albums</a></li>
                            <li><a class="footerBar" href="A definir">Amis</a></li>
                            <li><a class="footerBar" href="A definir">Explorer</a></li>
                            <li><a class="footerBar" href="A definir">Compte</a></li>
                        </ul>
                    </nav>
                    </div>
                    <div class="reseauCopyright">
                        <div class="reseau">
                            <a href="A definir"><img src="./assets/pico-logo-wim/X.svg" alt="logo X"></img></a>
                            <a href="A definir"><img src="./assets/pico-logo-wim/facebook.svg" alt="logo Facebook"></img></a>
                            <a href="A definir"><img src="./assets/pico-logo-wim/instagram.svg" alt="logo Instagram"></img></a>
                        </div>
                        <div class="copyright">
                            <p>Version 0.0.0</p>
                            <p>Copyright 2026 World Is Mine</p>
                        </div>
                    </div>
                    <div class="contactCGU">
                        <nav aria-label="navigation Nous contacter Mention légales CGU RGPD">
                            <ul class="contactCGUFooter">
                                <li><a class="footerBar" href="/index.html">Nous contacter</a></li>
                                <li><a class="footerBar" href="A definir">Mention légales</a></li>
                                <li><a class="footerBar" href="A definir">CGU</a></li>
                                <li><a class="footerBar" href="A definir">RGPD</a></li>
                            </ul>
                    </nav>
                    </div>
                </footer>
            </body>
            </html>
<?php
        $this->buffer = ob_get_clean();
        return $this;
    }
    
    public function display(): void {
        echo $this->buffer;
    }
}