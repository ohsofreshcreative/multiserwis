document.querySelectorAll('[data-currency-rates]').forEach((root) => {
    const select = root.querySelector('[data-currency-select]');
    if (!select) return;
    select.addEventListener('change', (e) => {
        const slug = e.target.value;
        root.querySelectorAll('[data-currency-panel]').forEach((panel) => {
            panel.classList.toggle('hidden', panel.dataset.currencyPanel !== slug);
        });
    });
});