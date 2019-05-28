/*!
 * @package olympus-artemis-backend-theme
 * @subpackage imagemin.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt) {
  return {
    app: {
      options: {
        cache: false
      },
      files: [{
        expand: true,
        cwd: 'resources/assets/img/',
        src: ['**/*.{png,gif,jpg,jpeg}'],
        dest: 'resources/assets/img/'
      }]
    }
  }
};
