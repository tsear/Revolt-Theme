document.addEventListener('DOMContentLoaded', function () {
    if (window.Prism) {
        Prism.highlightAll();
    }

    const tabs = document.querySelectorAll('.code-tab');
    const panels = document.querySelectorAll('.code-panel');
    const terminal = document.getElementById('terminal-output');
    const runBtn = document.getElementById('run-file');

    const outputs = {
        'about.json': `
> Running about.json...

output:
  we build WordPress sites that speak clearly, behave intelligently,
  and make space for bold ideas.

ascii:
    /\\_/\\  
   ( o.o )   revolt cat is watching
    > ^ <    you're probably our kind of person.
        `,

        'process.js': `
> Running process.js...

output:
  talk first. build second.
  no proposals. just plans.
  fast is only real when it's grounded.

ascii:
    /\\_/\\  
   ( o.o )   velocity = trust
    > ^ < 
        `,

        'crew.log': `
> Running crew.log...

output:
  solo by default.
  collaborative by design.
  no hierarchy. just trust.

ascii:
    ( o.o )   one human, no fluff
        `,

        'ethics.md': `
> Running ethics.md...

output:
  if you want shady marketing tactics,
  we are not the right partner.

ascii:
     /\\___/\\
    ( -   - )   transparency > branding
    (  =^=  )
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