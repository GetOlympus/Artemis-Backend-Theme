/*!
 * @package olympus-artemis-backend-theme
 * @subpackage clean.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    app: [
      configs.paths.tar + '/' + configs.paths.assets + '/css/*',
      configs.paths.tar + '/' + configs.paths.assets + '/fonts/*',
      configs.paths.tar + '/' + configs.paths.assets + '/img/*',
      configs.paths.tar + '/' + configs.paths.assets + '/js/*'
    ],

    mo: [
      configs.paths.i18n + '/*.mo'
    ],

    pot: [
      configs.paths.src + '/' + configs.paths.i18n + '/*.pot'
    ],

    src: [
      configs.paths.src + '/css'
    ]
  }
};
