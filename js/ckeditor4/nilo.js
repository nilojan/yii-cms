CKEDITOR.replace( 'Page_description', {
		//uiColor: '#14B8C4',
		width: '96%',
		toolbar: [
					{ items: [ 'Bold', 'Italic', 'Underline','Strike'] },
					{ items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote' ] },
					{ items: [ 'Link', 'Unlink',] },
					{ items: [ 'image'] },
				]
});
			
CKEDITOR.replace( 'Articles_description', {
		//uiColor: '#5858FA',
		width: '96%',
		toolbar: [
					{ items: [ 'Bold', 'Italic', 'Underline','Strike'] },
					{ items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote' ] },
					{ items: [ 'Link', 'Unlink',] },
					{ items: [ 'image'] },
				]
});
			

$(document).ready(function(){
    $('btn').click(function(){
		//CKEDITOR.instances[i].updateElement();
		
		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].updateElement();
			//console.log(i +' updated');
		}		
	});	
});