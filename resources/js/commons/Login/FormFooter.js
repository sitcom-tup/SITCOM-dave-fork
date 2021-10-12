import React from 'react'
import Box from '@mui/material/Box'
import Link from '@mui/material/Link'
import Typography from '@mui/material/Typography'

const FormFooter = ({classes}) => {
    return (
        <Box pt={3}>
        <Typography component="h6" variant="caption" align="center">
            By using this service, you understood and agree to the TUP-T Online Services 
            <Link href="#" underline="none"> Terms of Use </Link>and
            <Link href="#" underline="none"> Privacy and Policy </Link> 
        </Typography>
    </Box>
    );
}
 
export default FormFooter;