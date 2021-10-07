import React from 'react'
import Box from '@mui/material/Box';
import Buttons from '../globals/Button';

const LoginNavButton = ({classes,action}) => {

    const buttonNames = ['admin','coordinator','supervisor','student'];
    return (
        <>
            {buttonNames.map((names) => {
                return (<Box p={1} key={names}>
                            <Buttons className={classes.btnOr} 
                                    variant="contained" 
                                    size="medium" 
                                    fullWidth 
                                    href={`/${action}/${names}`} 
                                    text={names}/>
                        </Box>)
            })}
        </>
    );
}
 
export default LoginNavButton;