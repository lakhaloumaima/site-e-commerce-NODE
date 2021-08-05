const Category = require('../models/category')

module.exports = {
    createcategory: (req, res) => {

        let data = {
            name: req.body.name,
            icon: req.file.filename
        }

        Category.create(data, (err, category) => {
            if (err) {
                res.status(500).json({
                    message: "category not created " + err,
                    data: null,
                });
            } else {
                res.status(201).json({
                    message: "category  created ",
                    data: category,
                });
            }
        })


    },
    getallcategories: (req, res) => {
        Category.find({}, (err, categories) => {
            if (categories.length === 0) {
                res.status(500).json({
                    message: "no categories " + err,
                    data: null,
                });
            } else {
                res.status(200).json({
                    message: "categories in system ",
                    data: categories,
                });
            }
        })
    },
    updatecategory: (req, res) => {
        let data = {
            name: req.body.name,
            icon: req.file.filename
        }
        Category.findByIdAndUpdate({ _id: req.params.id }, data, (err, category) => {
            if (!category) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'category not updated ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'category successfully updated',
                    data: category,
                });
            }
        });
    },
    deletecategory: (req, res) => {
        Category.findByIdAndDelete({ _id: req.params.id }, req.body, (err, category) => {
            if (!category) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'category not exist ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'category successfully deleted',
                    data: category,
                });
            }
        });
    },
    getcategorybyid: (req, res) => {
        Category.findById({ _id: req.params.id }, (err, category) => {
            if (!category) {
                ////erreur serveur attributs , code
                res.status(500).json({
                    message: 'category not found ' + err,
                    data: null,
                })
            } else {
                res.status(200).json({
                    message: 'category found ',
                    data: category,
                });
            }
        });
    },

}