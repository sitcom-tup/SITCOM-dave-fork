import React from 'react'
import Button from '@mui/material/Button'

const Buttons = (props,{variant = 'contained',size = 'medium'}) => {
    return (
        <Button variant={variant} size={size} {...props}>
            {props.text}
        </Button>
    );
}
 
export default Buttons;