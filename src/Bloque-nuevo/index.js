import { registerBlockType } from '@wordpress/blocks';
import './style.css';
import Edit from './edit';
import metadata from './block.json';

registerBlockType(metadata.name, {// toma todos los metadatos de block.json
    edit: Edit,
    save: () => {
        return <div className="nuevo-bloque">ahora estamos viendo esto de la web</div>
    }
});