document.addEventListener('DOMContentLoaded', function () {
    if (window.Prism) {
        Prism.highlightAll();
    }

    const tabs = document.querySelectorAll('.code-tab');
    const panels = document.querySelectorAll('.code-panel');
    const terminal = document.getElementById('terminal-output');
    const runBtn = document.getElementById('run-file');

    const outputs = {
        'what-are-sites.js': `
> Running what-are-sites.js...

output:
  websites should load fast on bad Wi-Fi,
  remain editable as you grow,
  and still work when you’re gone.

ascii:
    /\\_/\\ 
   ( o.o )   — a site is a self
    > ^ < 
        `,
        'revolt-core.js': `
> Running revolt-core.js...

output:
  this isn’t a theme.
  it’s scaffolding for your voice.
  WordPress is our engine. Revolt is the ignition.

ascii:
     /\\_____/\\
    /  o   o  \\   — core module active
   ( ==  ^  == )
    )         (
   (           )
  (__(_)___(__)__)
        `,
        'stack.config.json': `
> Running stack.config.json...

output:
  for outsiders, poets, musicians, and people who've been burned.
  your voice doesn't need branding—it needs bandwidth.

ascii:
    /\\___/\\     [deployed]
   ( -   - )
   (  =^=  )   revolt.stack complete
   (       )
   (__)___(__)
        `,
        'README.txt': `
> Running README.txt...

output:
  revolt is a method, not a product.
  we don’t brand voices—we broadcast them.
  we don’t own the work—you do.

ascii:
    /\\_/\\ 
   ( o.o )   — readme accepted
    > ^ < 
        `,
        'how-we-work.js': `
> Running how-we-work.js...

output:
  start with questions.
  build with intention.
  end with ownership.

ascii:
     /\\_____/\\
    /  o   o  \\   — system online
   (  =^=  )
    (     )
   (__(_)__)
        `
    };

    // Tab switching
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filename = tab.dataset.filename;

            tabs.forEach(t => t.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            tab.classList.add('active');
            document
                .querySelector(`.code-panel[data-filename="${filename}"]`)
                .classList.add('active');

            terminal.innerHTML = `<pre><span class="gray">// awaiting execution</span></pre>`;
        });
    });

    // Run button logic
    runBtn.addEventListener('click', () => {
        const activeTab = document.querySelector('.code-tab.active');
        const filename = activeTab.dataset.filename;
        const output = outputs[filename] || '// unknown file';
        terminal.innerHTML = `<pre>${output}</pre>`;
    });

});