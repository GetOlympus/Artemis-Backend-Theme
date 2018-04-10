/*!
 * @package olympus-artemis-backend-theme
 * @subpackage cssmin.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

module.exports = {
  src: {
    files: {
      '<%= olympus.paths.tar %>/css/artemis.min.css': [
        '<%= olympus.paths.src %>/css/artemis.css'
      ],

      '<%= olympus.paths.tar %>/css/artemis.login.min.css': [
        '<%= olympus.paths.src %>/css/artemis.login.css'
      ]
    }
  }
};
