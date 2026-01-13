/**
 * Solution Builder - Multi-step configurator
 * Visual feedback, organized hierarchy, contextual recommendations
 */

document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('solution-builder-modal');
  if (!modal) return;

  // ===== MODAL OPEN/CLOSE =====
  document.querySelectorAll('[data-modal-target="solution-builder-modal"]').forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      openModal();
    });
  });

  modal.querySelectorAll('[data-modal-hide="solution-builder-modal"]').forEach(trigger => {
    trigger.addEventListener('click', closeModal);
  });

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !modal.classList.contains('tw-hidden')) closeModal();
  });

  function openModal() {
    modal.classList.remove('tw-hidden');
    modal.classList.add('tw-flex');
    document.body.style.overflow = 'hidden';
    resetModal();
  }

  function closeModal() {
    modal.classList.add('tw-hidden');
    modal.classList.remove('tw-flex');
    document.body.style.overflow = '';
  }

  // ===== STATE & CONFIG =====
  let currentStep = 1;
  const totalSteps = 4;

  const pricing = {
    base: { landing: 800, simple: 1500, wordpress: 2500, ecommerce: 4000 },
    features: { forms: 150, blog: 300, newsletter: 100, gallery: 250, booking: 350, membership: 500, crm: 300, 'analytics-setup': 150, chat: 100 },
    services: { hosting: 29, maintenance: 99, seo: 199, content: 149, social: 299, support: 149 }
  };

  const displayInfo = {
    base: {
      landing: { icon: '🚀', name: 'Landing Page' },
      simple: { icon: '📄', name: 'Simple Site' },
      wordpress: { icon: '🌐', name: 'Full Website' },
      ecommerce: { icon: '🛒', name: 'E-commerce' }
    }
  };

  const recommendations = {
    landing: { features: ['forms', 'newsletter', 'analytics-setup'], services: ['hosting', 'seo'] },
    simple: { features: ['forms', 'blog', 'newsletter'], services: ['hosting', 'maintenance', 'seo'] },
    wordpress: { features: ['forms', 'blog', 'gallery', 'analytics-setup'], services: ['hosting', 'maintenance', 'seo'] },
    ecommerce: { features: ['forms', 'newsletter', 'analytics-setup', 'chat'], services: ['hosting', 'maintenance', 'seo', 'support'] }
  };

  // ===== ELEMENTS =====
  const steps = modal.querySelectorAll('.step-content');
  const dots = [1, 2, 3, 4].map(n => modal.querySelector(`#dot-${n}`));
  const lines = [1, 2, 3].map(n => modal.querySelector(`#line-${n}`));
  const btnNext = modal.querySelector('#btn-next');
  const btnBack = modal.querySelector('#btn-back');
  // Skip button removed
  const btnSubmit = modal.querySelector('#btn-submit');
  const successMessage = modal.querySelector('#success-message');
  const form = modal.querySelector('#solution-builder-form');

  // ===== EVENT LISTENERS =====
  btnNext.addEventListener('click', () => { if (currentStep < totalSteps) { currentStep++; updateUI(); } });
  btnBack.addEventListener('click', () => { if (currentStep > 1) { currentStep--; updateUI(); } });
  // Skip button removed - users must complete each step
  btnSubmit.addEventListener('click', handleSubmit);

  // Step 1: Handle base type selection visuals
  function updateBaseVisuals() {
    modal.querySelectorAll('.base-option').forEach(label => {
      const input = label.querySelector('input');
      const card = label.querySelector('div');
      const checkmark = card.querySelector('span:first-child');
      
      if (input.checked) {
        card.classList.remove('tw-border-gray-200');
        card.classList.add('tw-border-revolt-yellow', 'tw-bg-yellow-50');
        checkmark.style.display = 'flex';
      } else {
        card.classList.add('tw-border-gray-200');
        card.classList.remove('tw-border-revolt-yellow', 'tw-bg-yellow-50');
        checkmark.style.display = 'none';
      }
    });
  }

  modal.querySelectorAll('input[name="base_type"]').forEach(input => {
    input.addEventListener('change', () => {
      updateBaseVisuals();
      renderFeatureCards();
      renderServiceCards();
    });
  });

  // Initial visual state for Step 1
  updateBaseVisuals();

  // ===== CARD RENDERING =====
  function createOptionCard(input, isRecommended, isAvailable, type) {
    const icon = input.dataset.icon;
    const label = input.dataset.label;
    const value = input.value;
    const isChecked = input.checked;

    const card = document.createElement('div');
    card.className = `option-card tw-cursor-pointer ${!isAvailable ? 'tw-pointer-events-none' : ''}`;
    card.dataset.value = value;

    // Build classes based on state
    const borderClass = isChecked ? 'tw-border-revolt-yellow' : 'tw-border-gray-200 hover:tw-border-gray-300';
    const bgClass = isChecked ? 'tw-bg-yellow-50' : '';
    const opacityClass = !isAvailable ? 'tw-opacity-40' : '';

    card.innerHTML = `
      <div class="tw-relative tw-flex tw-flex-col tw-items-center tw-p-4 tw-border-2 tw-rounded-lg tw-transition-all ${borderClass} ${bgClass} ${opacityClass}">
        <span class="check-mark tw-absolute tw-top-2 tw-right-2 tw-w-5 tw-h-5 tw-bg-revolt-yellow tw-rounded-full tw-items-center tw-justify-center tw-text-xs tw-font-bold" style="display: ${isChecked ? 'flex' : 'none'}">✓</span>
        <span class="rec-badge tw-absolute tw--top-2 tw--right-2 tw-bg-revolt-yellow tw-text-black tw-text-[10px] tw-px-2 tw-py-0.5 tw-rounded-full tw-font-bold" style="display: ${isRecommended && isAvailable && !isChecked ? 'block' : 'none'}">★</span>
        <span class="tw-text-3xl tw-mb-2">${icon}</span>
        <span class="tw-font-medium tw-text-sm tw-text-black">${label}</span>
      </div>
    `;

    card.addEventListener('click', () => {
      if (!isAvailable) return;
      input.checked = !input.checked;
      // Re-render to update visuals
      if (type === 'features') renderFeatureCards();
      else renderServiceCards();
    });

    return card;
  }

  function renderFeatureCards() {
    const baseType = modal.querySelector('input[name="base_type"]:checked')?.value || 'wordpress';
    const recs = recommendations[baseType].features;
    const inputs = modal.querySelectorAll('#feature-inputs input');

    const recommendedGrid = modal.querySelector('#features-recommended-grid');
    const availableGrid = modal.querySelector('#features-available-grid');
    const unavailableGrid = modal.querySelector('#features-unavailable-grid');
    const unavailableSection = modal.querySelector('#features-unavailable');

    recommendedGrid.innerHTML = '';
    availableGrid.innerHTML = '';
    unavailableGrid.innerHTML = '';

    let hasRecommended = false;
    let hasAvailable = false;
    let hasUnavailable = false;

    inputs.forEach(input => {
      const available = input.dataset.available?.split(',') || [];
      const isAvailable = available.includes(baseType);
      const isRecommended = recs.includes(input.value);
      const card = createOptionCard(input, isRecommended, isAvailable, 'features');

      if (!isAvailable) {
        unavailableGrid.appendChild(card);
        hasUnavailable = true;
      } else if (isRecommended) {
        recommendedGrid.appendChild(card);
        hasRecommended = true;
      } else {
        availableGrid.appendChild(card);
        hasAvailable = true;
      }
    });

    modal.querySelector('#features-recommended').classList.toggle('tw-hidden', !hasRecommended);
    modal.querySelector('#features-available').classList.toggle('tw-hidden', !hasAvailable);
    unavailableSection.classList.toggle('tw-hidden', !hasUnavailable);
  }

  function renderServiceCards() {
    const baseType = modal.querySelector('input[name="base_type"]:checked')?.value || 'wordpress';
    const recs = recommendations[baseType].services;
    const inputs = modal.querySelectorAll('#service-inputs input');

    const recommendedGrid = modal.querySelector('#services-recommended-grid');
    const availableGrid = modal.querySelector('#services-available-grid');
    const unavailableGrid = modal.querySelector('#services-unavailable-grid');
    const unavailableSection = modal.querySelector('#services-unavailable');

    recommendedGrid.innerHTML = '';
    availableGrid.innerHTML = '';
    unavailableGrid.innerHTML = '';

    let hasRecommended = false;
    let hasAvailable = false;
    let hasUnavailable = false;

    inputs.forEach(input => {
      const available = input.dataset.available?.split(',') || [];
      const isAvailable = available.includes(baseType);
      const isRecommended = recs.includes(input.value);
      const card = createOptionCard(input, isRecommended, isAvailable, 'services');

      if (!isAvailable) {
        unavailableGrid.appendChild(card);
        hasUnavailable = true;
      } else if (isRecommended) {
        recommendedGrid.appendChild(card);
        hasRecommended = true;
      } else {
        availableGrid.appendChild(card);
        hasAvailable = true;
      }
    });

    modal.querySelector('#services-recommended').classList.toggle('tw-hidden', !hasRecommended);
    modal.querySelector('#services-available').classList.toggle('tw-hidden', !hasAvailable);
    unavailableSection.classList.toggle('tw-hidden', !hasUnavailable);
  }

  // ===== FUNCTIONS =====
  function resetModal() {
    currentStep = 1;
    modal.querySelectorAll('input[type="radio"]').forEach(input => {
      input.checked = input.value === 'wordpress';
    });
    modal.querySelectorAll('#feature-inputs input, #service-inputs input').forEach(input => {
      input.checked = false;
    });
    successMessage.classList.add('tw-hidden');
    form.reset();
    renderFeatureCards();
    renderServiceCards();
    updateUI();
  }

  function updateUI() {
    steps.forEach((step, i) => {
      step.classList.toggle('tw-hidden', i + 1 !== currentStep);
      step.classList.toggle('tw-block', i + 1 === currentStep);
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle('tw-bg-revolt-yellow', i + 1 <= currentStep);
      dot.classList.toggle('tw-bg-gray-300', i + 1 > currentStep);
    });

    lines.forEach((line, i) => {
      line.classList.toggle('tw-bg-revolt-yellow', i + 1 < currentStep);
      line.classList.toggle('tw-bg-gray-300', i + 1 >= currentStep);
    });

    btnBack.classList.toggle('tw-hidden', currentStep === 1);
    btnNext.classList.toggle('tw-hidden', currentStep === totalSteps);
    btnSubmit.classList.toggle('tw-hidden', currentStep !== totalSteps);

    if (currentStep === 2) renderFeatureCards();
    if (currentStep === 3) renderServiceCards();
    if (currentStep === 4) updateSummary();
  }

  function buildConfiguration() {
    const base = modal.querySelector('input[name="base_type"]:checked')?.value || 'wordpress';
    const features = Array.from(modal.querySelectorAll('#feature-inputs input:checked')).map(i => i.value);
    const services = Array.from(modal.querySelectorAll('#service-inputs input:checked')).map(i => i.value);
    return { base, features, services };
  }

  function calculatePricing() {
    const config = buildConfiguration();
    const basePrice = pricing.base[config.base] || 0;
    const featuresTotal = config.features.reduce((sum, f) => sum + (pricing.features[f] || 0), 0);
    const monthlyTotal = config.services.reduce((sum, s) => sum + (pricing.services[s] || 0), 0);
    return { basePrice, featuresTotal, monthlyTotal, total: basePrice + featuresTotal };
  }

  function updateSummary() {
    const config = buildConfiguration();
    const prices = calculatePricing();
    const baseInfo = displayInfo.base[config.base];

    modal.querySelector('#summary-base-icon').textContent = baseInfo.icon;
    modal.querySelector('#summary-base-name').textContent = baseInfo.name;

    const featuresContainer = modal.querySelector('#summary-features');
    const featureInputs = modal.querySelectorAll('#feature-inputs input');
    const featureMap = {};
    featureInputs.forEach(i => featureMap[i.value] = { icon: i.dataset.icon, label: i.dataset.label });

    featuresContainer.innerHTML = config.features.length > 0
      ? config.features.map(f => `<span class="tw-inline-flex tw-items-center tw-gap-1 tw-px-3 tw-py-1 tw-bg-white tw-border tw-border-gray-200 tw-rounded-full tw-text-xs"><span>${featureMap[f]?.icon}</span> ${featureMap[f]?.label}</span>`).join('')
      : '<span class="tw-text-xs tw-text-gray-400">No extra features</span>';

    const servicesContainer = modal.querySelector('#summary-services');
    const serviceInputs = modal.querySelectorAll('#service-inputs input');
    const serviceMap = {};
    serviceInputs.forEach(i => serviceMap[i.value] = { icon: i.dataset.icon, label: i.dataset.label });

    servicesContainer.innerHTML = config.services.length > 0
      ? config.services.map(s => `<span class="tw-inline-flex tw-items-center tw-gap-1 tw-px-3 tw-py-1 tw-bg-revolt-yellow/20 tw-border tw-border-revolt-yellow tw-rounded-full tw-text-xs"><span>${serviceMap[s]?.icon}</span> ${serviceMap[s]?.label}</span>`).join('')
      : '<span class="tw-text-xs tw-text-gray-400">No monthly services</span>';

    modal.querySelector('#price-total').textContent = `$${prices.total.toLocaleString()}`;

    const monthlyRow = modal.querySelector('#monthly-row');
    if (prices.monthlyTotal > 0) {
      monthlyRow.classList.remove('tw-hidden');
      monthlyRow.classList.add('tw-flex');
      modal.querySelector('#price-monthly').textContent = `$${prices.monthlyTotal}/mo`;
    } else {
      monthlyRow.classList.add('tw-hidden');
    }
  }

  async function handleSubmit() {
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');

    if (!nameInput.value.trim() || !emailInput.value.trim()) {
      nameInput.reportValidity();
      emailInput.reportValidity();
      return;
    }

    const config = buildConfiguration();
    const prices = calculatePricing();
    const baseInfo = displayInfo.base[config.base];

    const featureInputs = modal.querySelectorAll('#feature-inputs input');
    const featureMap = {};
    featureInputs.forEach(i => featureMap[i.value] = i.dataset.label);

    const serviceInputs = modal.querySelectorAll('#service-inputs input');
    const serviceMap = {};
    serviceInputs.forEach(i => serviceMap[i.value] = i.dataset.label);

    form.querySelector('#form-configuration').value = JSON.stringify(config, null, 2);
    form.querySelector('#form-total-price').value = `$${prices.total} + $${prices.monthlyTotal}/mo`;

    const formData = new FormData(form);
    const summaryText = `
== SOLUTION BUILDER REQUEST ==

BASE: ${baseInfo.name}
PROJECT COST: $${prices.total}

FEATURES:
${config.features.length > 0 ? config.features.map(f => `  • ${featureMap[f]}`).join('\n') : '  (none selected)'}

MONTHLY SERVICES:
${config.services.length > 0 ? config.services.map(s => `  • ${serviceMap[s]}`).join('\n') : '  (none selected)'}
${prices.monthlyTotal > 0 ? `\nMONTHLY TOTAL: $${prices.monthlyTotal}/mo` : ''}

---
Name: ${formData.get('name')}
Email: ${formData.get('email')}
Message: ${formData.get('message') || '(none)'}
    `;

    try {
      btnSubmit.textContent = 'Sending...';
      btnSubmit.disabled = true;

      const response = await fetch('https://formspree.io/f/mjkyzqvg', {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: new URLSearchParams({
          name: formData.get('name'),
          email: formData.get('email'),
          message: summaryText,
          _subject: `Solution Builder: ${baseInfo.name} - $${prices.total}`
        })
      });

      if (response.ok) {
        successMessage.classList.remove('tw-hidden');
      } else {
        throw new Error('Submission failed');
      }
    } catch (error) {
      console.error('Submission error:', error);
      alert('There was an error. Please try again or contact us directly.');
      btnSubmit.textContent = 'Get My Quote →';
      btnSubmit.disabled = false;
    }
  }

  // Initialize
  renderFeatureCards();
  renderServiceCards();
  updateUI();
});
