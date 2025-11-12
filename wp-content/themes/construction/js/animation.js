function isPartiallyVisible(element) {
  const rect = element.getBoundingClientRect();
  const windowHeight = window.innerHeight || document.documentElement.clientHeight;
  const windowWidth = window.innerWidth || document.documentElement.clientWidth;

  return (
    rect.top < windowHeight &&
    rect.bottom > 0 &&
    rect.left < windowWidth &&
    rect.right > 0
  );
}

function handleScrollAnimation() {
  const processItems = document.querySelectorAll('.process-item');

  processItems.forEach(function (item) {
    if (isPartiallyVisible(item) && !item.classList.contains('animate-in')) {
      item.classList.add('animate-in');
    }
  });
}

let ticking = false;
window.addEventListener('scroll', function () {
  if (!ticking) {
    window.requestAnimationFrame(function () {
      handleScrollAnimation();
      ticking = false;
    });
    ticking = true;
  }
});

document.addEventListener('DOMContentLoaded', function () {
  handleScrollAnimation();
});

window.addEventListener('load', function () {
  handleScrollAnimation();
});

