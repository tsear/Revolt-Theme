// Use your actual ASCII files for seamless scrolling

document.addEventListener('DOMContentLoaded', async function() {
    const dividers = document.querySelectorAll('.barbed-wire-divider');
    
    try {
        // Load your ASCII files
        const themeUrl = window.location.origin + '/wp-content/themes/Revolt-Theme';
        const [originalRes, mirroredRes] = await Promise.all([
            fetch(`${themeUrl}/assets/images/ascii-art.txt`),
            fetch(`${themeUrl}/assets/images/ascii-art-mirrored.txt`)
        ]);
        
        const originalArt = await originalRes.text();
        const mirroredArt = await mirroredRes.text();
        
        dividers.forEach(divider => {
            // Create container for both pieces
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
        
        console.log('✅ Using your ASCII files');
        
    } catch (error) {
        console.error('Failed to load ASCII files:', error);
    }
});