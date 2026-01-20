import * as React from 'react';
import { createRoot } from 'react-dom/client';
import RotatingText from './RotatingText.jsx';
import ScrollArrow from './ScrollArrow.jsx';

// Wait for DOM
document.addEventListener('DOMContentLoaded', () => {
  // Rotating text
  const textContainer = document.getElementById('rotating-text-root');
  if (textContainer) {
    const textRoot = createRoot(textContainer);
    textRoot.render(
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
  }

  // Scroll arrow
  const arrowContainer = document.getElementById('scroll-arrow-root');
  if (arrowContainer) {
    const arrowRoot = createRoot(arrowContainer);
    arrowRoot.render(<ScrollArrow />);
  }
});
