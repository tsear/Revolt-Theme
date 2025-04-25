document.addEventListener('DOMContentLoaded', () => {
    const techTrack = document.querySelector('.tech-spec-track');
    if (!techTrack) return;
  
    const nodes = techTrack.querySelectorAll('.about-node');
  
    nodes.forEach((node) => {
      node.addEventListener('click', () => {
        nodes.forEach((n) => {
          if (n !== node) n.classList.remove('active');
        });
        node.classList.toggle('active');
      });
    });
  });