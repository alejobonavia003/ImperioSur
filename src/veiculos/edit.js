import { TextControl, Button, Card, CardBody, CardMedia } from '@wordpress/components';

export default function Edit(props) {
    const { attributes, setAttributes } = props;
    const { cards = [] } = attributes;

    // Función para agregar una nueva tarjeta con valores iniciales vacíos
    const addCard = () => {
        const newCard = {
            marca: '',
            modelo: '',
            año: '',
            precio: '',
            descripcion: '',
            whatsapp: '',
            imagen: '',
        };
        setAttributes({ cards: [ ...cards, newCard ] });
    };

    // Función para eliminar una tarjeta según su índice
    const removeCard = (index) => {
        const newCards = cards.filter((_, i) => i !== index);
        setAttributes({ cards: newCards });
    };

    // Función para actualizar el valor de un campo de una tarjeta
    const updateCard = (index, field, value) => {
        const newCards = cards.map((card, i) => {
            if (i === index) {
                return { ...card, [field]: value };
            }
            return card;
        });
        setAttributes({ cards: newCards });
    };

    return (
        <div>
            {cards.map((card, index) => (
                <Card key={index} style={{ marginBottom: '20px' }}>
                    { card.imagen && (
                        <CardMedia>
                            <img src={ card.imagen } alt="Auto" style={{ width: '100%', height: 'auto' }} />
                        </CardMedia>
                    )}
                    <CardBody>
                        <TextControl
                            label="Marca"
                            value={ card.marca }
                            onChange={ (value) => updateCard(index, 'marca', value) }
                        />
                        <TextControl
                            label="Modelo"
                            value={ card.modelo }
                            onChange={ (value) => updateCard(index, 'modelo', value) }
                        />
                        <TextControl
                            label="Año"
                            value={ card.año }
                            onChange={ (value) => updateCard(index, 'año', value) }
                        />
                        <TextControl
                            label="Precio"
                            value={ card.precio }
                            onChange={ (value) => updateCard(index, 'precio', value) }
                        />
                        <TextControl
                            label="Descripción"
                            value={ card.descripcion }
                            onChange={ (value) => updateCard(index, 'descripcion', value) }
                        />
                        <TextControl
                            label="WhatsApp del Revendedor"
                            value={ card.whatsapp }
                            onChange={ (value) => updateCard(index, 'whatsapp', value) }
                        />
                        <TextControl
                            label="URL de la Imagen"
                            value={ card.imagen }
                            onChange={ (value) => updateCard(index, 'imagen', value) }
                        />
                        <Button 
                            isDestructive 
                            onClick={ () => removeCard(index) }
                            style={{ marginTop: '10px' }}
                        >
                            Eliminar Tarjeta
                        </Button>
                    </CardBody>
                </Card>
            ))}
            <Button 
                isPrimary 
                onClick={ addCard }
            >
                Agregar Tarjeta
            </Button>
        </div>
    );
}
