//url requete http =>  http://localhost:5000/api
// /categories/
// les methodes http => post , get , put , delete
///child route
const express = require('express');
const route = express.Router();
const upload = require("../middlewares/upload");
const CategoryController = require('../controllers/CategoryController')

//create user
route.post('/', upload.single('image'), CategoryController.createcategory);

//update user
route.put('/:id', upload.single('image'), CategoryController.updatecategory);

//delete user
route.delete('/:id', CategoryController.deletecategory);

// get user by id
route.get('/:id', CategoryController.getcategorybyid);

// get all users 
route.get('/', CategoryController.getallcategories);

module.exports = route