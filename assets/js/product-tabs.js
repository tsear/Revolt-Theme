/**
 * Product detail page tabs functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('[role="tab"]');
    const panels = document.querySelectorAll('[role="tabpanel"]');

    if (tabs.length === 0 || panels.length === 0) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetId = this.id.replace('-tab', '');
            
            // Update tabs
            tabs.forEach(t => {
                t.classList.remove('tw-border-yellow-500', 'tw-text-yellow-500', 'active');
                t.classList.add('tw-border-transparent');
                t.setAttribute('aria-selected', 'false');
            });
            
            // Activate clicked tab
            this.classList.remove('tw-border-transparent');
            this.classList.add('tw-border-yellow-500', 'tw-text-yellow-500', 'active');
            this.setAttribute('aria-selected', 'true');
            
            // Update panels
            panels.forEach(panel => {
                panel.classList.add('tw-hidden');
            });
            
            // Show target panel
            const targetPanel = document.getElementById(targetId);
            if (targetPanel) {
                targetPanel.classList.remove('tw-hidden');
            }
        });
    });
});
