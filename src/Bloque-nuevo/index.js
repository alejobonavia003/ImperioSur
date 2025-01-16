import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('imperiosur/nuevo-bloque', {
    edit: () => {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                {__('Hola desde el editor del nuevo bloque.', 'imperiosur')}
            </div>
        );
    },
});