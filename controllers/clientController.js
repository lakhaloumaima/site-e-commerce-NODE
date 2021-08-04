const client = require('../models/client');

module.exports = {
    /// create client
    createclient: (req, res) => {
        client.create(req.body, (err, client) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'client not created ' + err,
                    data: null,
                })
            } else {
                res.status(201).json({
                    message: 'client successfully created ',
                    data: client,
                });
            }
        });
    },
};