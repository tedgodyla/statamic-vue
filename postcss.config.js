module.exports = {
  plugins: [
    require('postcss-import'),
    require('postcss-nested'),
    require('postcss-preset-env')({stage: 0}),
    require('tailwindcss'),
    require('autoprefixer'),
  ]
}