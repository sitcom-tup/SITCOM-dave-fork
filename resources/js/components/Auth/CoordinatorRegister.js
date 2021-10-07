import React from 'react'
import ReactDOM from 'react-dom'
import { useStyles } from '../../styles/register';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Paper from '@mui/material/Paper';
import Buttons from '../../commons/Login/Buttons';
import FormFooter from '../../commons/Login/FormFooter';
import Subtitle from '../../commons/Login/Subtitle';
import LeftImage from '../../commons/Login/LeftImage';
import Register from '../../commons/Login/Register';


const CoordinatorRegister = () => {
    const classes = useStyles();

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
        <Box mt={0} ml={4} mr={4} >
            <Grid container spacing={3} justifyContent='center' >
                <LeftImage classes={classes}/>
                <Grid item xs={12} sm={12} md={12} lg={6} className={classes.signup}>
                    <Box mt={10} mb={3}>
                        <Paper elevation={0} className={classes.paper,classes.signupRightContent} align="center">
                            <Subtitle classes={classes} />
                            <form action="#" method="post">
                                <Register
                                    role='TUP-T Coordinator'
                                    classes={classes}
                                    values={values}
                                    fieldFirstProps={{
                                      id:'coordinator-name',
                                      name:'coordinator_name',
                                      label:'Coordinator Name',
                                      autoComplete:'coordinatorname',
                                      onChange: (e) => {
                                        console.log(e.target.value);
                                      }
                                    }}

                                />
                            </form>
                            <Buttons classes={classes} leftBtnTxt='Register'/>
                            <FormFooter classes={classes} />
                        </Paper>
                    </Box>
                </Grid>
            </Grid>
        </Box>
    );
}
 
export default CoordinatorRegister;


if(document.getElementById('register-coordinator')) {
    ReactDOM.render(<CoordinatorRegister/>, document.getElementById('register-coordinator'));
}