
import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux';
import { deletetache, getprojects, selectauthedproject, selectprojects } from '../features/project/projectsSlice';
import {
    CheckCircleOutlined, CloseCircleOutlined, CheckOutlined, EditOutlined 
} from '@ant-design/icons';
import { selectusers } from '../features/users/usersSlice';
import { Badge, Button, Descriptions, Form, Input, Modal, Table, Tag  } from 'antd'
import  { gettachebydeveloper, gettaches, selectauthedtaches , selecttache, selecttachess, updatetache} from '../features/tache/tachesSlice';

const ListTaches = () => {
    const [isModalVisible, setIsModalVisible] = useState(false);
    const users = useSelector(selectusers)
    const tache = useSelector(selecttache)
    const taches = useSelector(selecttachess)
    const user = useSelector(selectusers)


    const handleOk = () => {
        setIsModalVisible(false);
    };

    const handleCancel = () => {
        setIsModalVisible(false);
    };
    const showModal = () => {
        setIsModalVisible(true);
    };
/*
    const update = (tache, value) => {
        let data = {
            id: tache._id,
            data: {
                etat: value
            }
        }

        dispatch(updateproject(data))
    }
    */
   
    const onFinish = (values) => {   
       
    console.log('Success:', values);
        let data = {
            tache_id : values.tache_id ,      
        }
        dispatch(deletetache(data))
    }
    const onFinish2 = (values) => {   
       
        let data = {
            tache_id : values.tache_id ,  
            data : values,
        }
        dispatch(updatetache(data))
        
        handleCancel() 
        //failed();
    };
    const onFinish3 = (values) => {     
        console.log('Success:', values);
         let data = {
             tache_id : values.tache_id ,      
         }
     dispatch(gettaches(data))
     
     console.log("data one tache :" + data)
     }
     const onFinishFailed3 = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };
    const onFinishFailed = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };
    const onFinishFailed2 = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };

    const addTache  = () => {
        window.location.href = '/Addtache'
       
    }
    const dispatch = useDispatch()
    const projects = useSelector(selectprojects)
    const project = useSelector(selectauthedproject)

    useEffect(() => {
            dispatch(getprojects())        
    }, []);



return (
    <div className="container" > 
        <button style={{backgroundColor:"SteelBlue"}} class="btn btn-info" onClick={addTache}>
            Add Tache
      </button> 
      <div  class="form-group row"  >  
          <Form
          style={{marginTop:"50px"}}
              name="basic"
              labelCol={{
                  span: 12,
                  offset:3
              }}
              wrapperCol={{
                  span: 12,
              }}
              initialValues={{
                  remember: true,
              }}
              onFinish={onFinish}
              onFinishFailed={onFinishFailed}
          >   
              
            
            <Form.Item
                  label="Delete by Tache Id "
                  name="tache_id"
                  rules={[
                      {
                          required: true,
                          message: 'Please input your id !',
                      },
                  ]}
              >
                  <Input />
              </Form.Item>
              
              <Form.Item
                  wrapperCol={{
                      offset: 15,
                      span: 11,
                  }}
              >
                  <Button style={{background: "SteelBlue",outline:"none",width:'100%',border:'none'}} type="primary" htmlType="submit">
                      Delete 
                  </Button>
                  </Form.Item>
          </Form>
          
          <Form
          style={{marginTop:"50px"}}
              name="basic"
              labelCol={{
                span: 12,
                offset:3
            }}
            wrapperCol={{
                span: 13,
            }}
              initialValues={{
                  remember: true,
              }}
              onFinish={onFinish3}
              onFinishFailed={onFinishFailed3}
          >   
              
            
            <Form.Item
                  label="get Tache By Id "
                  name="tache_id"
                  rules={[
                      {
                          required: true,
                          message: 'Please input your id !',
                      },
                  ]}
              >
                  <Input />
              </Form.Item>
              
              <Form.Item
                  wrapperCol={{
                    offset: 15,
                    span: 12,
                  }}
              >
                  <Button style={{background: "SteelBlue",outline:"none",width:'100%',border:'none'}} type="primary" htmlType="submit">
                      See 
                  </Button>
                  </Form.Item>
          </Form>
        </div>
        <Descriptions style={{ marginTop: "50px" }} title="Tache ">
                <Descriptions.Item label="tache_id">{tache.tache_id}</Descriptions.Item>
                
                <Descriptions.Item label="tache_name">{tache.tache_name}</Descriptions.Item>
                <Descriptions.Item label="project_name">{tache.project_name}</Descriptions.Item>
                <Descriptions.Item label="developer">{tache.developer}</Descriptions.Item>
                <Descriptions.Item label="date_debut">{tache.date_debut}</Descriptions.Item>
                <Descriptions.Item label="date_fin">{tache.date_fin}</Descriptions.Item>
                <Descriptions.Item label="Etat">{tache.etat}</Descriptions.Item>
        </Descriptions> 

      
          <br></br>
      
       
          <br></br>
          <Modal footer={null} title="Update taches" visible={isModalVisible} onOk={handleOk} onCancel={handleCancel}>
                    <Form
                        name="basic"
                        style={{marginTop:"20px"}}
                        layout="vertical"
                        initialValues={{ 
                            
                        }}
                        onFinish={onFinish2}
                        onFinishFailed={onFinishFailed2}
                    >
                        
                        <Form.Item
                           label="project_id"
                            name="id"
                            rules={[{ required: true, message: 'Please input your project_id !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="tache_id"
                            name="tache_id"
                            rules={[{ required: true, message: 'Please input your tache_id !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="tache name"
                            name="tache_name"
                            rules={[{ required: false, message: 'Please input your tache_name !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="date debut"
                            name="date_debut"
                            rules={[{ required: false, message: 'Please input your date_debut !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="date fin"
                            name="date_fin"
                            rules={[{ required: false, message: 'Please input your date_fin !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="developper"
                            name="developer"
                            rules={[{ required: false, message: 'Please input your developer !' }]}
                        >
                            <Input />
                        </Form.Item>
                       
                        <Form.Item
                           label=" etat"
                            name="etat"
                            rules={[{ required: true, message: 'Please input your etat !' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item >
                            <Button type="primary" htmlType="submit">
                                Update
                            </Button>
                        </Form.Item>
                    </Form>
                
               
            </Modal>
       
        </div>
        
    ) 
} ;

export default ListTaches