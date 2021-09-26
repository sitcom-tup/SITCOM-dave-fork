import React from 'react'
import Box from '@material-ui/core/Box';
import Button from '@material-ui/core/Button';

const LoginNavButton = ({classes,action}) => {
    return (
        <>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href={`/${action}/admin`}>
                    Admin
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href={`/${action}/coordinator`}>
                    Coordinator
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href={`/${action}/supervisor`}>
                    Supervisor
                </Button>
            </Box>
            <Box p={1}>
                <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href={`/${action}/student`}>
                    Student
                </Button>
            </Box>
        </>
    );
}
 
export default LoginNavButton;