(function () {
  const input = document.getElementById('distorterInput');
  const output = document.getElementById('distorterOutput');
  const switcher = document.getElementById('modeSwitcher');
  const prev = document.getElementById('prevMode');
  const next = document.getElementById('nextMode');
  const modeName = document.getElementById('currentMode');
  const modeDescription = document.getElementById('modeDescription');
  const copyBtn = document.getElementById('copyOutput');

  const themes = [
    {
      name: 'White Basic',
      class: '',
      description: 'Your content. Untouched. For now.',
      transform: text => text
    },
    {
      name: 'Dark Mirror',
      class: 'dark-mirror-theme',
      description: 'Reverses and reflects.',
      transform: text => text.split('').reverse().join('').toUpperCase()
    },
    {
      name: 'Y2K Trash',
      class: 'y2k-theme',
      description: 'Corrupts your casing, adds unstable vibes.',
      transform: text => text.split('').map((char, i) => i % 2 === 0 ? char.toUpperCase() : char.toLowerCase()).join('')
    },
    {
      name: 'Brutalist Collapse',
      class: 'brutalist-theme',
      description: 'Strips your voice to its skeleton.',
      transform: text => text.replace(/[aeiou]/gi, '')
    },
    {
      name: 'Terminal Gunk',
      class: 'terminal-gunk-theme',
      description: 'Old shell. New Tricks',
      transform: text => `$> ` + text.toLowerCase().replace(/[.,!?]/g, '')
    },
    {
      name: 'Vapor Fade',
      class: 'vapor-fade-theme',
      description: 'Easy like Sunday morning.',
      transform: text => text.split(' ').map(word => `🌊 ${word}`).join('\n')
    },
    {
      name: 'Hellfire Glow',
      class: 'hellfire-glow-theme',
      description: '🔥🔥🔥',
      transform: text => text.replace(/([b-df-hj-np-tv-z])/gi, '$1$1')
    },
    {
      name: 'Corrupt PDF',
      class: 'corrupt-pdf-theme',
      description: 'Unreadable and proud.',
      transform: text => text.split(' ').map(w => w + (Math.random() < 0.2 ? ' [?]' : '')).join(' ')
    },
    {
      name: 'Minimal Grunt',
      class: 'minimal-grunt-theme',
      description: 'One word. One grunt.',
      transform: text => text.split(' ')[0]
    }
  ];

  let current = 0;

  function applyTheme() {
    const theme = themes[current];
    document.getElementById('content-distorter').className = 'content-distorter ' + theme.class;
    modeName.textContent = theme.name;
    modeDescription.textContent = theme.description;
    updateOutput();
  }

  function updateOutput() {
    const raw = input.value;
    if (isDisallowed(raw)) {
      output.textContent = 'Nope.';
      return;
    }
    const theme = themes[current];
    output.textContent = theme.transform(raw);
  }

  function isDisallowed(text) {
    const blocked = ['hate', 'kill', 'bomb', 'nazi', 'slur'];
    return blocked.some(term => text.toLowerCase().includes(term));
  }

  // Theme navigation controls
  function goToNext() {
    current = (current + 1) % themes.length;
    applyTheme();
  }

  function goToPrev() {
    current = (current - 1 + themes.length) % themes.length;
    applyTheme();
  }

  input.addEventListener('input', updateOutput);
  copyBtn.addEventListener('click', () => {
    navigator.clipboard.writeText(output.textContent);
    copyBtn.textContent = 'Copied!';
    setTimeout(() => copyBtn.textContent = 'Copy Output', 1500);
  });
  input.addEventListener('focus', () => copyBtn.style.display = 'inline-block');

  if (switcher) switcher.addEventListener('click', goToNext);
  if (next) next.addEventListener('click', goToNext);
  if (prev) prev.addEventListener('click', goToPrev);

  applyTheme();
})();