import TypewriterVB from './modules/Typewriter/visual-builder';

window.jQuery(function($) {
  if (window.et_builder && window.et_builder.registerModule) {
    window.et_builder.registerModule('divi_typewriter', TypewriterVB);
  }
});