document.addEventListener('DOMContentLoaded', () => {
  const nodes = document.querySelectorAll('.contact-node');

  nodes.forEach((node) => {
    node.addEventListener('click', (e) => {
      // Don't collapse when clicking form fields or inside node-form
      if (e.target.closest('.node-form')) return;

      const isActive = node.classList.contains('active');

      nodes.forEach((n) => n.classList.remove('active'));

      if (!isActive) {
        node.classList.add('active');
        node.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
  });
});