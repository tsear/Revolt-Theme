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
            // Check if this dropdown is already active
            const isActive = dropdownItem.classList.contains('mobile-active');
            
            if (isActive) {
                // Second click - allow navigation to main page
                return true; // Let the link work normally
            } else {
                // First click - show dropdown, prevent navigation
                e.preventDefault();
                
                // Close other open dropdowns
                document.querySelectorAll('.dropdown.mobile-active').forEach(item => {
                    if (item !== dropdownItem) {
                        item.classList.remove('mobile-active');
                    }
                });
                
                // Position dropdown under the clicked nav item
                const dropdown = dropdownItem.querySelector('.dropdown-menu');
                const rect = dropdownToggle.getBoundingClientRect();
                dropdown.style.left = (rect.left + rect.width / 2) + 'px';
                dropdown.style.transform = 'translateX(-50%)';
                
                // Show current dropdown
                dropdownItem.classList.add('mobile-active');
            }
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

    // Add event listeners - use capture phase to ensure we get the event first
    document.addEventListener('click', handleDropdownClick, true); // Capture phase
    document.addEventListener('click', handleOutsideClick);
    window.addEventListener('resize', handleResize);

    // Also add direct event listeners to dropdown toggles
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            handleDropdownClick(e);
        });
    });
});
