import TypewriterVB from './modules/Typewriter/visual-builder';
import metadata from '../typewriter/modules/Typewriter/module.json';

/**
 * Wait for Divi 5 framework to be ready before registering the module.
 */
const registerDivi5Module = () => {
  if ( window.divi && window.divi.module && window.divi.module.registerModule ) {
    window.divi.module.registerModule( metadata.slug, {
      component: TypewriterVB,
    } );
  } else {
    // Retry if Divi is not ready yet
    setTimeout( registerDivi5Module, 50 );
  }
};

registerDivi5Module();
