/**
 * CRT TV Static Grain - 2002 TV Screen Effect
 * Dense texture grain covering entire background
 */

class TVGrain {
    constructor() {
        this.container = document.getElementById('hero-canvas-container');
        
        if (!this.container) {
            console.error('Container not found');
            return;
        }

        if (typeof THREE === 'undefined') {
            console.error('THREE.js not loaded');
            return;
        }

        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: false });
        
        this.init();
        this.createTVGrain();
        this.animate();
        this.handleResize();
    }

    init() {
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.renderer.setClearColor(0x000000, 0);
        this.container.appendChild(this.renderer.domElement);
        this.camera.position.z = 1;
    }

    createTVGrain() {
        // Full screen plane for TV grain texture
        const grainGeometry = new THREE.PlaneGeometry(10, 7.5);
        
        const grainMaterial = new THREE.ShaderMaterial({
            uniforms: {
                time: { value: 0 },
                resolution: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) }
            },
            vertexShader: `
                varying vec2 vUv;
                void main() {
                    vUv = uv;
                    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                uniform float time;
                uniform vec2 resolution;
                varying vec2 vUv;
                
                float random(vec2 st) {
                    return fract(sin(dot(st.xy, vec2(12.9898, 78.233))) * 43758.5453);
                }
                
                void main() {
                    vec2 st = vUv;
                    
                    // Scale up for fine grain density like CRT TV
                    vec2 grainCoord = st * resolution * 0.5;
                    
                    // Add time for TV static animation
                    grainCoord += time * 10.0;
                    
                    // Multiple noise layers for realistic TV grain
                    float grain1 = random(grainCoord);
                    float grain2 = random(grainCoord * 2.1 + time * 5.0);
                    float grain3 = random(grainCoord * 4.3 - time * 3.0);
                    
                    // Combine grain layers
                    float grain = grain1 * 0.6 + grain2 * 0.3 + grain3 * 0.1;
                    
                    // TV scanlines effect
                    float scanline = sin(st.y * resolution.y * 2.0) * 0.04 + 0.96;
                    grain *= scanline;
                    
                    // Make it more contrasty like old TV
                    grain = smoothstep(0.3, 0.7, grain);
                    
                    // Dark grain on white background
                    gl_FragColor = vec4(0.0, 0.0, 0.0, grain * 0.15);
                }
            `,
            transparent: true,
            depthTest: false
        });
        
        this.grainMesh = new THREE.Mesh(grainGeometry, grainMaterial);
        this.scene.add(this.grainMesh);
    }

    animate() {
        requestAnimationFrame(() => this.animate());

        const time = Date.now() * 0.001;
        
        if (this.grainMesh) {
            this.grainMesh.material.uniforms.time.value = time;
        }

        this.renderer.render(this.scene, this.camera);
    }

    handleResize() {
        window.addEventListener('resize', () => {
            this.camera.aspect = window.innerWidth / window.innerHeight;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(window.innerWidth, window.innerHeight);
            
            if (this.grainMesh) {
                this.grainMesh.material.uniforms.resolution.value.set(window.innerWidth, window.innerHeight);
            }
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    if (typeof THREE !== 'undefined') {
        new TVGrain();
    }
});
