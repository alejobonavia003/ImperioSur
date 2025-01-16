import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import metadata from './block.json';

registerBlockType(metadata.name, {// toma todos los metadatos de block.json
    edit: Edit,//toma el bloque edit de mi archivo 
});