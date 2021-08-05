///child route
const express = require('express');
const route = express.Router();
const upload = require("../middlewares/upload");
const ProductController = require('../controllers/productController')

//create product
route.post('/', upload.single('image'), ProductController.createproduct);

// get user by id
route.get('/:id', ProductController.getproductbyid);

//update user
route.put('/:id', upload.single('image'), ProductController.updateproduct);


//delete user
route.delete('/:id', ProductController.deleteproduct);

// get all users 
route.get('/', ProductController.getallproducts);


module.exports = route