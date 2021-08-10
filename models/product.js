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
    image: {
        type: String
    },
    category: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Category",
    },


});

module.exports = mongoose.model("product", productSchema);