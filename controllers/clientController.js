const Client = require('../models/client');
const bcrypt = require('bcrypt');
module.exports = {
    /// create client
    createclient: async(req, res) => {
        const { name, email, password } = req.body;

        if (!email || !name || !password) {
            return res.status(400).json({ message: "Please enter all fields" });
        }

        try {
            const client = await Client.findOne({ email: email });
            if (client) throw Error("client already exists");

            const salt = await bcrypt.genSalt(10);
            if (!salt) throw Error("Something went wrong with bcrypt");

            const hash = await bcrypt.hash(password, salt);
            if (!hash) throw Error("Something went wrong hashing the password");

            const newClient = new Client({
                name,
                email,
                password: hash,
            });

            const savedClient = await newClient.save();
            if (!savedClient) throw Error("Something went wrong saving the client");

            res.status(200).json({
                message: "client successfuly registred",
                client: savedClient,
            });
        } catch (e) {
            res.status(400).json({ error: e.message });
        }
    },
}