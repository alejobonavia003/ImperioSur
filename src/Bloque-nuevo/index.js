import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import metadata from './block.json';

const ISLogo = (
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5V7h14v12z" />
      <path d="M7 10h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm4 0h2v2h-2zm-4 4h2v2h-2zm4 0h2v2h-2z" />
    </svg>
  );

registerBlockType(metadata.name, {// toma todos los metadatos de block.json
    icon: ISLogo,//toma el logo de mi archivo
    edit: Edit,//toma el bloque edit de mi archivo 
});