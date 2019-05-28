/*!
 * @package olympus-artemis-backend-theme
 * @subpackage copy.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt) {
  return {
    app: {
      files: [
        {
          expand: true,
          flatten: true,
          filter: 'isFile',
          src: ['src/img/*'],
          dest: 'resources/assets/img/'
        }
      ]
    }
  }
};
