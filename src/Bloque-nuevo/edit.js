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
            {__('CIRCULOS DE CATEGORIAS', 'imperiosur')}
            <div className="circle-container">
                {images.map((image, index) => (
                    <div className="circle" key={index}>
                        <img src={image.url} alt={image.alt} />
                        <TextControl
                            label={__('Link', 'text-domain')}
                            value={image.link}
                            onChange={(newLink) => {
                                const newImages = [...images];
                                newImages[index].link = newLink;
                                setAttributes({ images: newImages });
                            }}
                        />
                        <Button
                            isDestructive
                            onClick={() => removeImage(index)}
                            style={{ marginTop: '10px' }}
                        >
                            {__('Remove', 'text-domain')}
                        </Button>
                    </div>
                ))}
            </div>

            <MediaUploadCheck>
                <MediaUpload
                    onSelect={onSelectImage}
                    allowedTypes={['image']}
                    render={({ open }) => (
                        <Button onClick={open} variant="primary" style={{ marginTop: '20px' }}>
                            {__('Add Image', 'text-domain')}
                        </Button>
                    )}
                />
            </MediaUploadCheck>
        </div>
    );
}
