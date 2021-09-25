import React from 'react'
import ReactDOM from 'react-dom'
import { useStyles } from '../../styles/register';
import Box from '@material-ui/core/Box';
import Grid from '@material-ui/core/Grid';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import TextField from '@material-ui/core/TextField';
import { FilledInput, IconButton, InputAdornment, Button, FormControl, Link } from '@material-ui/core';
import { Visibility, VisibilityOff } from '@mui/icons-material';


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
                <Grid item xs={12} sm={12} md={12} lg={6}>
                    <Box mt={10} mb={10} className={classes.leftImage}>
                        <Paper elevation={12} className={classes.paperLeftImage}/>
                    </Box>
                </Grid>
                <Grid item xs={12} sm={12} md={12} lg={6} className={classes.signup}>
                    <Box mt={10} mb={3}>
                        <Paper elevation={0} className={classes.paper,classes.signupRightContent} align="center">
                            <img className={classes.logo} alt="complex" src="/pictures/SITCOM_Logo.png"/>
                            <Typography  className={classes.typography} >
                                    TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES - TAGUIG
                            </Typography>
                            <Typography component="h2" className={classes.typography}>
                                    SUPERVISED INDUSTRIAL TRAINING COMPUTERIZED
                            </Typography>
                            <Typography component="h2" className={classes.typography}>
                                    ORGANIZATIONAL MONITORING SYSTEM
                            </Typography>
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
                            <Box pt={2}>
                                <Grid container justifyContent="center" spacing={2}>
                                    <Grid item xs={12} sm={6} md={6} lg={6} >
                                        <Button variant="contained" fullWidth className={classes.signupButton}>Register</Button>
                                    </Grid>
                                    <Grid item xs={12} sm={6} md={6} lg={6} >
                                        <Button variant="contained" fullWidth href="/register" className={classes.signupButton}>Back</Button>
                                    </Grid>
                                </Grid>
                            </Box>
                            <Box pt={3}>
                                <Typography component="h6" variant="caption" align="center" className={classes.typography}>
                                    By using this service, you understood and agree to the TUP-T Online Services 
                                    <Link href="#" underline="none"> Terms of Use </Link>and
                                    <Link href="#" underline="none"> Privacy and Policy </Link> 
                                </Typography>
                            </Box>
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