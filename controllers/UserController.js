const User = require('../models/user')
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
};