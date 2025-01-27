import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck  } from '@wordpress/block-editor';
import { Button, TextControl } from '@wordpress/components';

//basicamente dentro del edit trabajamos la interfas que vemos dentro de wordpress
export default function Edit() {
	return (
		<p { ...useBlockProps() }>
			{ __( 'aqui hay un bloque con la oferta del dia', 'imperiosur' ) }
		</p>
	);
}
