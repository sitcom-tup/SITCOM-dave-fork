import React from 'react'
import Typography from '@mui/material/Typography';
import Link from '@mui/material/Link';

const Subtitle = ({props}) => {
    return (
    <Typography variant="body2" color="text.secondary" align="center" {...props}>
        {'Copyright © '}
        <Link color="inherit">
         SITCOM
        </Link>{' '}
        {new Date().getFullYear()}
        {'.'}
      </Typography>
    
    );
}
 
export default Subtitle;