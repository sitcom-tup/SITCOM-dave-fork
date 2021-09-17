import * as React from 'react';
// import Avatar from '@material-ui/core/Avatar';
import Button from '@material-ui/core/Button';
import CssBaseline from '@material-ui/core/CssBaseline';
import TextField from '@material-ui/core/TextField';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import Link from '@material-ui/core/Link';
import Paper from '@material-ui/core/Paper';
import Box from '@material-ui/core/Box';
import Grid from '@material-ui/core/Grid';
// import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import Typography from '@material-ui/core/Typography';
import { makeStyles } from '@material-ui/core/styles';




function Copyright() {
  return (
    <Typography variant="body2" color="textSecondary" align="center">
      {'Copyright © '}
      <Link color="inherit" href="https://material-ui.com/">
        SITCOM
      </Link>{' '}
      {new Date().getFullYear()}
      {'.'}
    </Typography>
  );
}

const useStyles = makeStyles((theme) => ({
  root: {
    height: '100vh',
  },
  image: {
  
    backgroundRepeat: 'no-repeat',
    
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    width: 900,
    height: 1000,
  },
  logo:{
    height: 180,
  },
  paper: {
    margin: theme.spacing(8, 4),
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
  },
 
  form: {
    width: '100%', // Fix IE 11 issue.
    marginTop: theme.spacing(3),
 
  },
  submit: {
    margin: theme.spacing(3, 0, 2),
  },
  input: {
    color: "white"
  },
  multilineColor:{
    color:'white'
},
floatingLabelFocusStyle: {
  color: "white"
},
palette: {
  primary: {
    light: '#757ce8',
    main: '#3f50b5',
    dark: '#002884',
    contrastText: '#fff',
  },
  secondary: {
    light: '#ff7961',
    main: '#f44336',
    dark: '#ba000d',
    contrastText: '#000',
  },
},

}));

export default function SignInSide() {
  const classes = useStyles();

  return (
    <Grid container component="main" className={classes.root} >
      
      <CssBaseline />
        <Grid item xs={false} sm={2} md={7}>
            
              <img className={classes.image} alt="complex" src="/tuptbg2.jpg" />
            
         </Grid>
      <Grid item xs={12} sm={8} md={5} component={Paper} elevation={6} square style={{backgroundColor: "#82272d"}}>
        <div className={classes.paper} >
          {/* <Avatar className={classes.avatar}>
            <LockOutlinedIcon />
          </Avatar> */}
            <div>
              <img className={classes.logo} alt="complex" src="/SITCOM_Logo.png" />
           </div>
          
         <Typography component="h2" variant="h8" align="center">
            Supervised Industrial Training Computerized
            Organizational Monitoring System
          </Typography>
          <Box sx={{ m: 2 }} /> 
           {/* margin: 16px; */}
          <Typography component="h4" variant="h7" >
           Sign In as TUPT Student 
          </Typography>


          <form className={classes.form} noValidate >
           
            <TextField
              variant="filled" 
              margin="normal"
              color="Secondary"
              required
              fullWidth
              id="email"
              label="Email Address"
              InputLabelProps={{
                className: classes.floatingLabelFocusStyle,
            }}
              name="email"
              autoComplete="email"
              autoFocus
              InputProps={{
                className: classes.input
              }}
            />
            <TextField 
              variant="filled"
              margin="normal"
              color="Secondary"
              required
              fullWidth
              multiline
            InputProps={{
              className: classes.multilineColor
            }}
              name="password"
              label="Password"
              InputLabelProps={{
                className: classes.floatingLabelFocusStyle,
            }}
              type="password"
              id="password"
              autoComplete="current-password"
            />

            <FormControlLabel
              control={<Checkbox value="remember" color="primary" />}
              label="Remember me"
            />
            <Button style={{backgroundColor: "#70767d"}}
              type="submit"
              fullWidth
              variant="contained"
              color="primary"
              className={classes.submit}
            >
              Sign In
            </Button>
            <Grid container>
              <Grid item xs>
                <Link href="#" variant="body2" style={{color: "#fff"}}>
                  Forgot password?
                </Link>
              </Grid>
              <Grid item >
                <Link href="#" variant="body2" style={{color: "#fff"}}>
                  {"Don't have an account? Sign Up"}
                </Link>
              </Grid>
            </Grid>
            <Box mt={5}>
              <Copyright />
            </Box>
          </form>
        </div>
      </Grid>
    </Grid>
    
  );
}
