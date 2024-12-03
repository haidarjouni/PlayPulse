document.addEventListener('alpine:init', () => {
    Alpine.data('modal', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
    }));
});
