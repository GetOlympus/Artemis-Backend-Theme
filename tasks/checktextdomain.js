/*!
 * @package olympus-artemis-backend-theme
 * @subpackage checktextdomain.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function (grunt, configs) {
  return {
    app: {
      options: {
        keywords: configs.keywords,
        text_domain: configs.textdomain
      },
      files: [{
        expand: true,
        src: configs.phpfiles
      }],
    }
  }
};
