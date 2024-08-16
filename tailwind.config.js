/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./node_modules/flowbite/**/*.js",
      "./resources/**/*.js",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
        fontFamily :{
            'hanken-grotesk': ['Hanken Grotesk', 'sans-serif'],
        } ,
        keyframes: {
            'fade-in-scale': {
                '0%': { transform: 'opacity-0 scale-95' },
                '100%': { transform: 'opacity-100 scale-100' },
            },
            'fade-out-scale': {
                '0%': { transform: 'opacity-100 scale-100' },
                '100%': { transform: 'opacity-0 scale-95' },
            },
        },
        animation: {
            'fade-in-scale': 'fade-in-scale 0.1s ease-out forwards',
            'fade-out-scale': 'fade-out-scale 0.075s ease-in forwards',
        },
        dropShadow: {
            'custom-blue': '0 20px 20px rgba(147, 197, 253, 0.5)', // Blue-300 with 50% opacity
        },
        colors:{
            'gray-75': 'rgba(249, 250, 251, 1)', // Custom gray color with 75% opacity
        }
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('flowbite/plugin'),
  ],
}

