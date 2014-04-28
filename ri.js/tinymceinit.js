            
tinymce.init({
	selector: "textarea",
	theme: "modern",
	plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor "
	],
	toolbar1: "insertfile undo redo | styleselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | bold italic | link image |print preview media | forecolor backcolor",
	image_advtab: true,
	autosave_ask_before_unload: false,
        convert_urls: false,
        relative_urls : false,
});

