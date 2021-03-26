// module.exports = {
//   transpileDependencies: [
//     'vuetify'
//   ]
// }
module.exports = {
    publicPath:
        process.env.NODE_ENV === "production"
            ? "/htdocs/dengi/" // This is whatever your path from the root is
            : "/"
};
