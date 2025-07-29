/**
 * Dropdown Navigation Handler
 * Handles mobile dropdown behavior for navigation menus
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on mobile
    function isMobile() {
        return window.innerWidth <= 768;
    }

    // Handle dropdown clicks on mobile
    function handleDropdownClick(e) {
        if (!isMobile()) return;

        const dropdownItem = e.target.closest('.dropdown');
        const dropdownToggle = e.target.closest('.dropdown-toggle');
        
        if (dropdownToggle && dropdownItem) {
            e.preventDefault();
            
            // Close other open dropdowns
            document.querySelectorAll('.dropdown.mobile-active').forEach(item => {
                if (item !== dropdownItem) {
                    item.classList.remove('mobile-active');
                }
            });
            
            // Toggle current dropdown
            dropdownItem.classList.toggle('mobile-active');
        }
    }

    // Close dropdowns when clicking outside
    function handleOutsideClick(e) {
        if (!isMobile()) return;
        
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown.mobile-active').forEach(item => {
                item.classList.remove('mobile-active');
            });
        }
    }

    // Handle window resize
    function handleResize() {
        if (!isMobile()) {
            // Remove mobile-active class when switching to desktop
            document.querySelectorAll('.dropdown.mobile-active').forEach(item => {
                item.classList.remove('mobile-active');
            });
        }
    }

    // Add event listeners
    document.addEventListener('click', handleDropdownClick);
    document.addEventListener('click', handleOutsideClick);
    window.addEventListener('resize', handleResize);

    // Console log for debugging
    console.log('🎯 Dropdown navigation initialized');
});
