
module.exports = {
  entry: './public/js/app.jsx',
  output: {
    filename: './public/dist/app.bundle.js'
  },

  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: '/node_modules/',
        use: 'babel-loader'
      }
    ]
  }

}
