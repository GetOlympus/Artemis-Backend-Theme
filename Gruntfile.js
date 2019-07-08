/*!
 * @package olympus-artemis-backend-theme
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 */

'use strict';

module.exports = function(grunt) {
  var opts  = grunt.file.readJSON('tasks/options.json'),
    files   = grunt.file.expand({filter: "isFile"}, opts.phpfiles),
    srcpath = opts.paths.src + '/' + opts.paths.i18n,
    jsons   = grunt.file.expand({filter: "isFile"}, srcpath + '/*.json');

  // measures the time each task takes
  require('time-grunt')(grunt);

  // read all files and generate PO files
  jsons.forEach(function (jsonfile) {
    var name = jsonfile.split('/').pop().split('.')[0],
      json = grunt.file.readJSON(srcpath + '/' + name + '.json');

    var text = "";

    for (var item in json) {
      text += 'msgid "' + item + '"' + "\r\n";
      text += 'msgstr "' + json[item].replace(/\"/g, '\\"') + '"' + "\r\n";
      text += "\r\n";
    }

    grunt.file.write(opts.paths.i18n + '/' + opts.textdomain + '-' + name + '.po', text);

    if ("en_US" === name) {
      grunt.file.write(opts.paths.i18n + '/' + opts.textdomain + '-default.po', text);
    }
  });

  // load grunt config
  require('load-grunt-config')(grunt, {
    configPath: require('path').join(__dirname, 'tasks'),
    config: opts
  });
};
