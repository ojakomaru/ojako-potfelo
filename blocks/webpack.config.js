const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");

module.exports = {
  ...defaultConfig, //既存の設定をここに展開
  entry: {
    exbox: "./src/exbox.js",
    iconbox: "./src/iconbox.js",
    core_expantion: "./src/core_expantion.js",
    list_expantion: "./src/list_expantion.js",
  },
  output: {
    path: path.join(__dirname, "/build"),
    filename: "[name].js",
  },
};
