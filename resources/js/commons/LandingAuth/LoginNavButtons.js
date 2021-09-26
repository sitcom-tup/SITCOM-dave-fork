import React from 'react'
import Box from '@material-ui/core/Box';
import Button from '@material-ui/core/Button';

const LoginNavButton = ({classes}) => {
    return (
        <>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href="/login/admin">
                    Admin
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href="/login/coordinator">
                    Coordinator
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href="/login/supervisor">
                    Supervisor
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href="/login/student">
                    Student
                </Button>
            </Box>
        </>
    );
}
 
export default LoginNavButton;