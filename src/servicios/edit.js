import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { TextControl, TextareaControl, Button } from '@wordpress/components';

const Edit = ({ attributes, setAttributes }) => {
    const { servicios = [] } = attributes;

    const onChangeServicio = (index, key, value) => {
        const nuevosServicios = servicios.map((servicio, i) =>
            i === index ? { ...servicio, [key]: value } : servicio
        );
        setAttributes({ servicios: nuevosServicios });
    };

    const onAddServicio = () => {
        const nuevoServicio = {
            imagen: '',
            titulo: '',
            prestador: '',
            descripcion: '',
            whatsapp: ''
        };
        setAttributes({ servicios: [...servicios, nuevoServicio] });
    };

    const onRemoveServicio = (index) => {
        const nuevosServicios = servicios.filter((_, i) => i !== index);
        setAttributes({ servicios: nuevosServicios });
    };

    return (
        <div { ...useBlockProps() }>
                        <style>{`
                .servicios-container {
                    display: flex;
                    flex-wrap: nowrap;
                    gap: 20px;
                }
                .servicio-card {
                    width: 100%;
                    max-width: 300px;
                    margin: 0 auto;
                    background: #fff;
                    padding: 15px;
                    border-radius: 10px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    box-sizing: border-box;
                }
                .servicio-imagen {
                    max-width: 100px;
                    height: 100px;
                    margin-bottom: 10px;
                    border-radius: 8px;
                    display: block;
                }
                .servicio-titulo {
                    font-size: 18px;
                    font-weight: bold;
                    margin: 0 0 5px;
                }
                .servicio-prestador {
                    font-size: 14px;
                    color: #777;
                    margin: 0 0 5px;
                }
                .servicio-descripcion {
                    font-size: 14px;
                    margin: 5px 0;
                    text-align: center;
                }
                .servicio-whatsapp {
                    display: inline-block;
                    background-color: #25D366;
                    color: white;
                    text-align: center;
                    padding: 8px 15px;
                    border-radius: 5px;
                    text-decoration: none;
                    margin-top: 10px;
                }
            `}</style>
            <div className="servicios-container">
                {servicios.map((servicio, index) => (
                    <div className="servicio-card" key={index}>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) => onChangeServicio(index, 'imagen', media.url)}
                                allowedTypes={['image']}
                                render={({ open }) => (
                                    <Button onClick={open}>
                                        {servicio.imagen ? (
                                            <img src={servicio.imagen} alt={servicio.titulo} className="servicio-imagen" />
                                        ) : (
                                            'Subir imagen'
                                        )}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>

                        <TextControl
                            label="Título del servicio"
                            value={servicio.titulo}
                            onChange={(value) => onChangeServicio(index, 'titulo', value)}
                        />

                        <TextControl
                            label="Prestador del servicio"
                            value={servicio.prestador}
                            onChange={(value) => onChangeServicio(index, 'prestador', value)}
                        />

                        <TextareaControl
                            label="Descripción del servicio"
                            value={servicio.descripcion}
                            onChange={(value) => onChangeServicio(index, 'descripcion', value)}
                        />

                        <TextControl
                            label="Número de WhatsApp"
                            value={servicio.whatsapp}
                            onChange={(value) => onChangeServicio(index, 'whatsapp', value)}
                        />

                        <Button isDestructive onClick={() => onRemoveServicio(index)}>
                            Eliminar servicio
                        </Button>
                    </div>
                ))}
            </div>

            <Button isPrimary onClick={onAddServicio}>
                Añadir nuevo servicio
            </Button>
        </div>
    );
};

export default Edit;
