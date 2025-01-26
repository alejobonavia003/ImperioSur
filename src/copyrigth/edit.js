
import { __ } from '@wordpress/i18n';

import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

import { InspectorControls, useBlockProps } from '@wordpress/block-editor';


export default function Edit() {
    const currentYear = new Date().getFullYear().toString();

    return (
        <>
            <InspectorControls>
                <PanelBody title={ __( 'Configuracion', 'imperiosur' ) }>
                    Testing
                </PanelBody>
            </InspectorControls>
            <p { ...useBlockProps() }>© { currentYear }</p>
        </>
    );
}
