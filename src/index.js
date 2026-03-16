import { addAction } from '@wordpress/hooks';
import { registerModule } from '@divi/module-library';
import TypewriterVB from './modules/Typewriter/visual-builder';
import metadata from '../typewriter/modules/Typewriter/module.json';

addAction('divi.moduleLibrary.registerModuleLibraryStore.after', 'customTypewriterExt', () => {
  registerModule(metadata, {
    renderers: {
      edit: TypewriterVB
    }
  });
});