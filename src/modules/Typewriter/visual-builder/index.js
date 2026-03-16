import React, { useState, useEffect, useMemo } from 'react';

const TypewriterVB = ({ attrs }) => {
  const safeAttrs = attrs || {};
  const rawWords = safeAttrs.words || 'Typewriter';
  const speed = parseInt(safeAttrs.typing_speed, 10) || 120;
  const pause = parseInt(safeAttrs.pause_time, 10) || 2000;
  const textColor = safeAttrs.text_color || 'inherit';

  const words = useMemo(() => {
    return String(rawWords).split('\n').filter(word => word.trim() !== '');
  }, [rawWords]);

  const [text, setText] = useState('');
  const [loop, setLoop] = useState(0);
  const [isDeleting, setIsDeleting] = useState(false);

  useEffect(() => {
    if (!words || words.length === 0) return;

    const currentWordIndex = loop % words.length;
    const fullWord = words[currentWordIndex] || '';

    let timer;

    const tick = () => {
      if (isDeleting) {
        setText(fullWord.substring(0, text.length - 1));
        
        if (text === '') {
          setIsDeleting(false);
          setLoop(loop + 1);
        }
      } else {
        setText(fullWord.substring(0, text.length + 1));
        
        if (text === fullWord) {
          timer = setTimeout(() => setIsDeleting(true), pause);
          return;
        }
      }
    };

    const currentSpeed = isDeleting ? speed / 2 : speed;
    timer = setTimeout(tick, currentSpeed);

    return () => clearTimeout(timer);
  }, [text, isDeleting, loop, words, speed, pause]);

  return (
    <span className="divi-typewriter" style={{ color: textColor }}>
      {text || '\u00A0'}
    </span>
  );
};

export default TypewriterVB;