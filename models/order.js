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
    prixtotal: {
        type: float,
        required: true
    },
    status: {
        type: Boolean,
        required: true
    },

});

module.exports = mongoose.model("Order", OrderSchema);