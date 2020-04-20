/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
  // Define changes to default configuration here. For example:
  // config.language = 'fr';
  // config.uiColor = '#AADC6E';
  config.uploadUrl = '/api/ckEditor.php';
  config.extraPlugins = 'pbckcode,simpleImageUpload';
      config.pbckcode = {
      cls: '',
      highlighter: 'PRETTIFY',
      modes: [['HTML', 'html'], ['CSS', 'css'], ['PHP', 'php'], ['JS', 'javascript'],['SQL','sql'],['C','c'],['R','r'],['PYTHON','python'],['JAVA','java']],
      theme: 'xcode',
      tab_size: '4'
    };
  
};

