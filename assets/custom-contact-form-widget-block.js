wp.blocks.registerBlockType('custom-contact-form-widget/block', {
    title: 'Custom Contact Form Widget',
    icon: 'email',
    category: 'widgets',
    edit: function() {
        return null; // No editable content in the block editor
    },
    save: function() {
        return null; // No save content in the block editor
    },
});