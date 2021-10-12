import React from 'react'
import ReactDOM from 'react-dom'
import Login from '../../commons/Login/Login'

const AdminLogin = () => {

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
            role="Admin"
            values={values}
            handleEmail={handleEmail}
            handleChange={handleChange}
            handleClickShowPassword={handleClickShowPassword}
            handleMouseDownPassword={handleMouseDownPassword}
            handleFormSubmit={handleFormSubmit}
        />
    );
}
 
export default AdminLogin;


if(document.getElementById('login-admin')) {
    ReactDOM.render(<AdminLogin/>, document.getElementById('login-admin'));
}   