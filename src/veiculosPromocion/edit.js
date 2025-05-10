import { useState } from '@wordpress/element';
import { TextControl, Button, Card, CardBody, CardMedia, Icon } from '@wordpress/components';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';

export default function Edit(props) {
    const { attributes, setAttributes } = props;
    const { cards = [] } = attributes;
    const [openIndex, setOpenIndex] = useState(null);

    const addCard = () => {
        const newCard = {
            marca: '',
            modelo: '',
            año: '',
            precio: '',
            descripcion: '',
            whatsapp: '',
            imagenes: [],
            mensajePersonalizado: ''
        };
        setAttributes({ cards: [ ...cards, newCard ] });
    };

    const removeCard = (index) => {
        const newCards = cards.filter((_, i) => i !== index);
        setAttributes({ cards: newCards });
        if (openIndex === index) setOpenIndex(null);
    };

    const updateCard = (index, field, value) => {
        const newCards = cards.map((card, i) => {
            if (i === index) {
                return { ...card, [field]: value };
            }
            return card;
        });
        setAttributes({ cards: newCards });
    };

    const onSelectImages = (index, newImages) => {
        const newCards = cards.map((card, i) => {
            if (i === index) {
                return { ...card, imagenes: newImages };
            }
            return card;
        });
        setAttributes({ cards: newCards });
    };

    return (
        <div>
            {cards.map((card, index) => {
                const isOpen = openIndex === index;
                return (
                    <Card key={index} style={{ marginBottom: '15px', border: '1px solid #eee', maxWidth: '600px' }}>
                        <div
                            style={{
                                display: 'flex',
                                alignItems: 'center',
                                cursor: 'pointer',
                                padding: '10px 16px',
                                background: '#f7f7f7',
                                borderBottom: isOpen ? '1px solid #eee' : 'none'
                            }}
                            onClick={() => setOpenIndex(isOpen ? null : index)}
                        >
                            <span style={{ marginRight: 12, transition: 'transform 0.2s', transform: isOpen ? 'rotate(90deg)' : 'rotate(0deg)' }}>
                                <Icon icon="arrow-down" />
                            </span>
                            {card.imagenes && card.imagenes[0] && (
                                <img src={card.imagenes[0]} alt="Auto" style={{ width: 50, height: 50, objectFit: 'cover', borderRadius: 6, marginRight: 12 }} />
                            )}
                            <span style={{ fontWeight: 600 }}>{card.marca || 'Sin marca'}</span>
                        </div>
                        {isOpen && (
                            <CardBody>
                                <MediaUploadCheck>
                                    <MediaUpload
                                        onSelect={(media) => onSelectImages(index, media.map(m => m.url))}
                                        allowedTypes={['image']}
                                        multiple={true}
                                        gallery={true}
                                        render={({ open }) => (
                                            <Button onClick={open} isPrimary>
                                                Seleccionar imágenes
                                            </Button>
                                        )}
                                    />
                                </MediaUploadCheck>
                                {card.imagenes && card.imagenes.map((imagen, imgIndex) => (
                                    <CardMedia key={imgIndex}>
                                        <img src={imagen} alt={`Auto ${imgIndex}`} style={{ width: '150px', height: '150px' }} />
                                    </CardMedia>
                                ))}
                                <TextControl
                                    label="Marca"
                                    value={card.marca}
                                    onChange={(value) => updateCard(index, 'marca', value)}
                                />
                                <TextControl
                                    label="Modelo"
                                    value={card.modelo}
                                    onChange={(value) => updateCard(index, 'modelo', value)}
                                />
                                <TextControl
                                    label="Año"
                                    value={card.año}
                                    onChange={(value) => updateCard(index, 'año', value)}
                                />
                                <TextControl
                                    label="Precio"
                                    value={card.precio}
                                    onChange={(value) => updateCard(index, 'precio', value)}
                                />
                                <TextControl
                                    label="Descripción"
                                    value={card.descripcion}
                                    onChange={(value) => updateCard(index, 'descripcion', value)}
                                />
                                <TextControl
                                    label="Link del producto de Woocommerce"
                                    value={card.whatsapp}
                                    onChange={(value) => updateCard(index, 'whatsapp', value)}
                                />
                                <TextControl
                                    label="Mensaje personalizado para WhatsApp"
                                    help="Este mensaje se enviará al hacer clic en el botón, en lugar del mensaje predeterminado."
                                    value={card.mensajePersonalizado || ''}
                                    onChange={(value) => updateCard(index, 'mensajePersonalizado', value)}
                                />
                                <Button 
                                    isDestructive 
                                    onClick={() => removeCard(index)}
                                    style={{ marginTop: '10px' }}
                                >
                                    Eliminar Tarjeta
                                </Button>
                            </CardBody>
                        )}
                    </Card>
                );
            })}
            <Button 
                isPrimary 
                onClick={addCard}
            >
                Agregar Tarjeta
            </Button>
        </div>
    );
}
