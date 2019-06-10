/*!
 * @package olympus-artemis-backend-theme
 * @subpackage addtextdomain.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    app: {
      options: {
        textdomain: configs.textdomain
      },
      files: {
        src: configs.phpfiles
      }
    }
  }
};
