import React from 'react'
import ReactDOM from 'react-dom'
import theme from '../../styles/theme'
import { ThemeProvider } from '@mui/material/styles'
import Divider from '@mui/material/Divider'
import Paper from '@mui/material/Paper'
import Chip from '@mui/material/Chip'
import Grid from '@mui/material/Grid'
import Box from '@mui/material/Box'
import LoginNavButton from '../../commons/LandingAuth/LoginNavButtons'
import { styles } from '../../styles/auth'
import Buttons from '../../commons/globals/Button'
import FormFooter from '../../commons/Login/FormFooter'
import Subtitle from '../../commons/Login/Subtitle'


const HomeLogin = ({background}) => {
    
    const pathname = window.location.pathname.split('/')[1];

    return (
        <ThemeProvider theme={theme}>
            <Box sx={{...styles.root}}>
                <Grid container sx={{...styles.grid}}>
                    <Grid item xs={false} md={false} lg={8}></Grid>
                    <Grid item xs={12} sm={12} md={12} lg={4}>
                        <Paper elevation={6} style={{backgroundImage: 'linear-gradient(180deg,#730b0b,#ffffff)',paddingBottom:'30px', marginTop:'45px'}} sx={{...styles.root}}>
                            <Grid container justifyContent="center" spacing={3}>                    
                                <Grid item xs={8} lg={8}>
                                    <Subtitle classes={styles}/>
                                </Grid>
                                <Grid item xs={8} sm={8} lg={10}>
                                    <LoginNavButton classes={styles} action={pathname} />
                                    <Box pt={2} pb={3}>
                                        <Divider component="button" style={{width:'100%',height:'1px',background:'white'}} >
                                            <Chip label="OR" variant="default" style={{position:'relative',top:'-15px',background:'white'}}/>  
                                        </Divider>
                                    </Box>
                                    <Grid container justifyContent="center">
                                        <Grid item xs={12} md={6}>
                                            <Buttons variant="text" 
                                                    fullWidth 
                                                    href="/login" 
                                                    sx={{...styles.btnOr}}
                                                    text='LOGIN'
                                            />
                                        </Grid>
                                        <Grid item xs={12} md={6}>
                                            <Buttons variant="text" 
                                                    fullWidth 
                                                    href="/register" 
                                                    sx={{...styles.btnOr}}
                                                    text='Register'
                                            />
                                        </Grid>
                                    </Grid>
                                    <Box pt={3}>
                                        <FormFooter classes={styles}/>
                                    </Box>
                                </Grid>
                            </Grid>
                        </Paper>
                    </Grid>
                </Grid>
            </Box>
        </ThemeProvider>
    );
}

export default HomeLogin;

if(document.getElementById('home-login') || document.getElementById('home-register')) {
    var home = document.getElementById(`home-${window.location.pathname.split('/')[1]}`);
    var background = home.getAttribute('data-background');
    ReactDOM.render(<HomeLogin background={background} />, home);
}