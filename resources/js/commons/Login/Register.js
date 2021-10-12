import React from 'react'
import FormControl from '@mui/material/FormControl'
import Typography from '@mui/material/Typography'
import TextField from '@mui/material/TextField'
import Box from '@mui/material/Box'
import IconButton from '@mui/material/IconButton'
import InputAdornment from '@mui/material/InputAdornment'
import Visibility from '@mui/icons-material/Visibility';
import VisibilityOff from '@mui/icons-material/VisibilityOff';

const Register = (props) => {
    console.log(props);
    return (
        <Box pt={6}>
            <Typography component="h2" className={props.classes.typography}>
                Register as {props.role}
            </Typography>
            <FormControl fullWidth size="medium">
                {/* Name or Student ID */}
                <TextField 
                    {...props.fieldFirstProps}
                    variant="filled" 
                    margin="normal"
                    required
                    fullWidth
                    autoFocus
                    className={props.classes.multilineColor}
                />

                <TextField 
                    {...props.emailFieldProps}
                    name="email"
                    label="Email Address"
                    variant="filled" 
                    margin="normal"
                    required
                    fullWidth
                    autoFocus
                    className={props.classes.multilineColor}
                />

                {/* <TextField 
                    {...props.passwordFieldProps}
                    variant="filled"
                    label="Password"
                    margin="normal"
                    required
                    fullWidth
                    className={props.classes.multilineColor}
                    InputProps={{
                        className: props.classes.input,
                        className: props.classes.multilineColor,
                        endAdornment: (
                            <InputAdornment position="end">
                                <IconButton
                                    aria-label="toggle password visibility"
                                    onClick={props.passwordFieldProps.handleClickShowPassword}
                                    onMouseDown={props.passwordFieldProps.handleMouseDownPassword}
                                    edge="end"
                                    >
                                    {props.values.showPassword ? <VisibilityOff /> : <Visibility />}
                                </IconButton>
                            </InputAdornment>
                        )
                    }}
                />

                <TextField 
                    {...props.confirmPasswordProps}
                    variant="filled"
                    label="Confirm Password"
                    margin="normal"
                    required
                    fullWidth
                    InputProps={{
                        className: props.classes.input,
                        className: props.classes.multilineColor,
                        endAdornment: (
                            <InputAdornment position="end">
                                <IconButton
                                    aria-label="toggle password visibility"
                                    onClick={props.confirmPasswordProps.handleClickShowConfirm}
                                    onMouseDown={props.confirmPasswordProps.handleMouseDownConfirm}
                                    edge="end"
                                    >
                                    {props.values.showConfirm ? <VisibilityOff /> : <Visibility />}
                                </IconButton>
                            </InputAdornment>
                        )
                    }}
                /> */}
                
            </FormControl>
        </Box>
    );
}
 
export default Register;