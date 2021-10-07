import React from 'react'
import Grid from '@mui/material/Grid'
import Box from '@mui/material/Box'
import Button from '@mui/material/Button'

const Buttons = ({classes,leftBtnTxt = 'Sign In'}) => {
    return (
        <Box pt={2}>
            <Grid container justifyContent="center" spacing={2}>
                <Grid item xs={12} sm={6} md={6} lg={6} >
                    <Button variant="contained" fullWidth className={classes.signupButton} type="submit">{leftBtnTxt}</Button>
                </Grid>
                <Grid item xs={12} sm={6} md={6} lg={6} >
                    <Button variant="contained" fullWidth href="/login" className={classes.signupButton}>Back</Button>
                </Grid>
            </Grid>
        </Box>
    );
}
 
export default Buttons;