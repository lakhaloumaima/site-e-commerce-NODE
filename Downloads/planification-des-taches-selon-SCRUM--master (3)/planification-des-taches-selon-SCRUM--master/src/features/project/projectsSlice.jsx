import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { Create, DeletePro, DeleteTache, GetProjectByclient, GetProjectByid, GetProjects, UpdateProject } from "./projectAPI";


const initialState = {
  project: null,
  addstatus: "",
  projects: [],
  datachanged:"",
  deletestatus : "" ,
  clientprojects : {
    clientproject : []
  }
};

//update prroject  by id
export const updateproject = createAsyncThunk("projectedit", async (data) => {
  const response = await UpdateProject(data);
  console.log("project updated :"+ response.data)
  return response.data;
});
//get project by id
export const getprojectbyclient = createAsyncThunk("getprojectbyclient", async (data) => {
  const response = await GetProjectByclient(data);
  console.log("project by client : " + response.data)
  return response.data;
});
//get project by id
export const getproject = createAsyncThunk("oneproject", async (data) => {
  const response = await GetProjectByid(data);
  console.log("tache : " + response.data)
  return response.data;
});
//delete user by id
export const deletetache = createAsyncThunk("delltache", async (id) => {
  const response = await DeleteTache(id);
  return response.data;
});

export const createproject = createAsyncThunk("projectupdate", async (data) => {
  console.log(data);
  const response = await Create(data);
  console.log(" project : "+ data) ;
  return response.data;
});


//get all users
export const getprojects = createAsyncThunk("getproject", async () => {
  const response = await GetProjects();
  console.log(response.data);
  return response.data;
});

//delete project by id
export const deleteproject = createAsyncThunk(
  "dellproject",
  async (id) => {
    const response = await DeletePro(id);
    console.log("deleted "  + id);
    return response.data;
  }
);



export const projectsSlice = createSlice({
  name: "projects",
  initialState,
  reducers: { },

  extraReducers: (builder) => {
   
    builder.addCase(createproject.fulfilled, (state, action) => {
      
      if (state.addstatus = "success") {
        console.log(action.payload);
      }
     //state.projects = action.payload;

     state.project = action.payload ;
    // state.addstatus = action.payload.data;
    });

builder.addCase(getprojects.pending, (state, action) => {
    console.log(action.payload);
    //state.projects = action.payload.data;
  });
  builder.addCase(getprojects.fulfilled, (state, action) => {
    console.log(action.payload);
    state.projects = action.payload.data;
  });
  //////////////////////////// delete 

  builder.addCase(deleteproject.fulfilled, (state, action) => {
    console.log(action.payload);
    state.datachanged = "success" ;
  });
  
  builder.addCase(deletetache.pending, (state, action) => {
    state.deletestatus = "loading";
  });

  builder.addCase(deletetache.fulfilled, (state, action) => {
    console.log(action.payload);
    if (action.payload.status === 200) {
      state.deletestatus = "success";
    } else {
      state.deletestatus = "failure";
    }
  });

 
  builder.addCase(getproject.fulfilled, (state, action) => {
    console.log(action.payload.data);
    state.projects = action.payload.data;
  });
  builder.addCase(getprojectbyclient.fulfilled, (state, action) => {
    console.log(action.payload);
   state.clientprojects.clientproject = action.payload.data;
  });

   /////////update project
  builder.addCase(updateproject.fulfilled, (state, action) => {
    console.log(action.payload);
   // state.projects = action.payload;

  });
  },
   
});

export const {  } = projectsSlice.actions;

export const selectprojects = (state) => state.projects.projects;
export const selectaddstatus = (state) => state.projects.addstatus;
export const selectdatachanged = (state) => state.projects.datachanged;
export const selectseletestatus = (state) => state.projects.deletestatus; 
export const selectauthedproject = (state) => state.projects.project;

export const selectproject = (state) => state.projects.project;
export const selectprojectclient = (state) => state.projects.clientprojects.clientproject;

export default projectsSlice.reducer;
