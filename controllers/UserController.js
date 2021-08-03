const User = require('../models/user')
module.exports = {
    /// create user
    createuser: (req, res) => {
        User.create(req.body, (err, user) => {
            if (err) {
                ////erruer serveur attributs , code
                res.status(500).json({
                    message: 'user not created ' + err,
                    data: null
                })
            } else {
                res.status(201).json({
                    message: 'user successfully created ',
                    data: user
                });
            }
        });
    },
};