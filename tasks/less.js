/*!
 * @package olympus-artemis-backend-theme
 * @subpackage less.js
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

module.exports = function (grunt, configs) {
  var merge = require('lodash.merge'),
    files = grunt.file.expand({filter: "isFile"}, configs.paths.src + '/configs/*.json'),
    jsonArr = [], jsonObj = {};

  // read all files and build array
  files.forEach(function (jsonfile) {
    var name = jsonfile.split('/').pop().split('.')[0],
      json = grunt.file.readJSON(configs.paths.src + '/configs/' + name + '.json');

    jsonArr.push({[name]: {
      options: {
        modifyVars: json,
        optimization: 2
      },
      files: {
        [configs.paths.src + '/css/' + name + '-login.css']: [configs.paths.src + '/less/login/*.less'],
        [configs.paths.src + '/css/' + name + '.css']: [configs.paths.src + '/less/core/*.less']
      }
    }});
  });

  // build json object
  jsonArr.forEach(function (item) {
    jsonObj = merge(jsonObj, item);
  });

  return jsonObj
};
