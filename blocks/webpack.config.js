const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");

module.exports = {
  ...defaultConfig, //既存の設定をここに展開
  entry: {
    "exblock": "./src/exblock.js",
    "custom_blocks": "./src/custom-blocks.js"
  },
  output: {
    path: path.join(__dirname, "/build"),
    filename: "[name].js",
  },
};
