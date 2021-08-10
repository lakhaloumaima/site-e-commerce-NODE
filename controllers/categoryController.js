const Category = require('../models/category');

module.exports = {
    createcategory: (req, res) => {
        let data = {
            name: req.body.name,
            icon: req.file.filename,
        };
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
        });
    },
    getallcategories: (req, res) => {
        Category.find({}, (err, categories) => {
            if (categories.lengh === 0) {
                res.status(500).json({
                    message: "no categories " + err,
                    data: null,
                });
            } else {
                res.status(200).json({
                    message: "categories in system",
                    data: categories,
                });
            }
        });
    },
    //update
    upadatecategory: (req, res) => {
        let data = {
            name: req.body.name,
            icon: req.file.filename,
        };
        Category.findByIdAndUpdate({ _id: req.paramms.id },
            data,
            (err, category) => {
                if (err) {
                    res.status(500).json({
                        message: " catgory not updated " + err,
                        data: null,
                    });
                } else {
                    res.status(200).json({
                        message: "category updated successfuly",
                        data: category,
                    });
                }
            }
        );
    },
    //delete
    deletecategory: (req, res) => {
        Category.findByIdAndDelete({ _id: req.paramms.id }, (err, category) => {
            if (err) {
                res.status(500).json({
                    message: " catgory not updated " + err,
                    data: null,
                });
            } else {
                res.status(200).json({
                    message: "category updated successfuly",
                    data: category,
                });
            }
        });
    },


    //findbyid
    getcategorybyid: (req, res) => {
        Category.findById({ _id: req.params.id }, (err, category) => {
            if (err) {
                res.status(500).json({
                    message: " catgory not found " + err,
                    data: null,
                });
            } else {
                res.status(200).json({
                    message: "category found",
                    data: category,
                });
            }
        });
    },
};
/*
module.exports = {
    createCategory : (req,res) => {
        let data = {
            name : req.body.name,
            icon : req.file.filename 
        }
        category.create (data , (err,category) =>
        {
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


    //findbyid
    getcategorybyid : (req,res) =>{
        category.findById ({_id: req.params.id} ,(err,category)=>{
            if (!category) {
                res.status(500).json({
                    message : "category not found " +err,
                    data :null,
    
                });
                
            } else {
                res.status(201).json({
                    message : "category  found " ,
                    data : category,
    
                });
    
           }
        });
       },
       //update
       updatecategory : (req,res) =>{
           let data = {
               name : req.body.name,
               icon : req.file.filename,
           };
        category.findOneAndUpdate({_id :req.params.id}, data , (err,category) =>{
            if (!category) {
                res.status(500).json({
                    message : "category not updated  " +err,
                    data :null,
    
                });
            }else{
                res.status(201).json({
                    message :"category updated",
                    data : category,
                });
            }
           });
       },
       //delete
       deletecategory : (req,res) =>{
        category.findOneAndDelete({_id :req.params.id} , (err,category)=>{
            if (err) {
                res.status(500).json({
                    message : "category not removed" +err,
                    data :null,
    
                });
            }else{
                res.status(201).json({
                    message :"category deleted",
                    data : null,
                });
            }
    
           });
       },
       //findall
       getallcategories : (req,res) =>{
        category.find({},(err,categories) =>{
            if (categories.length <=0) {
                res.status(500).json({
                    message : "no category in system " +err,
                    data :null,
    
                });
                
            } else {
                res.status(201).json({
                    message : "categories in system" ,
                    data : categories,
    
                });
    
           }
    
           });
       }

    */