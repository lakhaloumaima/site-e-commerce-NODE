const product = require('../models/product');

module.exports = {
    /// create product
    createproduct: (req, res) => {
        let data = {
            name: req.body.name,
            price: req.body.price,
            qte: req.body.qte,
            description: req.body.description,
            category: req.body.category,
            image: req.file.filename,
        }
        product.create(data, (err, product) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not created ' + err,
                    data: null,
                })
            } else {
                res.status(201).json({
                    message: 'product successfully created ',
                    data: product,
                });
            }
        });
    },
    getproductbyid: (req, res) => {
        product.findById({ _id: req.params.id })
            .populate({
                path: "category",
            })
            .then((product) => {
                if (!product) {
                    res.status(500).json({
                        message: "product not found ",
                        data: null,
                    });

                } else {
                    res.status(200).json({
                        message: "product  found ",
                        data: product,
                    });
                }

            })
            .catch((err) => {
                res.status(500).json({
                    message: "product not found in system ",
                    data: null,
                });
            });
    },

    //////////////findOneAndUpdate => taatyh fel param id ou name ou email ....
    updateproduct: (req, res) => {
        let data = {
            name: req.body.name,
            price: req.body.price,
            qte: req.body.qte,
            description: req.body.description,
            category: req.body.category,
            image: req.file.filename,
        }
        product.findOneAndUpdate({ _id: req.params.id }, data, (err, product) => {
            if (!product) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not updated ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'product successfully updated',
                    data: product,
                });
            }
        });
    },

    deleteproduct: (req, res) => {
        product.findByIdAndDelete({ _id: req.params.id }, (err, product) => {
            if (!product) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not exist ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'product successfully deleted',
                    data: product,
                });
            }
        });
    },

    getallproducts: (req, res) => {
        product.find({})
            .populate({
                path: "category",
            })
            .then((products) => {
                res.status(201).json({
                    message: "product in system ",
                    data: products,
                });
            })
            .catch((err) => {
                res.status(500).json({
                    message: "no such product in system",
                    data: null,
                });
            });
    },
};