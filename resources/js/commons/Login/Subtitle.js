import React from 'react'
import Typography from '@material-ui/core/Typography';

const Subtitle = ({classes}) => {
    return (
        <>
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
        </>
    );
}
 
export default Subtitle;