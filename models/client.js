const mongoose = require("mongoose");
const User = require("../models/user");
const clientSchema = new mongoose.Schema({
    address: {
        type: String,

    },
    phone: {
        type: Number,

    },

    cin: {
        type: Number,

    },
    //////les ordres ly bsh yaadehom lclients
    orders: [{
        type: mongoose.Schema.Types.ObjectId,
        ref: "Order",
    }, ],
});

module.exports = User.discriminator("client", clientSchema);