import React from 'react'
import Typography from '@mui/material/Typography';

const Subtitle = ({classes}) => {
    return (
        <>
            <img style={{...classes.logo}} alt="complex" src="/pictures/SITCOM_Logo.png"/>
            <Typography  sx={{...classes.typography}} align="center">
                    TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES - TAGUIG
            </Typography>
            <Typography component="h2" sx={{...classes.typography}} align="center">
                    SUPERVISED INDUSTRIAL TRAINING COMPUTERIZED
            </Typography>
            <Typography component="h2" sx={{...classes.typography}} align="center">
                    ORGANIZATIONAL MONITORING SYSTEM
            </Typography>
        </>
    );
}
 
export default Subtitle;