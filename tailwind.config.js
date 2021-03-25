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
                loginButton: '#8df9fc',
                loginInfoButton: '#24bdcd',
                loginBorders: '#006080',
                loginInputText: '#828483',
                loginButtonText: '#7ea0b9'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
