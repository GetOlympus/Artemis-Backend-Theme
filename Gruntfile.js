/*!
 * @package olympus-artemis-backend-theme
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

module.exports = function(grunt) {
  var path = require('path'),
    olympus = {
      paths: {
        src: 'src',
        tar: 'resources/assets'
      }
    };

  // measures the time each task takes
  require('time-grunt')(grunt);

  // load grunt config
  require('load-grunt-config')(grunt, {
    configPath: path.join(__dirname, 'tasks'),
    config: {
      olympus: olympus
    }
  });
};
