
module.exports = {
  entry: './public/js/test-script.jsx',
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
