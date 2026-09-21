// Pour voir les éléments qui depassent
document.querySelectorAll('*').forEach(el => {
    if (el.offsetWidth > document.documentElement.offsetWidth) {
        console.log(el);
    }
});

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
const navBurger = document.querySelector('.navigationBurger');
const fermer = document.querySelector('#elFermer');

burger.addEventListener('click', () => {
    navBurger.classList.add('ouvert');
});

fermer.addEventListener('click', () => {
    navBurger.classList.remove('ouvert');
});

document.addEventListener('click', (leClick) => {
    if (!burger.contains(leClick.target) && !navBurger.contains (leClick.target)) {
        navBurger.classList.remove('ouvert');
    }       
})

// CAROUSEL UNE
// Pour avoir les bonnes infos des le début
// fetch('./dataUtilisateur.json')
// .then(response => response.json())
// .then(data => {

// const ImageIndexStart = document.querySelector('.imgPrincipale');
// let src = ImageIndexStart.src;

// let pseudoTrouveStart = '';
// let profilePictureTrouveStart = '';
// let titreTrouveStart = '';

// data.users.forEach(user => {
//     user.albums.forEach(album => {
//         album.photos.forEach(photo => {
//             if (src.includes(photo.url)) {
//                 pseudoTrouveStart = user.pseudo;
//                 profilePictureTrouveStart = user.profile_picture;
//                 titreTrouveStart = album.title;
//             }
//         });
//     });
// });
// document.querySelector('.nomUtilisateurUne').textContent = pseudoTrouveStart;
// document.querySelector('.avatarUtilisateurUne').src = profilePictureTrouveStart;
// document.querySelector('.titreAlbumUne').textContent = titreTrouveStart
// });


const laPisteUne = document.querySelector('.carouselPisteUne');
const lesSlideUne = document.querySelectorAll('.carouselSlideUne');
const btnGaucheUne = document.querySelector('.boutonGaucheUne');
const btnDroitUne = document.querySelector('.boutonDroitUne');
const lesPointsUne = document.querySelectorAll('.point');

let indexActuelUne = 0;
const totalSlideUne = lesSlideUne.length;

function rotationPhotoUne(indexSlide) {
    laPisteUne.style.transform = `translateX(-${indexSlide * 100}%)`;
    lesPointsUne.forEach((quelPoint, quelIndex) => {
        if (quelIndex === indexSlide) {
            quelPoint.classList.add('actif');
        }
        else {
            quelPoint.classList.remove('actif');
        }
    })

    fetch('./dataUtilisateur.json')
    .then(response => response.json())
    .then(data => {

    const ImageIndex = document.querySelectorAll('.imgPrincipale');
    let src = ImageIndex[indexActuelUne].src;

    let pseudoTrouve = '';
    let profilePictureTrouve = '';
    let titreTrouve = '';

    data.users.forEach(user => {
        user.albums.forEach(album => {
            album.photos.forEach(photo => {
                if (src.includes(photo.url)) {
                    pseudoTrouve = user.pseudo;
                    profilePictureTrouve = user.profile_picture;
                    titreTrouve = album.title;
                }
            });
        });
    });
    document.querySelector('.nomUtilisateurUne').textContent = pseudoTrouve;
    document.querySelector('.avatarUtilisateurUne').src = profilePictureTrouve;
    document.querySelector('.titreAlbumUne').textContent = titreTrouve;
    });
    return indexActuelUne = indexSlide;
}

document.addEventListener('DOMContentLoaded', () => {
    rotationPhotoUne(indexActuelUne);
});

btnDroitUne.addEventListener('click', () => {
    rotationPhotoUne((indexActuelUne + 1) % totalSlideUne);
});

btnGaucheUne.addEventListener('click', () => {
    rotationPhotoUne((indexActuelUne - 1 + totalSlideUne) % totalSlideUne);
});

lesPointsUne.forEach((quelPoint, toto) => {
    quelPoint.addEventListener('click', () => rotationPhotoUne(toto));
});



// CAROUSEL AMIS
const laPisteAmis = document.querySelector('.carouselPisteAmis');
const lesSlideAmis = document.querySelectorAll('.carouselSlideAmis');
const btnGaucheAmis = document.querySelector('.boutonGaucheAmis');
const btnDroitAmis = document.querySelector('.boutonDroitAmis');

let indexActuelAmis = 0;
const totalSlideAmis = lesSlideAmis.length;

function rotationPhotoAmis(indexSlide) {
    laPisteAmis.style.transform = `translateX(-${indexSlide * 100}%)`;
    return indexActuelAmis = indexSlide;
}

console.log(indexActuelAmis);
console.log(totalSlideAmis)

btnDroitAmis.addEventListener('click', () => {
    rotationPhotoAmis((indexActuelAmis + 1) % totalSlideAmis);
});

btnGaucheAmis.addEventListener('click', () => {
    rotationPhotoAmis((indexActuelAmis - 1 + totalSlideAmis) % totalSlideAmis);
});

// CAROUSEL COMMU
const laPisteCommu = document.querySelector('.carouselPisteCommu');
const lesSlideCommu = document.querySelectorAll('.carouselSlideCommu');
const btnGaucheCommu = document.querySelector('.boutonGaucheCommu');
const btnDroitCommu = document.querySelector('.boutonDroitCommu');

let indexActuelCommu = 0;
const totalSlideCommu = lesSlideCommu.length;

function rotationPhotoCommu(indexSlide) {
    laPisteCommu.style.transform = `translateX(-${indexSlide * 100}%)`;
    return indexActuelCommu = indexSlide;
}

console.log(indexActuelCommu);
console.log(totalSlideCommu)

btnDroitCommu.addEventListener('click', () => {
    rotationPhotoCommu((indexActuelCommu + 1) % totalSlideCommu);
});

btnGaucheCommu.addEventListener('click', () => {
    rotationPhotoCommu((indexActuelCommu - 1 + totalSlideCommu) % totalSlideCommu);
});

// RESPONSIVE
const articleAmis = document.querySelector('.amisAlbumsTitre h2');
const articleCommu = document.querySelector('.commuAlbumsTitre h2');

window.addEventListener('resize', () => {
    const ecran = window.innerWidth;
    if (ecran <= 769) {
    articleAmis.innerText = 'Albums amis';
    articleCommu.innerText = 'Albums publics';
    }
    else {
    articleAmis.innerText = 'Les albums de mes amis';
    articleCommu.innerText = 'Inspiré par la communauté';
    }
});
