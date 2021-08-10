//url requete http =>  http://localhost:5000/api
// /categories/
// les methodes http => post , get , put , delete
///child route
const express = require('express');
const route = express.Router();
const upload = require("../middlewares/upload");
const CategoryController = require('../controllers/categoryController');
const isauth = require("../middlewares/auth");
const isadmin = require("../middlewares/isAdmin");

//create user
route.post('/', upload.single('image'), isauth, CategoryController.createcategory);

//update user
route.put('/:id', upload.single('image'), isauth, CategoryController.upadatecategory);

//delete user
route.delete('/:id', isauth, CategoryController.deletecategory);

// get user by id
route.get('/:id', CategoryController.getcategorybyid);

// get all users 
route.get('/', CategoryController.getallcategories);

module.exports = route