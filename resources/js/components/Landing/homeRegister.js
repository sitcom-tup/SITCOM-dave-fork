import React, { PureComponent } from 'react'
import ReactDOM from 'react-dom'
import Container from '@material-ui/core/Container';
import Typography from '@material-ui/core/Typography';
import { useStyles } from '../../styles/register';
import theme from '../../styles/theme';
import { Link, MuiThemeProvider } from '@material-ui/core';
import Divider from '@material-ui/core/Divider';
import Button from '@material-ui/core/Button';
import Paper from '@material-ui/core/Paper';
import Chip from '@material-ui/core/Chip';
import Grid from '@material-ui/core/Grid';
import Box from '@material-ui/core/Box';
import LoginNavButton from '../../commons/LandingAuth/LoginNavButtons';

const HomeRegister = ({background}) => {
    const classes = useStyles();
    return (
        <MuiThemeProvider theme={theme}>
            <Container maxWidth='lg' className={classes.root}>
                <Box style={{width:'100%',height:'720px',filter:'blur(100px)',backgroundColor:'rgba(0,0,0,0.2)'}}></Box>
                {/* <Paper style={{backgroundImage:"url("+background+")"}} className={classes.backImg}></Paper> */}
                <Grid container className={classes.grid}>
                    <Grid item xs={false} md={false} lg={8}></Grid>
                    <Grid item xs={12} sm={12} md={12} lg={4}>
                        <Paper elevation={6} style={{backgroundImage: 'linear-gradient(180deg,#730b0b,#ffffff)',paddingBottom:'30px', marginTop:'45px'}} className={classes.root}>
                            <Grid container justifyContent="center" spacing={3}>                    
                                <img className={classes.logo} alt="complex" src="/pictures/SITCOM_Logo.png" />
                                <Grid item xs={12} lg={12}>
                                    <Typography component="h2" variant="h6" align="center">
                                        Supervised Industrial Training Computerized
                                        Organizational Monitoring System
                                    </Typography>
                                </Grid>
                                <Grid item xs={8} sm={8} lg={10}>
                                    <LoginNavButton classes={classes} action="register" />
                                    <Box pt={2}>
                                        <Divider component="button" style={{width:'100%',background:'white'}} >
                                            <Chip label="OR" variant="default" style={{position:'relative',top:'-15px'}}/>  
                                        </Divider>
                                    </Box>
                                    <Grid container justifyContent="center">
                                        <Grid item xs={6} md={6}>
                                            <Button variant="text" 
                                                    color="primary" 
                                                    fullWidth href="/login" 
                                                    className={classes.btnOr}
                                                    >Login
                                            </Button>
                                        </Grid>
                                        <Grid item xs={6} md={6}>
                                            <Button variant="text" 
                                                    fullWidth href="/register" 
                                                    className={classes.btnOr}
                                                    >Register
                                            </Button>
                                        </Grid>
                                    </Grid>
                                    <Box pt={3}>
                                        <Typography component="h6" variant="caption" align="center">
                                            By using this service, you understood and agree to the TUP-T Online Services 
                                            <Link href="#" underline="none"> Terms of Use </Link>and
                                            <Link href="#" underline="none"> Privacy and Policy </Link> 
                                        </Typography>
                                    </Box>
                                </Grid>
                            </Grid>
                        </Paper>
                    </Grid>
                </Grid>
            </Container>
        </MuiThemeProvider>
    );
}
 
export default HomeRegister;

if(document.getElementById('home-register')) {
    var home = document.getElementById('home-register');
    var background = home.getAttribute('data-background');
    ReactDOM.render(<HomeRegister background={background} />, home);
}