<?php
function get_file_icon($filename) {
    if (str_ends_with($filename, '.js')) return '🟨';
    if (str_ends_with($filename, '.json')) return '🟦';
    if (str_ends_with($filename, '.md')) return '📝';
    if (str_ends_with($filename, '.log')) return '📄';
    return '📁';
}

$code_files = [
    'about.json'   => 'json',
    'process.js'   => 'javascript',
    'crew.log'     => 'markup',
    'ethics.md'    => 'markdown'
];

$default_file = 'about.json';
?>

<div class="code-container">

  <div class="code-editor" id="about-editor">
    <div class="code-chrome">
      <span class="dot red"></span>
      <span class="dot yellow"></span>
      <span class="dot green"></span>
    </div>

    <div class="code-tabs">
      <?php foreach ($code_files as $filename => $lang): ?>
        <button class="code-tab<?php if ($filename === $default_file) echo ' active'; ?>"
                data-filename="<?php echo esc_attr($filename); ?>">
          <?php echo get_file_icon($filename) . ' ' . esc_html($filename); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="code-panels">
      <?php
      foreach ($code_files as $filename => $lang):
          $filepath = get_template_directory() . "/assets/code/" . $filename;
          if (file_exists($filepath)):
              $code = htmlspecialchars(file_get_contents($filepath));
      ?>
        <div class="code-panel<?php if ($filename === $default_file) echo ' active'; ?>"
             data-filename="<?php echo esc_attr($filename); ?>">
          <pre><code class="language-<?php echo esc_attr($lang); ?>"><?php echo $code; ?></code></pre>
        </div>
      <?php endif; endforeach; ?>
    </div>

    <div class="code-actions">
      <button class="run-button" id="run-file">▶ Run</button>
    </div>

    <div class="terminal">
      <div class="terminal-header">Terminal</div>
      <div class="terminal-body" id="terminal-output">
        <pre><span class="gray">// awaiting execution</span></pre>
      </div>
    </div>
  </div>

</div>