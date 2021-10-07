import React from 'react'
import Button from '@material-ui/core/Button'

const Buttons = (props,{variant = 'contained',size = 'medium'}) => {
    return (
        <Button variant={variant} size={size} {...props}>
            {props.text}
        </Button>
    );
}
 
export default Buttons;