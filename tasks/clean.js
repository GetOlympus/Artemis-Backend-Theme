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

    src: [
      configs.paths.src + '/css'
    ]
  }
};
