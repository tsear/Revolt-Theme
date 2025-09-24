// ASCII scrolling with WordPress theme file loading

document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 ASCII scroll initializing...');
    
    const dividers = document.querySelectorAll('.barbed-wire-divider');
    
    if (dividers.length === 0) {
        console.warn('❌ No .barbed-wire-divider elements found');
        return;
    }
    
    console.log('✅ Found', dividers.length, 'ASCII dividers');
    
    // Get theme URL from WordPress
    const themeUrl = window.location.origin + '/wp-content/themes/revolt-theme';
    const originalUrl = themeUrl + '/assets/images/ascii-art.txt';
    const mirroredUrl = themeUrl + '/assets/images/ascii-art-mirrored.txt';
    
    console.log('📁 Loading ASCII from:', originalUrl);
    
    // Load both ASCII files
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
        console.log('✅ ASCII files loaded successfully');
        
        // Create scrolling for each divider
        dividers.forEach(divider => {
            // Create container for both pieces
            const container = document.createElement('div');
            container.style.position = 'absolute';
            container.style.top = '0';
            container.style.left = '0';
            container.style.height = '100px';
            container.style.whiteSpace = 'pre';
            container.style.fontFamily = '"Courier New", monospace';
            container.style.fontSize = '8px';
            container.style.lineHeight = '9px';
            container.style.color = 'rgba(128, 128, 128, 0.8)';
            container.style.pointerEvents = 'none';
            container.style.overflow = 'hidden';
            
            // Make container wide enough for mobile scaling
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                container.style.width = '600%'; // Much wider for scaled content
                container.style.transform = 'scale(1.6) scaleX(1.8)';
                container.style.transformOrigin = 'bottom left';
            } else {
                container.style.width = '200%';
            }
            
            // Create two separate elements that touch each other
            const original = document.createElement('div');
            const mirrored = document.createElement('div');
            
            original.style.position = 'absolute';
            original.style.left = '0px';
            original.style.top = '0';
            original.style.display = 'inline-block';
            original.textContent = originalArt;
            
            mirrored.style.position = 'absolute';
            mirrored.style.left = '0px'; // Will position after measuring original width
            mirrored.style.top = '0';
            mirrored.style.display = 'inline-block';
            mirrored.textContent = mirroredArt;
            
            container.appendChild(original);
            container.appendChild(mirrored);
            divider.appendChild(container);
            
            // Position mirrored right after original (touching)
            setTimeout(() => {
                const originalWidth = original.offsetWidth;
                mirrored.style.left = originalWidth + 'px';
            }, 10);
            
            // Scroll animation - faster for mobile
            let position = 0;
            function animate() {
                position -= 0.5; // Increased from 0.2 to 0.5
                
                // Reset when original is off screen (seamless loop)
                const originalWidth = original.offsetWidth || 1000;
                if (Math.abs(position) >= originalWidth) {
                    position = 0;
                }
                
                container.style.transform = `translateX(${position}px)`;
                requestAnimationFrame(animate);
            }
            animate();
        });
        
    }).catch(error => {
        console.error('❌ Failed to load ASCII files:', error);
        console.log('🔄 Using fallback ASCII content');
        
        // Fallback ASCII if files don't load
        const fallbackOriginal = `[>+)}%@%<+  *=     +)[[]*+:      <<=<}%#@ <  =<   -*][[[[>+-       <):>[%@%>>  :>:    :++++=:`;
        const fallbackMirrored = `+=+=+[  %@]%#          :=++++:  >>%@%[>:)<             +>[[   = <  < @#          :+][]  =*`;
        
        dividers.forEach(divider => {
            const container = document.createElement('div');
            container.style.position = 'absolute';
            container.style.top = '0';
            container.style.left = '0';
            container.style.width = '200%';
            container.style.height = '100px';
            container.style.whiteSpace = 'pre';
            container.style.fontFamily = '"Courier New", monospace';
            container.style.fontSize = '8px';
            container.style.lineHeight = '9px';
            container.style.color = 'rgba(128, 128, 128, 0.8)';
            container.style.pointerEvents = 'none';
            container.style.overflow = 'hidden';
            
            const original = document.createElement('div');
            const mirrored = document.createElement('div');
            
            original.style.position = 'absolute';
            original.style.left = '0px';
            original.style.top = '0';
            original.style.display = 'inline-block';
            original.textContent = fallbackOriginal;
            
            mirrored.style.position = 'absolute';
            mirrored.style.left = '0px';
            mirrored.style.top = '0';
            mirrored.style.display = 'inline-block';
            mirrored.textContent = fallbackMirrored;
            
            container.appendChild(original);
            container.appendChild(mirrored);
            divider.appendChild(container);
            
            setTimeout(() => {
                const originalWidth = original.offsetWidth;
                mirrored.style.left = originalWidth + 'px';
            }, 10);
            
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
        });
    });
    
    console.log('✅ ASCII scrolling initialized');
});