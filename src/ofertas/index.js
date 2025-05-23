import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import metadata from './block.json';

const ISLogo = (
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <rect width="24" height="24" fill="#0078FF" />
        <text x="3.5" y="16" fill="#FFFFFF" font-size="10" font-family="Arial, sans-serif" font-weight="bold">
          IS
        </text>
      </svg>
  );

registerBlockType(metadata.name, {// toma todos los metadatos de block.json
    icon: ISLogo,//toma el logo de mi archivo
    edit: Edit,//toma el bloque edit de mi archivo 
});