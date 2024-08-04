/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
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
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

