module.exports = {
    tailwindConfig: './tailwind.config.js',
    plugins: [require('prettier-plugin-tailwindcss'), '@shufo/prettier-plugin-blade'],
    printWidth: 160,
    tabWidth:5,
    singleQuote: true,
    wrapAttributes: 'auto',
    sortTailwindcssClasses: true,
};
