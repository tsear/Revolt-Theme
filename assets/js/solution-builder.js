/**
 * Solution Builder - Multi-step configurator
 * Handles step navigation, pricing calculation, and form submission
 */

document.addEventListener('DOMContentLoaded', () => {
  console.log('[Solution Builder] Script loaded');
  
  // Elements
  const modal = document.getElementById('solution-builder-modal');
  console.log('[Solution Builder] Modal element:', modal);
  
  if (!modal) {
    console.warn('[Solution Builder] Modal not found in DOM!');
    return;
  }

  // ===== MODAL OPEN/CLOSE HANDLERS =====
  // Open modal triggers
  const openTriggers = document.querySelectorAll('[data-modal-target="solution-builder-modal"]');
  console.log('[Solution Builder] Found triggers:', openTriggers.length);
  
  openTriggers.forEach((trigger, i) => {
    console.log(`[Solution Builder] Attaching listener to trigger ${i}:`, trigger);
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      console.log('[Solution Builder] Trigger clicked, opening modal');
      openModal();
    });
  });

  // Close modal triggers
  const closeTriggers = modal.querySelectorAll('[data-modal-hide="solution-builder-modal"]');
  closeTriggers.forEach(trigger => {
    trigger.addEventListener('click', () => {
      closeModal();
    });
  });

  // Close on backdrop click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !modal.classList.contains('tw-hidden')) {
      closeModal();
    }
  });

  function openModal() {
    modal.classList.remove('tw-hidden');
    modal.classList.add('tw-flex');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.add('tw-hidden');
    modal.classList.remove('tw-flex');
    document.body.style.overflow = '';
  }

  // ===== STEP NAVIGATION =====
  const steps = modal.querySelectorAll('.step-content');
  const stepIndicators = [
    modal.querySelector('#step-indicator-1'),
    modal.querySelector('#step-indicator-2'),
    modal.querySelector('#step-indicator-3'),
    modal.querySelector('#step-indicator-4')
  ];
  
  const btnNext = modal.querySelector('#btn-next');
  const btnBack = modal.querySelector('#btn-back');
  const btnRestart = modal.querySelector('#btn-restart');
  const btnSubmit = modal.querySelector('#btn-submit');
  const successMessage = modal.querySelector('#success-message');
  const form = modal.querySelector('#solution-builder-form');
  
  // Pricing data
  const pricing = {
    base: {
      wordpress: 2500,
      landing: 800,
      ecommerce: 4000
    },
    features: {
      blog: 300,
      forms: 200,
      newsletter: 150,
      gallery: 400,
      booking: 350,
      membership: 600
    },
    services: {
      hosting: 29,
      maintenance: 99,
      seo: 199,
      content: 149,
      social: 299,
      analytics: 79
    }
  };

  // State
  let currentStep = 1;
  const totalSteps = 4;

  // Initialize
  updateUI();

  // Event Listeners
  btnNext.addEventListener('click', () => {
    if (currentStep < totalSteps) {
      currentStep++;
      updateUI();
      updatePricing();
    }
  });

  btnBack.addEventListener('click', () => {
    if (currentStep > 1) {
      currentStep--;
      updateUI();
    }
  });

  btnRestart.addEventListener('click', () => {
    // Reset all selections
    modal.querySelectorAll('input[type="radio"]').forEach(input => {
      input.checked = input.value === 'wordpress'; // Default to WordPress
    });
    modal.querySelectorAll('input[type="checkbox"]').forEach(input => {
      input.checked = false;
    });
    
    // Reset to step 1
    currentStep = 1;
    updateUI();
    updatePricing();
  });

  btnSubmit.addEventListener('click', async () => {
    // Validate form
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    
    if (!nameInput.value.trim() || !emailInput.value.trim()) {
      nameInput.reportValidity();
      emailInput.reportValidity();
      return;
    }

    // Build configuration
    const config = buildConfiguration();
    const prices = calculatePricing();
    
    // Set hidden form values
    form.querySelector('#form-configuration').value = JSON.stringify(config, null, 2);
    form.querySelector('#form-total-price').value = `One-time: $${prices.total}, Monthly: $${prices.monthlyTotal}/mo`;

    // Build FormData
    const formData = new FormData(form);
    
    // Add config summary for email readability
    let summaryText = `
== SOLUTION BUILDER REQUEST ==

BASE: ${config.base}
ONE-TIME COST: $${prices.total}

FEATURES SELECTED:
${config.features.length > 0 ? config.features.map(f => `  - ${f}`).join('\n') : '  (none)'}

ONGOING SERVICES:
${config.services.length > 0 ? config.services.map(s => `  - ${s}`).join('\n') : '  (none)'}
${prices.monthlyTotal > 0 ? `\nMONTHLY TOTAL: $${prices.monthlyTotal}/mo` : ''}

---
Name: ${formData.get('name')}
Email: ${formData.get('email')}
Message: ${formData.get('message') || '(none)'}
    `;

    // Submit to Formspree
    try {
      btnSubmit.textContent = 'Sending...';
      btnSubmit.disabled = true;

      const response = await fetch('https://formspree.io/f/mjkyzqvg', {
        method: 'POST',
        headers: {
          'Accept': 'application/json'
        },
        body: new URLSearchParams({
          name: formData.get('name'),
          email: formData.get('email'),
          message: summaryText,
          _subject: `Solution Builder Request: ${config.base} - $${prices.total}`
        })
      });

      if (response.ok) {
        // Show success message
        successMessage.classList.remove('tw-hidden');
      } else {
        throw new Error('Form submission failed');
      }
    } catch (error) {
      console.error('Submission error:', error);
      alert('There was an error submitting your request. Please try again or contact us directly.');
      btnSubmit.textContent = 'Submit Request →';
      btnSubmit.disabled = false;
    }
  });

  // Update selections and recalculate when options change
  modal.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
    input.addEventListener('change', () => {
      if (currentStep === 4) {
        updatePricing();
      }
    });
  });

  // Functions
  function updateUI() {
    // Show/hide step content
    steps.forEach((step, index) => {
      const stepNum = index + 1;
      step.classList.toggle('tw-hidden', stepNum !== currentStep);
      step.classList.toggle('tw-block', stepNum === currentStep);
    });

    // Update step indicators
    stepIndicators.forEach((indicator, index) => {
      const stepNum = index + 1;
      const numberSpan = indicator.querySelector('.step-number');
      
      if (stepNum < currentStep) {
        // Completed step
        indicator.classList.add('tw-text-revolt-yellow');
        indicator.classList.remove('tw-text-gray-500');
        numberSpan.classList.add('tw-bg-revolt-yellow', 'tw-border-revolt-yellow', 'tw-text-black');
        numberSpan.classList.remove('tw-border-gray-400');
        numberSpan.innerHTML = '✓';
      } else if (stepNum === currentStep) {
        // Current step
        indicator.classList.add('tw-text-revolt-yellow');
        indicator.classList.remove('tw-text-gray-500');
        numberSpan.classList.add('tw-bg-revolt-yellow', 'tw-border-revolt-yellow', 'tw-text-black');
        numberSpan.classList.remove('tw-border-gray-400');
        numberSpan.innerHTML = stepNum;
      } else {
        // Future step
        indicator.classList.remove('tw-text-revolt-yellow');
        indicator.classList.add('tw-text-gray-500');
        numberSpan.classList.remove('tw-bg-revolt-yellow', 'tw-border-revolt-yellow', 'tw-text-black');
        numberSpan.classList.add('tw-border-gray-400');
        numberSpan.innerHTML = stepNum;
      }
    });

    // Update buttons
    btnBack.classList.toggle('tw-hidden', currentStep === 1);
    btnRestart.classList.toggle('tw-hidden', currentStep === 1);
    btnNext.classList.toggle('tw-hidden', currentStep === totalSteps);
    btnSubmit.classList.toggle('tw-hidden', currentStep !== totalSteps);

    // Update pricing when reaching step 4
    if (currentStep === 4) {
      updatePricing();
    }
  }

  function buildConfiguration() {
    const base = modal.querySelector('input[name="base_type"]:checked')?.value || 'wordpress';
    
    const features = [];
    modal.querySelectorAll('input[name="features[]"]:checked').forEach(input => {
      features.push(input.value);
    });
    
    const services = [];
    modal.querySelectorAll('input[name="services[]"]:checked').forEach(input => {
      services.push(input.value);
    });

    return { base, features, services };
  }

  function calculatePricing() {
    const config = buildConfiguration();
    
    // Base price
    const basePrice = pricing.base[config.base] || 0;
    
    // Features total
    const featuresTotal = config.features.reduce((sum, feature) => {
      return sum + (pricing.features[feature] || 0);
    }, 0);
    
    // Monthly services
    const monthlyTotal = config.services.reduce((sum, service) => {
      return sum + (pricing.services[service] || 0);
    }, 0);
    
    // One-time total
    const total = basePrice + featuresTotal;

    return {
      basePrice,
      featuresTotal,
      monthlyTotal,
      total
    };
  }

  function updatePricing() {
    const config = buildConfiguration();
    const prices = calculatePricing();

    // Update config summary (terminal style)
    const configSummary = modal.querySelector('#config-summary');
    configSummary.textContent = JSON.stringify(config, null, 2);

    // Update price displays
    modal.querySelector('#price-base').textContent = `$${prices.basePrice.toLocaleString()}`;
    modal.querySelector('#price-features').textContent = `$${prices.featuresTotal.toLocaleString()}`;
    modal.querySelector('#price-services').textContent = `$${prices.monthlyTotal}/mo`;
    modal.querySelector('#price-total').textContent = `$${prices.total.toLocaleString()}`;

    // Show/hide monthly note
    const monthlyNote = modal.querySelector('#monthly-note');
    const monthlyTotalSpan = modal.querySelector('#price-monthly-total');
    if (prices.monthlyTotal > 0) {
      monthlyNote.classList.remove('tw-hidden');
      monthlyTotalSpan.textContent = `$${prices.monthlyTotal}`;
    } else {
      monthlyNote.classList.add('tw-hidden');
    }
  }

  // Reset modal when closed
  modal.addEventListener('hidden.bs.modal', () => {
    successMessage.classList.add('tw-hidden');
    btnSubmit.textContent = 'Submit Request →';
    btnSubmit.disabled = false;
  });

  // Also reset when clicking close button
  modal.querySelectorAll('[data-modal-hide]').forEach(closeBtn => {
    closeBtn.addEventListener('click', () => {
      // Small delay to allow modal to close first
      setTimeout(() => {
        successMessage.classList.add('tw-hidden');
        btnSubmit.textContent = 'Submit Request →';
        btnSubmit.disabled = false;
      }, 300);
    });
  });
});
