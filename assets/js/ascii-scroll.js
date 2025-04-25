// ascii-scroll.js

document.addEventListener('DOMContentLoaded', () => {
    // only on mobile
    if (!window.matchMedia('(max-width: 768px)').matches) return;
  
    const container = document.querySelector('#divider-three .ascii-scroll-container');
    const art       = container?.querySelector('.ascii-art');
    if (!container || !art) return;
  
    const speed = 2;    // px per tick
    const delay = 30;   // ms between ticks
    const pause = 1500; // ms to hold at end
    let interval;
  
    function step() {
      // advance scroll by speed
      container.scrollLeft += speed;
  
      // when the visible right edge meets or exceeds content width, pause & reset
      if (container.scrollLeft + container.clientWidth >= art.scrollWidth) {
        clearInterval(interval);
        setTimeout(() => {
          container.scrollLeft = 0;
          interval = setInterval(step, delay);
        }, pause);
      }
    }
  
    // kick off after a brief startup delay
    setTimeout(() => {
      interval = setInterval(step, delay);
      console.log('⏩ ascii auto-scroll started');
    }, 800);
  });