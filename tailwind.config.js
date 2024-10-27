/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#10375C',
        secondary: '#EB8317',
        tertiary: '#F3C623',
        quaternary: '#F4F6FF',
      },
      fontFamily: {
        poppins: ['Poppins'],
        montserrat: ['Montserrat'],
        inter: ['Inter'],
      },
    },
  },
  plugins: [],
}

