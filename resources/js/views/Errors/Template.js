import React from 'react'
import Card from '@mui/material/Card'
import CardContent from '@mui/material/CardContent'
import Button from '@mui/material/Button'
import Grid from '@mui/material/Grid'
import { ThemeProvider } from '@mui/material'
import theme from '../../styles/theme'
import Box from '@mui/material/Box'
import ArrowBackIosIcon from '@mui/icons-material/ArrowBackIos'



const Template = ({children}) => {
    return (
        <ThemeProvider theme={theme}>
            <Grid
                container
                spacing={0}
                direction="column"
                alignItems="center"
                justifyContent="center"
                style={{ minHeight: '100vh' }}
            >
                <Grid item>
                    <Card>
                        <CardContent>
                            <Box sx={{justifyContent:'start'}}>
                                <Button variant="outlined" onClick={()=>{history.back()}}>
                                    <ArrowBackIosIcon/>
                                </Button>
                            </Box>
                            {children}
                            <Grid container spacing={2} justifyContent="center">
                                <Grid item xs={12} sm={6} md={6} lg={6}>
                                    <Button fullWidth variant="contained" color="primary" onClick={() => { window.location.reload() }}>
                                        Retry
                                    </Button>
                                </Grid>
                                <Grid item xs={12} sm={6} md={6} lg={6}>
                                    <Button fullWidth variant="contained" color="primary" onClick={() => { window.open(`https://forms.gle/4j7BJV6hZW5mL2ya6`,'_blank') }}>
                                        Report
                                    </Button>
                                </Grid>
                            </Grid>
                        </CardContent>
                    </Card>
                </Grid>         
            </Grid>
        </ThemeProvider>
    );
}
 
export default Template;