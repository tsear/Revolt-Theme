<?php
/**
 * Solution Builder Modal
 * Multi-step configurator for building custom service packages
 * Uses Tailwind CSS (tw- prefix) + Flowbite components
 */
?>

<!-- Solution Builder Modal -->
<div id="solution-builder-modal" tabindex="-1" aria-hidden="true" 
     class="tw-hidden tw-overflow-y-auto tw-overflow-x-hidden tw-fixed tw-top-0 tw-right-0 tw-left-0 tw-z-[100000] tw-justify-center tw-items-center tw-w-full md:tw-inset-0 tw-h-full tw-max-h-full tw-bg-black/80 tw-backdrop-blur-sm">
    
    <div class="tw-relative tw-w-full tw-max-w-4xl tw-max-h-full tw-mx-auto tw-my-8 tw-p-4">
        <!-- Modal content -->
        <div class="tw-relative tw-bg-white tw-border-2 tw-border-black tw-shadow-lg" style="font-family: 'Fira Code', monospace;">
            
            <!-- Modal header -->
            <div class="tw-flex tw-items-center tw-justify-between tw-p-5 tw-border-b-2 tw-border-black tw-bg-gray-100">
                <div>
                    <h3 class="tw-text-xl tw-font-bold tw-text-black">
                        // Build Your Solution
                    </h3>
                    <p class="tw-text-sm tw-text-gray-600 tw-mt-1">Configure your custom package</p>
                </div>
                <button type="button" 
                        class="tw-text-black tw-bg-transparent hover:tw-bg-gray-200 tw-rounded-none tw-text-sm tw-w-8 tw-h-8 tw-inline-flex tw-justify-center tw-items-center tw-border tw-border-black hover:tw-border-revolt-yellow"
                        data-modal-hide="solution-builder-modal">
                    <svg class="tw-w-3 tw-h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="tw-sr-only">Close modal</span>
                </button>
            </div>

            <!-- Stepper Progress -->
            <div class="tw-px-6 tw-pt-6 tw-pb-4 tw-bg-gray-50 tw-border-b tw-border-gray-200">
                <ol class="tw-flex tw-items-center tw-w-full tw-text-sm tw-font-medium tw-text-center tw-text-gray-500">
                    <li id="step-indicator-1" class="tw-flex md:tw-w-full tw-items-center tw-text-revolt-yellow after:tw-content-[''] after:tw-w-full after:tw-h-1 after:tw-border-b after:tw-border-gray-300 after:tw-border-1 after:tw-hidden sm:after:tw-inline-block after:tw-mx-4 xl:after:tw-mx-8">
                        <span class="tw-flex tw-items-center after:tw-content-['/'] sm:after:tw-hidden after:tw-mx-2 after:tw-text-gray-400">
                            <span class="step-number tw-me-2 tw-w-6 tw-h-6 tw-border-2 tw-border-revolt-yellow tw-flex tw-items-center tw-justify-center tw-text-xs tw-bg-revolt-yellow tw-text-black">1</span>
                            Base
                        </span>
                    </li>
                    <li id="step-indicator-2" class="tw-flex md:tw-w-full tw-items-center after:tw-content-[''] after:tw-w-full after:tw-h-1 after:tw-border-b after:tw-border-gray-300 after:tw-border-1 after:tw-hidden sm:after:tw-inline-block after:tw-mx-4 xl:after:tw-mx-8">
                        <span class="tw-flex tw-items-center after:tw-content-['/'] sm:after:tw-hidden after:tw-mx-2 after:tw-text-gray-400">
                            <span class="step-number tw-me-2 tw-w-6 tw-h-6 tw-border tw-border-gray-400 tw-flex tw-items-center tw-justify-center tw-text-xs">2</span>
                            Features
                        </span>
                    </li>
                    <li id="step-indicator-3" class="tw-flex md:tw-w-full tw-items-center after:tw-content-[''] after:tw-w-full after:tw-h-1 after:tw-border-b after:tw-border-gray-300 after:tw-border-1 after:tw-hidden sm:after:tw-inline-block after:tw-mx-4 xl:after:tw-mx-8">
                        <span class="tw-flex tw-items-center after:tw-content-['/'] sm:after:tw-hidden after:tw-mx-2 after:tw-text-gray-400">
                            <span class="step-number tw-me-2 tw-w-6 tw-h-6 tw-border tw-border-gray-400 tw-flex tw-items-center tw-justify-center tw-text-xs">3</span>
                            Services
                        </span>
                    </li>
                    <li id="step-indicator-4" class="tw-flex tw-items-center">
                        <span class="step-number tw-me-2 tw-w-6 tw-h-6 tw-border tw-border-gray-400 tw-flex tw-items-center tw-justify-center tw-text-xs">4</span>
                        Review
                    </li>
                </ol>
            </div>

            <!-- Modal body - Steps Container -->
            <div class="tw-p-6 tw-min-h-[400px]">
                
                <!-- Step 1: Choose Base -->
                <div id="step-1" class="step-content tw-block">
                    <h4 class="tw-text-lg tw-font-bold tw-mb-2 tw-text-black">// Step 1: Choose Your Foundation</h4>
                    <p class="tw-text-gray-600 tw-mb-6 tw-text-sm">What type of web presence do you need?</p>
                    
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4">
                        <!-- Option: WordPress Site -->
                        <label class="base-option tw-cursor-pointer">
                            <input type="radio" name="base_type" value="wordpress" class="tw-hidden peer" checked>
                            <div class="tw-p-5 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all">
                                <div class="tw-text-3xl tw-mb-3">🌐</div>
                                <h5 class="tw-font-bold tw-text-black">WordPress Site</h5>
                                <p class="tw-text-sm tw-text-gray-600 tw-mt-2">Full-featured website with CMS</p>
                                <p class="tw-text-xs tw-text-revolt-yellow tw-mt-2 tw-font-bold">Starting at $2,500</p>
                            </div>
                        </label>
                        
                        <!-- Option: Landing Page -->
                        <label class="base-option tw-cursor-pointer">
                            <input type="radio" name="base_type" value="landing" class="tw-hidden peer">
                            <div class="tw-p-5 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all">
                                <div class="tw-text-3xl tw-mb-3">🚀</div>
                                <h5 class="tw-font-bold tw-text-black">Landing Page</h5>
                                <p class="tw-text-sm tw-text-gray-600 tw-mt-2">Single high-converting page</p>
                                <p class="tw-text-xs tw-text-revolt-yellow tw-mt-2 tw-font-bold">Starting at $800</p>
                            </div>
                        </label>
                        
                        <!-- Option: E-commerce -->
                        <label class="base-option tw-cursor-pointer">
                            <input type="radio" name="base_type" value="ecommerce" class="tw-hidden peer">
                            <div class="tw-p-5 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all">
                                <div class="tw-text-3xl tw-mb-3">🛒</div>
                                <h5 class="tw-font-bold tw-text-black">E-commerce</h5>
                                <p class="tw-text-sm tw-text-gray-600 tw-mt-2">Online store with WooCommerce</p>
                                <p class="tw-text-xs tw-text-revolt-yellow tw-mt-2 tw-font-bold">Starting at $4,000</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 2: Add Features -->
                <div id="step-2" class="step-content tw-hidden">
                    <h4 class="tw-text-lg tw-font-bold tw-mb-2 tw-text-black">// Step 2: Add Features</h4>
                    <p class="tw-text-gray-600 tw-mb-6 tw-text-sm">Select the features you need (pick as many as you want)</p>
                    
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4">
                        <!-- Feature: Blog -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="blog" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📝</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Blog / News Section</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Publish articles, updates, content</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$300</span>
                            </div>
                        </label>
                        
                        <!-- Feature: Contact Forms -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="forms" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📧</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Contact Forms</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Custom forms with validation</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$200</span>
                            </div>
                        </label>
                        
                        <!-- Feature: Newsletter -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="newsletter" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">💌</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Newsletter Integration</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Mailchimp, ConvertKit, etc.</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$150</span>
                            </div>
                        </label>
                        
                        <!-- Feature: Gallery -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="gallery" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">🖼️</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Portfolio / Gallery</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Showcase your work beautifully</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$400</span>
                            </div>
                        </label>
                        
                        <!-- Feature: Booking -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="booking" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📅</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Booking / Scheduling</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Calendly or custom system</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$350</span>
                            </div>
                        </label>
                        
                        <!-- Feature: Membership -->
                        <label class="feature-option tw-cursor-pointer">
                            <input type="checkbox" name="features[]" value="membership" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">🔐</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Members Area</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Gated content, user accounts</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">+$600</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 3: Ongoing Services -->
                <div id="step-3" class="step-content tw-hidden">
                    <h4 class="tw-text-lg tw-font-bold tw-mb-2 tw-text-black">// Step 3: Ongoing Services</h4>
                    <p class="tw-text-gray-600 tw-mb-6 tw-text-sm">Optional monthly services to keep things running smoothly</p>
                    
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4">
                        <!-- Service: Hosting -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="hosting" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">🖥️</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Web Hosting</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Fast, secure, managed hosting</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$29/mo</span>
                            </div>
                        </label>
                        
                        <!-- Service: Maintenance -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="maintenance" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">🔧</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Managed Maintenance</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Updates, backups, security</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$99/mo</span>
                            </div>
                        </label>
                        
                        <!-- Service: SEO -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="seo" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📈</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">SEO Optimization</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Ongoing search optimization</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$199/mo</span>
                            </div>
                        </label>
                        
                        <!-- Service: Content -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="content" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">✍️</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Content Updates</h5>
                                    <p class="tw-text-sm tw-text-gray-600">We manage your content</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$149/mo</span>
                            </div>
                        </label>
                        
                        <!-- Service: Social -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="social" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📱</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Social Media</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Content creation & posting</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$299/mo</span>
                            </div>
                        </label>
                        
                        <!-- Service: Analytics -->
                        <label class="service-option tw-cursor-pointer">
                            <input type="checkbox" name="services[]" value="analytics" class="tw-hidden peer">
                            <div class="tw-p-4 tw-border-2 tw-border-gray-300 peer-checked:tw-border-revolt-yellow peer-checked:tw-bg-yellow-50 hover:tw-border-gray-400 tw-transition-all tw-flex tw-items-start tw-gap-4">
                                <div class="tw-text-2xl">📊</div>
                                <div class="tw-flex-1">
                                    <h5 class="tw-font-bold tw-text-black">Analytics & Reports</h5>
                                    <p class="tw-text-sm tw-text-gray-600">Monthly performance insights</p>
                                </div>
                                <span class="tw-text-sm tw-font-bold tw-text-revolt-yellow">$79/mo</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 4: Review & Submit -->
                <div id="step-4" class="step-content tw-hidden">
                    <h4 class="tw-text-lg tw-font-bold tw-mb-2 tw-text-black">// Step 4: Your Custom Solution</h4>
                    <p class="tw-text-gray-600 tw-mb-6 tw-text-sm">Review your selections and get your quote</p>
                    
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6">
                        <!-- Summary Panel -->
                        <div class="tw-bg-gray-900 tw-text-white tw-p-5 tw-border-2 tw-border-revolt-yellow">
                            <h5 class="tw-text-revolt-yellow tw-font-bold tw-mb-4 tw-text-sm">// config.json</h5>
                            <pre id="config-summary" class="tw-text-sm tw-text-green-400 tw-whitespace-pre-wrap">{
  "base": "wordpress",
  "features": [],
  "services": []
}</pre>
                        </div>
                        
                        <!-- Pricing Panel -->
                        <div class="tw-bg-white tw-p-5 tw-border-2 tw-border-black">
                            <h5 class="tw-font-bold tw-mb-4 tw-text-black">Estimated Investment</h5>
                            
                            <div class="tw-space-y-3 tw-mb-6">
                                <div class="tw-flex tw-justify-between tw-border-b tw-border-gray-200 tw-pb-2">
                                    <span class="tw-text-gray-600">Base Project:</span>
                                    <span id="price-base" class="tw-font-bold">$2,500</span>
                                </div>
                                <div class="tw-flex tw-justify-between tw-border-b tw-border-gray-200 tw-pb-2">
                                    <span class="tw-text-gray-600">Features:</span>
                                    <span id="price-features" class="tw-font-bold">$0</span>
                                </div>
                                <div class="tw-flex tw-justify-between tw-border-b tw-border-gray-200 tw-pb-2">
                                    <span class="tw-text-gray-600">Monthly Services:</span>
                                    <span id="price-services" class="tw-font-bold">$0/mo</span>
                                </div>
                            </div>
                            
                            <div class="tw-bg-revolt-yellow tw-p-4 tw--mx-5 tw--mb-5">
                                <div class="tw-flex tw-justify-between tw-items-center">
                                    <span class="tw-font-bold tw-text-black">One-Time Total:</span>
                                    <span id="price-total" class="tw-text-2xl tw-font-bold tw-text-black">$2,500</span>
                                </div>
                                <div id="monthly-note" class="tw-text-sm tw-text-black/70 tw-mt-1 tw-hidden">
                                    + <span id="price-monthly-total">$0</span>/month for services
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="tw-mt-6 tw-p-5 tw-border-2 tw-border-gray-300 tw-bg-gray-50">
                        <h5 class="tw-font-bold tw-mb-4 tw-text-black">Ready to get started? Let's talk.</h5>
                        <form id="solution-builder-form" class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4">
                            <input type="hidden" name="configuration" id="form-configuration" value="">
                            <input type="hidden" name="total_price" id="form-total-price" value="">
                            
                            <div>
                                <label class="tw-block tw-text-sm tw-font-medium tw-text-gray-700 tw-mb-1">Name</label>
                                <input type="text" name="name" required 
                                       class="tw-w-full tw-px-3 tw-py-2 tw-border-2 tw-border-gray-300 focus:tw-border-revolt-yellow focus:tw-outline-none tw-font-mono tw-text-sm"
                                       placeholder="Your name">
                            </div>
                            <div>
                                <label class="tw-block tw-text-sm tw-font-medium tw-text-gray-700 tw-mb-1">Email</label>
                                <input type="email" name="email" required 
                                       class="tw-w-full tw-px-3 tw-py-2 tw-border-2 tw-border-gray-300 focus:tw-border-revolt-yellow focus:tw-outline-none tw-font-mono tw-text-sm"
                                       placeholder="you@company.com">
                            </div>
                            <div class="md:tw-col-span-2">
                                <label class="tw-block tw-text-sm tw-font-medium tw-text-gray-700 tw-mb-1">Tell us about your project</label>
                                <textarea name="message" rows="3"
                                          class="tw-w-full tw-px-3 tw-py-2 tw-border-2 tw-border-gray-300 focus:tw-border-revolt-yellow focus:tw-outline-none tw-font-mono tw-text-sm tw-resize-none"
                                          placeholder="What are you building?"></textarea>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="tw-flex tw-items-center tw-justify-between tw-p-5 tw-border-t-2 tw-border-black tw-bg-gray-100">
                <div>
                    <!-- Restart Button -->
                    <button type="button" id="btn-restart"
                            class="tw-hidden tw-px-4 tw-py-2 tw-text-sm tw-font-bold tw-text-gray-600 hover:tw-text-black tw-border tw-border-gray-300 hover:tw-border-black tw-transition-all">
                        ↺ Start Over
                    </button>
                </div>
                
                <div class="tw-flex tw-gap-3">
                    <!-- Back Button -->
                    <button type="button" id="btn-back"
                            class="tw-hidden tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-border-2 tw-border-black hover:tw-bg-black hover:tw-text-white tw-transition-all">
                        ← Back
                    </button>
                    
                    <!-- Next Button -->
                    <button type="button" id="btn-next"
                            class="tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-border-2 tw-border-black hover:tw-bg-black hover:tw-text-revolt-yellow tw-transition-all">
                        Next →
                    </button>
                    
                    <!-- Submit Button (only on step 4) -->
                    <button type="button" id="btn-submit"
                            class="tw-hidden tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-border-2 tw-border-black hover:tw-bg-black hover:tw-text-revolt-yellow tw-transition-all">
                        Submit Request →
                    </button>
                </div>
            </div>

            <!-- Success Message (hidden by default) -->
            <div id="success-message" class="tw-hidden tw-absolute tw-inset-0 tw-bg-white tw-flex tw-flex-col tw-items-center tw-justify-center tw-p-8 tw-text-center">
                <div class="tw-text-6xl tw-mb-4">🎉</div>
                <h3 class="tw-text-2xl tw-font-bold tw-text-black tw-mb-2">Request Submitted!</h3>
                <p class="tw-text-gray-600 tw-mb-6">We'll review your custom solution and get back to you within 24 hours.</p>
                <button type="button" data-modal-hide="solution-builder-modal"
                        class="tw-px-6 tw-py-2.5 tw-text-sm tw-font-bold tw-text-black tw-bg-revolt-yellow tw-border-2 tw-border-black hover:tw-bg-black hover:tw-text-revolt-yellow tw-transition-all">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
