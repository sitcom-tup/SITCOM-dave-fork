import React from 'react'
import ReactDOM from 'react-dom'
import Login from '../../commons/Login/Login'

const LoginLayout = () => {

    const path = window.location.pathname.split('/');
    const action = path[1];
    const rolename = path[2];

    const [values, setValues] = React.useState({
        amount: '',
        password: '',
        email: '',
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

    const handleFormSubmit = (e) => {
        e.preventDefault();
        console.log(`Email ${values.email} , Password ${values.password}`);
    }

    return (
        <Login
            auth={action}
            role={rolename}
            values={values}
            handleEmail={handleEmail}
            handleChange={handleChange}
            handleClickShowPassword={handleClickShowPassword}
            handleMouseDownPassword={handleMouseDownPassword}
            handleFormSubmit={handleFormSubmit}
        />
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