<?php
/**
 * Solution Builder Modal
 * Multi-step configurator with visual feedback and organized hierarchy
 */
?>

<!-- Solution Builder Modal -->
<div id="solution-builder-modal" tabindex="-1" aria-hidden="true" 
     class="tw-hidden tw-overflow-y-auto tw-overflow-x-hidden tw-fixed tw-top-0 tw-right-0 tw-left-0 tw-z-[100000] tw-justify-center tw-items-center tw-w-full md:tw-inset-0 tw-h-full tw-max-h-full tw-bg-black/80 tw-backdrop-blur-sm">
    
    <div class="tw-relative tw-w-full tw-max-w-3xl tw-max-h-full tw-mx-auto tw-my-8 tw-p-4">
        <!-- Modal content -->
        <div class="tw-relative tw-bg-white tw-shadow-2xl tw-rounded-xl" style="font-family: 'Fira Code', monospace;">
            
            <!-- Modal header -->
            <div class="tw-flex tw-items-center tw-justify-between tw-px-6 tw-py-4 tw-border-b tw-border-gray-200">
                <div class="tw-flex tw-items-center tw-gap-3">
                    <span class="tw-text-2xl">⚡</span>
                    <span class="tw-font-bold tw-text-black">Build Your Solution</span>
                </div>
                <button type="button" 
                        class="tw-text-gray-400 hover:tw-text-black tw-transition-colors"
                        data-modal-hide="solution-builder-modal">
                    <svg class="tw-w-5 tw-h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Progress dots -->
            <div class="tw-px-6 tw-py-3 tw-bg-gray-50 tw-border-b tw-border-gray-100">
                <div class="tw-flex tw-items-center tw-justify-center tw-gap-3">
                    <div id="dot-1" class="tw-w-3 tw-h-3 tw-rounded-full tw-bg-revolt-yellow"></div>
                    <div class="tw-w-8 tw-h-0.5 tw-bg-gray-300" id="line-1"></div>
                    <div id="dot-2" class="tw-w-3 tw-h-3 tw-rounded-full tw-bg-gray-300"></div>
                    <div class="tw-w-8 tw-h-0.5 tw-bg-gray-300" id="line-2"></div>
                    <div id="dot-3" class="tw-w-3 tw-h-3 tw-rounded-full tw-bg-gray-300"></div>
                    <div class="tw-w-8 tw-h-0.5 tw-bg-gray-300" id="line-3"></div>
                    <div id="dot-4" class="tw-w-3 tw-h-3 tw-rounded-full tw-bg-gray-300"></div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="tw-p-6 tw-min-h-[380px]">
                
                <!-- Step 1: Choose Base -->
                <div id="step-1" class="step-content tw-block">
                    <p class="tw-text-center tw-text-gray-500 tw-text-sm tw-mb-6">What are you building?</p>
                    
                    <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 tw-gap-4">
                        <label class="base-option tw-cursor-pointer tw-group">
                            <input type="radio" name="base_type" value="landing" class="tw-hidden">
                            <div class="tw-relative tw-flex tw-items-start tw-gap-4 tw-p-5 tw-border-2 tw-border-gray-200 tw-rounded-xl hover:tw-border-gray-300 tw-transition-all tw-bg-white">
                                <span class="tw-absolute tw-top-3 tw-right-3 tw-w-6 tw-h-6 tw-bg-revolt-yellow tw-rounded-full tw-items-center tw-justify-center tw-text-sm tw-font-bold tw-shadow-sm" style="display: none;">✓</span>
                                <div class="tw-flex-shrink-0 tw-w-14 tw-h-14 tw-bg-gradient-to-br tw-from-orange-400 tw-to-red-500 tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-text-3xl tw-shadow-lg group-hover:tw-scale-105 tw-transition-transform">🚀</div>
                                <div class="tw-flex-1">
                                    <div class="tw-font-semibold tw-text-base tw-text-gray-900">Landing Page</div>
                                    <p class="tw-text-sm tw-text-gray-500 tw-mt-1 tw-leading-relaxed">Single focused page to convert visitors. Perfect for campaigns, product launches, or lead capture.</p>
                                    <div class="tw-flex tw-gap-2 tw-mt-3">
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">1 page</span>
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">Fast delivery</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="base-option tw-cursor-pointer tw-group">
                            <input type="radio" name="base_type" value="simple" class="tw-hidden">
                            <div class="tw-relative tw-flex tw-items-start tw-gap-4 tw-p-5 tw-border-2 tw-border-gray-200 tw-rounded-xl hover:tw-border-gray-300 tw-transition-all tw-bg-white">
                                <span class="tw-absolute tw-top-3 tw-right-3 tw-w-6 tw-h-6 tw-bg-revolt-yellow tw-rounded-full tw-items-center tw-justify-center tw-text-sm tw-font-bold tw-shadow-sm" style="display: none;">✓</span>
                                <div class="tw-flex-shrink-0 tw-w-14 tw-h-14 tw-bg-gradient-to-br tw-from-blue-400 tw-to-indigo-500 tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-text-3xl tw-shadow-lg group-hover:tw-scale-105 tw-transition-transform">📄</div>
                                <div class="tw-flex-1">
                                    <div class="tw-font-semibold tw-text-base tw-text-gray-900">Simple Site</div>
                                    <p class="tw-text-sm tw-text-gray-500 tw-mt-1 tw-leading-relaxed">Clean multi-page site for small businesses. Home, About, Services, Contact — everything you need.</p>
                                    <div class="tw-flex tw-gap-2 tw-mt-3">
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">3-5 pages</span>
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">No CMS</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="base-option tw-cursor-pointer tw-group">
                            <input type="radio" name="base_type" value="wordpress" class="tw-hidden" checked>
                            <div class="tw-relative tw-flex tw-items-start tw-gap-4 tw-p-5 tw-border-2 tw-border-gray-200 tw-rounded-xl hover:tw-border-gray-300 tw-transition-all tw-bg-white">
                                <span class="tw-absolute tw-top-3 tw-right-3 tw-w-6 tw-h-6 tw-bg-revolt-yellow tw-rounded-full tw-items-center tw-justify-center tw-text-sm tw-font-bold tw-shadow-sm" style="display: none;">✓</span>
                                <div class="tw-flex-shrink-0 tw-w-14 tw-h-14 tw-bg-gradient-to-br tw-from-emerald-400 tw-to-teal-500 tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-text-3xl tw-shadow-lg group-hover:tw-scale-105 tw-transition-transform">🌐</div>
                                <div class="tw-flex-1">
                                    <div class="tw-flex tw-items-center tw-gap-2">
                                        <span class="tw-font-semibold tw-text-base tw-text-gray-900">Full Website</span>
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-revolt-yellow tw-rounded-full tw-font-bold tw-text-black">POPULAR</span>
                                    </div>
                                    <p class="tw-text-sm tw-text-gray-500 tw-mt-1 tw-leading-relaxed">Complete WordPress site you can update yourself. Blog, SEO-ready, unlimited growth potential.</p>
                                    <div class="tw-flex tw-gap-2 tw-mt-3">
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">5-10+ pages</span>
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">Self-managed</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="base-option tw-cursor-pointer tw-group">
                            <input type="radio" name="base_type" value="ecommerce" class="tw-hidden">
                            <div class="tw-relative tw-flex tw-items-start tw-gap-4 tw-p-5 tw-border-2 tw-border-gray-200 tw-rounded-xl hover:tw-border-gray-300 tw-transition-all tw-bg-white">
                                <span class="tw-absolute tw-top-3 tw-right-3 tw-w-6 tw-h-6 tw-bg-revolt-yellow tw-rounded-full tw-items-center tw-justify-center tw-text-sm tw-font-bold tw-shadow-sm" style="display: none;">✓</span>
                                <div class="tw-flex-shrink-0 tw-w-14 tw-h-14 tw-bg-gradient-to-br tw-from-purple-400 tw-to-pink-500 tw-rounded-xl tw-flex tw-items-center tw-justify-center tw-text-3xl tw-shadow-lg group-hover:tw-scale-105 tw-transition-transform">🛒</div>
                                <div class="tw-flex-1">
                                    <div class="tw-font-semibold tw-text-base tw-text-gray-900">E-commerce Store</div>
                                    <p class="tw-text-sm tw-text-gray-500 tw-mt-1 tw-leading-relaxed">Full online store with WooCommerce. Product catalog, cart, checkout, payments — ready to sell.</p>
                                    <div class="tw-flex tw-gap-2 tw-mt-3">
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">Unlimited products</span>
                                        <span class="tw-text-[10px] tw-px-2 tw-py-0.5 tw-bg-gray-100 tw-rounded-full tw-text-gray-600">Payments</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 2: Add Features -->
                <div id="step-2" class="step-content tw-hidden">
                    <p class="tw-text-center tw-text-gray-500 tw-text-sm tw-mb-1">What features do you need?</p>
                    <p class="tw-text-center tw-text-xs tw-text-gray-400 tw-mb-4">Select all that apply · <span class="tw-text-revolt-yellow">★ Recommended</span> for your site type</p>
                    
                    <!-- Recommended Section -->
                    <div id="features-recommended" class="tw-mb-4">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-500 tw-uppercase tw-tracking-wide tw-mb-2">Recommended</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3" id="features-recommended-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Other Available Section -->
                    <div id="features-available" class="tw-mb-4">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-500 tw-uppercase tw-tracking-wide tw-mb-2">Also Available</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3" id="features-available-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Unavailable Section -->
                    <div id="features-unavailable" class="tw-hidden">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-400 tw-uppercase tw-tracking-wide tw-mb-2">Requires larger site</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3 tw-opacity-40" id="features-unavailable-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Hidden feature inputs (for form data) -->
                    <div class="tw-hidden" id="feature-inputs">
                        <input type="checkbox" name="features[]" value="forms" data-feature="forms" data-available="landing,simple,wordpress,ecommerce" data-icon="📧" data-label="Contact Form">
                        <input type="checkbox" name="features[]" value="blog" data-feature="blog" data-available="simple,wordpress,ecommerce" data-icon="📝" data-label="Blog">
                        <input type="checkbox" name="features[]" value="newsletter" data-feature="newsletter" data-available="landing,simple,wordpress,ecommerce" data-icon="💌" data-label="Newsletter">
                        <input type="checkbox" name="features[]" value="gallery" data-feature="gallery" data-available="simple,wordpress,ecommerce" data-icon="🖼️" data-label="Gallery">
                        <input type="checkbox" name="features[]" value="booking" data-feature="booking" data-available="wordpress,ecommerce" data-icon="📅" data-label="Booking">
                        <input type="checkbox" name="features[]" value="membership" data-feature="membership" data-available="wordpress,ecommerce" data-icon="🔐" data-label="Members">
                        <input type="checkbox" name="features[]" value="jetpack" data-feature="jetpack" data-available="landing,simple,wordpress,ecommerce" data-icon="🚀" data-label="Jetpack">
                        <input type="checkbox" name="features[]" value="chat" data-feature="chat" data-available="landing,simple,wordpress,ecommerce" data-icon="💬" data-label="Live Chat">
                    </div>
                </div>

                <!-- Step 3: Ongoing Services -->
                <div id="step-3" class="step-content tw-hidden">
                    <p class="tw-text-center tw-text-gray-500 tw-text-sm tw-mb-1">Want us to handle the ongoing stuff?</p>
                    <p class="tw-text-center tw-text-xs tw-text-gray-400 tw-mb-4">Optional monthly services · <span class="tw-text-revolt-yellow">★ Recommended</span></p>
                    
                    <!-- Recommended Section -->
                    <div id="services-recommended" class="tw-mb-4">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-500 tw-uppercase tw-tracking-wide tw-mb-2">Recommended</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3" id="services-recommended-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Other Available Section -->
                    <div id="services-available" class="tw-mb-4">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-500 tw-uppercase tw-tracking-wide tw-mb-2">Also Available</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3" id="services-available-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Unavailable Section -->
                    <div id="services-unavailable" class="tw-hidden">
                        <p class="tw-text-xs tw-font-bold tw-text-gray-400 tw-uppercase tw-tracking-wide tw-mb-2">Requires larger site</p>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-3 tw-opacity-40" id="services-unavailable-grid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                    
                    <!-- Hidden service inputs -->
                    <div class="tw-hidden" id="service-inputs">
                        <input type="checkbox" name="services[]" value="hosting" data-service="hosting" data-available="landing,simple,wordpress,ecommerce" data-icon="🖥️" data-label="Hosting">
                        <input type="checkbox" name="services[]" value="maintenance" data-service="maintenance" data-available="simple,wordpress,ecommerce" data-icon="🔧" data-label="Maintenance">
                        <input type="checkbox" name="services[]" value="seo" data-service="seo" data-available="landing,simple,wordpress,ecommerce" data-icon="📈" data-label="SEO">
                        <input type="checkbox" name="services[]" value="content" data-service="content" data-available="simple,wordpress,ecommerce" data-icon="✨" data-label="Content Bot">
                        <input type="checkbox" name="services[]" value="social" data-service="social" data-available="landing,simple,wordpress,ecommerce" data-icon="📱" data-label="Social">
                        <input type="checkbox" name="services[]" value="support" data-service="support" data-available="wordpress,ecommerce" data-icon="🎯" data-label="Support">
                    </div>
                    
                    <p class="tw-text-center tw-text-xs tw-text-gray-400 tw-mt-4">Skip if you prefer to handle it yourself</p>
                </div>

                <!-- Step 4: Review -->
                <div id="step-4" class="step-content tw-hidden">
                    <p class="tw-text-center tw-text-gray-500 tw-text-sm tw-mb-6">Here's your custom solution</p>
                    
                    <!-- Visual Summary -->
                    <div class="tw-bg-gray-50 tw-rounded-lg tw-p-5 tw-mb-6">
                        <div class="tw-flex tw-items-center tw-justify-center tw-gap-2 tw-mb-4">
                            <span id="summary-base-icon" class="tw-text-3xl">🌐</span>
                            <span id="summary-base-name" class="tw-font-bold tw-text-lg">Full Website</span>
                        </div>
                        
                        <div id="summary-features" class="tw-flex tw-flex-wrap tw-justify-center tw-gap-2 tw-mb-3">
                            <!-- Filled dynamically -->
                        </div>
                        
                        <div id="summary-services" class="tw-flex tw-flex-wrap tw-justify-center tw-gap-2">
                            <!-- Filled dynamically -->
                        </div>
                    </div>
                    
                    <!-- Pricing -->
                    <div class="tw-bg-black tw-text-white tw-rounded-lg tw-p-5 tw-mb-6">
                        <div class="tw-flex tw-justify-between tw-items-center">
                            <div>
                                <span class="tw-text-gray-400 tw-text-sm">Upfront</span>
                                <p class="tw-text-[10px] tw-text-gray-500">One-time project cost</p>
                            </div>
                            <span id="price-total" class="tw-text-2xl tw-font-bold tw-text-revolt-yellow">$2,500</span>
                        </div>
                        <div id="monthly-row" class="tw-hidden tw-flex tw-justify-between tw-items-center tw-pt-3 tw-mt-3 tw-border-t tw-border-gray-700">
                            <div>
                                <span class="tw-text-gray-400 tw-text-sm">Recurring</span>
                                <p class="tw-text-[10px] tw-text-gray-500">Billed monthly</p>
                            </div>
                            <span id="price-monthly" class="tw-text-lg tw-font-bold">$0/mo</span>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <form id="solution-builder-form" method="POST" action="https://formspree.io/f/mjkyzqvg" class="tw-space-y-3">
                        <input type="hidden" name="configuration" id="form-configuration" value="">
                        <input type="hidden" name="total_price" id="form-total-price" value="">
                        
                        <div class="tw-grid tw-grid-cols-2 tw-gap-3">
                            <input type="text" name="name" required 
                                   class="tw-w-full tw-px-4 tw-py-3 tw-border tw-border-gray-200 tw-rounded-lg focus:tw-border-revolt-yellow focus:tw-outline-none tw-text-sm"
                                   placeholder="Your name">
                            <input type="email" name="email" required 
                                   class="tw-w-full tw-px-4 tw-py-3 tw-border tw-border-gray-200 tw-rounded-lg focus:tw-border-revolt-yellow focus:tw-outline-none tw-text-sm"
                                   placeholder="Email">
                        </div>
                        <textarea name="message" rows="2"
                                  class="tw-w-full tw-px-4 tw-py-3 tw-border tw-border-gray-200 tw-rounded-lg focus:tw-border-revolt-yellow focus:tw-outline-none tw-text-sm tw-resize-none"
                                  placeholder="Tell us about your project (optional)"></textarea>
                    </form>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="tw-flex tw-items-center tw-justify-between tw-px-6 tw-py-4 tw-border-t tw-border-gray-200 tw-bg-gray-50 tw-rounded-b-xl">
                <button type="button" id="btn-back"
                        class="tw-hidden tw-px-4 tw-py-2 tw-text-sm tw-text-gray-500 hover:tw-text-black tw-transition-colors">
                    ← Back
                </button>
                <div id="btn-spacer"></div>
                
                <div class="tw-flex tw-gap-2">
                    <button type="button" id="btn-skip"
                            class="tw-hidden tw-px-4 tw-py-2 tw-text-sm tw-text-gray-400 hover:tw-text-gray-600 tw-transition-colors">
                        Skip
                    </button>
                    <button type="button" id="btn-next"
                            class="tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-rounded-lg hover:tw-bg-yellow-400 tw-transition-all">
                        Continue
                    </button>
                    <button type="button" id="btn-submit"
                            class="tw-hidden tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-rounded-lg hover:tw-bg-yellow-400 tw-transition-all">
                        Get My Quote →
                    </button>
                </div>
            </div>

            <!-- Success Message -->
            <div id="success-message" class="tw-hidden tw-absolute tw-inset-0 tw-bg-white tw-flex tw-flex-col tw-items-center tw-justify-center tw-p-8 tw-text-center tw-rounded-xl">
                <div class="tw-text-6xl tw-mb-4">✨</div>
                <h3 class="tw-text-xl tw-font-bold tw-text-black tw-mb-2">You're all set!</h3>
                <p class="tw-text-gray-500 tw-mb-6 tw-text-sm">We'll be in touch within 24 hours.</p>
                <button type="button" data-modal-hide="solution-builder-modal"
                        class="tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-rounded-lg hover:tw-bg-yellow-400 tw-transition-all">
                    Done
                </button>
            </div>

        </div>
    </div>
</div>
