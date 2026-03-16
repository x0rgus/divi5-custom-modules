import { registerModule } from '@divi/module';
import TypewriterVB from './modules/Typewriter/visual-builder';
import metadata from '../typewriter/modules/Typewriter/module.json';

/**
 * Register Visual Builder component using the native D5 API.
 * The '@divi/module' package will handle the registration.
 */
registerModule( metadata.slug, {
  component: TypewriterVB,
} );
