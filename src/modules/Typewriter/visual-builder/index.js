import React, { useState, useEffect } from 'react';

const TypewriterVB = ( { attrs } ) => {

  const [ text, setText ] = useState( '' );
  const [ loop, setLoop ] = useState( 0 );
  const [ isDeleting, setIsDeleting ] = useState( false );

  // Safe attribute handling
  const safeAttrs = attrs || {};
  const words = safeAttrs.words ? String(safeAttrs.words).split( '\n' ) : [ 'Typewriter' ];
  const speed = parseInt( safeAttrs.typing_speed ) || 120;
  const pause = parseInt( safeAttrs.pause_time ) || 2000;
  const color = safeAttrs.text_color || 'inherit';

  useEffect( () => {
    
    if (!words.length) return;
...
  }, [ text, isDeleting, loop, words, speed, pause ] );

  const style = {
    color: color
  };

  return (
    <span className="divi-typewriter" style={ style }>
      { text || '\u00A0' }
    </span>
  );

};

export default TypewriterVB;
