(function() {
    // Get URLs from data attributes on html element
    const html = document.documentElement;
    const shopUrl = html.dataset.shopUrl || '/shop';
    const servicesUrl = html.dataset.servicesUrl || '/services';
    const aboutUrl = html.dataset.aboutUrl || '/about';
    
    let customEmptyCart = null;
    
    function createCustomEmptyCart() {
        const el = document.createElement('div');
        el.className = 'revolt-empty-cart';
        el.innerHTML = `
            <div class="empty-cart-icon">🛒</div>
            <div class="empty-cart-terminal">
                <pre class="empty-cart-ascii">
  _______________
 /               \\
|  CART IS EMPTY  |
 \\_______________/
                </pre>
            </div>
            <h2 class="empty-cart-title">// Nothing here yet</h2>
            <p class="empty-cart-message">Your cart is waiting for something revolutionary.</p>
            <div class="empty-cart-actions">
                <a href="${shopUrl}" class="btn empty-cart-btn">Browse Tools →</a>
            </div>
            <div class="empty-cart-suggestions">
                <p class="suggestions-label">// Quick links</p>
                <div class="suggestions-links">
                    <a href="${servicesUrl}">Our Services</a>
                    <a href="${aboutUrl}">About Us</a>
                    <button type="button" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">Build Your Solution</button>
                </div>
            </div>
        `;
        return el;
    }
    
    // Update cart count in nav
    function updateCartCount(count) {
        const cartLink = document.querySelector('.header-cart-link');
        if (!cartLink) return;
        
        let countEl = cartLink.querySelector('.cart-count');
        
        if (count > 0) {
            if (!countEl) {
                countEl = document.createElement('span');
                countEl.className = 'cart-count';
                cartLink.appendChild(countEl);
            }
            countEl.textContent = count;
            countEl.style.display = '';
        } else {
            if (countEl) {
                countEl.style.display = 'none';
            }
        }
    }
    
    // Fetch cart count from WooCommerce Store API
    function fetchCartCount() {
        fetch('/wp-json/wc/store/v1/cart', {
            credentials: 'same-origin'
        })
        .then(res => res.json())
        .then(data => {
            if (data && typeof data.items_count !== 'undefined') {
                updateCartCount(data.items_count);
            }
        })
        .catch(() => {});
    }
    
    function checkCartState() {
        const cartBlock = document.querySelector('.wp-block-woocommerce-cart');
        if (!cartBlock) return;
        
        // Check for items - multiple possible selectors
        const hasItems = !!(
            document.querySelector('.wc-block-cart__items') ||
            document.querySelector('.wc-block-cart-items') ||
            document.querySelector('.wc-block-cart__main .wc-block-components-product-name') ||
            document.querySelector('table.wc-block-cart-items__table tr')
        );
        
        // Check if WooCommerce is showing its empty state
        const wcEmptyState = document.querySelector('.wc-block-cart--is-empty');
        const isWcEmpty = wcEmptyState && wcEmptyState.offsetParent !== null;
        
        // Determine if cart is truly empty
        const isEmpty = !hasItems || isWcEmpty;
        
        if (isEmpty) {
            // Show our custom empty cart
            if (!customEmptyCart) {
                customEmptyCart = createCustomEmptyCart();
            }
            
            // Hide the WC cart block content
            cartBlock.style.display = 'none';
            
            // Insert our custom cart if not already in DOM
            if (!customEmptyCart.parentNode) {
                cartBlock.parentNode.insertBefore(customEmptyCart, cartBlock.nextSibling);
            }
            customEmptyCart.style.display = 'block';
            
            // Update nav count to 0
            updateCartCount(0);
            
        } else {
            // Cart has items - show WC cart, hide our custom one
            cartBlock.style.display = '';
            
            if (customEmptyCart) {
                customEmptyCart.style.display = 'none';
            }
            
            // Fetch actual cart count
            fetchCartCount();
        }
    }
    
    function init() {
        const cartBlock = document.querySelector('.wp-block-woocommerce-cart');
        
        // Always set up cart count watching, even if not on cart page
        setupCartCountWatcher();
        
        if (!cartBlock) return;
        
        // Initial check
        checkCartState();
        
        // Watch for changes in the cart block (React updates)
        const observer = new MutationObserver(function(mutations) {
            // Debounce rapid changes
            clearTimeout(observer.timeout);
            observer.timeout = setTimeout(checkCartState, 100);
        });
        
        observer.observe(cartBlock, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class']
        });
        
        // Watch for changes via MutationObserver only (no wp.data to avoid WooCommerce store errors)
    }
    
    function setupCartCountWatcher() {
        // Listen for jQuery cart fragment updates (classic WooCommerce)
        if (window.jQuery) {
            jQuery(document.body).on('added_to_cart removed_from_cart updated_cart_totals wc_fragments_refreshed', function() {
                fetchCartCount();
            });
        }
        
        // Initial fetch
        fetchCartCount();
    }
    
    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // Also run after a short delay for React hydration
    setTimeout(init, 500);
    setTimeout(init, 1500);
})();
