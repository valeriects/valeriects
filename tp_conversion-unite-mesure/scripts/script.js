// les boutons du header
const MASSE = document.querySelector('.navMasse');
const VOLUME = document.querySelector('.navVolume');
const DISTANCE = document.querySelector('.navDistance');
const TEMP = document.querySelector('.navTemp');

// les sections à cacher et rendre visible
const SECTIONMASSE = document.querySelector('#masse');
const SECTIONVOLUME = document.querySelector('#volume');
const SECTIONDISTANCE = document.querySelector('#distance');
const SECTIONTEMP = document.querySelector('#temperature');

const GRDSECTION = document.querySelector('#mesure');

GRDSECTION.style.visibility = 'hidden';

// au clic sur chaque bouton, cela rend visible sa section associée
MASSE.addEventListener('click', () => {
    // distance();
    SECTIONMASSE.classList.toggle('hidden');
    SECTIONVOLUME.classList.add('hidden');
    SECTIONDISTANCE.classList.add('hidden');
    SECTIONTEMP.classList.add('hidden');
    GRDSECTION.style.visibility = 'visible';
})

VOLUME.addEventListener('click', () => {
    // distance();
    SECTIONVOLUME.classList.toggle('hidden');
     SECTIONDISTANCE.classList.add('hidden');
    SECTIONTEMP.classList.add('hidden');
    SECTIONMASSE.classList.add('hidden');
    GRDSECTION.style.visibility = 'visible';
})

DISTANCE.addEventListener('click', () => {
    // distance();
    SECTIONDISTANCE.classList.toggle('hidden');
    SECTIONTEMP.classList.add('hidden');
    SECTIONMASSE.classList.add('hidden');
    SECTIONVOLUME.classList.add('hidden');
    GRDSECTION.style.visibility = 'visible';
})

TEMP.addEventListener('click', () => {
    // distance();
    SECTIONTEMP.classList.toggle('hidden');
    SECTIONMASSE.classList.add('hidden');
    SECTIONVOLUME.classList.add('hidden');
    SECTIONDISTANCE.classList.add('hidden');
    GRDSECTION.style.visibility = 'visible';
})