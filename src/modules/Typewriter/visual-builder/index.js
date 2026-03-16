import React, { useState, useEffect } from 'react';

const TypewriterVB = ( { attrs } ) => {

  const [ text, setText ] = useState( '' );
  const [ loop, setLoop ] = useState( 0 );
  const [ isDeleting, setIsDeleting ] = useState( false );

  const words = attrs.words ? attrs.words.split( '\n' ) : [ 'Typewriter' ];
  const speed = parseInt( attrs.typing_speed ) || 120;
  const pause = parseInt( attrs.pause_time ) || 2000;

  useEffect( () => {

    const i = loop % words.length;
    const fullWord = words[ i ];

    const tick = () => {

      if ( isDeleting ) {
        setText( fullWord.substring( 0, text.length - 1 ) );
      } else {
        setText( fullWord.substring( 0, text.length + 1 ) );
      }

      let delay = speed;

      if ( ! isDeleting && text === fullWord ) {
        delay = pause;
        setIsDeleting( true );
      } else if ( isDeleting && text === '' ) {
        setIsDeleting( false );
        setLoop( loop + 1 );
        delay = 400;
      }

    };

    const timer = setTimeout( tick, isDeleting && text === fullWord ? pause : speed );

    return () => clearTimeout( timer );

  }, [ text, isDeleting, loop, words, speed, pause ] );

  const style = {
    color: attrs.text_color
  };

  return (
    <span className="divi-typewriter" style={ style }>
      { text }
    </span>
  );

};

export default TypewriterVB;
