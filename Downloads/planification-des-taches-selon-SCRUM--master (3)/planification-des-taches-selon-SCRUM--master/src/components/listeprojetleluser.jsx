import { Badge, Table, Space , Button , Form , Input , Modal, Descriptions, Result, message } from 'antd'
import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux';
import { deleteproject, getproject, getprojectbyclient, getprojects,  selectdatachanged,  selectproject,  selectprojectclient,  selectprojects, updateproject } from '../features/project/projectsSlice';
import { CloseCircleOutlined , EditOutlined } from '@ant-design/icons';
import { selectauthedtaches, updatetaches } from '../features/tache/tachesSlice';
import { getuser, selectseletestatus, selectusers, selectuserss } from '../features/users/usersSlice';
import userEvent from '@testing-library/user-event';


const ListsProjects = () => {
    const dispatch = useDispatch()
    const projects = useSelector(selectprojects)

    const projectsclient = useSelector(selectprojectclient)

  const datachanged = useSelector(selectdatachanged)
  const users = useSelector(selectuserss)
  const user = useSelector(selectusers)
    useEffect(() => {
            
    }, [datachanged]);

    const tache = useSelector(selectauthedtaches)

    const [isModalVisible, setIsModalVisible] = useState(false);

    const showModal = () => {
        setIsModalVisible(true);
    };
    const handleOk = () => {
        setIsModalVisible(false);
    };
    const handleCancel = () => {
        setIsModalVisible(false);
    };
    const erreur = () => {
        message.error('email not valid');
    };
    const onFinish2 = (values) => {     
        console.log('Success:', values);
         let data = {
            email : values.email ,        
         }
        dispatch(getprojectbyclient(data))
        // dispatch(getuser(data))        
      
     console.log("data one project by email :" + data)
     //dispatch(getprojects(data))
     }
 
    const onFinishFailed2 = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };
    const onFinish = (values) => {
        console.log('Success:', values);

        let data = {
            id : values.id ,
            project_id : values.project_id,
            description : values.description ,
            date_debut : values.date_debut ,
            date_fin : values.date_fin ,
            emailclient : values.emailclient ,
            emailmaster : values.emailmaster ,
            data : values ,
        }
      //  dispatch(getproject(data))
       // dispatch(getprojects(data))
        dispatch(updateproject(data)) /*? <Result
                    status="success"
                    title="Successfully Purchased Cloud Server ECS!"
                    subTitle="Order number: 2017182818828182881 Cloud server configuration takes 1-5 minutes, please wait."
                    extra={[
                    <Button type="primary" key="console">
                        Go Console
                    </Button>,
                    <Button key="buy">Buy Again</Button>,
                    ]}
                /> : mmmmm */

        handleCancel()
        //window.location.reload()
    };
    const onFinishFailed = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };

 const columns = [
    {
        title: 'ID Project ',
        dataIndex: 'id',
        key: 'id',
        render: (text, record) => (
            <>
                {record.id}
               
            </>
        ),
    },
   
    {
        title: 'Project Name',
        dataIndex: 'projectname',
        key: 'projectname',
        render: (text, record) => (
            <>
                {record.projectname}
            </>
        ),
    },
   
    {
        title: 'Client Name',
        dataIndex: 'client',
        key: 'client',
        render: (text, record) => (
            <>
                {record.client}
            </>
        ),
    },
    {
        title: 'Scrum Master',
        dataIndex: 'scrum_master',
        key: 'scrum_master',
        render: (text, record) => (
            <>
                {record.scrum_master}
            </>
        ),
    },
    {
        title: 'Date Debut',
        dataIndex: 'date_debut',
        key: 'date_debut',
        render: (text, record) => (
            <>
                {record.date_debut}
            </>
        ),
    },
    {
        title: 'Date Fin',
        dataIndex: 'date_fin',
        key: 'date_fin',
        render: (text, record) => (
            <>
                {record.date_fin}
            </>
        ),
    },
    {
        title: 'Description',
        dataIndex: 'description',
        key: 'description',
        render: (text, record) => (
            <>
                {record.description}
            </>
        ),
    },
/* {
        title: 'Tache',
        dataIndex: 'tache',
        key: 'tache',
        render: (text, record) => (
            <>
                {record.tache[0].date_debut} <br></br>
                {record.tache[0].developer} <br></br>
                {record.tache[0].tache_name} <br></br>
                {record.tache[0].etat} <br></br>

            </>
        ),
    },
 */
    {
        title: 'Update',
        key: 'update',
        render: (text, record) => (
            
            <li><a onClick={() => showModal()} ><EditOutlined  style={{ color: 'green', cursor: 'pointer' }}/></a></li>
        ),
    },

];

return (
    <div className="container"  >        
  <Form
          style={{marginTop:"30px"}}
              name="basic"
              labelCol={{
                  span: 4,
                  offset:3
              }}
              wrapperCol={{
                  span: 11,
              }}
              initialValues={{
                  remember: true,
                  email : user.email /* ? user.email : <Result
                    status="500"
                    title="500"
                    subTitle="Sorry, something went wrong."
                    extra={<Button type="primary">Back Home</Button>}
                    />, */
              }}
              onFinish={onFinish2}
              onFinishFailed={onFinishFailed2}
          >   
              
                  <Form.Item
                  label="get Project"
                  name="email"
                  rules={[
                      {
                          required: true,
                          message: 'Please input your email !',

                      },
                  ]}
              >
                  <Input defaultValue={user.email} disabled />
              </Form.Item>
              
              <Form.Item
                  wrapperCol={{
                      offset: 7,
                      span: 11,
                  }}
              >
                  <Button style={{background: "SteelBlue",outline:"none",width:'100%',border:'none'}} type="primary" htmlType="submit">
                      See
                  </Button>
                  </Form.Item>
          </Form>  
       
        <div >
         
                {projectsclient !== undefined ?  
                    ( <h2>Projects <Badge count={projectsclient.length} showZero /> </h2>
                         &&
                        <Table columns={columns} dataSource={projectsclient} /> 
                    )
                           
                    :  <Result
                    status="500"
                    title="No data"
                   // subTitle="Sorry, something went wrong."
                    extra={<Button type="primary" href="/Home">Back Home</Button>}
                  />
                }
            </div>
        <Modal footer={null} title="Update projects" visible={isModalVisible} onOk={handleOk} onCancel={handleCancel}>
               <div>

                    <Form
                        name="basic"
                        style={{marginTop:"20px"}}
                        layout="vertical"
                        initialValues={{ 
                        //id : projects.id ,
                        //project_id : project.project_id , 
                         
                            
                         }}
                        onFinish={onFinish}
                        onFinishFailed={onFinishFailed}
                    >
                         <Form.Item
                           label="project_id"
                            name="project_id"
                            rules={[{ required: true, message: 'Please input your project_id!' }]}
                        >
                            <Input />
                        </Form.Item>
                       
                        <Form.Item
                           label="date_debut"
                            name="date_debut"
                            rules={[{ required: false, message: 'Please input your date_debut!' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="date_fin"
                            name="date_fin"
                            rules={[{ required: false, message: 'Please input your date_fin!' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="description"
                            name="description"
                            rules={[{ required: false, message: 'Please input your description!' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="emailclient"
                            name="emailclient"
                            rules={[{ required: false, message: 'Please input your emailclient!' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item
                           label="emailmaster"
                            name="emailmaster"
                            rules={[{ required: false, message: 'Please input your emailmaster!' }]}
                        >
                            <Input />
                        </Form.Item>
                        <Form.Item >
                            <Button type="primary" htmlType="submit">
                                Update
                            </Button>
                        </Form.Item>
                    </Form>
                </div>
            </Modal>
        <br></br>
        
    </div>
)

}
export default ListsProjects