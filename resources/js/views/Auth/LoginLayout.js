import React from 'react'
import ReactDOM from 'react-dom'
import Login from '../../commons/Login/Login'

const LoginLayout = () => {

    const path = window.location.pathname.split('/');
    const action = path[1];
    const rolename = path[2];

    const [values, setValues] = React.useState({
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
            <Login
                auth={action}
                role={rolename}
                values={values}
                handleValues={handleValues}
                handleChange={handleChange}
                handleFormSubmit={handleFormSubmit}
                handleClickShowPassword={handleClickShowPassword}
                handleShowConfirmPass={handleClickShowConfirmPass}
                handleMouseDownPassword={handleMouseDownPassword}
            />

        </>
    );
}
 
export default LoginLayout;
 
if(document.getElementById('login-admin') || 
    document.getElementById('login-student') || 
    document.getElementById('login-supervisor') || 
    document.getElementById('login-coordinator')) 
{
    ReactDOM.render(<LoginLayout />, document.getElementById(`login-${window.location.pathname.split('/')[2]}`));
}