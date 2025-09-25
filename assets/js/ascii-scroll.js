// ASCII scrolling with lazy loading per divider

document.addEventListener('DOMContentLoaded', function() {
    // Prevent multiple initializations
    if (window.asciiScrollInitialized) {
        console.log('⚠️ ASCII scroll already initialized, skipping');
        return;
    }
    window.asciiScrollInitialized = true;
    
    console.log('🎯 ASCII scroll initializing with lazy loading...');
    
    const dividers = document.querySelectorAll('.barbed-wire-divider');
    
    if (dividers.length === 0) {
        console.warn('❌ No .barbed-wire-divider elements found');
        return;
    }
    
    console.log('✅ Found', dividers.length, 'ASCII dividers - setting up observers');
    
    // Get theme URL from WordPress
    const themeUrl = window.location.origin + '/wp-content/themes/revolt-theme';
    const originalUrl = themeUrl + '/assets/images/ascii-art.txt';
    const mirroredUrl = themeUrl + '/assets/images/ascii-art-mirrored.txt';
    
    console.log('📁 ASCII files ready at:', originalUrl);
    
    // Track initialized dividers to prevent duplicates
    const initializedDividers = new Set();
    
    // Initialize a single divider when it comes into view
    function initializeDivider(divider, index) {
        if (initializedDividers.has(divider)) {
            console.log(`⚠️ Divider ${index + 1} already initialized, skipping`);
            return;
        }
        
        initializedDividers.add(divider);
        console.log(`🚀 Initializing divider ${index + 1}...`);
        
        // Load ASCII files for this specific divider
        Promise.all([
            fetch(originalUrl).then(response => {
                if (!response.ok) throw new Error('Failed to load original ASCII');
                return response.text();
            }),
            fetch(mirroredUrl).then(response => {
                if (!response.ok) throw new Error('Failed to load mirrored ASCII');
                return response.text();
            })
        ]).then(([originalArt, mirroredArt]) => {
            console.log(`✅ ASCII files loaded for divider ${index + 1}`);
            
            // Double-check this divider doesn't already have ASCII content
            if (divider.querySelector('.ascii-container')) {
                console.log(`⚠️ ASCII already exists for divider ${index + 1}, skipping`);
                return;
            }
            
            // Create container for both pieces
            const container = document.createElement('div');
            container.className = 'ascii-container';
            container.style.position = 'absolute';
            container.style.top = '0';
            container.style.left = '0';
            container.style.height = '160px';
            container.style.whiteSpace = 'pre';
            container.style.fontFamily = '"Courier New", monospace';
            container.style.fontSize = '8px';
            container.style.lineHeight = '9px';
            container.style.color = 'rgba(128, 128, 128, 0.8)';
            container.style.pointerEvents = 'none';
            container.style.overflow = 'hidden';
            
            // Set container width
            container.style.width = '600%';
            
            // Create two separate elements that touch each other
            const original = document.createElement('div');
            original.textContent = originalArt;
            original.style.position = 'absolute';
            original.style.left = '0';
            original.style.top = '0';
            original.style.whiteSpace = 'pre';
            
            const mirrored = document.createElement('div');
            mirrored.textContent = mirroredArt;
            mirrored.style.position = 'absolute';
            mirrored.style.top = '0';
            mirrored.style.whiteSpace = 'pre';
            
            container.appendChild(original);
            container.appendChild(mirrored);
            divider.appendChild(container);
            
            // Position mirrored content right after original
            setTimeout(() => {
                const originalWidth = original.offsetWidth;
                mirrored.style.left = originalWidth + 'px';
                console.log(`📐 Divider ${index + 1} positioned: original width = ${originalWidth}px`);
            }, 10);
            
            // Start animation for this divider
            let position = 0;
            function animate() {
                position -= 0.5;
                const originalWidth = original.offsetWidth || 1000;
                if (Math.abs(position) >= originalWidth) {
                    position = 0;
                }
                
                container.style.transform = `translateX(${position}px)`;
                
                requestAnimationFrame(animate);
            }
            animate();
            
            console.log(`🎬 Animation started for divider ${index + 1}`);
            
        }).catch(error => {
            console.error(`❌ Failed to load ASCII files for divider ${index + 1}:`, error);
            // You could add fallback logic here if needed
        });
    }
    
    // Set up intersection observers for each divider
    // Trigger 500px before the divider becomes visible (half-second head start)
    const observerOptions = {
        rootMargin: '500px 0px 500px 0px', // 500px buffer on top and bottom
        threshold: 0
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const divider = entry.target;
                const index = Array.from(dividers).indexOf(divider);
                console.log(`👀 Divider ${index + 1} approaching viewport, initializing...`);
                initializeDivider(divider, index);
                // Stop observing this divider once initialized
                observer.unobserve(divider);
            }
        });
    }, observerOptions);
    
    // Start observing all dividers
    dividers.forEach(divider => {
        observer.observe(divider);
    });
    
    console.log('✅ ASCII scroll observers set up - dividers will initialize on approach');
});
