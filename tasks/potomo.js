/*!
 * @package olympus-artemis-backend-theme
 * @subpackage po2mo.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    app: {
      options: {
        poDel: true
      },
      files: [{
        cwd: configs.paths.i18n,
        dest: configs.paths.i18n,
        expand: true,
        ext: '.mo',
        src: '*.po'
      }]
    }
  }
};
