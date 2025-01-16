import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './style.css';

//basicamente dentro del edit trabajamos la interfas que vemos dentro de wordpress
export default function Edit() {
    //extraemos todas las propiedades que creo wordpress para que se adapte al editor como estilos clases y demas
    const blockProps = useBlockProps();
	return ( // retornamos
        //un div que va a tener su class="" y atributos y demas que esta definido en blockprops 
        //esto lo que hace es adaptarlo a la interfas grafica que nos da wordpress para trabajar VERGA
        <div {...blockProps} >
            {__('Modificando el editor gutenber', 'imperiosur')}
        </div>
        //aca luego podriamos agregar botones y lo que sea para que sea mas facil 
        //trabajar con la interfas grafica de wordpress, 
	);
}