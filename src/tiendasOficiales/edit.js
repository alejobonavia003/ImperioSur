// edit.js
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

export default function Edit({ attributes, setAttributes }) {
    const { useAutomatic, customTitle, customDescription, customLogo } = attributes;
    const [brands, setBrands] = useState([]);
    
    useEffect(() => {
        if (useAutomatic) {
            apiFetch({ path: '/wp-json/custom/v1/brands' })
                .then((data) => setBrands(data))
                .catch((error) => console.error('Error fetching brands:', error));
        }
    }, [useAutomatic]);
    
    return (
        <div { ...useBlockProps() }>
            <InspectorControls>
                <PanelBody title="Opciones de Tienda" initialOpen={true}>
                    <ToggleControl
                        label="Generar automáticamente"
                        checked={useAutomatic}
                        onChange={(value) => setAttributes({ useAutomatic: value })}
                    />
                    {!useAutomatic && (
                        <>
                            <TextControl
                                label="Título"
                                value={customTitle}
                                onChange={(value) => setAttributes({ customTitle: value })}
                            />
                            <TextControl
                                label="Descripción"
                                value={customDescription}
                                onChange={(value) => setAttributes({ customDescription: value })}
                            />
                            <TextControl
                                label="URL del Logo"
                                value={customLogo}
                                onChange={(value) => setAttributes({ customLogo: value })}
                            />
                        </>
                    )}
                </PanelBody>
            </InspectorControls>
            {useAutomatic ? (
                <ul>
                    {brands.map((brand) => (
                        <li key={brand.id}>
                            <img src={brand.logo} alt={brand.name} style={{ maxWidth: '150px' }} />
                            <h3>{brand.name}</h3>
                            <p>{brand.description}</p>
                        </li>
                    ))}
                </ul>
            ) : (
                <div>
                    {customLogo && <img src={customLogo} alt="Logo" style={{ maxWidth: '150px' }} />}
                    <h3>{customTitle}</h3>
                    <p>{customDescription}</p>
                </div>
            )}
        </div>
    );
}
