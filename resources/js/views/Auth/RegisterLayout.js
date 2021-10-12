import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom'
import Register from '../../commons/Login/Register'
import useFetch from '../../hooks/useFetch'


const RegisterLayout = () => {

    const { response:data, isLoading, error } = useFetch('get',`${process.env.MIX_API_HOSTNAME}routes`,{'Content-Laguage':'en'});
 
    const path = window.location.pathname.split('/');
    const action = path[1];
    const rolename = path[2];

    const [values, setValues] = React.useState({
        amount: '',
        password: '',
        weight: '',
        weightRange: '',
        showPassword: false,
    });

    const handleEmail = e => {
        setValues({...values, email:e.target.value });
    };

    const handleChange = (prop) => (event) => {
        console.log(event.target.value);
        setValues({ ...values, password:event.target.value});
    };

    const handleClickShowPassword = () => {
        setValues({
            ...values,
            showPassword: !values.showPassword,
        });
    };

    const handleMouseDownPassword = (event) => {
        event.preventDefault();
    };

    return (
        <Register
            auth={action}
            role={rolename}
            values={values}
            handleEmail={handleEmail}
            handleChange={handleChange}
            handleClickShowPassword={handleClickShowPassword}
            handleMouseDownPassword={handleMouseDownPassword}
        />
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