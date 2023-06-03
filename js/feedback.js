const stars = document.querySelectorAll('.star-row i');
const emojiContainer = document.getElementById('face');
let currentEmoji = null;
let canBeChanged = true;
let rating=0;

stars.forEach((star, index) => {
  star.addEventListener('mouseenter', () => {
    if (canBeChanged && !star.classList.contains('selected')) {
      for (let i = 0; i <= index; i++) {
        stars[i].style.color = 'gold';
      }

      if (currentEmoji !== null) {
        emojiContainer.removeChild(currentEmoji);
      }

      const emoji = document.createElement('i');
      if (index === 4) {
        emoji.classList.add('fa-solid', getEmojiClass(index), 'fa-2xl', 'fa-bounce');
      } else {
        emoji.classList.add('fa-solid', getEmojiClass(index), 'fa-2xl');
      }
      emoji.style.color = '#ffb900';
      emojiContainer.appendChild(emoji);
      currentEmoji = emoji;
    }
  });

  star.addEventListener('mouseleave', () => {
    if (canBeChanged && !star.classList.contains('selected') && currentEmoji !== null) {
      for (let i = 0; i <= index; i++) {
        stars[i].style.color = '#3e3e3e';
      }
    }
  });

  star.addEventListener('click', () => {
    if (canBeChanged) {
      star.classList.toggle('selected');
      canBeChanged = false;
      rating = star.classList.contains('selected') ? index + 1 : 0;
      console.log('Rating:', rating);
    }
  });
});

function getEmojiClass(index) {
  switch (index) {
    case 0:
      return 'fa-face-sad-tear';
    case 1:
      return 'fa-face-frown';
    case 2:
      return 'fa-face-meh';
    case 3:
      return 'fa-face-smile';
    case 4:
      return 'fa-face-laugh-squint';
    default:
      return '';
  }
}
