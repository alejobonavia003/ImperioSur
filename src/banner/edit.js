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
        <div style={{ 
            display: 'flex',
            flexDirection: 'row',
            alignItems: 'center',
            padding: 20,
            borderRadius: 10,
            maxWidth: 600,
            flexWrap: 'wrap',
            justifyContent: 'space-between',
         }}>

            {images.map((image, index) => (
                <div
                    key={index}
                    style={{
                        marginBottom: 28,
                        border: '1px solid #e0e0e0',
                        borderRadius: 10,
                        background: '#fafbfc',
                        padding: 18,
                        boxShadow: '0 2px 8px rgba(0,0,0,0.04)',
                        display: 'flex',
                        alignItems: 'flex-start',
                        flexDirection: 'column',
                        maxWidth: 100,
                    }}
                >
                    <img
                        src={image.url}
                        style={{
                            width: 120,
                            height: 80,
                            objectFit: 'cover',
                            borderRadius: 6,
                            border: '1px solid #ddd',
                            background: '#fff',
                            flexShrink: 0,
                        }}
                        alt=""
                    />
                    <div style={{ flex: 1 }}>
                        <TextControl
                            label={__('Link', 'imperiosur')}
                            value={image.link}
                            onChange={(newLink) => updateImageLink(index, newLink)}
                            style={{ marginBottom: 12 }}
                        />
                        <Button
                            isDestructive
                            onClick={() => removeImage(index)}
                            style={{ marginTop: 4 }}
                        >
                            {__('Remove', 'imperiosur')}
                        </Button>
                    </div>
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
