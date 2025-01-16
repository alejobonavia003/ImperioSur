import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('imperiosur/nuevo-bloque', {// toma todos los metadatos de block.json
    edit: () => {//edit muestra lo que se va a ver en gutenber

//extraemos todas las propiedades que creo wordpress para que se adapte al editor como estilos clases y demas
        const blockProps = useBlockProps();
        return (// devolvemos 
            //un div que va a tener su class="" y atributos y demas que esta definido en blockprops 
            //esto lo que hace es adaptarlo a la interfas grafica que nos da wordpress para trabajar VERGA
            <div {...blockProps} className="nuevo-bloque" >
                {__('Modificando el editor gutenber', 'imperiosur')}
            </div>
            //aca luego podriamos agregar botones y lo que sea para que sea mas facil 
            //trabajar con la interfas grafica de wordpress, 
            
        );
    },
    save: () => {
        return <div className="nuevo-bloque">ahora estamos viendo esto de la web</div>
    }
});