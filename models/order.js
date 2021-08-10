/*date: String
prixtotal: float
status: Boolean
user: objectid
products: [{ prodobjid }]
*/
//=> npm i => pour telecharger nodemodules
const mongoose = require("mongoose");
const OrderSchema = new mongoose.Schema({
    date: {
        type: String,
        required: true
    },
    total_price: {
        type: Number,
        required: true
    },
    livred: {
        type: String,
        required: false
    },
    client: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
        required: true
    },
    products: [{
        type: mongoose.Schema.Types.ObjectId,
        ref: "product",
    }, ],
});

module.exports = mongoose.model("Order", OrderSchema);