let isPlaying = false;

document.getElementById('trigger').addEventListener('click', () => {
  const audio = document.getElementById('ritual-audio');
  const glyph = document.getElementById('glyph');

  if (isPlaying) return;

  isPlaying = true;
  audio.play();
  glyph.classList.remove('hidden');
  glyph.classList.add('visible');

  audio.onended = () => {
    glyph.classList.remove('visible');
    glyph.classList.add('hidden');
    isPlaying = false;
  };
});

const incantation = document.getElementById('incantation');

audio.play();
glyph.classList.remove('hidden');
glyph.classList.add('visible');
incantation.classList.remove('hidden');
incantation.classList.add('visible');

fetch('log_rituel.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
  body: 'nom=Nada Nada&etat=activé'
});

audio.onended = () => {
  glyph.classList.remove('visible');
  glyph.classList.add('hidden');
  incantation.classList.remove('visible');
  incantation.classList.add('hidden');
  isPlaying = false;
};
