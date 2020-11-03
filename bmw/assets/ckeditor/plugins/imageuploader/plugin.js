// Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved.
// For licensing, see LICENSE.md

CKEDITOR.plugins.add( 'imageuploader', {
	
    init: function( editor ) {
        // editor.config.filebrowserBrowseUrl = 'ckeditor/plugins/imageuploader/imgbrowser.php';
        editor.config.filebrowserBrowseUrl = 'http://localhost/p_skills/assets/ckeditor/plugins/imageuploader/imgbrowser.php';
        editor.config.filebrowserUploadUrl = 'http://localhost/p_skills/assets/ckeditor/plugins/imageuploader/imgupload.php';
    }
});
