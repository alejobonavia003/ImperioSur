
import { __ } from '@wordpress/i18n';

import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

import { InspectorControls, useBlockProps } from '@wordpress/block-editor';


export default function Edit({ attributes, setAttributes } ) { // como argumento se recibe attributes(son los atributos del bloque) y setAttributes(que es una funcion que permite modificar los atributos del bloque)
	const { showStartingYear, startingYear } = attributes; // se extraen los atributos del bloque y se guardan  en una constante
    const currentYear = new Date().getFullYear().toString();// se obtiene el año actual y se convierte a string

    return (
        <>
            <InspectorControls>
                <PanelBody title={ __( 'Settings', 'imperiosur' ) }>
                    <ToggleControl
                        checked={ !! showStartingYear }
                        label={ __(
                            'mostrar año de inicio',
                            'imperiosur'
                        ) }
                        onChange={ () =>
                            setAttributes( {
                                showStartingYear: ! showStartingYear,
                            } )
                        }
                    />
                    { showStartingYear && (
                        <TextControl
                            __nextHasNoMarginBottom
                            __next40pxDefaultSize
                            label={ __(
                                'año de inicio',
                                'imperiosur'
                            ) }
                            value={ startingYear || '' }
                            onChange={ ( value ) =>
                                setAttributes( { startingYear: value } )
                            }
                        />
                    ) }
                </PanelBody>
            </InspectorControls>
            <p { ...useBlockProps() }>© { currentYear }</p>
        </>
    );
}