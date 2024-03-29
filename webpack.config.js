const path = require("path");

module.exports = {
    mode: "production",
    entry: "./lib/javascript/index.js",
    output: {
        filename: "index.js",
        path: path.resolve(__dirname, "dist"),
    },
};