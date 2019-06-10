/*!
 * @package olympus-artemis-backend-theme
 * @subpackage imagemin.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    app: {
      options: {
        cache: false
      },
      files: [{
        expand: true,
        cwd: configs.paths.tar + '/' + configs.paths.assets + '/img/',
        src: ['**/*.{png,gif,jpg,jpeg}'],
        dest: configs.paths.tar + '/' + configs.paths.assets + '/img/'
      }]
    }
  }
};
