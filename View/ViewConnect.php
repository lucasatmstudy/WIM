<?php namespace View;

use View\View;

class ViewConnect extends View {
    //ATTRIBUT
    private string $message = "";

    //CONSTRUCTOR


    //GETTER ET SETTER
    public function setMessage(string $newMessage): self{
        $this->message = $newMessage;
        return $this;
    }

    //METHODS
    public function launchBuffer():self {
        ob_start();
?>
            <main>
                <nav class="navAriane" aria-label="fil d'ariane">
                    <ol class="ariane">
                        <li><a href="./index.html">Accueil</a></li>
                        <li><p>&nbsp;&#10095;&nbsp;</p></li>
                        <li><a id="pageActuelle" href="/connexion">Connexion</a></li>
                    </ol>
                </nav>
                <section class="titreConnexion">
                    <h1>Content de vous revoir</h1>
                    <p>Connectez-vous pour retrouver vos albums et ceux de vos amis.</p>
                </section>
                <section class="connexionInscription">
                    <div class="formulaireFond fond fondBlanc">
                        <form class="formulaire" action="" method="post">
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="identifiantConnexion">E-mail</label>
                                <input class="elSaisie" id="identifiantConnexion" name="identifiantConnexion" type="email" placeholder="Saisissez votre email ici">
                            </div>
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="passwordConnexion">Mot de passe</label>
                                <input class="elSaisie" id="passwordConnexion" name="mpasswordConnexion" type="password" placeholder="Saisissez votre mot de passe ici">
                            </div>
                            <button class="btnFormulaire" type="submit" id="btn">Se connecter</button>
                        </form>
                        <p><?php echo $this->message ?></p>
                    </div>
                </section>
                <section>
                    <p>Pas encore de compte ? Créer en un.</p>
                    <div class="formulaireFond fond fondBlanc">
                        <form class="formulaire" action="" method="post">
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="emailInscription">E-mail</label>
                                <input class="elSaisie" id="emailInscription" name="emailInscription" type="email" placeholder="Saisissez votre email ici">
                            </div>
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="pseudoInscription">Pseudo</label>
                                <input class="elSaisie" id="pseudoInscription" name="pseudoInscription" type="text" placeholder="Choisisez un pseudo ici">
                            </div>
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="passwordInscription">Mot de passe</label>
                                <input class="elSaisie" id="passwordInscription" name="passwordInscription" type="password" placeholder="Saisissez votre mot de passe ici" >
                            </div>
                            <div class="champFormulaire">
                                <label class="labelFormulaire" for="confirmationPasswordInscription">Vérifiez votre mot de passe</label>
                                <input class="elSaisie" id="confirmationPasswordInscription" name="confirmationPasswordInscription" type="password" placeholder="Confirmez votre mot de passe ici">
                            </div>
                            <button class="btnFormulaire" type="submit" id="btn">S'inscrire</button>
                        </form>
                        <p><?php echo $this->message ?></p>
                    </div>
                </section>
            </main>
<?php
        $this->buffer = ob_get_clean();
        return $this;
    }
    
    public function display(): void {
        echo $this->buffer;
    }
}