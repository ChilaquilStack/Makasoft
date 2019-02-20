const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
      module: {
        rules: [
          {
            test: /\.ts?$/,
            loader: "ts-loader",
            exclude: /node_modules/,
            options: { appendTsSuffixTo: [/\.vue$/] },
          }
        ]
      },
      resolve: {
        extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"]
      }
});
