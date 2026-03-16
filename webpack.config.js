const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: {
    index: path.resolve(__dirname, 'src/index.js'),
  },
  output: {
    path: path.resolve(__dirname, 'typewriter/build'),
    filename: '[name].js',
  },
  // Divi externals
  externals: {
    ...defaultConfig.externals,
    '@divi/module': 'divi.module',
    '@divi/events': 'divi.events',
    '@divi/ajax': 'divi.ajax',
    '@divi/serialization': 'divi.serialization',
    'react': 'React',
    'react-dom': 'ReactDOM'
  }
};
