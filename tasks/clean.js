/*!
 * @package olympus-artemis-backend-theme
 * @subpackage clean.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt) {
  return {
    app: [
      'resources/assets/css/*',
      'resources/assets/fonts/*',
      'resources/assets/img/*',
      'resources/assets/js/*'
    ],

    src: [
      'src/css'
    ]
  }
};
