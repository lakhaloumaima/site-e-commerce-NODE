///child route
const express = require('express');
const route = express.Router();
const ProductController = require('../controllers/productController')

//create product
route.post('/', ProductController.createproduct);

// get user by id
route.get('/:id', ProductController.getproductbyid);

//update user
route.put('/:id', ProductController.updateproduct);


//delete user
route.delete('/:id', ProductController.deleteproduct);

// get all users 
route.get('/', ProductController.getallproducts);


module.exports = route