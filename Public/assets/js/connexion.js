// HEADER ET NAVIGATION (même logique que main.js)
// scroll
    // box-shadow
window.addEventListener('scroll', () => {
    const navBar = document.querySelector('header');
    if (window.scrollY > 0) {
        navBar.classList.add('scrolled');
    } else {
        navBar.classList.remove('scrolled');
    }
});
    // bouton haut de page
window.addEventListener('scroll', () => {
    const hautPage = document.querySelector('.btnUp');
    if (window.scrollY > 0) {
        hautPage.classList.add('visible');
    } else {
        hautPage.classList.remove('visible');
    }
});

const leBtn = document.querySelector('.btnUp');
leBtn.addEventListener('click', () => {
    window.scrollTo ({top: 0, behavior:'smooth'})
})

// Ouvrir et fermer le burger
const burger = document.querySelector('#logoBurger');
const btnBurger = document.querySelector('.navBarBurger');
const navBurger = document.querySelector('.navigationBurger');
const fermer = document.querySelector('#elFermer');

burger.addEventListener('click', () => {
    navBurger.classList.add('ouvert');
    btnBurger.setAttribute('aria-expanded', 'true');
});

fermer.addEventListener('click', () => {
    navBurger.classList.remove('ouvert');
    btnBurger.setAttribute('aria-expanded', 'false');
});

document.addEventListener('click', (leClick) => {
    if (!burger.contains(leClick.target) && !navBurger.contains (leClick.target)) {
        navBurger.classList.remove('ouvert');
        btnBurger.setAttribute('aria-expanded', 'false');
    }
})


// ONGLETS CONNEXION / INSCRIPTION
// On arrive directement sur l'inscription avec connexion.html#inscription
const lesOnglets = document.querySelectorAll('.ongletFormulaire');
const panneauConnexion = document.querySelector('#panneauConnexion');
const panneauInscription = document.querySelector('#panneauInscription');
const titrePage = document.querySelector('#titrePage');
const sousTitrePage = document.querySelector('#sousTitrePage');
const pageActuelle = document.querySelector('#pageActuelle');

const textesPage = {
    connexion: {
        titre: 'Content de vous revoir',
        sousTitre: 'Connectez-vous pour retrouver vos albums et ceux de vos amis.',
        ariane: 'Connexion',
        titreOnglet: 'Connexion - WIM'
    },
    inscription: {
        titre: 'Rejoignez World Is Mine',
        sousTitre: 'Créez votre compte pour créer, stocker et partager vos albums photo.',
        ariane: 'Inscription',
        titreOnglet: 'Inscription - WIM'
    }
};

function afficherFormulaire(mode) {
    const texte = textesPage[mode];

    panneauConnexion.hidden = (mode !== 'connexion');
    panneauInscription.hidden = (mode !== 'inscription');

    lesOnglets.forEach((onglet) => {
        const estActif = onglet.dataset.mode === mode;
        onglet.classList.toggle('actif', estActif);
        onglet.setAttribute('aria-selected', estActif);
        onglet.tabIndex = estActif ? 0 : -1;
    });

    titrePage.textContent = texte.titre;
    sousTitrePage.textContent = texte.sousTitre;
    pageActuelle.textContent = texte.ariane;
    pageActuelle.href = '#' + mode;
    document.title = texte.titreOnglet;
}

function modeDepuisUrl() {
    return window.location.hash === '#inscription' ? 'inscription' : 'connexion';
}

lesOnglets.forEach((onglet) => {
    onglet.addEventListener('click', () => {
        window.location.hash = onglet.dataset.mode;
    });

    // flèches gauche / droite pour passer d'un onglet à l'autre
    onglet.addEventListener('keydown', (laTouche) => {
        if (laTouche.key === 'ArrowRight' || laTouche.key === 'ArrowLeft') {
            const autreOnglet = Array.from(lesOnglets).find((quelOnglet) => quelOnglet !== onglet);
            window.location.hash = autreOnglet.dataset.mode;
            autreOnglet.focus();
        }
    });
});

window.addEventListener('hashchange', () => {
    afficherFormulaire(modeDepuisUrl());
});

document.addEventListener('DOMContentLoaded', () => {
    afficherFormulaire(modeDepuisUrl());
});


// AFFICHER / MASQUER LE MOT DE PASSE
const lesBtnMotDePasse = document.querySelectorAll('.btnMotDePasse');

lesBtnMotDePasse.forEach((quelBtn) => {
    quelBtn.addEventListener('click', () => {
        const champ = quelBtn.closest('.zoneSaisie').querySelector('input');
        const estCache = champ.type === 'password';

        champ.type = estCache ? 'text' : 'password';
        quelBtn.classList.toggle('actif', estCache);
        quelBtn.setAttribute('aria-pressed', estCache);
        quelBtn.setAttribute('aria-label', estCache ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
    });
});


// VALIDATION DES CHAMPS
// Chaque règle reçoit le champ et renvoie le message d'erreur ('' si le champ est correct)
const reglesChamps = {
    identifiantConnexion: (champ) => {
        if (champ.value.trim() === '') return 'Saisissez votre pseudo ou votre adresse e-mail.';
        return '';
    },
    motDePasseConnexion: (champ) => {
        if (champ.value === '') return 'Saisissez votre mot de passe.';
        return '';
    },
    pseudoInscription: (champ) => {
        const pseudo = champ.value.trim();
        if (pseudo === '') return 'Choisissez un pseudo.';
        if (!/^[\p{L}\d_.-]{3,20}$/u.test(pseudo)) return 'Le pseudo compte 3 à 20 caractères : lettres, chiffres, tiret, point ou underscore.';
        return '';
    },
    emailInscription: (champ) => {
        const email = champ.value.trim();
        if (email === '') return 'Saisissez votre adresse e-mail.';
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) return 'Saisissez une adresse e-mail valide, par exemple nom@exemple.fr.';
        return '';
    },
    motDePasseInscription: (champ) => {
        const motDePasse = champ.value;
        if (motDePasse === '') return 'Choisissez un mot de passe.';
        if (motDePasse.length < 8) return 'Le mot de passe est trop court : 8 caractères minimum.';
        if (!/\p{L}/u.test(motDePasse) || !/\d/.test(motDePasse)) return 'Ajoutez au moins une lettre et un chiffre.';
        return '';
    },
    confirmationInscription: (champ) => {
        if (champ.value === '') return 'Confirmez votre mot de passe.';
        if (champ.value !== document.querySelector('#motDePasseInscription').value) return 'Les deux mots de passe ne sont pas identiques.';
        return '';
    },
    cguInscription: (champ) => {
        if (!champ.checked) return 'Acceptez les CGU pour créer votre compte.';
        return '';
    }
};

function afficherErreur(champ, message) {
    const blocChamp = champ.closest('.champFormulaire');
    blocChamp.querySelector('.messageErreur').textContent = message;
    blocChamp.classList.toggle('invalide', message !== '');
    champ.setAttribute('aria-invalid', message !== '');
}

function validerChamp(champ) {
    const regle = reglesChamps[champ.id];
    if (!regle) return true;

    const message = regle(champ);
    afficherErreur(champ, message);
    return message === '';
}

// Valide tous les champs, met le curseur sur le premier champ en erreur
function validerFormulaire(formulaire) {
    let premierInvalide = null;

    formulaire.querySelectorAll('input').forEach((champ) => {
        if (!validerChamp(champ) && premierInvalide === null) {
            premierInvalide = champ;
        }
    });

    if (premierInvalide !== null) {
        premierInvalide.focus();
    }
    return premierInvalide === null;
}

function afficherMessage(formulaire, texte, type) {
    const leMessage = formulaire.querySelector('.messageFormulaire');
    leMessage.textContent = texte;
    leMessage.classList.remove('succes', 'echec');
    if (type) {
        leMessage.classList.add(type);
    }
}

document.querySelectorAll('.formulaire').forEach((formulaire) => {
    // Vérifie le champ quand on le quitte (seulement s'il est rempli)
    formulaire.addEventListener('focusout', (leFocus) => {
        const champ = leFocus.target;
        if (!champ.matches('input:not([type="checkbox"])') || champ.value === '') return;

        // on ne valide pas si on passe au bouton afficher / masquer du même champ
        const zone = champ.closest('.zoneSaisie');
        if (zone && zone.contains(leFocus.relatedTarget)) return;

        validerChamp(champ);
    });

    // Une fois un champ en erreur, on le revérifie à chaque saisie
    formulaire.addEventListener('input', (laSaisie) => {
        const champ = laSaisie.target;
        const blocChamp = champ.closest('.champFormulaire');

        if (blocChamp && blocChamp.classList.contains('invalide')) {
            validerChamp(champ);
        }

        // si le mot de passe change, la confirmation doit être revérifiée
        if (champ.id === 'motDePasseInscription') {
            const confirmation = document.querySelector('#confirmationInscription');
            if (confirmation.value !== '') {
                validerChamp(confirmation);
            }
        }

        afficherMessage(formulaire, '', null);
    });
});


// ENVOI DES FORMULAIRES
const formConnexion = document.querySelector('#formConnexion');
const formInscription = document.querySelector('#formInscription');

// Garde le texte d'origine du bouton pour le remettre après l'envoi
document.querySelectorAll('.btnFormulaire').forEach((quelBtn) => {
    quelBtn.dataset.texte = quelBtn.textContent;
});

function basculerEnvoi(formulaire, enCours) {
    const btnEnvoi = formulaire.querySelector('.btnFormulaire');
    btnEnvoi.disabled = enCours;
    btnEnvoi.textContent = enCours ? btnEnvoi.dataset.texteEncours : btnEnvoi.dataset.texte;
    formulaire.setAttribute('aria-busy', enCours);
}

// À REMPLACER : l'envoi au serveur est simulé ici, rien n'est vérifié.
// Le serveur doit répondre { ok: true } ou { ok: false, message: '...' }
// Exemple avec un vrai back-end :
// return fetch('./api/' + type, {
//     method: 'POST',
//     headers: { 'Content-Type': 'application/json' },
//     body: JSON.stringify(donnees)
// })
// .then(response => response.json());
function envoyerFormulaire(type, donnees) {
    return new Promise((resolve) => {
        setTimeout(() => resolve({ ok: true }), 600);
    });
}

// Même source de données que le carousel : dataUtilisateur.json
function pseudoDejaPris(pseudo) {
    return fetch('./dataUtilisateur.json')
    .then(response => response.json())
    .then(data => data.users.some((user) => (user.pseudo || '').toLowerCase() === pseudo.toLowerCase()))
    // fichier introuvable : on ne bloque pas, c'est le serveur qui tranchera
    .catch(() => false);
}

formConnexion.addEventListener('submit', (leSubmit) => {
    leSubmit.preventDefault();
    if (!validerFormulaire(formConnexion)) return;

    basculerEnvoi(formConnexion, true);

    envoyerFormulaire('connexion', {
        identifiant: document.querySelector('#identifiantConnexion').value.trim(),
        motDePasse: document.querySelector('#motDePasseConnexion').value,
        resterConnecte: document.querySelector('#resterConnecte').checked
    })
    .then((reponse) => {
        if (reponse.ok) {
            afficherMessage(formConnexion, 'Connexion réussie.', 'succes');
            // window.location.href = './index.html';
        } else {
            afficherMessage(formConnexion, reponse.message, 'echec');
        }
    })
    .catch(() => {
        afficherMessage(formConnexion, 'Le serveur ne répond pas. Réessayez dans un instant.', 'echec');
    })
    .finally(() => {
        basculerEnvoi(formConnexion, false);
    });
});

formInscription.addEventListener('submit', (leSubmit) => {
    leSubmit.preventDefault();
    if (!validerFormulaire(formInscription)) return;

    const champPseudo = document.querySelector('#pseudoInscription');
    basculerEnvoi(formInscription, true);

    pseudoDejaPris(champPseudo.value.trim())
    .then((estPris) => {
        if (estPris) {
            afficherErreur(champPseudo, 'Ce pseudo est déjà utilisé, choisissez-en un autre.');
            champPseudo.focus();
            return;
        }

        return envoyerFormulaire('inscription', {
            pseudo: champPseudo.value.trim(),
            email: document.querySelector('#emailInscription').value.trim(),
            motDePasse: document.querySelector('#motDePasseInscription').value
        })
        .then((reponse) => {
            if (reponse.ok) {
                formInscription.reset();
                afficherMessage(formInscription, 'Compte créé. Vous pouvez maintenant vous connecter.', 'succes');
                // window.location.hash = 'connexion';
            } else {
                afficherMessage(formInscription, reponse.message, 'echec');
            }
        });
    })
    .catch(() => {
        afficherMessage(formInscription, 'Le serveur ne répond pas. Réessayez dans un instant.', 'echec');
    })
    .finally(() => {
        basculerEnvoi(formInscription, false);
    });
});
