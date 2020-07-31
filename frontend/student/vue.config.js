const TYPE = "student";

module.exports = {
  transpileDependencies: ["vuetify"],
  devServer: {
    host: `${TYPE}.school.test`
  },

  // output built static files to Laravel's public dir.
  // note the "build" script in package.json needs to be modified as well.
  outputDir: "../../public",

  assetsDir: TYPE,

  // modify the location of the generated HTML file.
  // make sure to do this only in production.
  indexPath:
    process.env.NODE_ENV === "production"
      ? `../resources/views/${TYPE}.blade.php`
      : "index.html"
};
