
import { __ } from '@wordpress/i18n';



import { InspectorControls, useBlockProps } from '@wordpress/block-editor';


export default function Edit() {
    const currentYear = new Date().getFullYear().toString();

    return (
        <>
            <InspectorControls>
                Testing
            </InspectorControls>
            <p { ...useBlockProps() }>© { currentYear }</p>
        </>
    );
}
