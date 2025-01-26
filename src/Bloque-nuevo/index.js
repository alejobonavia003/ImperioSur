import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import metadata from './block.json';

const ISLogo = (
<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M5 3h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2zm0 16h14V5H5v14z" />
  <path d="M7 10h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm4 0h2v2h-2zm-4 4h2v2h-2zm4 0h2v2h-2z" />
</svg>

  );

registerBlockType(metadata.name, {// toma todos los metadatos de block.json
    icon: ISLogo,//toma el logo de mi archivo
    edit: Edit,//toma el bloque edit de mi archivo 
});