import React from 'react';
import FormControl from '@mui/material/FormControl'
import Box from '@mui/material/Box'
import Typography from '@mui/material/Typography'
import TextField from '@mui/material/TextField'
import IconButton from '@mui/material/IconButton'
import InputAdornment from '@mui/material/InputAdornment'
import Visibility from '@mui/icons-material/Visibility';
import VisibilityOff from '@mui/icons-material/VisibilityOff';

const Signup = ({
        role,
        handleEmail,
        handlePsswd,
        values,
        classes,
        handleClickShowPassword,
        handleMouseDownPassword
    }) => {
    return (
        <Box pt={6}>
            <Typography component="h2" variant="subtitle2">
                Sign In as TUP-T {role}
            </Typography>
            <FormControl fullWidth size="medium">
                <TextField
                    id="email"
                    name="email"
                    label="Email Address"
                    variant="filled" 
                    margin="normal"
                    required
                    fullWidth
                    autoFocus
                    onChange={handleEmail}
                    sx={{...classes.multilineColor}}
                    autoComplete="email"
                    inputProps={{
                        sx: {...classes.input},
                        sx: {...classes.multilineColor}
                    }}
                    />

                <TextField
                    id="password"
                    name="password"
                    variant="filled"
                    label="Password"
                    margin="normal"
                    type={values.showPassword ? 'text' : 'password'}
                    value={values.password}
                    required
                    fullWidth
                    onChange={handlePsswd}
                    sx={{...classes.multilineColor}}
                    InputProps={{
                        sx: {...classes.input},
                        sx: {...classes.multilineColor},
                        endAdornment: (
                            <InputAdornment position="end">
                                <IconButton
                                    aria-label="toggle password visibility"
                                    onClick={handleClickShowPassword}
                                    onMouseDown={handleMouseDownPassword}
                                    edge="end"
                                    >
                                    {values.showPassword ? <VisibilityOff /> : <Visibility />}
                                </IconButton>
                            </InputAdornment>
                        )
                    }}
                    />
            </FormControl>
        </Box>
    );
}
 
export default Signup;