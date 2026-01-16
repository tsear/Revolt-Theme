import * as React from 'react';
import { createRoot } from 'react-dom/client';
import RotatingText from './RotatingText.jsx';

// Wait for DOM
document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('rotating-text-root');
  if (!container) return;

  const root = createRoot(container);
  root.render(
    <RotatingText
      texts={['Everyone', 'Startups', 'Entrepreneurs', 'Bloggers', 'Musicians', 'Wannabes', 'Promoters', 'Foodies', 'Healthcare', 'Individuals']}
      mainClassName="rotating-text-main"
      staggerFrom="last"
      initial={{ y: "100%" }}
      animate={{ y: 0 }}
      exit={{ y: "-120%" }}
      staggerDuration={0.025}
      splitLevelClassName="rotating-text-word"
      transition={{ type: "spring", damping: 30, stiffness: 400 }}
      rotationInterval={3000}
    />
  );
});
