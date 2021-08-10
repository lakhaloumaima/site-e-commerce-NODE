const User = require('../models/user');
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
module.exports = {
    /// create user
    createuser: (req, res) => {
        User.create(req.body, (err, user) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not created ' + err,
                    data: null,
                })
            } else {
                res.status(201).json({
                    message: 'user successfully created ',
                    data: user,
                });
            }
        });
    },
    getuserbyid: (req, res) => {
        User.findById({ _id: req.params.id }, (err, user) => {
            if (!user) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not found ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'user found ',
                    data: user,
                });
            }
        });
    },

    //////////////indOneAndUpdate => taatyh fel param id ou name ou email ....
    updateuser: (req, res) => {
        User.findOneAndUpdate({ _id: req.params.id }, req.body, (err, user) => {
            if (!user) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not updated ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'user successfully updated',
                    data: user,
                });
            }
        });
    },


    /////////// findByIdAndUpdate => taatyh fel param ken id
    updateuser2: (req, res) => {
        User.findByIdAndUpdate({ _id: req.params.id }, req.body, (err, user) => {
            if (!user) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not updated ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'user successfully updated',
                    data: req.body,
                });
            }
        });
    },

    deleteuser: (req, res) => {
        User.findOneAndDelete({ _id: req.params.id }, req.body, (err, user) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not deleted ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'user successfully deleted',
                    data: user,
                });
            }
        });
    },
    deleteuser2: (req, res) => {
        User.findByIdAndDelete({ _id: req.params.id }, req.body, (err, user) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'user not deleted ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'user successfully deleted',
                    data: user,
                });
            }
        });
    },
    getallusers: (req, res) => {
        User.find({}, (err, users) => {
            if (users.length <= 0) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'no users in system ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'users in system',
                    data: users,
                });
            }
        });
    },

    //////jwt bsh les données yetaadew chiffrée
    authenticate: async(req, res) => {
        const { email, password } = req.body;

        // Simple validation
        if (!email || !password) {
            return res.status(400).json({ msg: "Please enter all fields" });
        }

        try {
            // Check for existing user
            const user = await User.findOne({ email });
            if (!user) throw Error("User does not exist");

            const isMatch = await bcrypt.compare(password, user.password);
            if (!isMatch) throw Error("Invalid password");

            const token = jwt.sign({ id: user._id }, 'jwt-secret', { expiresIn: 3600 });
            if (!token) throw Error("Couldnt sign the token");

            res.status(200).json({
                token: token
            });
        } catch (e) {
            res.status(400).json({ msg: e.message });
        }
    },

};