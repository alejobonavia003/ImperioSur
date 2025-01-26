
import { __ } from '@wordpress/i18n';

import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

import { InspectorControls, useBlockProps } from '@wordpress/block-editor';

import { useEffect } from 'react';


export default function Edit({ attributes, setAttributes } ) { // como argumento se recibe attributes(son los atributos del bloque) y setAttributes(que es una funcion que permite modificar los atributos del bloque)
	const { fallbackCurrentYear, showStartingYear, startingYear } = attributes;
	// se extraen los atributos del bloque y se guardan  en una constante

    const currentYear = new Date().getFullYear().toString();// se obtiene el año actual y se convierte a string

	useEffect( () => {
        if ( currentYear !== fallbackCurrentYear ) {
            setAttributes( { fallbackCurrentYear: currentYear } );
        }
    }, [ currentYear, fallbackCurrentYear, setAttributes ] );
	

	let displayDate;

	if ( showStartingYear && startingYear ) {// si showStartingYear y startingYear son verdaderos
		displayDate = startingYear+"-"+currentYear ;// se asigna el valor de startingYear y currentYear a displayDate
	} else {
		displayDate = currentYear;// se asigna el valor de currentYear a displayDate
	}

    return (
        <>
            <InspectorControls>
                <PanelBody title={ __( 'Settings', 'imperiosur' ) }>
                    <ToggleControl
                        checked={ !! showStartingYear }// se convierte a booleano
                        label={ __(
                            'mostrar año de inicio',// se muestra en el panel de controles
                            'imperiosur'
                        ) }
                        onChange={ () =>
                            setAttributes( {
                                showStartingYear: ! showStartingYear,
                            } )
                        }
                    />
                    { showStartingYear && ( // si showStartingYear es verdadero se muestra el siguiente control
                        <TextControl
                            __nextHasNoMarginBottom
                            __next40pxDefaultSize
                            label={ __(
                                'año de inicio',
                                'imperiosur'
                            ) }
                            value={ startingYear || '' }// si no hay valor se muestra un string vacio
                            onChange={ ( value ) =>
                                setAttributes( { startingYear: value } )
                            }
                        />
                    ) }
                </PanelBody>
            </InspectorControls>
            <p { ...useBlockProps() }>© { displayDate }</p>
        </>
    );
}