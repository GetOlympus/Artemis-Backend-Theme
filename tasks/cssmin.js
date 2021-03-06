/*!
 * @package olympus-artemis-backend-theme
 * @subpackage cssmin.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    src: {
      files: [{
        expand: true,
        cwd: configs.paths.src + '/css',
        src: ['*.css'],
        dest: configs.paths.tar + '/' + configs.paths.assets + '/css',
        ext: '.min.css'
      }]
    }
  }
};
