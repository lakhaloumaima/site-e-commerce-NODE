const mongoose = require("mongoose");
const User = require("../models/user");
const adminSchema = new mongoose.Schema({
    about: {
        type: String
    },

});

module.exports = User.discriminator("admin", adminSchema);