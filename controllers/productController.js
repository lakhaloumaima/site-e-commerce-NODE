const product = require('../models/product');

module.exports = {
    /// create product
    createproduct: (req, res) => {
        product.create(req.body, (err, product) => {
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
        product.findById({ _id: req.params.id }, (err, product) => {
            if (!product) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not found ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'product found ',
                    data: product,
                });
            }
        });
    },

    //////////////indOneAndUpdate => taatyh fel param id ou name ou email ....
    updateproduct: (req, res) => {
        product.findOneAndUpdate({ _id: req.params.id }, req.body, (err, product) => {
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


    /////////// findByIdAndUpdate => taatyh fel param ken id
    updateproduct2: (req, res) => {
        product.findByIdAndUpdate({ _id: req.params.id }, req.body, (err, product) => {
            if (!product) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not updated ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'product successfully updated',
                    data: req.body,
                });
            }
        });
    },

    deleteproduct: (req, res) => {
        product.findOneAndDelete({ _id: req.params.id }, req.body, (err, product) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not deleted ' + err,
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
    deleteproduct2: (req, res) => {
        product.findByIdAndDelete({ _id: req.params.id }, req.body, (err, product) => {
            if (err) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'product not deleted ' + err,
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
        product.find({}, (err, products) => {
            if (products.length <= 0) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'no products in system ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'products in system',
                    data: products,
                });
            }
        });
    },
};