/*!
 * @package olympus-artemis-backend-theme
 * @subpackage cssmin.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt) {
  return {
    src: {
      files: [{
        expand: true,
        cwd: 'src/css',
        src: ['*.css'],
        dest: 'resources/assets/css',
        ext: '.min.css'
      }]
    }
  }
};
