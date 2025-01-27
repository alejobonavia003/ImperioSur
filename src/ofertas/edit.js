import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

//basicamente dentro del edit trabajamos la interfas que vemos dentro de wordpress
export default function Edit({attributes, setAttributes}) {
	const { title, shortcode } = attributes;


	return (
		<p { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title={ __('configuracion del bloque pa') }>
					<TextControl 
						label={ __('Titulo') }
						value={ title }
						onChange={ (value) => setAttributes({ title: value }) }
					/>
					<TextControl 
						label={ __('Shortcode') }
						value={ shortcode }
						onChange={ (value) => setAttributes({ shortcode: value }) }
					/>
				</PanelBody>
			</InspectorControls>
			<div>
			<h2>{title || 'Título del Bloque'}</h2>
			<p>{shortcode || '[Shortcode Aquí]'}</p>
			</div>
		</p>
	);
}
