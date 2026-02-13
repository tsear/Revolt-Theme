/**
 * Blog Filters — Mobile toggle & UX enhancements
 * Handles: mobile filter panel, smooth scroll on filter change
 */
(function () {
  'use strict';

  // --- Mobile Filter Toggle ---
  const toggle = document.getElementById('blogMobileFilterToggle');
  const panel  = document.getElementById('blogMobileFilterPanel');

  if (toggle && panel) {
    toggle.addEventListener('click', function () {
      panel.classList.toggle('is-open');
      const isOpen = panel.classList.contains('is-open');
      toggle.setAttribute('aria-expanded', isOpen);
    });
  }

  // --- Smooth scroll to results after filter ---
  // If URL has filter params, scroll past the hero
  const params = new URLSearchParams(window.location.search);
  const hasFilters = params.has('blog_category') || params.has('blog_tag') || params.has('blog_search');

  if (hasFilters) {
    const blogContent = document.querySelector('.blog-content');
    if (blogContent) {
      // Small delay to let the page render
      setTimeout(function () {
        blogContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 100);
    }
  }

  // --- Active filter remove buttons (for <a> tags styled as buttons) ---
  document.querySelectorAll('.active-filter__remove').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      // The <a> tag handles navigation; add a brief visual feedback
      const tag = btn.closest('.active-filter__tag');
      if (tag) {
        tag.style.opacity = '0.5';
        tag.style.transform = 'scale(0.95)';
      }
    });
  });

})();
