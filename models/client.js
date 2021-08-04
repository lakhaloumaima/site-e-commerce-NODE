const mongoose = require("mongoose");
const User = require("../models/user");
const clientSchema = new mongoose.Schema({
    adress: {
        type: String,

    },
    phone: {
        type: Number,

    },

    cin: {
        type: Number,

    },

});

module.exports = User.discriminator("client", clientSchema);