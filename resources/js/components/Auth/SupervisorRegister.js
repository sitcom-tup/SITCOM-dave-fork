import React from 'react'
import ReactDOM from 'react-dom'
import { useStyles } from '../../styles/register';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Paper from '@mui/material/Paper';
import Typography from '@mui/material/Typography';
import TextField from '@mui/material/TextField';
import { FilledInput, IconButton, InputAdornment, Button, FormControl, Link } from '@mui/material';
import { Visibility, VisibilityOff } from '@mui/icons-material';
import Buttons from '../../commons/Login/Buttons';
import FormFooter from '../../commons/Login/FormFooter';
import Subtitle from '../../commons/Login/Subtitle';
import LeftImage from '../../commons/Login/LeftImage';


const SupervisorRegister = () => {
    const classes = useStyles();

    const [values, setValues] = React.useState({
        amount: '',
        password: '',
        weight: '',
        weightRange: '',
        showPassword: false,
      });
    
      const handleChange = (prop) => (event) => {
        setValues({ ...values, [prop]: event.target.value });
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
                            <Subtitle classes={classes}/>
                            <Box pt={6}>
                                <Typography component="h2" className={classes.typography}>
                                    Register as Company Supervisor
                                </Typography>
                                <FormControl fullWidth size="medium">
                                    <TextField
                                        id="studentnumber"
                                        name="studentnumber"
                                        label="Student Number"
                                        variant="filled" 
                                        margin="normal"
                                        required
                                        fullWidth
                                        className={classes.multilineColor}
                                        autoFocus
                                        autoComplete="studentnumber"
                                        inputProps={{
                                            className: classes.input,
                                            className: classes.multilineColor
                                        }}
                                    />
                                      <TextField
                                        id="email"
                                        name="email"
                                        label="Email Address"
                                        variant="filled" 
                                        margin="normal"
                                        required
                                        fullWidth
                                        className={classes.multilineColor}
                                        autoFocus
                                        autoComplete="email"
                                        inputProps={{
                                            className: classes.input,
                                            className: classes.multilineColor
                                        }}
                                    />

                                    <TextField
                                        id="password"
                                        name="password"
                                        variant="filled"
                                        label="Password"
                                        margin="normal"
                                        type={values.showPassword ? 'text' : 'password'}
                                        value={values.password}
                                        required
                                        fullWidth
                                        onChange={handleChange('password')}
                                        className={classes.multilineColor}
                                        InputProps={{
                                            className: classes.input,
                                            className: classes.multilineColor,
                                            endAdornment: (
                                                <InputAdornment position="end">
                                                    <IconButton
                                                        aria-label="toggle password visibility"
                                                        onClick={handleClickShowPassword}
                                                        onMouseDown={handleMouseDownPassword}
                                                        edge="end"
                                                        >
                                                        {values.showPassword ? <VisibilityOff /> : <Visibility />}
                                                    </IconButton>
                                                </InputAdornment>
                                            )
                                        }}
                                    />
                                     <TextField
                                        id="password-confirm"
                                        name="password-confirm"
                                        variant="filled"
                                        label="Confirm Password"
                                        margin="normal"
                                        type={values.showPassword ? 'text' : 'password'}
                                        value={values.password}
                                        required
                                        fullWidth
                                        onChange={handleChange('password')}
                                        className={classes.multilineColor}
                                        InputProps={{
                                            className: classes.input,
                                            className: classes.multilineColor,
                                            endAdornment: (
                                                <InputAdornment position="end">
                                                    <IconButton
                                                        aria-label="toggle password visibility"
                                                        onClick={handleClickShowPassword}
                                                        onMouseDown={handleMouseDownPassword}
                                                        edge="end"
                                                        >
                                                        {values.showPassword ? <VisibilityOff /> : <Visibility />}
                                                    </IconButton>
                                                </InputAdornment>
                                            )
                                        }}
                                    />
                                    
                                </FormControl>
                            </Box>
                            <Buttons classes={classes} leftBtnTxt='Register'/>
                            <FormFooter classes={classes} />
                        </Paper>
                    </Box>
                </Grid>
            </Grid>
        </Box>
    );
}
 
export default SupervisorRegister;


if(document.getElementById('register-supervisor')) {
    ReactDOM.render(<SupervisorRegister/>, document.getElementById('register-supervisor'));
}