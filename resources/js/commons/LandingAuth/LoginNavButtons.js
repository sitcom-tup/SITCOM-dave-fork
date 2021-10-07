import React from 'react'
import Box from '@material-ui/core/Box';
import Button from '@material-ui/core/Button';

const LoginNavButton = ({classes,action}) => {

    const buttonNames = ['admin','coordinator','supervisor','student'];

    return (
        <>
            {buttonNames.map((names) => {
                return (<Box p={1}>
                            <Button className={classes.btnOr} variant="contained" size="medium" fullWidth href={`/${action}/${names}`}>
                                {names}
                            </Button>
                        </Box>)
            })}
        </>
    );
}
 
export default LoginNavButton;