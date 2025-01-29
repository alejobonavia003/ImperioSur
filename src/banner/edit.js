import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { images = [] } = attributes;

    const onSelectImage = (newImage) => {
        setAttributes({
            images: [...images, { url: newImage.url, link: newImage.link || '' }], // Asegura que el link no sea undefined
        });
    };

    const removeImage = (indexToRemove) => {
        setAttributes({
            images: images.filter((_, index) => index !== indexToRemove),
        });
    };

    const updateImageLink = (index, newLink) => {
        setAttributes({
            images: images.map((img, i) => (i === index ? { ...img, link: newLink } : img)),
        });
    };

    const blockProps = useBlockProps(); // Se define una sola vez

    return (
        <div {...blockProps}>
            <p>{__('BANNER QUE OCUPA EL 100% DEL ANCHO', 'imperiosur')}</p>

            {images.map((image, index) => (
                <div key={index} style={{ marginBottom: '20px' }}>
                    <img src={image.url} style={{ width: '100%', maxHeight: '300px', objectFit: 'cover' }} />
                    
                    <TextControl
                        label={__('Link', 'imperiosur')}
                        value={image.link}
                        onChange={(newLink) => updateImageLink(index, newLink)}
                    />
                    
                    <Button
                        isDestructive
                        onClick={() => removeImage(index)}
                        style={{ marginTop: '10px' }}
                    >
                        {__('Remove', 'imperiosur')}
                    </Button>
                </div>
            ))}

            <MediaUploadCheck>
                <MediaUpload
                    onSelect={onSelectImage}
                    allowedTypes={['image']}
                    render={({ open }) => (
                        <Button onClick={open} variant="primary" style={{ marginTop: '20px' }}>
                            {__('Add Image', 'imperiosur')}
                        </Button>
                    )}
                />
            </MediaUploadCheck>
        </div>
    );
}
