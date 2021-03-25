module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                loginButton: '#99ffff',
                loginInfoButton: '#00cccc',
                loginBorders: '#006080'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
