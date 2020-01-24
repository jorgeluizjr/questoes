module.exports = {
  devServer: {
    // proxy: {
    //   '/api': {
    //     target: 'https://localhost/api/v1',
    //     ws: false,
    //     changeOrigin: true
    //   },

    // }
  },
  css: {
    loaderOptions: {
      sass: {
        data: '@import "~@/core/theme/main.scss"',
      },
    },
  },
  assetsDir: 'static',
  runtimeCompiler: true,
};
