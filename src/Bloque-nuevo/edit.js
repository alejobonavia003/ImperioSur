import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck  } from '@wordpress/block-editor';
import './editor.scss';
import { Button } from '@wordpress/components';

//basicamente dentro del edit trabajamos la interfas que vemos dentro de wordpress
export default function Edit({ attributes, setAttributes }) {
    const {images} = attributes;
    const onSelectImage = (newImage) => {
        setAttributes({
            images: [...images, { url: newImage.url, alt: newImage.alt }]
        });
    };
    const removeImage = (indexToRemove) => {
        const newImages = images.filter((_, index) => index !== indexToRemove);
        setAttributes({ images: newImages });
    };
    //extraemos todas las propiedades que creo wordpress para que se adapte al editor como estilos clases y demas
    const blockProps = useBlockProps();
	return ( // retornamos
        //un div que va a tener su class="" y atributos y demas que esta definido en blockprops 
        //esto lo que hace es adaptarlo a la interfas grafica que nos da wordpress para trabajar VERGA
        
        
        <div {...blockProps} >
            {__('Modificando el editor gutenber', 'imperiosur')}
            <div className='circle-container'>
                {images.map((image, index) => (
                     <div className="circle" key={index}>
                        <img src={image.url} alt={image.alt} />
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
                        <Button
                            onClick={open}
                            variant="primary"
                            style={{ marginTop: '20px' }}
                        >
                            {__('Add Image', 'text-domain')}
                        </Button>
                    )}
                />
            </MediaUploadCheck>

        </div>



        //aca luego podriamos agregar botones y lo que sea para que sea mas facil 
        //trabajar con la interfas grafica de wordpress, 
	);
}