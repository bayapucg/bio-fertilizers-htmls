/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

	CKEDITOR.editorConfig = function( config ) {
		
		// config.extraPlugins = "imagebrowser";
		// config.imageBrowser_listUrl = "images_list.json";
		// Define changes to default configuration here. For example:
		// config.language = 'fr';
		// config.uiColor = '#AADC6E';
		// config.removeButtons = 'Iframe,Save,NewPage,DocProps,Preview,Print,Templates,document,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,HiddenField,Strike,Subscript,Superscript,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Anchor,CreatePlaceholder,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,Styles,Format,Font,FontSize,TextColor,BGColor,UIColor,Maximize,ShowBlocks,button1,button2,button3,oembed,MediaEmbed,About,Scayt,Language,CopyFormatting';
		config.extraPlugins = 'imageuploader';
		config.imageBrowser_listUrl = "images_list.json";
		// alert( CKEDITOR_BASEPATH );
		// config.filebrowserUploadUrl = CKEDITOR_BASEPATH + '/plugins/imageuploader/imgbrowser.php';
	};
	CKEDITOR.on('dialogDefinition', function(ev) {
		
		// Take the dialog name and its definition from the event data.
		var dialogName = ev.data.name;
		var dialogDefinition = ev.data.definition;

		// Check if the definition is from the dialog we're
		// interested in (the 'link' dialog).
		if (dialogName == 'link') {
			//Remove the 'Upload' and 'Advanced' tabs from the 'Link' dialog.
			// dialogDefinition.removeContents('upload');
			// dialogDefinition.removeContents('advanced');
			// dialogDefinition.removeContents('target');

			// Get a reference to the "Target" tab and set default to '_blank'
			var targetTab = dialogDefinition.getContents('target');
			var targetField = targetTab.get('linkTargetType');
			targetField['default'] = '_blank';
		}
	});
	
	

