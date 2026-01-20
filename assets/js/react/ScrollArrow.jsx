import * as React from 'react';
import { ChevronDown } from 'lucide-react';
import { motion } from 'motion/react';

const ScrollArrow = () => {
  return (
    <motion.div
      className="scroll-indicator"
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ delay: 0.5, duration: 0.8, ease: 'easeOut' }}
    >
      <ChevronDown size={32} strokeWidth={2} />
    </motion.div>
  );
};

export default ScrollArrow;
