import React from 'react'
import ReactDOM from 'react-dom'
import { useStyles } from '../../styles/logon';
import { MuiThemeProvider } from '@material-ui/core';
import Box from '@material-ui/core/Box';
import Grid from '@material-ui/core/Grid';
import Paper from '@material-ui/core/Paper';
import theme from '../../styles/theme';
import LeftImage from '../../commons/Login/LeftImage';
import Subtitle from '../../commons/Login/Subtitle';
import Signup from '../../commons/Login/Signup';
import Buttons from '../../commons/Login/Buttons';
import FormFooter from '../../commons/Login/FormFooter';

const   AdminLogin = () => {
    const classes = useStyles();

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
        <MuiThemeProvider theme={theme}>
            <Box mt={0} ml={4} mr={4} >
                <Grid container spacing={3} justifyContent='center' >
                    <LeftImage classes={classes} />
                    <Grid item xs={12} sm={12} md={12} lg={6} className={classes.signup}>
                        <Box mt={10} mb={3}>
                            <Paper elevation={0} className={classes.paper,classes.signupRightContent} align="center">
                                <Subtitle classes={classes} />
                                <form onSubmit={handleFormSubmit}>
                                    <Signup
                                        role='Admin'
                                        classes={classes}
                                        handleEmail={handleEmail}
                                        handlePsswd={handleChange('password')}
                                        values={values}
                                        classes={classes}
                                        handleClickShowPassword={handleClickShowPassword}
                                        handleMouseDownPassword={handleMouseDownPassword}
                                    />
                                    <Buttons 
                                        classes={classes}
                                    />
                                    <FormFooter 
                                        classes={classes}
                                    />
                                </form>
                            </Paper>
                        </Box>
                    </Grid>
                </Grid>
            </Box>
        </MuiThemeProvider>
    );
}
 
export default AdminLogin;


if(document.getElementById('login-admin')) {
    ReactDOM.render(<AdminLogin/>, document.getElementById('login-admin'));
}