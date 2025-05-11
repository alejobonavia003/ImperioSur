import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import './editor.scss';
import { Button, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { images = [] } = attributes;
    
    const onSelectImage = (newImage) => {
        setAttributes({
            images: [...images, { url: newImage.url, alt: newImage.alt, link: newImage.link }],
        });
    };

    const removeImage = (indexToRemove) => {
        const newImages = images.filter((_, index) => index !== indexToRemove);
        setAttributes({ images: newImages });
    };

    const blockProps = useBlockProps();

    return (
        <div {...blockProps}>
            <p style={{ fontWeight: 600, fontSize: 18, marginBottom: 24 }}>
                {__('CÍRCULOS DE CATEGORÍAS', 'imperiosur')}
            </p>
            <div
                style={{
                    display: 'flex',
                    flexWrap: 'wrap',
                    gap: 24,
                    marginBottom: 24,
                }}
            >
                {images.map((image, index) => (
                    <div
                        key={index}
                        style={{
                            display: 'flex',
                            flexDirection: 'column',
                            alignItems: 'center',
                            background: '#fafbfc',
                            border: '1px solid #e0e0e0',
                            borderRadius: '50%',
                            width: 140,
                            height: 180,
                            padding: 16,
                            boxShadow: '0 2px 8px rgba(0,0,0,0.04)',
                            position: 'relative',
                            justifyContent: 'flex-start',
                        }}
                    >
                        <img
                            src={image.url}
                            alt={image.alt}
                            style={{
                                width: 90,
                                height: 90,
                                objectFit: 'cover',
                                borderRadius: '50%',
                                border: '2px solid #ddd',
                                marginBottom: 12,
                                background: '#fff',
                            }}
                        />
                        <TextControl
                            label={__('Link', 'imperiosur')}
                            value={image.link}
                            onChange={(newLink) => {
                                const newImages = [...images];
                                newImages[index].link = newLink;
                                setAttributes({ images: newImages });
                            }}
                            style={{ marginBottom: 8, width: '100%' }}
                        />
                        <Button
                            isDestructive
                            onClick={() => removeImage(index)}
                            style={{ marginTop: 4, width: '100%' }}
                        >
                            {__('Remove', 'imperiosur')}
                        </Button>
                    </div>
                ))}
            </div>
            <MediaUploadCheck>
                <MediaUpload
                    onSelect={onSelectImage}
                    allowedTypes={['image']}
                    render={({ open }) => (
                        <Button onClick={open} variant="primary" style={{ marginTop: '10px' }}>
                            {__('Add Image', 'imperiosur')}
                        </Button>
                    )}
                />
            </MediaUploadCheck>
        </div>
    );
}
