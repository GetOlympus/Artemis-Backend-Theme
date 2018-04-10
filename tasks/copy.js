/*!
 * @package olympus-artemis-backend-theme
 * @subpackage copy.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

module.exports = {
  app: {
    files: [
      {
        //Images
        expand: true,
        flatten: true,
        filter: 'isFile',
        src: [
          '<%= olympus.paths.src %>/img/*'
        ],
        dest: '<%= olympus.paths.tar %>/img/'
      }
    ]
  },
};
