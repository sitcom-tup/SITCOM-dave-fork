import React from 'react'
import Card from '@mui/material/Card'
import CardContent from '@mui/material/CardContent'
import Button from '@mui/material/Button'
import Grid from '@mui/material/Grid'
import { ThemeProvider } from '@mui/material'
import theme from '../../styles/theme'



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
                <Grid item xs={3}>
                    <Card>
                        <CardContent>
                            {children}
                            <Grid container spacing={1} justifyContent="center">
                                <Grid item xs={6} lg={6} md={6} sm={6}>
                                    <Button variant="contained" color="primary" onClick={() => { window.location.reload() }}>
                                        Retry
                                    </Button>
                                </Grid>
                                <Grid item xs={6} lg={6} md={6} sm={6}>
                                    <Button variant="contained" color="primary" onClick={() => { window.open(`https://forms.gle/4j7BJV6hZW5mL2ya6`,'_blank') }}>
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