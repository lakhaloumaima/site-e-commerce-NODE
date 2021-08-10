const Admin = require('../models/admin');
///crypter le password
const bcrypt = require('bcrypt');
module.exports = {
    /// create admin
    createadmin: async(req, res) => {
        const { name, email, password } = req.body
        if (!email || !name || !password) {
            return res.status(400).json({ message: "Please enter all fields" });
        }

        try {
            const admin = await Admin.findOne({ email: email });
            if (admin) throw Error("admin already exists");

            const salt = await bcrypt.genSalt(10);
            if (!salt) throw Error("Something went wrong with bcrypt");

            const hash = await bcrypt.hash(password, salt);
            if (!hash) throw Error("Something went wrong hashing the password");

            const newAdmin = new Admin({
                name,
                email,
                password: hash,
            });

            const savedAdmin = await newAdmin.save();
            if (!savedAdmin) throw Error("Something went wrong saving the admin");

            res.status(200).json({
                message: "admin successfuly registred",
                admin: savedAdmin,
            });
        } catch (e) {
            res.status(400).json({ error: e.message });
        }
    },
};