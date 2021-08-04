const admin = require('../models/admin');

module.exports = {
    /// create admin
    createadmin: (req, res) => {
        admin.create(req.body, (err, admin) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'admin not created ' + err,
                    data: null,
                })
            } else {
                res.status(201).json({
                    message: 'admin successfully created ',
                    data: admin,
                });
            }
        });
    },
};