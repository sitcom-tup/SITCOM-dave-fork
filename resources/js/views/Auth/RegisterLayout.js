import Backdrop from '@mui/material/Backdrop'
import CircularProgress from '@mui/material/CircularProgress'
import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom'
import Register from '../../commons/Login/Register'
import { useFetch } from '../../hooks/useFetch'
import ERR404 from '../Errors/404'


const RegisterLayout = () => {

    const path = window.location.pathname.split('/');
    const action = path[1];
    const rolename = path[2];
    
    // const { response:picker, isLoading } = useFetch('get',`${process.env.MIX_API_HOSTNAME}${rolename == 'coordinator' ? 'companies' : 'courses'}`);
    
    const { response:picker, isLoading, error } = useFetch({
        method:'get',
        url:`${process.env.MIX_API_HOSTNAME}${rolename == 'supervisor' ? 'companies' : 'courses'}`
    });

    const [values, setValues] = React.useState({
        ddpicker: '',
        selectedPicker: '',
        studentId: '',
        firstname: '',
        lastname: '',
        email:'',
        password: '',
        confirmPassword:'',
        amount: '',
        weight: '',
        weightRange: '',
        showPassword: false,
        showConfirmPassword: false,
    });

    const handleSelect = (e) => {
        setValues({...values,selectedPicker:e.target.value})
    }

    const handleValues = (e) => {
        setValues({...values,[e.target.name]:e.target.value});
    }

    const handleChange = (prop) => (event) => {
        setValues({ ...values, [event.target.name]:event.target.value});
    };

    const handleClickShowPassword = () => {
        setValues({
            ...values,
            showPassword: !values.showPassword,
        });
    };

    const handleClickShowConfirmPass = () => {
        setValues({
            ...values,
            showConfirmPassword: !values.showConfirmPassword,
        });
    };
    
    const handleMouseDownPassword = (e) => {
        e.preventDefault();
    };

    const handleFormSubmit = (e) => {
        console.log(`Email ${values.email}, Password ${values.password}`);
    }

    return (
        <>
            {isLoading &&
                <Backdrop sx={{ color: '#fff', zIndex: (theme) => theme.zIndex.drawer + 1 }} open={true}>
                    <CircularProgress color="inherit" />
                </Backdrop> 
            }
            {
                !isLoading && !error &&
                <Register
                    auth={action}
                    role={rolename}
                    values={values}
                    pickerVal={picker}
                    handleValues={handleValues}
                    handleChange={handleChange}
                    handleSelect={handleSelect}
                    handleFormSubmit={handleFormSubmit}
                    handleClickShowPassword={handleClickShowPassword}
                    handleShowConfirmPass={handleClickShowConfirmPass}
                    handleMouseDownPassword={handleMouseDownPassword}
                />
            }
            {
                error &&
                <ERR404 status={error.data.code} message={error.data.error} />
            }
        </>
    );
}
 
export default RegisterLayout;


if( document.getElementById('register-coordinator') ||
    document.getElementById('register-student')  || 
    document.getElementById('register-supervisor'))
{
    console.log(window.location.pathname.split('/')[2]);
    ReactDOM.render(<RegisterLayout />, document.getElementById(`register-${window.location.pathname.split('/')[2]}`));
}