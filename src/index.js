import { registerModule } from '@divi/module';
import TypewriterVB from './modules/Typewriter/visual-builder';
import metadata from '../typewriter/modules/Typewriter/module.json';

/**
 * Register Visual Builder component
 */
registerModule( metadata.slug, {
  component: TypewriterVB,
} );
