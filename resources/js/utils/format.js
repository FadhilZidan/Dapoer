export function formatPrice(amount) {
    return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
}

export function categoryLabel(cat) {
    const labels = {
        main: 'Main Course',
        rice: 'Rice & Grains',
        sweet: 'Sweet Archive',
        condiment: 'Condiment',
    };
    return labels[cat] ?? cat;
}
