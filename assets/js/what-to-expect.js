document.addEventListener('DOMContentLoaded', function() {
    const expectGroups = document.querySelectorAll('.expect-group');
    
    expectGroups.forEach(group => {
        const proofItems = group.querySelectorAll('.proof-item');
        
        // Add subtle animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    
                    // Stagger proof item animations
                    proofItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }
            });
        }, { threshold: 0.3 });
        
        observer.observe(group);
        
        // Initialize proof items as hidden
        proofItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(10px)';
            item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        });
    });
});
