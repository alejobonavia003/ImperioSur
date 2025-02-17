
import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import metadata from './block.json';
import save from './save';

const ISLogo = (
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <rect width="24" height="24" fill="#0078FF" />
        <text x="3.5" y="16" fill="#FFFFFF" font-size="10" font-family="Arial, sans-serif" font-weight="bold">
          IS
        </text>
      </svg>
  );


registerBlockType( metadata.name, {
    icon: ISLogo,
    edit: Edit,
	save
} );