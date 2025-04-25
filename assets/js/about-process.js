document.addEventListener('DOMContentLoaded', () => {
    const processTrack = document.querySelector('.about-process-track');
    if (!processTrack) return;
  
    const nodes = processTrack.querySelectorAll('.about-node');
  
    nodes.forEach((node) => {
      node.addEventListener('click', () => {
        nodes.forEach((n) => {
          if (n !== node) n.classList.remove('active');
        });
        node.classList.toggle('active');
      });
    });
  });