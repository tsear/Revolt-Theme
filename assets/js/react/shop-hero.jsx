import React from 'react';
import ReactDOM from 'react-dom/client';
import { ShoppingBag, Filter, TrendingUp, Zap } from 'lucide-react';

function ShopHero({ productCount = 0 }) {
  return (
    <>
      {/* Hero Section */}
      <div className="tw-relative tw-bg-gradient-to-br tw-from-black tw-via-gray-900 tw-to-black tw-border-b-4 tw-border-yellow-400 tw-overflow-hidden">
        {/* Animated grid background */}
        <div className="tw-absolute tw-inset-0 tw-opacity-10">
          <div className="tw-absolute tw-inset-0" style={{
            backgroundImage: 'linear-gradient(rgba(252, 185, 0, 0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(252, 185, 0, 0.1) 1px, transparent 1px)',
            backgroundSize: '50px 50px'
          }} />
        </div>
        
        {/* Content */}
        <div className="tw-relative tw-max-w-7xl tw-mx-auto tw-px-8 tw-py-16">
          <div className="tw-flex tw-items-center tw-gap-3 tw-mb-4">
            <ShoppingBag className="tw-w-8 tw-h-8 tw-text-yellow-400" />
            <span className="tw-text-yellow-400 tw-font-mono tw-text-sm tw-font-bold tw-tracking-wider">
              DIGITAL MARKETPLACE
            </span>
          </div>
          
          <h1 className="tw-font-mono tw-text-5xl md:tw-text-6xl tw-font-black tw-text-yellow-400 tw-mb-4 tw-tracking-tight">
            // DIGITAL ARSENAL
          </h1>
          
          <p className="tw-font-mono tw-text-lg tw-text-gray-300 tw-max-w-2xl tw-mb-6">
            Premium tools, templates, and services built for creators who code their own destiny.
          </p>
          
          <div className="tw-flex tw-flex-wrap tw-gap-4 tw-items-center">
            <div className="tw-flex tw-items-center tw-gap-2 tw-bg-yellow-400 tw-text-black tw-px-4 tw-py-2 tw-font-mono tw-font-bold">
              <TrendingUp className="tw-w-5 tw-h-5" />
              <span>{productCount} Products Available</span>
            </div>
            <div className="tw-flex tw-items-center tw-gap-2 tw-text-yellow-400 tw-font-mono tw-text-sm">
              <Zap className="tw-w-4 tw-h-4" />
              <span>Instant Digital Delivery</span>
            </div>
          </div>
        </div>
        
        {/* Diagonal stripe accent */}
        <div className="tw-absolute tw-bottom-0 tw-right-0 tw-w-64 tw-h-64 tw-opacity-5">
          <div className="tw-w-full tw-h-full" style={{
            backgroundImage: 'repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(252, 185, 0, 0.5) 10px, rgba(252, 185, 0, 0.5) 20px)'
          }} />
        </div>
      </div>

      {/* Controls Bar */}
      <div className="tw-bg-white tw-border-2 tw-border-black tw-mx-8 tw-my-8 tw-p-6 tw-shadow-lg">
        <div className="tw-flex tw-flex-col md:tw-flex-row tw-gap-4 tw-justify-between tw-items-center">
          <div className="tw-flex tw-items-center tw-gap-2 tw-font-mono tw-font-bold tw-text-lg">
            <Filter className="tw-w-5 tw-h-5 tw-text-yellow-500" />
            <span className="tw-text-yellow-500">&gt;</span>
            <span>{productCount} Product{productCount !== 1 ? 's' : ''} Found</span>
          </div>
          
          <div id="woo-sorting-container" className="tw-font-mono"></div>
        </div>
      </div>
    </>
  );
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  const heroRoot = document.getElementById('shop-hero-root');
  
  if (heroRoot) {
    const productCount = parseInt(heroRoot.dataset.productCount) || 0;
    
    const root = ReactDOM.createRoot(heroRoot);
    root.render(<ShopHero productCount={productCount} />);
    
    // Move WooCommerce sorting into React component
    setTimeout(() => {
      const sortingContainer = document.getElementById('woo-sorting-container');
      const wooSorting = document.querySelector('.woocommerce-ordering');
      
      if (sortingContainer && wooSorting) {
        const select = wooSorting.querySelector('select');
        if (select) {
          select.className = 'tw-px-4 tw-py-2 tw-border-2 tw-border-black tw-bg-white tw-font-mono tw-cursor-pointer hover:tw-bg-yellow-400 hover:tw-border-yellow-400 tw-transition-all';
        }
        sortingContainer.appendChild(wooSorting);
      }
    }, 100);
  }
});
