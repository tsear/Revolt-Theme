// assets/js/services-loop.js

document.addEventListener('DOMContentLoaded', () => {
  const video = document.querySelector('.services-loop__video');
  const zones = document.querySelectorAll('.services-loop__zone');
  const tiles = document.querySelectorAll('.dashboard-tile');
  const grid  = document.querySelector('.dashboard-grid');

  // build the correct JSON path from the localized theme URL
  const jsonUrl = `${window.REVOLT_THEME_URL}/assets/data/hud_coords.json`;

  // === LOAD HUD COORDS FROM JSON ===
  fetch(jsonUrl)
    .then(res => {
      if (!res.ok) throw new Error(`HUD JSON failed (${res.status})`);
      return res.json();
    })
    .then(hudData => {
      const fps = 24;

      const hudMap = {
        handlebars: 'HUD_Handlebars',
        rear:       'HUD_RearAxle',
        front:      'HUD_FrontAxle',
        engine:     'HUD_Engine',
        exhaust:    'HUD_Exhaust',
      };

      function updateHUD() {
        const currentTime = video.currentTime;
        const frame = Math.floor(currentTime * fps);
        const frameData = hudData[frame.toString()];

        if (frameData) {
          zones.forEach(zone => {
            const zoneKey = zone.dataset.zone;
            const hudName = hudMap[zoneKey];
            const coords = frameData[hudName];

            if (coords) {
              zone.style.left      = `${coords.x * 100}%`;
              zone.style.top       = `${coords.y * 100}%`;
              zone.style.transform = 'translate(-50%, -50%)';
            }
          });
        }

        requestAnimationFrame(updateHUD);
      }

      requestAnimationFrame(updateHUD);
    })
    .catch(err => {
      console.error('❌ HUD JSON load failed:', err);
    });

  // === Shared function to toggle one tile ===
  function toggleTile(targetZone) {
    tiles.forEach((tile) => {
      const tileZone = tile.dataset.zone;
      if (tileZone === targetZone) {
        tile.classList.toggle('active');

        const tileTop = tile.getBoundingClientRect().top + window.pageYOffset;
        const offset  = window.innerHeight * 0.5;
        window.scrollTo({
          top: tileTop - offset,
          behavior: 'smooth'
        });
      } else {
        tile.classList.remove('active');
      }
    });
  }

  // === HUD zones click to toggle dashboard tile ===
  zones.forEach((zone) => {
    zone.addEventListener('click', () => {
      const type = zone.dataset.zone;
      toggleTile(type);
    });
  });

  // === Dashboard tile self-toggle with mobile redirect handling ===
  tiles.forEach((tile) => {
    tile.addEventListener('click', () => {
      const isActive = tile.classList.contains('active');
      const redirectUrl = tile.getAttribute('data-redirect');
      const isMobile = window.innerWidth <= 768; // Mobile detection
      
      // On mobile: first click activates, second click redirects
      if (isMobile) {
        if (isActive && redirectUrl) {
          // Second click on mobile - redirect
          window.location.href = redirectUrl;
          return;
        } else {
          // First click on mobile - activate tile
          tiles.forEach((t) => t.classList.remove('active'));
          tile.classList.add('active');
          
          const tileTop = tile.getBoundingClientRect().top + window.pageYOffset;
          const offset  = window.innerHeight * 0.5;
          window.scrollTo({
            top: tileTop - offset,
            behavior: 'smooth'
          });
        }
      } else {
        // On desktop: immediate redirect
        if (redirectUrl) {
          window.location.href = redirectUrl;
        }
      }
    });
  });

  // === Center last row if it's not full ===
  function centerLastRowIfNeeded() {
    const containerWidth = grid.offsetWidth;
    const tileWidth      = tiles[0].offsetWidth + 32; // include gap
    const itemsPerRow    = Math.floor(containerWidth / tileWidth);

    const total        = tiles.length;
    const lastRowCount = total % itemsPerRow || itemsPerRow;

    tiles.forEach(tile => tile.classList.remove('last-row'));
    if (lastRowCount < itemsPerRow) {
      const start = total - lastRowCount;
      for (let i = start; i < total; i++) {
        tiles[i].classList.add('last-row');
      }
    }
  }

  window.addEventListener('resize', centerLastRowIfNeeded);
  centerLastRowIfNeeded();
});