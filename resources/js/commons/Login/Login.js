import React from 'react'
import { styles } from '../../styles/auth';
import theme from '../../styles/theme';
import ThemeProvider from '@mui/material/styles/ThemeProvider';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Paper from '@mui/material/Paper';
import LeftImage from '../../commons/Login/LeftImage';
import Subtitle from '../../commons/Login/Subtitle';
import Buttons from '../../commons/Login/Buttons';
import FormFooter from '../../commons/Login/FormFooter';
import Signup from './Signup';

const Login = (props) => {
    return (
        <ThemeProvider theme={theme}>
            <Box mt={0} ml={4} mr={4} >
                <Grid container spacing={3} justifyContent='center' >
                    <LeftImage classes={styles} />
                    <Grid item xs={12} sm={12} md={12} lg={6} sx={{...styles.signup}}>
                        <Box mt={10} mb={3}>
                            <Paper elevation={0} sx={{...styles.paper,...styles.signupRightContent}} align="center">
                                <Subtitle classes={styles} />
                                <form onSubmit={props.handleFormSubmit}>
                                    <Signup
                                        auth={props.auth}
                                        role={props.role}
                                        handleEmail={props.handleEmail}
                                        handlePsswd={props.handleChange('password')}
                                        values={props.values}
                                        classes={styles}
                                        handleClickShowPassword={props.handleClickShowPassword}
                                        handleMouseDownPassword={props.handleMouseDownPassword}
                                    />
                                    <Buttons 
                                        classes={styles}
                                        href='/login'
                                    />
                                    <FormFooter 
                                        classes={styles}
                                    />
                                </form>
                            </Paper>
                        </Box>
                    </Grid>
                </Grid>
            </Box>
        </ThemeProvider>
    );
}
 
export default Login;