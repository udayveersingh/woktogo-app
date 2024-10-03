/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {      
      colors: {
        primary: '#F5C024',
        secondary: '#196450', 
        'red': '#B91F25',       
      },
    },
  },
  plugins: [],
}