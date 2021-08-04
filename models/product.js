const mongoose = require("mongoose");

const productSchema = new mongoose.Schema({
    name: {
        type: String
    },
    price: {
        type: Number
    },
    qte: {
        type: Number
    },
    description: {
        type: String
    },

});

module.exports = mongoose.model("product", productSchema);